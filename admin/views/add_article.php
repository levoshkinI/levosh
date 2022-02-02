<?php 
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

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
	<script src="../ckeditor/ckeditor.js"></script>
	<script src="../Djenx.Explorer/djenx-explorer.js"></script>
</head>
<body>
<a style="margin:10px" href="../admin/">HOME</a>
	<div style="padding:0 200px 0 10px">
		<form method="post" action="../admin/">
		  <div class="form-group">
			<label for="title">Заголовок статьи</label>			
			<input style="width:500px" class="form-control" id="title" name="title" value=""/>
		  </div>
		  <div class="form-group">
			<label for="article">Краткое описание</label>
			<textarea style="width:500px" class="form-control" id="short_description" name="short_description" rows="5"></textarea>
			<script>
				var ckeditor2 = CKEDITOR.replace('short_description');
				DjenxExplorer.init({
					returnTo: ckeditor2,
					lang : 'ru'
				});
			</script>
		  </div>
		  <div class="form-group">
			<label for="article">Текст статьи</label>
			<textarea style="width:700px" class="form-control" id="article" name="article" rows="10"></textarea>
			<script>
				var ckeditor2 = CKEDITOR.replace('article');
				DjenxExplorer.init({
					returnTo: ckeditor2,
					lang : 'ru'
				});
			</script>
		  </div>
		  <br>
		    <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
			<a type="button" href="../admin/" class="btn btn-secondary" name="close">Закрыть</a>
		</form>
	</div>
	<br><br>
</body>
</html>