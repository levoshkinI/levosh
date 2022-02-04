<?php
	
?>
	<div style="margin:10px 30px 0 75%">
		Привет, <b><?= $_SESSION['email']?></b><br>
		<form method="post" action="">
			<button type="submit" class="btn btn-primary" name="exit">Выйти</button>
		</form>
	</div>