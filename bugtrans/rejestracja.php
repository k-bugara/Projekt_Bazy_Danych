<?php
include 'connection.php';
$login = $_POST['login'];
$email = $_POST['email'];
$haslo = $_POST['haslo'];
$powtorz_haslo = $_POST['powtorz_haslo'];


if($haslo != $powtorz_haslo){
    header('location: error.php?error=Podane hasła różnią się');
    die();
} else {

    
$query = "SELECT * FROM konta WHERE login = :login or email = :email;";
$wynik = $db->prepare($query);
$wynik->bindValue(":login", $login);
$wynik->bindValue(":email", $email);
$wynik->execute();

    // jest taki użytkownik?
if ($wynik->fetch(PDO::FETCH_ASSOC)) {
    header('location: error.php?error=Konto o tym loginie lub adresie email jest już zarejestrowane');
    die();
} else {

$haslo = password_hash($haslo, PASSWORD_BCRYPT, array("cost" => 12));
    
$query = "INSERT INTO konta (login, haslo, email) VALUES (:login, :haslo, :email)";

$wynik = $db->prepare($query);
$wynik->bindValue(":login", $login);
$wynik->bindValue(":email", $email);
$wynik->bindValue(":haslo", $haslo);
$result = $wynik->execute();

header("Location: error.php?error=Pomyślnie zarejestrowano możesz się zalogować");
}}
?>