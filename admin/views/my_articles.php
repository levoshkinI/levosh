<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
	$articles = $article->getArticlesUser();
?>
<!doctype html>
<html lang="ru">
<head>
  <!-- Кодировка веб-страницы -->
  <meta charset="utf-8">
  <!-- Настройка viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Articles</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<script src="/bootstrap/js/bootstrap.js"></script>
	

</head>
<body>
  <!-- Контент страницы -->
	<form method="post" action="">
		<button type="submit" class="btn btn-success" style="margin:10px 10px 10px 10px" id="cteateArticle" name="cteateArticle">Создать</button>
	</form>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Заголовок</th>
		  <th scope="col">Категория</th>
		  <th scope="col">Краткое описание</th>
		  <th scope="col">Дата создания</th>
		  <th scope="col">Автор</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$i = 0;
			foreach($articles as $article)
			{
				$i++;
		?>
		<tr>
		  <td><?= $i?></td>
		  <td style="width:200px"><?= $article['title']?></td>
		  <td>
			  <?php
				$categoryname = $category->getCategoryId($article['category_id']);
				echo $categoryname['title'];
			  ?>
		  </td>
		  <td style="width:400px"><?= $article['short_description']?></td>
		  <td style="width:150px"><?= $article['date']?></td>
		  <td>
		      <?php $username = $user->getUserId($article['user_id']);
					echo $username['email'];
			  ?>
		  </td>
        </tr>		
		<?php }?>
	  </tbody>
	</table>
</body>
</html>