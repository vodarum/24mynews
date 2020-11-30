<?php

// Установка соединения с БД
require_once(ROOT . '/components/Db.php');

class Model
{
	
	// Родительский метод получения данных из БД (нужен, если в наследниках будем переопределять)
	/* public function getData()
	{
	} */

	// Метод, который получет из БД категории новостей (навигационной панели)
	public function getMenuList()
	{
		$db = Db::getConnection();

		$menuList = array();

		$sql = 'SELECT * FROM news_category';
		$result = $db->prepare($sql);
		$result->execute();

		$i = 0;
		while ($row = $result->fetch()) {
			$menuList[$i]['id'] = $row['id'];
			$menuList[$i]['title'] = $row['title'];
			$menuList[$i]['name'] = $row['name'];
			$menuList[$i]['url'] = $row['url'];
			$menuList[$i]['status'] = $row['status'];
			$i++;
		}

		return $menuList;
	}

	/* Отладка */
	public static function printR($array = array())
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
}
