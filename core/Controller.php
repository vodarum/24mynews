<?php

/* // Подключение файла Model.php было указано в примере, однако оно уже реализовано в bootstrap.php
require_once ROOT . '/core/Model.php'; */

class Controller
{

	public $model = 'Model.php';
	public $view = 'View.php';

	public function __construct()
	{
		$this->model = new Model();
		$this->view = new View();
	}

	public function actionIndex()
	{
		$menuList = array();
		$menuList = $this->model->getMenuList();
		return $menuList;
	}
}