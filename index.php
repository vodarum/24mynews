<?php

// FRONT CONTROLLER

// Общие настройки
/* - При возникновении ошибок показывает в браузере, что за ошибка.
- Необходимо изменить или закомментировать функцию, когда сайт будет полностью готов. */

ini_set('display errors', 1);
error_reporting(E_ALL);

// Начало сессии
session_start();
define('LOGGED', isset($_SESSION['user']));
// 2. Подключение bootstrap-файлa системы
// Объевление константы ROOT и присвоение ей значения директории данного файла, то есть получение названия корневой папки проекта
define('ROOT', dirname(__FILE__));

// Загрузка сайта
require_once(ROOT . '/application/bootstrap.php');