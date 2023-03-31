<?php
session_start();
include 'connection.php';
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
    <h2>Kliknąłeś zamówienie nr: 
<?php
echo $_GET['id'];
?>
</h2>

<form method="POST" action="edytuj_zamowienie.php?id=1">
  <div class="form-group row">
    <label for="sklep" class="col-4 col-form-label">Id zamówienia</label> 
    <div class="col-8">
      <select id="sklep" name="id_zamowienia" class="custom-select" required="required">
    <?php
      $query = "SELECT * FROM zamowienia";
    $wynik = $db->prepare($query);
    $wynik->execute();
    while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$result['id'].">".$result['id']."</option>";
    }
    ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="sklep" class="col-4 col-form-label">Kierowca</label> 
    <div class="col-8">
      <select id="sklep" name="id_kierowcy" class="custom-select" required="required">
    <?php
      $query = "SELECT * FROM kierowcy";
    $wynik = $db->prepare($query);
    $wynik->execute();
    while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$result['id_kierowcy'].">".$result['imie']." ".$result['nazwisko']."</option>";
    }
    ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Status</label> 
    <div class="col-8">
      <select id="select" name="status" class="custom-select">
    <?php
      $query = "SELECT * FROM statusy";
    $wynik = $db->prepare($query);
    $wynik->execute();
    while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$result['id_statusu'].">".$result['status']."</option>";
    }
    ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Zatwierdź status zamówienia</button>
    </div>
  </div>
</form>
  </div>
  <div class="footer">

  </div>
</div>
</body>
</html>