<?php
session_start();
include 'connection.php';

	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	
	$query = "SELECT * FROM konta WHERE login = :login;";
	$wynik = $db->prepare($query);
	$wynik->bindValue(":login", $login);
	$wynik->execute();
	
	$result = $wynik->fetch(PDO::FETCH_ASSOC);
	
	if($result){
		if(password_verify($haslo,$result['haslo'])){
			$_SESSION['typ_konta'] = $result['typ'];
			$_SESSION['id'] = $result['id_konta'];
			header('location: panel_sklepu.php');
		} else {
			header('location: error.php?error=Błędne dane logowania ');
		}
	} else {
			header('location: error.php?error=Błędne dane logowania ');
		}


//	header('location: panel_sklepu.php');

?>