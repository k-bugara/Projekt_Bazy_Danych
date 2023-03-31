<?php
session_start();
include 'connection.php';
    
$query = "INSERT INTO sklepy (id_konta, nazwa, miasto, ulica, kod_pocztowy) VALUES (:id_konta, :nazwa, :miasto, :ulica, :kod_pocztowy);";
$wynik = $db->prepare($query);
$wynik->bindValue(":id_konta",$_SESSION['id']);
$wynik->bindValue(":nazwa",$_POST['nazwa']);
$wynik->bindValue(":miasto",$_POST['miasto']);
$wynik->bindValue(":ulica",$_POST['ulica']);
$wynik->bindValue(":kod_pocztowy",$_POST['kod_pocztowy']);
$wynik->execute();
    
header("Location: panel_sklepu.php");
?>