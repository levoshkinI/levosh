<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	
	$users = $user->getUsers();
	

?>
	
	<form method="post" action="">
		<button type="submit" class="btn btn-success" style="margin:10px 10px 10px 10px" id="createUser" name="createUser">Создать</button>
	</form>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Пользователь</th>
		  <th scope="col">Админ</th>
		  <th scope="col">Изменить</th>
		  <th scope="col">Удалить</th>
		</tr>
	  </thead>
	  <tbody>
<?php	
	$i = 0;
	 foreach($users as $user){
		 $i++;
		 echo '<tr><th scope="row">' . $i . '</th><td>' . $user['email'] . '</td><td>';
		     if($user['superadmin'] == 1){
				 echo 'Админ';
			 }else{
				 echo ' - ';
			 }
		 echo '</td>';
		 echo '<td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $user['id'] . '"/>
				<input hidden name="password" id="password" value="' . $user['password'] . '"/>
				<button type="submit" style="border:0;" id="editUser" name="editUser"><img src="/open-iconic/png/pencil-2x.png"></button>
			   </form></td>
			   <td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $user['id'] . '"/>
			    <button type="submit" style="border:0;" id="deleteUser" name="deleteUser"><img src="/open-iconic/png/trash-2x.png"></button>
			   </form></td></tr>';
	 }

?>
	</tbody>
	</table>