<?php
session_start();
include 'connection.php';
if (isset($_SESSION['id'])) {
  if ($_SESSION['typ_konta'] != 1) {
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
          <table id="tablePreview" class="table table-striped">
<!--Table head-->
Złożone zamówienia
  <thead>
    <tr>
      <th>ID</th>
      <th>Nazwa sklepu</th>
      <th>Zestaw produktów</th>
      <th>Data złożenia</th>
      <th>Kierowca</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Pobranie z bazy danych wszystkich informacji na temat zamówień wszystkich sklepów i wyświetlenie ich w tabeli
      $q = "SELECT * FROM zamowienia INNER JOIN sklepy ON zamowienia.id_sklepu=sklepy.id_sklepu INNER JOIN zestawy ON zamowienia.id_zestawu=zestawy.id_zestawu INNER JOIN statusy ON zamowienia.id_statusu=statusy.id_statusu INNER JOIN kierowcy ON zamowienia.id_kierowcy=kierowcy.id_kierowcy;";
      $w = $db->prepare($q);
      $w->execute();
      while($r = $w->fetch(PDO::FETCH_ASSOC)){
      echo "<tr><th scope='row'>".$r['id_zamowienia']."</th><td>".$r['nazwa']."</td><td>".$r['zestaw']."</td><td>".$r['data']."</td><td>".$r['imie']." ".$r['nazwisko']."</td><td>".$r['status']."</td></tr>";
      }
    ?>
  </tbody>
            <table id="tablePreview" class="table table-striped">
Kierowcy i ciężarowki
  <thead>
    <tr>
      <th>#</th>
      <th>Marka</th>
      <th>Model</th>
      <th>Numer rejestracyjny</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Pobranie z bazy danych kierowców z przypisanymi im ciężarówkami i wyświetlenie ich w tabeli
      $q = "SELECT * FROM kierowcy INNER JOIN ciezarowki ON kierowcy.id_ciezarowki=ciezarowki.id_ciezarowki;";
      $w = $db->prepare($q);
      $w->execute();
      while($r = $w->fetch(PDO::FETCH_ASSOC)){
      echo "<tr><th scope='row'>".$r['imie']." ".$r['nazwisko']."</th><td>".$r['marka']."</td><td>".$r['model']."</td><td>".$r['nr_rejestracyjny']."</td></tr>";
      }
    ?>
  </tbody>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Table body-->
</table>
  			</div>
  			<div class="footer">
<form action="dodaj_kierowce.php" method="POST">
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Imię</label> 
    <div class="col-8">
      <input id="imie" name="imie" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nazwisko</label> 
    <div class="col-8">
      <input id="text" name="nazwisko" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Dodaj kierowcę</button>
    </div>
  </div>
</form>
<form action="dodaj_ciezarowke.php" method="POST">
  <div class="form-group row">
    <label for="marka" class="col-4 col-form-label">Marka</label> 
    <div class="col-8">
      <input id="marka" name="marka" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="model" class="col-4 col-form-label">Model</label> 
    <div class="col-8">
      <input id="model" name="model" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nr_rejestracyjny" class="col-4 col-form-label">Numer rejestracyjny</label> 
    <div class="col-8">
      <input id="nr_rejestracyjny" name="nr_rejestracyjny" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Dodaj ciężarówkę</button>
    </div>
  </div>
</form>
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
      echo "<option value=".$result['id_zamowienia'].">".$result['id_zamowienia']."</option>";
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
      $query = "SELECT * FROM kierowcy WHERE id_kierowcy > 1";
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
      <select id="select" name="id_statusu" class="custom-select">
    <?php
    // Pobranie z bazy danych listy możliwych statusów
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
<form method="POST" action="edytuj_kierowce.php">
  <div class="form-group row">
    <label for="sklep" class="col-4 col-form-label">Kierowca</label> 
    <div class="col-8">
      <select id="sklep" name="id_kierowcy" class="custom-select" required="required">
    <?php
    // Pobranie z bazy danych listy kierowów (bez pustego domyślnego kierowcy) i wyswietlenie w liście rozwijanej
      $query = "SELECT * FROM kierowcy WHERE id_kierowcy > 1";
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
    <label for="select" class="col-4 col-form-label">Ciężarówka</label> 
    <div class="col-8">
      <select id="select" name="id_ciezarowki" class="custom-select">
    <?php
    // Pobranie z bazy danych listy ciężarówek i wyświetlenie w liście rozwijanej
      $query = "SELECT ciezarowki.id_ciezarowki,ciezarowki.marka,ciezarowki.model,ciezarowki.nr_rejestracyjny FROM ciezarowki LEFT JOIN kierowcy ON ciezarowki.id_ciezarowki=kierowcy.id_ciezarowki WHERE kierowcy.id_ciezarowki IS NULL";
    $wynik = $db->prepare($query);
    $wynik->execute();
    while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
      echo "<option value=".$result['id_ciezarowki'].">".$result['marka']." ".$result['model'].$result['nr_rejestracyjny']."</option>";
    }
    ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Zapisz zamochód kierowcy</button>
    </div>
  </div>
</form>
  			</div>
		</div>
	</body>
</html>