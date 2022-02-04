<?php
	class ModelUser implements Model
	{
		public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
		
        public function getUsers()
        {
            $query = $this->pdo->prepare("SELECT * FROM users");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUser($email, $password)
        {
            $query = $this->pdo->prepare("SELECT * FROM users WHERE `email` = '{$email}' AND `password` = '{$password}' LIMIT 1");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }
		
        public function getUserId($id)
        {
            $query = $this->pdo->prepare("SELECT * FROM users WHERE `id` = '{$id}' LIMIT 1");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }		
		
		public function create()
		{
			if (isset($_POST['email']) && isset($_POST['password'])){
				if (!empty($_POST['email']) && !empty($_POST['password'])){
					$email = $_POST['email'];
					$password = MD5($_POST['password']);
					$repeat = $_POST['repeat'];
					$rows = $this->getUsers();
					
					$query = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
					
					$query->bindParam(':email', $email);
					$query->bindParam(':password', $password);
					
					if ($query->execute()) {
						echo 'Акаунт успешно создан.';
					} else {
						echo 'Не удалось добавить акаунт.';
					}							
				} else {
					echo 'Не все поля заполнены.';
				}
			}			
		}
		
		public function remove($id)
		{
			$query = $this->pdo->prepare("DELETE FROM `users` WHERE `id` = '" . $id . "'");
			//$query->execute();
			
			if ($query->execute()) {
				echo 'Пользователь удален.';
			} else {
				echo 'Не удалось удалить.';
			}			
		}
		
		public function update($id)
		{
			if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_pass'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				$repeat_pass = $_POST['repeat_pass'];
				$admin = $_POST['admin'];
				
				if(!empty($email) && !empty($password) && $password == $repeat_pass){
					$password = md5($password);
					if(isset($admin)){
						$query = $this->pdo->prepare("UPDATE `users` SET `email` = '{$email}', `password` = '{$password}', `superadmin` = '{$admin}' WHERE `users`.`id` = '{$id}'");
						$query->execute();
						if ($query->execute()) {
							echo 'Данные успешно обновлены';
						} else {
							echo 'Не удалось обновить данные.';
						}
					}else{
						$query = $this->pdo->prepare("UPDATE `users` SET `email` = '{$email}', `password` = '{$password}', `superadmin` = NULL WHERE `users`.`id` = '{$id}'");
						$query->execute();
						if ($query->execute()) {
							echo 'Данные успешно обновлены';
						} else {
							echo 'Не удалось обновить данные.';
						}						
					}
				}else{
					echo "Не все поля заполнены";
				}
			}			
		}		
	}