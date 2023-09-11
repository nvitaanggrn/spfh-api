@php
  $data = $__this->getData();
@endphp

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
  <meta name='viewport' content='width=device-width, initial-scale=1'/>
  <title>
    Laporan Hiyarihatto
  </title>
  @include('form.pdf._style')
</head>
<body>
  @foreach($data as $item)
    @include('form.pdf._sheet', ['item' => $item])
  @endforeach
</body>
</html>