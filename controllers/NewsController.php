<?php

require_once ROOT . '/models/News.php';
require_once ROOT . '/models/Comment.php';
require_once ROOT . '/models/Region.php';

class NewsController extends Controller
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function actionIndex($category = NULL, $subcategory = NULL)
    {
        $data = array();
        $data['menu'] = parent::actionIndex()['menuList'];
        $data['city'] = parent::actionIndex()['cityList'];

        if (isset($category)) {
            /* $data['request_headers'] = News::getRequestHeaders($category, $subcategory); */
            $data['subcat_list'] = News::getSubcategoryList($category);
        }

        $data['news_list'] = News::getNewsList($category, $subcategory);

        $this->view->generate('news/index.php', 'template.php', $data);

        return true;
    }

    public function actionView($url)
    {
        $data = array();
        $data['menu'] = parent::actionIndex()['menuList'];
        $data['city'] = parent::actionIndex()['cityList'];
        $data['news_list'] = News::getNewsList(null, null, 'main');
        $data['news_item'] = News::getNewsItem($url);
        $data['subcat_list'] = News::getSubcategoryList($data['news_item']['category_name']);

        /* Получает комментарии к новости */
        $data['comments'] = Comment::getComments($data['news_item']['news_id']);

        /* Запоминает в сессию id новости для блока с комментариями */
        News::rememberNewsId($data['news_item']['news_id']);

        $this->view->generate('news/view.php', 'template.php', $data);

        return true;
    }

    public function actionRegion($transliteration)
    {
        $data = array();
        $data['menu'] = parent::actionIndex()['menuList'];
        $data['city'] = parent::actionIndex()['cityList'];

        if (isset($_COOKIE['regInfo'])) {
            $regInfo = unserialize($_COOKIE['regInfo']);
            $data['news_list'] = News::getNewsByRegion($regInfo['id']);
        } else {
            $region = Region::getRegionItem($transliteration);
            $data['news_list'] = News::getNewsByRegion($region['id']);
        }

        $this->view->generate('news/index.php', 'template.php', $data);

        return true;
    }

    public function actionSearch()
    {
        header('Content-Type: application/json');

        $substrNewsTitle = '';
        $newsTitleList = array();

        $substrNewsTitle = $_POST['substrNewsTitle'];
        $newsTitleList = News::getTitleList($substrNewsTitle);

        if ($newsTitleList) {
            $response = [
                'status' => true,
                'newsTitleList' => $newsTitleList
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Совпадений не найдено'
            ];
        }

        echo json_encode($response);

        return true;
    }

    public function actionLoadsearch()
    {
        $substrNewsTitle = '';
        $data = array();

        $substrNewsTitle = $_GET['search'];

        $data['menu'] = parent::actionIndex()['menuList'];
        $data['city'] = parent::actionIndex()['cityList'];
        $data['news_list'] = News::getTitleList($substrNewsTitle);

        $this->view->generate('news/search-result.php', 'template.php', $data);

        return true;
    }
}
