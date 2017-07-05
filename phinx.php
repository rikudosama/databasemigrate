<?php
$pdo = new PDO(
  'mysql:dbname=migration_demo;host=localhost','root','',
  [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]
  );

return [
  'paths' => [
      'migrations' => __DIR__ .'/db/migrations',
      'seeds' => __DIR__ .'/db/seeds'
  ],
  'environment' => [
      'default_database' => 'development',
      'development' => [
        'name' => 'migration_demo',
        'connection' => $pdo
      ]
  ]
];
