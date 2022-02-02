<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

	require_once '../config.php';
	require_once '../models/database.class.php';
	$db = new database($pdo);
	$user = $user->getUserId($_POST['id']);
?>
<!doctype html>
<html lang="ru">
<head>
  <!-- Кодировка веб-страницы -->
  <meta charset="utf-8">
  <!-- Настройка viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Редактировать пользователя</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<script src="/jquery/jquery.min.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <form method="POST" action="" name="update">
			<input hidden class="form-control" id="id" name="id" value="<?php echo $user['id']?>">
		  <div class="form-group">
			<label for="email">Email адрес</label>
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $user['email']?>">
			<small id="emailHelp" class="form-text text-muted"></small>
		  </div>
		  <div class="form-group">
			<label for="password">Пароль</label>
			<input type="password" class="form-control" id="password" name="password" value="<?php //echo $user['password']?>">
		  </div>
		  <div class="form-group">
			<label for="repeat_pass">Повторить пароль</label>
			<input type="password" class="form-control" id="repeat_pass" name="repeat_pass">
		  </div>		  <div class="form-group">
			<label for="admin">Админ</label>
			<input type="checkbox" class="form-check-input" id="admin" name="admin" value="1">
		  </div>
		  <br>
		  <!--a type="button" class="btn btn-primary" href="/admin" name="login">Войти</a-->
		  <button type="submit" class="btn btn-primary" name="updateUser">Изменить</button>
	</form>
</body>
</html>