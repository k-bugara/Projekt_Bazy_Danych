<?php
session_start();
include 'connection.php';
    
$query = "INSERT INTO kierowcy (imie, nazwisko) VALUES (:imie, :nazwisko);";
$wynik = $db->prepare($query);
$wynik->bindValue(":imie",$_POST['imie']);
$wynik->bindValue(":nazwisko",$_POST['nazwisko']);
$wynik->execute();
    
header("Location: panel_admina.php");
?>