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


    <form method="POST" action="dodaj_sklep.php">
      <div class="form-group row">
        <label for="nazwa" class="col-4 col-form-label">Nazwa</label> 
        <div class="col-8">
          <input id="nazwa" name="nazwa" type="text" class="form-control" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label for="miasto" class="col-4 col-form-label">Miasto</label> 
        <div class="col-8">
          <input id="miasto" name="miasto" type="text" class="form-control" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Ulica</label> 
        <div class="col-8">
          <input id="ulica" name="ulica" type="text" class="form-control" required="required">
        </div>
      </div>
      <div class="form-group row">
        <label for="kod" class="col-4 col-form-label">Kod pocztowy</label> 
        <div class="col-8">
          <input id="kod_pocztowy" name="kod_pocztowy" type="text" class="form-control" required="required">
        </div>
      </div> 
      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Dodaj sklep</button>
        </div>
      </div>
    </form>
  </div>
  <div class="footer">

  </div>
</div>
</body>
</html>