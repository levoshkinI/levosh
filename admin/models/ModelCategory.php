<?php 
	class ModelCategory implements Model
	{
		public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
		
		public function getCategorys()
		{
			$query = $this->pdo->prepare("SELECT * FROM category");
			$query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
        public function getCategoryId($id)
        {
            $query = $this->pdo->prepare("SELECT * FROM category WHERE `id` = '{$id}' LIMIT 1");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }		
		
		public function create()
		{
			$parent = $_POST['parent'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			
			if(isset($title) && !empty($title)){
				$query = $this->pdo->prepare("INSERT INTO category (parent, title, description) VALUES (:parent, :title, :description)");
				$query->bindParam(':parent', $parent);
				$query->bindParam(':title', $title);
				$query->bindParam(':description', $description);
				//$query->execute();
				if ($query->execute()) {
					echo 'Категория успешно добавлена.';
				} else {
					
					echo 'Не удалось добавить категорию.';
				}
			}
		}
		
		public function remove($id)
		{
			$query = $this->pdo->prepare("DELETE FROM `category` WHERE `id` = '" . $id . "'");
			//$query->execute();
			
			if ($query->execute()) {
				echo 'Категория удалена.';
			} else {
				echo 'Не удалось удалить.';
			}
		}

		public function update($id)
		{
			return $category;
		}
	}