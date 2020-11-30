<?php
class View
{
	public $templateView = 'template.php';

	function generate($contentView, $templateView, $data = null)
	{
		if (is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}

		require(ROOT . '/views/layouts/' . $templateView);
	}
}