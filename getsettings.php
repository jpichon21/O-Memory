<?php

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=O-Memory-DB', 'root');
        $time = $pdo->query('SELECT time FROM winnertimes ORDER BY time ASC')->fetchAll();

        foreach ($time as $row) {
            echo $row['time']."s<br />\n";
        }

    } 
    catch (PDOException $e) {
         // En cas d'erreur de connexion
        exit('Erreur DB !');
    }


?>