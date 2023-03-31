<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id'])) {
  if ($_SESSION['typ_konta'] == 1){
    header("Location: panel_admina.php");
  } else if ($_SESSION['typ_konta'] != 0) {
    header("location: error.php?error=Brak dostepu");
  }
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <a class="logout" href="wyloguj.php">Wyloguj się</a>
 </head>
 <body>
  <div class="grid-container">
   <div class="logo">'
    <img src="img/logo.png">
  </div>
  <div class="auth_options">


<form method="POST" action="dodaj_zamowienie.php">
  <div class="form-group row">
    <label for="sklep" class="col-4 col-form-label">Nazwa sklepu</label> 
    <div class="col-8">
      <select id="sklep" name="id_sklepu" class="custom-select" required="required">
    <?php
      $query = "SELECT id_sklepu,nazwa FROM sklepy WHERE id_konta = :id_konta;";
    $wynik = $db->prepare($query);
    $wynik->bindValue(":id_konta", $_SESSION['id']);
    $wynik->execute();
    while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$result['id_sklepu'].">".$result['nazwa']."</option>";
    }
    ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Zestaw produków</label> 
    <div class="col-8">
      <select id="select" name="id_zestawu" class="custom-select">
    <?php
      $query = "SELECT * FROM zestawy;";
    $wynik = $db->prepare($query);
    $wynik->execute();
    while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$result['id_zestawu'].">".$result['zestaw']."</option>";
    }
    ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Złóż zamówienie</button>
    </div>
  </div>
</form>
  </div>
  <div class="footer">

  </div>
</div>
</body>
</html>