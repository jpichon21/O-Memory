<?php

    try{
        // Pour cet exercice, j'ai laissé root sans password pour la connexion à la DB
        $pdo = new PDO('mysql:host=localhost;dbname=O-Memory-DB', 'root');
        
        $time = $_POST['time'];
        $date = $_POST['date'];

        // On récupère le temps et la date depuis le post AJAX
        echo $time;

        // Et on insère ça en DB
        $query = $pdo->prepare('INSERT INTO winnertimes (time, date) VALUES (?, ?)');
        $query->bindValue(1, $time);
        $query->bindValue(2, $date);
    
        $query->execute();
    } 
    catch (PDOException $e) {
         // En cas d'erreur de connexion
        exit('Erreur DB !');
    }


?>