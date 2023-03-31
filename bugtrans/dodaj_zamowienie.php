<?php
session_start();
include 'connection.php';
    
$query = "INSERT INTO zamowienia (id_sklepu, id_zestawu) VALUES (:id_sklepu, :id_zestawu);";
$wynik = $db->prepare($query);
$wynik->bindValue(":id_sklepu",$_POST['id_sklepu']);
$wynik->bindValue(":id_zestawu",$_POST['id_zestawu']);
$wynik->execute(); 
header("Location: panel_sklepu.php");
?>