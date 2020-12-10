<?php

class Router
{
    // Объявление свойства класса Router
    private $routes;

    /* Объявление метода-конструктора класса Router, с помощью которого происходит подключение файла с прописанными роутами
    и присвоение его содержимого переменной routes */
    public function __construct()
    {
        $routesPath = ROOT . '/components/config/routes.php';
        $this->routes = require($routesPath);
    }

    /* Объявление метода, инициирующего поключение и запуск контроллера Главной страницы */
    public function MainPage()
    {
        $controllerName = 'MainController';
        $actionName = 'actionIndex';
        require_once(ROOT . '/controllers/' . $controllerName . '.php');
        $controllerObject = new $controllerName;
        $controllerObject->$actionName();
        exit();
    }

    /* Объявление метода, инициирующего поключение и запуск контроллера 404 */
    public function ErrorPage404()
    {
        http_response_code(404);
        $controllerName = 'NotfoundController';
        $actionName = 'actionIndex';
        require_once(ROOT . '/controllers/' . $controllerName . '.php');
        $controllerObject = new $controllerName;
        $controllerObject->$actionName();
        exit();
    }

    /* Объявление метода, получающего строку запроса из суперглобального массива $_SERVER (без знаков "/"  в начале и в конце строки) */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /*
    Объявление метода, который обрабатывает полученную методом getURI() строку запроса:
        1) если строка запроса содержит только названия доменов верхнего и втрого уровней,
           тогда вызывается объявленный выше метод, инициирующий загрузку главной страницы;
        2) в противном случае циклом foreach происходит перебор пар "key => value" из массива роутов,
           сравнение актуального запрос со значением key (регулярным выражением) и, в случае совпадения,
           преобразование его в значение value;
        3) из полученного результата с помощью функции array_shift поочередно получаем названия
           контроллера, метода и параметров, передаваемых в метод;
        4) после получения названия контроллера производится проверка наличия файла, содержащего его описание,
           и, в случае true, подключение с дальнейшим вызовом (call_user_func_array) метода контроллера с преданными параметрами;
        5) в случае, если файл с описанием контроллера не найден, вызывается контоллер 404
    */
    public function run()
    {
        $uri = $this->getURI();
        /* echo $uri;
        echo '<br>'; */
        if (empty($uri)) {
            $this->MainPage();
        } else {
            foreach ($this->routes as $uriPattern => $path) {
                if (preg_match("~$uriPattern~", $uri)) {
                    // Получаем внутренний путь из внешнего согласно правилу
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                    /* echo $internalRoute;
                    echo '<br>'; */
                    $segments = explode('/', $internalRoute);
                    /* echo '<pre>';
                    print_r($segments);
                    echo '</pre>'; */
                    $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                    /* echo $controllerName;
                    echo '<br>'; */
                    $actionName = 'action' . ucfirst(array_shift($segments));
                    /* echo $actionName;
                    echo '<br>'; */
                    $parametrs = $segments;
                    /* echo '<pre>';
                    print_r($parametrs);
                    echo '</pre>'; */
                    break;
                }
            }
            // подключить файл класса-контроллера
            // выдает ошибку, если $controllerName отсутствует в роутах (для исключения назначить null)
            $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once($controllerFile);
                // создать объект класса и вызвать action
                $controllerObject = new $controllerName;
                call_user_func_array(array($controllerObject, $actionName), $parametrs);
            } else {
                $this->ErrorPage404();
            }
        }
    }
}
