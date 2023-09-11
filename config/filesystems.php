<?php
$request = request();
$hostname = $request->getScheme() . '://' . $request->getHost() . ':7002';
return [
  'default' => 'image',
  'disks' => [
    'pdf' => [
      'driver' => 'local',
      'root' => storage_path('app/pdf'),
      'url' => "{$hostname}/pdf/"
    ],
    'image' => [
      'driver' => 'local',
      'root' => storage_path('app/image'),
      'url' => "{$hostname}/image/"
    ]
  ]
];