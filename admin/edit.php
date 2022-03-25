<?php
session_start();

    $utlisateur_phpadmin = "root";
    $mdp_phpadmin = "";
    $dbname = "ecommerce";
    $hote = "localhost";

    try {
        $db = new PDO("mysql:host=localhost;dbname=ecommerce;charset=UTF8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Vous etes connectez a PDO MySQL";
    }catch (PDOException $exception){
        echo "erreur " .$exception->getMessage();
    }

    
?>