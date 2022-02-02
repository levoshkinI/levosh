<?php
	class Menu
	{
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

		public function getMenu ()
		{
			$query = $this->pdo->prepare("SELECT * FROM menu");
			$query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
		}		
	}