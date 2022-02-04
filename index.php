<?php
	define('MyConst', TRUE);
	session_start(); 
	require_once 'config.php';
	require_once 'models/database.class.php';
	$db = new database($pdo);
	
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
  <!-- Меню -->
<?php ?>  
  <!-- Контент страницы -->
<?php	include('views/articles.php');?>


</body>
</html>
