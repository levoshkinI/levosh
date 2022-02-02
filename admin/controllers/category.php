<?php
	if(!defined('MyConst')) {
	   header('Location: /');
	   die('Прямой доступ запрещен');
	}

	$categorys = $category->getCategorys();
	
	function getCategory($data){
		//Создаем масив где ключ массива является ID меню
		foreach($data as $val){
			$cat[$val['id']] = $val;
		}
		return $cat;
	}
	
	function getTreeCat($dataset){
		foreach($dataset as $id => &$node){
			if(!$node['parent']){
				$tree[$id] = &$node;
			}else{
				$dataset[$node['parent']]['childs'][$id] = &$node;
			}
		}
		return $tree;
	}

	$cat = getCategory($categorys);
	
	$tree = getTreeCat($cat);
	
	function tplCatSelect($category, $str){
		
		if(!$category['parent']){
			$categorys = '<option value="' . $category['id'] . '">' . $category['title'] . '</option>';
		}else{
			$categorys = '<option value="' . $category['id'] . '">' . $str . ' ' . $category['title'] . '</option>';
		}
		
		if(isset($category['childs'])){
			$i = 1;
			for($j=0; $j<$i; $j++){
				$str .= '&rarr;';
			}
			$i++;
			$categorys .= showCatSelect($category['childs'], $str);
		}
		return $categorys;
	}	
	
	function showCatSelect($data, $str){
		$string = '';
		foreach($data as $item){
			$string .= tplCatSelect($item, $str);
		}
		return $string;
	}
	
	function tplCatTable($category, $str){
			
		$categorys = '<tr><td>' . $i . '</td>';
		
		if(!$category['parent']){
			$categorys .= '<td>' . $category['title'] . '</td><td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $category['id'] . '"/>
				<button type="submit" style="border:0;" id="editMenu" name="editMenu"><img src="/open-iconic/png/pencil-2x.png"></button>
			   </form></td>
			   <td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $category['id'] . '"/>
				<button type="submit" style="border:0;" id="deleteCategory" name="deleteCategory"><img src="/open-iconic/png/trash-2x.png"></button>
			   </form></td></tr>';
		}else{
			$categorys .= '<td>|' . $str . '' . $category['title'] . '</td><td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $category['id'] . '"/>
				<button type="submit" style="border:0;" id="editMenu" name="editMenu"><img src="/open-iconic/png/pencil-2x.png"></button>
			   </form></td>
			   <td><form method="post" action="">
				<input hidden name="id" id="id" value="' . $category['id'] . '"/>
				<button type="submit" style="border:0;" id="deleteCategory" name="deleteCategory"><img src="/open-iconic/png/trash-2x.png"></button>
			   </form></td></tr>';
		}
		
		if(isset($category['childs'])){
			$i = 1;
			for($j=0; $j<$i; $j++){
				$str .= '-';
			}
			$i++;
			$categorys .= showCatTable($category['childs'], $str);
		}
		return $categorys;
	}
	
	function tplCatUl($category)
	{
		$menu = '<li>
					<a href="http://levosh/admin/?menu=' . $category['id'] . '" title="' . $category['title'] . '">' . $category['title'] . '</a>';
			if(isset($category['childs'])){
				$menu .= '<ul>' . showCatUl($category['childs']) .  '</ul>';
			}
		$menu .= '</li>';
		return $menu;
	}	

	function showCatTable($data, $str){
		$string = '';
		foreach($data as $item){
			$string .= tplCatTable($item, $str);
		}
		return $string;
	}

	function showCatUl($data)
	{
		$string = '';
		foreach($data as $item){
			$string .= tplCatUl($item);
		}
		return $string;
	}
	
	$cat_select = showCatSelect($tree, '');
	$cat_table = showCatTable($tree, '');
	$cat_ul = showCatUl($tree);