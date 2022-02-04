<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

	require_once 'controllers/category.php';

	

/* 	echo '<pre>';
		print_r($tree);
	echo '</pre>'; */
?>
<html>
<head>
    <script src='http://code.jquery.com/jquery-1.7.1.js'></script>
    <script>
        $(function(){
            $('table td:first-child').each(function (i) {
                $(this).html(i+1);
            });

        });
    </script>
</head>
	<form method="post" action="">
		<button type="submit" class="btn btn-success" style="margin:10px 10px 10px 10px" id="createCategory" name="createCategory">Создать</button>
	</form>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Категория</th>
		  <th scope="col">Изменить</th>
		  <th scope="col">Удалить</th>
		</tr>
	  </thead>
	<tbody>
<?php
	echo $cat_table;
?>
	</tbody>
	</table>
	<br>