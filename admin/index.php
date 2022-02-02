<?php
	define('MyConst', TRUE);
	session_start(['cookie_lifetime' => 3600]);
	require_once '../config.php';
	require_once '../models/database.class.php';
	require_once 'models/Model.php';
	$db = new database($pdo);

	if(isset($_POST['exit'])){
		$_SESSION = [];
	}

	include '../admin/views/login.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <!-- Кодировка веб-страницы -->
  <meta charset="utf-8">
  <!-- Настройка viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Levoshkin</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--script src="/jquery/jquery.min.js"></script-->
	<script src="/bootstrap/js/bootstrap.js"></script>
	

</head>
<body>
  <!-- Контент страницы -->

  <!-- авторизация -->
</body>
</html>
