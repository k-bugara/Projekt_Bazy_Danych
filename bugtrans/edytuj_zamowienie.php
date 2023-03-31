<?php
session_start();
include 'connection.php';

$query = "UPDATE zamowienia SET id_statusu = :id_statusu, id_kierowcy = :id_kierowcy WHERE id_zamowienia = :id;";
$wynik = $db->prepare($query);
$wynik->bindValue(":id_statusu",$_POST['id_statusu']);
$wynik->bindValue(":id_kierowcy",$_POST['id_kierowcy']);
$wynik->bindValue(":id",$_POST['id_zamowienia']);
$wynik->execute(); 
header("Location: panel_admina.php");
?>