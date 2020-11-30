<?php

require_once ROOT . '/models/News.php';
require_once ROOT . '/models/Comment.php';

class NewsController extends Controller
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function actionIndex($category = NULL, $subcategory = NULL)
    {
        $data = array();
        $data['menu'] = parent::actionIndex();

        if (isset($category)) {
            /* $data['request_headers'] = News::getRequestHeaders($category, $subcategory); */
            $data['subcat_list'] = News::getSubcategoryList($category);
        }

        $data['news_list'] = News::getNewsList($category, $subcategory);

        $this->view->generate('news/index.php', 'template.php', $data);

        return true;
    }

    public function actionView($category, $url)
    {
        $data = array();
        $data['menu'] = parent::actionIndex();
        $data['news_list'] = News::getNewsList(null, null, 'main');

        $data['subcat_list'] = News::getSubcategoryList($category);
        $data['news_item'] = News::getNewsItem($category, $url);

        /* Получает комментарии к новости */
        $data['comments'] = Comment::getComments($data['news_item']['news_id']);

        /* Запоминает в сессию id новости для блока с комментариями */
        News::rememberNewsId($data['news_item']['news_id']);

        $this->view->generate('news/view.php', 'template.php', $data);

        return true;
    }
}
