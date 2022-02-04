<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
	$articles = $article->getArticlesUser();
	if(isset($_POST['save']))
	{
		$article->create();
	}

	if(isset($_POST['delete'])){
		$article->remove($_POST['article_id']);
		header('Location: ../admin/');
		exit;		
	}

	if(isset($_POST['create'])){
		$article->create();
		header('Location: ../admin/');
		exit;
	}
	
	include 'views/userinfo.php';
	
	include 'views/my_articles.php';
?>
