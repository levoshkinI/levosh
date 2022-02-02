<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
    require_once 'controllers/category.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <!-- Кодировка веб-страницы -->
  <meta charset="utf-8">
  <!-- Настройка viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New Category</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--script src="/jquery/jquery.min.js"></script-->
	<script src="/bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <form style="margin:10px" method="POST" action="">
		  <div class="form-group">
			<label for="category">Категория</label>
<?php	echo '<select id="parent" name="parent">
				<option value="0">-Выбрать-</option>' . $cat_select . '
			  </select>';
?>				
		  </div>
		  <div class="form-group">
			<label for="title">Название</label>
			<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Название категории">
			<small id="title" class="form-text text-muted"></small>
		  </div>
		  <div class="form-group">
			<label for="description">Описание</label>
			<textarea type="text" class="form-control" id="description" name="description"></textarea>
		  </div>
		  <br>
		  <!--a type="button" class="btn btn-primary" href="/admin" name="login">Войти</a-->
		  <button type="submit" class="btn btn-primary" name="saveCategory">Сохранить</button>
		  <a type="button" href="../admin/?menu=3" class="btn btn-secondary" name="close">Закрыть</a>
	</form>
</body>
</html>