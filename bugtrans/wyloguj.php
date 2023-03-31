<?php
session_destroy();
unset($_SESSION['id']);
header("Location: http://localhost/bugtrans/bugtrans/index.php");
?>