<?php 
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}
	$obj = new Menu($pdo);
	$menu = $obj->getMenu();

	function getCat($data){
		//Создаем масив где ключ массива является ID меню
		foreach($data as $val){
			$cat[$val['id']] = $val;
		}
		return $cat;
	}
	
	function getTree($dataset){
		foreach($dataset as $id => &$node){
			if(!$node['parent_id']){
				$tree[$id] = &$node;
			}else{
				$dataset[$node['parent_id']]['childs'][$id] = &$node;
			}
		}
		return $tree;
	}
	
	$cat = getCat($menu);
	
	$tree = getTree($cat);
	
	function tplMenuSelect($category, $str){
		
		if(!$category['parent_id']){
			$menu = '<option value="http://levosh/admin/?menu=' . $category['id'] . '">' . $category['name'] . '</option>';
		}else{
			$menu = '<option value="http://levosh/admin/?menu=' . $category['id'] . '">' . $str . ' ' . $category['name'] . '</option>';
		}
		
		if(isset($category['childs'])){
			$i = 1;
			for($j=0; $j<$i; $j++){
				$str .= '-';
			}
			$i++;
			$menu .= showMenuSelect($category['childs'], $str);
		}
		return $menu;
	}
	
	function tplMenuUl($category)
	{
		$menu = '<li>
					<a href="http://levosh/admin/?menu=' . $category['id'] . '" title="' . $category['name'] . '">' . $category['name'] . '</a>';
			if(isset($category['childs'])){
				$menu .= '<ul>' . showMenuUl($category['childs']) .  '</ul>';
			}
		$menu .= '</li>';
		return $menu;
	}
	
	function showMenuSelect($data, $str){
		$string = '';
		foreach($data as $item){
			$string .= tplMenuSelect($item, $str);
		}
		return $string;
	}
	
	function showMenuUl($data)
	{
		$string = '';
		foreach($data as $item){
			$string .= tplMenuUl($item);
		}
		return $string;
	}
	
	$cat_menu_sel = showMenuSelect($tree, '');
	
	$cat_menu_ul = showMenuUl($tree);
