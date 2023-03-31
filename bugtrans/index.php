<?php
if (isset($_SESSION['id'])) {
  if($_SESSION['typ_konta'] == 1){
    header("Location: http://localhost/bugtrans/panel_administratora.php");
  } else if ($_SESSION['uprawnienia'] == 2){
    header("Location: http://localhost/bugtrans/panel_sklepu.php");
  }
}
?>
<btml>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="grid-container">
  			<div class="logo">'
  				<img src="img/logo.png">
  			</div>
  			<div class="auth_options">
  				<h1>Twój panel do zarządzania zamówieniami towaru.</h1>
  				<a href="panel_logowania.php"><button class="btn btn-primary">Zaloguj się</button></a>
  				<a href="panel_rejestracji.php"><button class="btn btn-primary">Zarejestruj się</button></a>
  			</div>
  			<div class="footer">
  				
  			</div>
		</div>
	</body>
</btml>