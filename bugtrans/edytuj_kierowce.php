<?php
session_start();
include 'connection.php';
$query = "UPDATE kierowcy SET id_ciezarowki = :id_ciezarowki WHERE id_kierowcy = :id_kierowcy;";
$wynik = $db->prepare($query);
$wynik->bindValue(":id_kierowcy",$_POST['id_kierowcy']);
$wynik->bindValue(":id_ciezarowki",$_POST['id_ciezarowki']);
$wynik->execute(); 
header("Location: panel_admina.php");
?>