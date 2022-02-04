<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
?>
	<ul>
		<?php echo $cat_menu_ul; ?>
	</ul>