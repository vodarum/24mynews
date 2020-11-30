<?php

require_once ROOT . '/models/News.php';

class MainController extends Controller
{
        public function __construct()
        {
                return parent::__construct();
        }

        public function actionIndex()
        {
                $data = array();
                $data['menu'] = parent::actionIndex();

                $data['main_news'] = News::getNewsList(null, null, 'main');

                $data['news_list'] = array();
                foreach ($data['menu'] as $oneCategory) {
                        $data['news_list'][$oneCategory['name']] = News::getNewsList($oneCategory['name'], null, '', 5);
                }
				
                $this->view->generate('main/index.php', 'template.php', $data);
        }
}