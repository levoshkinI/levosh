<?php 
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
	require_once '../config.php';
    require_once '../models/database.class.php';
    $db = new database($pdo);
	$id = $_POST['article_id'];

	$article = $article->getArticle($id);
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
		<form method="post" action="">
		<input type="hidden" name="article_id" id="article_id" value="<?php echo $_POST['article_id']?$_POST['article_id']:$article['article_id'];?>"/>
		  
		  <div class="form-group">
			<label for="title">Заголовок статьи</label>
			<input style="width:500px" class="form-control" id="title" name="title" value="<?php echo $_POST['title']?$_POST['title']:$article['title'];?>"/>
		  </div>
		  <div class="form-group">
			<label for="article">Краткое описание</label>
			<textarea style="width:500px" class="form-control" id="short_description" name="short_description" rows="3"><?php echo $_POST['short_description']?$_POST['short_description']:$article['short_description'];?></textarea>
			<script>
				var ckeditor1 = CKEDITOR.replace('short_description');
				DjenxExplorer.init({
					returnTo: ckeditor1,
					lang : 'ru'
				});
			</script>
		  </div>
		  <div class="form-group">
			<label for="article">Текст статьи</label>
			<textarea style="width:700px" class="form-control" id="article" name="article" rows="25"><?php echo $_POST['article']?$_POST['article']:$article['article'];?></textarea>
			<script>
				var ckeditor1 = CKEDITOR.replace('article');
				DjenxExplorer.init({
					returnTo: ckeditor1,
					lang : 'ru'
				});
			</script>
		  </div>
		  <br>
		    <button type="submit" class="btn btn-primary" name="update">Сохранить</button>
			<a type="button" href="../admin/" class="btn btn-secondary" name="close">Закрыть</a>
		</form>
	</div>
	<br>
	<br>

	<?php
	if(isset($_POST['update'])){
		$db->updateArticle($id);
		exit;
	}
	?>
</body>
</html>