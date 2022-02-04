<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
	if(isset($_POST['save'])){
		$article->create();
	}

	if(isset($_POST['deleteCategory'])){
		$category->remove($_POST['id']);
	}
	
	if(isset($_POST['saveCategory'])){
		$category->create();
	}
	
	if(isset($_POST['updateUser'])){
		$user->update($_POST['id']);
	}
	
	if(isset($_POST['saveUser'])){
		$user->create();
	}
	
	if(isset($_POST['deleteUser'])){
		$user->remove($_POST['id']);
	}	
	
	include 'views/superuserinfo.php';
	
	include 'views/select_menu.php';
?>
