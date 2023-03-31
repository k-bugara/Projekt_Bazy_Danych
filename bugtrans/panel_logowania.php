<?php
if (isset($_SESSION['id'])) {
  if($_SESSION['typ_konta'] == 1){
    header("Location: http://localhost/bugtrans/panel_administratora.php");
  } else if ($_SESSION['uprawnienia'] == 2){
    header("Location: http://localhost/bugtrans/panel_sklepu.php");
  }
}
?>
<html>
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

      <form action="logowanie.php" method="POST">
        <div class="form-group row">
          <label for="login" class="col-4 col-form-label">Login</label> 
          <div class="col-8">
            <input id="login" name="login" type="text" class="form-control" required="required">
          </div>
        </div>
        <div class="form-group row">
          <label for="haslo" class="col-4 col-form-label">Hasło</label> 
          <div class="col-8">
            <input id="haslo" name="haslo" type="password" class="form-control" required="required">
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Zaloguj</button>
          </div>
        </div>
      </form>
    </div>
    <div class="footer">

    </div>
  </div>
</body>
</html>