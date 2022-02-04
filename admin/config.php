<?php
/* 	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	} */

    //Enter your database connection details here.
    $host = 'localhost'; //HOST NAME.
    $db_name = 'levosh'; //Database Name
    $db_username = 'root'; //Database Username
    $db_password = ''; //Database Password

    try
    {
        $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
    }
    catch (PDOException $e)
    {
        exit('Error Connecting To DataBase');
    }
?>