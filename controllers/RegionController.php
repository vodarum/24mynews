<?php

require_once ROOT . '/models/Region.php';

class RegionController extends Controller
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function actionSearch()
    {
        header('Content-Type: application/json');

        $region = '';
        $cityList = array();

        $region = $_POST['region'];
        $cityList = Region::getRegionList($region);

        if ($cityList) {
            $response = [
                'status' => true,
                'cityList' => $cityList
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

    public function actionSelect()
    {
        header('Content-Type: application/json');

        $city = '';
        $city = $_POST['region'];

        $region = array();
        $region = Region::getRegionItem($city);

        $cookieRegInfo = array('id' => $region['id'], 'name' => $region['name'], 'city' => $region['city'], 'transliteration' => $region['transliteration']);
        setcookie('regInfo', serialize($cookieRegInfo), time() + 60 * 60 * 24 * 365 * 2, '/', '24mynews.ru');

        $response = [
            'status' => true,
            'regInfo' => $cookieRegInfo
        ];

        echo json_encode($response);

        return true;
    }
}
