<?php
namespace App\Core\Spfh;

use Exception;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Core;

class Wkhtmltopdf
{
  const PORTRAIT = 'Portrait';
  const LANDSCAPE = 'Landscape';

  protected $args = [
    'dpi' => '96',
    'encoding' => 'UTF-8',
    'page-size' => 'A4',
    'page-width' => '210mm',
    'page-height' => '297mm',
    'orientation' => 'Portrait',
    'margin-top' => '10mm',
    'margin-left' => '10mm',
    'margin-right' => '10mm',
    'margin-bottom' => '10mm',
    'enable-local-file-access',
    'disable-javascript',
    'quiet'
  ];

  protected $content;
  protected $options;
  protected $storage;
  protected $tmpfile;
  protected $isPreview = true;
  protected $isDownload = true;
  protected $binary = 'wkhtmltopdf';

  public function __construct(string $content, array $options = []){
    $this->content = $content;
    $this->options = $options;
    $this->storage = Core\Filesystem::disk('pdf');
  }

  public function getToken(){
    return $this->options['token'] ?? '';
  }

  public function getOutfile(){
    return $this->options['outfile'] ?? '';
  }

  public function getOrientation(){
    return $this->options['orientation'] ?? static::PORTRAIT;
  }

  public function binaryStream(){
    $this->saveTmpfile();
    $this->saveOutfile();
    $file = $this->storage->path($this->getOutfile());
    return (new BinaryFileResponse($file))->setContentDisposition(ResponseHeaderBag::DISPOSITION_INLINE);
  }

  public function binaryDownload(){
    $this->saveTmpfile();
    $this->saveOutfile();
    $file = $this->storage->path($this->getOutfile());
    return (new BinaryFileResponse($file))->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT);
  }

  protected function saveTmpfile(){
    $tmpfile = sprintf('%s.html', $this->getOutfile());
    $isWrited = $this->storage->has($tmpfile) ?
      $this->storage->update($tmpfile, $this->content) :
      $this->storage->write($tmpfile, $this->content);
    if ($isWrited === false) {
      throw new Exception(sprintf('Cannot save html file into %s', $tmpfile));
    }
    $this->tmpfile = $tmpfile;
  }

  protected function saveOutfile(){
    $command = new Command($this->binary);
    $command->addArgs(array_merge($this->args, ['orientation' => $this->getOrientation()]));
    $command->addArg($this->storage->path($this->tmpfile), null, true);
    $command->addArg($this->storage->path($this->getOutfile()), null, true);
    if (!$command->execute()) {
      $this->storage->delete([$this->tmpfile, $this->getOutfile()]);
      throw new Exception($command->getError(), $command->getExitCode());
    }
    $this->storage->delete($this->tmpfile);
  }

  public static function loadHtml($content, array $options = []){
    return new static($content, $options);
  }

  public static function loadView($viewName, array $data, array $options = []){
    return new static(view($viewName, $data)->toHtml(), $options);
  }
}