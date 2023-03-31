<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=bug-trans', 'root', '');
}
catch (PDOException $e){
    die ("Brak połączenia z bazą danych");
}