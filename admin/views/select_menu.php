<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

   require_once 'controllers/menu.php';
	
?>	
	<form style="margin-left:10px" action="" method="get">
<?php	echo '<select onchange="if (this.value) window.location.href = this.value" id="menu" name="menu">
			  <!--select onchange="this.form.submit()" id="menu" name="menu"-->
				<option value="0">-Выбрать-</option>' . $cat_menu_sel . '
			  </select>';
?>
	</form>
	
	
<?php
	if(isset($_POST['cteateArticle'])){
		include 'views/add_article.php';
	}else if(isset($_POST['editUser'])){
		include 'views/edit_user.php';
	}else if(isset($_POST['createUser'])){
		include 'views/new_user.php';
	}else if(isset($_POST['createCategory'])){
		include 'views/create_category.php';
	}else if(isset($_GET['menu'])){
		if($_GET['menu'] == 1){
			include 'views/my_articles.php';
			$_GET = [];
		}else if($_GET['menu'] == 2){
			include 'views/users.php';
			$_GET = [];
		}else if($_GET['menu'] == 3){
			include 'views/category.php';
			$_GET = [];
		}else if($_GET['menu'] == 4){
			include 'views/articles.php';
			$_GET = [];
		}
	}
	
	