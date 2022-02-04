<?php
/* 	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	} */
	
    class database
    {
        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
    }
?>