<?php

session_start();

header('Content-Type: application/json');
require_once 'db.php';
try{
    

    $dbh = new PDO($dsn, $db_config['user'],  $db_config['pass'], $options);
        
        
        define('DB_CONNECTED', true);

        $stmt=$dbh->prepare('SELECT country, COUNT(id) as amount FROM users GROUP BY country');
        $result = $stmt->execute();
        $result = $stmt->fetchAll();


        if($result !== false){

          

           $data = array();

           foreach($result as $row){
               $data[] = $row;
             //  echo $row['first_name'];
          }
       //   print_r(array_count_values($data));
            $_SESSION['county'] = $data ;
            echo json_encode($data);

        }else{
            echo 'cos jest nie tak';
        }
        
       

        

    }catch(PDOException $e){

    die('Błąd w połączeniu: ' . $e->getMessage());

    }
