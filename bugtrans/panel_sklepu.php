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
  				<a href="panel_dodawania_sklepu.php"><button class="btn btn-primary">Dodaj sklep</button></a>
  				<a href="panel_skladania_zamowienia.php"><button class="btn btn-primary">Utwórz zamówienie</button></a>
  			</div>
  			<div class="auth_options">
          <table id="tablePreview" class="table table-striped">
<!--Table head-->
Twoje sklepy
  <thead>
    <tr>
      <th>#</th>
      <th>Nazwa</th>
      <th>Miasto</th>
      <th>Ulica</th>
      <th>Kod pocztowy</th>
    </tr>
  </thead>
  <tbody>
  	<?php
    // Pobranie i wyświetlenie z bazy danych listy skleów dodanych przez zalogowanego użytkownika
  		$query = "SELECT * FROM sklepy WHERE id_konta = :id_konta;";
		$wynik = $db->prepare($query);
		$wynik->bindValue(":id_konta", $_SESSION['id']);
		$wynik->execute();
		$counter = 1;
		while($result = $wynik->fetch(PDO::FETCH_ASSOC)){
			echo "<tr><th scope='row'>".$counter++."</th><td>".$result['nazwa']."</td><td>".$result['miasto']."</td><td>".$result['ulica']."</td><td>".$result['kod_pocztowy']."</td></tr>";
		}
  	?>
  </tbody>
  <!--Table body-->
</table>
          <table id="tablePreview" class="table table-striped">
<!--Table head-->
Twoje Zamówienia
  <thead>
    <tr>
      <th>#</th>
      <th>Nazwa sklepu</th>
      <th>Zestaw produktów</th>
      <th>Data złożenia</th>
      <th>Kierowca</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Pobranie z bazy danych informacji na temat złożonych zmówień przez aktualnie zalogowanego użytkownika
    $counter = 1;
      $q = "SELECT * FROM zamowienia INNER JOIN sklepy ON zamowienia.id_sklepu=sklepy.id_sklepu INNER JOIN zestawy ON zamowienia.id_zestawu=zestawy.id_zestawu INNER JOIN statusy ON zamowienia.id_statusu=statusy.id_statusu INNER JOIN kierowcy ON zamowienia.id_kierowcy=kierowcy.id_kierowcy WHERE id_konta = :id_konta;";
      $w = $db->prepare($q);
      $w->bindValue(":id_konta",$_SESSION['id']);
      $w->execute();
      while($r = $w->fetch(PDO::FETCH_ASSOC)){
      echo "<tr><th scope='row'>".$counter++."</th><td>".$r['nazwa']."</td><td>".$r['zestaw']."</td><td>".$r['data']."</td><td>".$r['imie']." ".$r['nazwisko']."</td><td>".$r['status']."</td></tr>";
      }
    ?>
  </tbody>
  <!--Table body-->
</table>
  			</div>
  			<div class="footer">
  				
  			</div>
		</div>
	</body>
</html>