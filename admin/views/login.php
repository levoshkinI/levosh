<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

	session_start();
	
	spl_autoload_register(function ($class_name) {
		include 'models/' . $class_name . '.php';
	});
	
	$category = new Category($pdo);
	$user = new User($pdo);
	$article = new Article($pdo);

	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		$email = $_SESSION['email'];
		$password = $_SESSION['password'];
		$row = $user->getUser($email, $password);
		if(isset($_POST['create'])){
			include '../admin/views/add_article.php';
		}else if(isset($_POST['update'])){
			include '../admin/views/article.php';
		}else{
			if($row['superadmin']){
				include '../admin/views/superuser.php';
			}else{
				include '../admin/views/user.php';
			}
		}
	}else{
		if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
			$email = $_COOKIE['email'];
			$password = $_COOKIE['password'];
			$row = $user->getUser($email, $password);
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			
			if(isset($_POST['create'])){
				include '../admin/views/add_article.php';
			}else if(isset($_POST['update'])){
				include '../admin/views/article.php';
			}else{
				if($row['superadmin']){
					include '../admin/views/superuser.php';
				}else{
					include '../admin/views/user.php';
				}
			}
		}else{
			if(isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] !== '' && $_POST['password'] !== ''){
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				$checkbox = $_POST['checkbox'];
				$row = $user->getUser($email, $password);
				$_SESSION['user_id'] = $row['id'];
				
				if($email == $row['email'] && $password == $row['password']){
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					if($checkbox == 'on'){
						$_COOKIE['email'] = $email;
						$_COOKIE['password'] = $password;
					}
					
					if(isset($_POST['create'])){
						include '../admin/views/add_articlee.php';
					}else if(isset($_POST['update'])){
						include '../admin/views/article.php';
					}else{
						if($row['superadmin']){
							include '../admin/views/superuser.php';
						}else{
							include '../admin/views/user.php';
						}
					}
				}else{
?>
						<form class="form" action="" method="post">
							  <div class="form-group">
								<label for="email">Email адрес</label>
								<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Введите email">
								<small id="emailHelp" class="form-text text-muted"></small>
							  </div>
							  <div class="form-group">
								<label for="password">Пароль</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
							  </div>
							  <div class="form-check">
								<input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
								<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
							  </div>
							  <button type="submit" class="btn btn-primary">Вход</button>
							  <a type="button" class="btn btn-primary" href="views/registration.php" style="float: right"  id="registration" name="registration">Регистрация</a>
						</form>					
<?php					die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
							Неправильный пользователь или пароль
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть" onclick="<?php echo $_SERVER["PHP_SELF"];?>"></button>
						</div>');
				}
			}else{
?>
				<form class="form" action="" method="post">
					  <div class="form-group">
						<label for="email">Email адрес</label>
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Введите email">
						<small id="emailHelp" class="form-text text-muted"></small>
					  </div>
					  <div class="form-group">
						<label for="password">Пароль</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
					  </div>
					  <div class="form-check">
						<input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
						<label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
					  </div>
					  <button type="submit" class="btn btn-primary">Вход</button>
					  <a type="button" class="btn btn-primary" href="views/registration.php" style="float: right"  id="registration" name="registration">Регистрация</a>
				</form>
<?php

 			}
		}
	}
?>
