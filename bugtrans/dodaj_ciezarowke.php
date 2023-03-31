<?php
session_start();
include 'connection.php';
    
$query = "INSERT INTO ciezarowki (marka, model,nr_rejestracyjny) VALUES (:marka, :model, :nr_rejestracyjny);";
$wynik = $db->prepare($query);
$wynik->bindValue(":marka",$_POST['marka']);
$wynik->bindValue(":model",$_POST['model']);
$wynik->bindValue(":nr_rejestracyjny",$_POST['nr_rejestracyjny']);
$wynik->execute();
    
header("Location: panel_admina.php");
?>