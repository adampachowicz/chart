<?php
session_start();

if(!isset($_POST["import"])){

header('Location: index.php');

}else{

    require_once 'db.php';

        try
        
        {
        $dbh = new PDO($dsn, $db_config['user'],  $db_config['pass'], $options);
        
        
        define('DB_CONNECTED', true);

        
            
            $filename = $_FILES["file"]["tmp_name"];   

            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");

                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    $stmt=$dbh->prepare('INSERT INTO users (first_name, country) VALUES(:first_name, :country)');

                    $stmt->bindValue(':first_name', $getData[0], PDO::PARAM_STR);
                    $stmt->bindValue(':country', $getData[1], PDO::PARAM_STR);

                      

                    $result= $stmt->execute();

                    if($result !== false){

                        $_SESSION['alert'] = 'Plik zaimportowany poprawnie';

                        header('Location: index.php');

                        }else {
                            $_SESSION['alert'] = 'Wystąpił błąd. Proszę dodaj plik .csv';
                            

                            header('Location: index.php');
                    }
                }
            
                fclose($file);  
            }
            
        } catch(PDOException $e)
        
        {
        
        die('Błąd w połączeniu: ' . $e->getMessage());
        
        }
} 
