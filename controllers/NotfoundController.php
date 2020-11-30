<?php

class NotfoundController extends Controller
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function actionIndex()
    {
        $data = array();
        $data['menu'] = parent::actionIndex();

        $this->view->generate('404/index.php', 'template.php', $data);
    }
}
