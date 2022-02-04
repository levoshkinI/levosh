<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
	require_once '../config.php';
	require_once '../models/database.class.php';
	$db = new database($pdo);
?>
<!doctype html>
<html lang="ru">
<head>
  <!-- Кодировка веб-страницы -->
  <meta charset="utf-8">
  <!-- Настройка viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New User</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--script src="/jquery/jquery.min.js"></script-->
	<script src="/bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <form style="margin:10px" method="POST" action="">
		  <div class="form-group">
			<label for="email">Email адрес</label>
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Введите email">
			<small id="emailHelp" class="form-text text-muted"></small>
		  </div>
		  <div class="form-group">
			<label for="password">Пароль</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
		  </div>
		  <div class="form-group">
			<label for="repeat_pass">Повторить пароль</label>
			<input type="password" class="form-control" id="repeat_pass" name="repeat" placeholder="Повторить пароль">
		  </div>
		  <br>
		  <!--a type="button" class="btn btn-primary" href="/admin" name="login">Войти</a-->
		  <button type="submit" class="btn btn-primary" name="saveUser">Сохранить</button>
		  <a type="button" href="../admin/?menu=2" class="btn btn-secondary" name="close">Закрыть</a>
	</form>
</body>
</html>