<?php

$db_config = array(
 
     'host' => '127.0.0.1',
      
      'port' => '3306',
      
      'user' => 'root',
      
      'pass' => 'root',
      
      'db' => 'chart',
      
      'db_type' => 'mysql',
      
      'encoding' => 'utf8'
      
     );
     $dsn = $db_config['db_type'] .
 
     ':host=' . $db_config['host'] .
     
     ';port=' . $db_config['port'] .
     
     ';encoding=' . $db_config['encoding'] .
     
     ';dbname=' . $db_config['db'];
      
     $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
     