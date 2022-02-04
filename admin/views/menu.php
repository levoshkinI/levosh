<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

	require_once 'controllers/menu.php';
?>
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
	$i = 0;
	foreach($menu as $item){
		$i++;
		echo '<tr><td>' . $i . '</td><td>' . $item['name'] . '</td>';
		 echo '<td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $item['id'] . '"/>
				<button type="submit" style="border:0;" id="editMenu" name="editMenu"><img src="/open-iconic/png/pencil-2x.png"></button>
			   </form></td>
			   <td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $item['id'] . '"/>
				<button type="submit" style="border:0;" id="deleteMenu" name="deleteMenu"><img src="/open-iconic/png/trash-2x.png"></button>
			   </form></td></tr>';		
	}
?>
	</tbody>
	</table>