<?php
return [
  'default' => 'spfh',
  'connections' => [
    'spfh' => [
      'driver' => 'pgsql',
      'unix_socket' => '/var/run/postgresql/.s.PGSQL.5432',
      'host' => 'aamiin-novita-spfh-api-postgres',
      'port' => '5432',
      'database' => 'spfh',
      'username' => 'postgres',
      'password' => 'c0b4d1b4c4',
      'charset' => 'utf8',
      'schema' => 'public',
      'prefix' => ''
    ]
  ]
];