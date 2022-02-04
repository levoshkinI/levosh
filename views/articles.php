<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	session_start();
	$articles = $db->getAllArticles();
	
	$cnt = 0;
	foreach($articles as $article){
		$cnt++;
?>
	<script>
	var cnt = '<?php echo $cnt?>';
		function ChangeDisplay(Element) {
			if (document.getElementById('article' + cnt).style.display == '') document.getElementById('article' + cnt).style.display = 'none';
			else document.getElementById('article' + cnt).style.display = '';
			return false;
		}
	</script>
	<div style="width:800px;margin:20px 0 0 30px;cursor:pointer" id="title" onclick="document.getElementById('article' + cnt).style.display = '';"><b><?= $article['title']?></b></div>
	<div style="width:800px;border:solid 1px black;border-radius:5px;margin:0 0 20px 30px;padding:10px" id="short_description"><?= $article['short_description']?></div>
	<div style="display:none;width:800px;border:solid 1px black;border-radius:5px;margin:0 0 20px 30px;padding:10px" id="article<?=$cnt?>"><?= $article['article']?></div>


<?php	}?>