<?php
	class Article implements Model
	{
		public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

		public function create()
		{
			if(isset($_POST['title']) && isset($_POST['article']) && !empty($_POST['title']) && !empty($_POST['article'])){
				$title = $_POST['title'];
				$short_description = $_POST['short_description'];
				$article = $_POST['article'];
				$date = date("Y-m-d H:i:s");
				$user_id = $_SESSION['user_id'];
				
				$query = $this->pdo->prepare("INSERT INTO articles (user_id, title, short_description, article, date) VALUES (:user_id, :title, :short_description, :article, :date)");
				$query->bindParam(':user_id', $user_id);
				$query->bindParam(':title', $title);
				$query->bindParam(':short_description', $short_description);
				$query->bindParam(':article', $article);
				$query->bindParam(':date', $date);
				//$query->execute();
				
				if ($query->execute()) {
					echo 'Статья успешно добавлена.';
				} else {
					
					echo 'Не удалось добавить статью.';
				}
			}			
		}
		
		public function remove($id)
		{
			$query = $this->pdo->prepare("DELETE FROM `articles` WHERE `article_id` = '" . $id . "'");
			
			if ($query->execute()) {
				echo    'Статья успешно удалена';
			} else {
				echo    'Не удалось удалить статью.';
			}			
		}
		
		public function update($id)
		{
			if(isset($_POST['title']) && isset($_POST['article'])){
				$title = $_POST['title'];
				$article = $_POST['article'];
				$date = date("Y-m-d H:i:s");
				$short_description = $_POST['short_description'];
				$query = $this->pdo->prepare("UPDATE `articles` SET `title` = '" . $title . "', `short_description` = '" . $short_description . "',`article` = '" . $article . "', `date` = '" . $date . "' WHERE `articles`.`article_id` = '" . $id . "'");
				//$query->execute();
				if ($query->execute()) {
					echo 'Статья успешно обновлена';
				} else {
					echo 'Не удалось обновить статью.';
				}
			}			
		}
		
		public function getAllArticles()
		{
            $query = $this->pdo->prepare("SELECT * FROM articles ORDER BY date DESC");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);			
		}		
	
		function getArticle($id)
		{
            $query = $this->pdo->prepare("SELECT * FROM articles WHERE `article_id` = '{$id}' LIMIT 1");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);			
		}
		
		function getArticlesUser()
		{
			$user_id = $_SESSION['user_id'];
            $query = $this->pdo->prepare("SELECT * FROM articles WHERE `user_id` = '{$user_id}'");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);			
		}
	}