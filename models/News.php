<?php

class News extends Model
{

    /* Метод для получения актуальных category и subcategory */

    /* public static function getRequestHeaders($category, $subcategory)
    {
        $db = Db::getConnection();

        $requestHeaders = array();

        if (isset($category, $subcategory)) {
            $sql = 'SELECT news_category.title AS category, news_subcategory.title AS subcategory '
                . 'FROM news_category JOIN news_subcategory ON news_category.name=:category AND news_subcategory.name=:subcategory';

            $result = $db->prepare($sql);
            $result->bindParam(':category', $category, PDO::PARAM_STR);
            $result->bindParam(':subcategory', $subcategory, PDO::PARAM_STR);
            $result->execute();

            $row = $result->fetch();

            $requestHeaders['category'] = $row['category'];
            $requestHeaders['subcategory'] = $row['subcategory'];
        } else {
            $sql = 'SELECT title FROM news_category WHERE name=:category';

            $result = $db->prepare($sql);
            $result->bindParam(':category', $category, PDO::PARAM_STR);
            $result->execute();

            $row = $result->fetch();

            $requestHeaders['category'] = $row['title'];
        }

        return $requestHeaders;
    } */

    public static function getSubcategoryList($category)
    {
        $db = Db::getConnection();

        $subcategoryList = array();

        $sql = 'SELECT id, title, name, url, status FROM news_subcategory WHERE category=:category';

        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $subcategoryList[$i]['id'] = $row['id'];
            $subcategoryList[$i]['title'] = $row['title'];
            $subcategoryList[$i]['name'] = $row['name'];
            $subcategoryList[$i]['url'] = $row['url'];
            $subcategoryList[$i]['status'] = $row['status'];
            $i++;
        }

        return $subcategoryList;
    }


    // News List For Main

    /* public static function getNewsListForMain($categoryList, $)
    {
        $db = Db::getConnection();

        $newsList = array();

        $sql = 'SELECT news_category.title AS category_title, news.category AS news_category, '
        . 'news.title AS news_title, short_content, news.url AS news_url, news_category.url AS news_category_url, '
        . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
        . 'FROM news_category JOIN news ON news.category=\'' . $category . '\' AND news_category.name=news.category AND news.subcategory=\'' . $subcategory
        . '\' ORDER BY news_date DESC '
        . 'LIMIT ' . $count;

        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        $result->execute();


        foreach ($categoryList as $categoryItem) {

        }



        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['category_title'] = $row['category_title'];
            $newsList[$i]['news_category'] = $row['news_category'];
            $newsList[$i]['news_title'] = $row['news_title'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['news_url'] = $row['news_url'];
            $newsList[$i]['news_category_url'] = $row['news_category_url'];
            $newsList[$i]['news_date'] = $row['news_date'];
            $newsList[$i]['news_image'] = $row['news_image'];
            $newsList[$i]['importance'] = $row['importance'];
            $i++;
        }
    } */

    // Метод, получающий из БД список новостей
    public static function getNewsList($category, $subcategory, $importance = '%', $count = 12)
    {
        $db = Db::getConnection();

        $newsList = array();

        if ($category && $subcategory) {

            $sql = 'SELECT news_category.title AS category_title, news.category AS news_category, news.id AS news_id, '
                . 'news.title AS news_title, short_content, news.url AS news_url, news_category.url AS news_category_url, '
                . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
                . 'FROM news_category JOIN news ON news.category=:category AND news_category.name=news.category AND news.subcategory=:subcategory '
                . 'AND news.importance LIKE :importance ORDER BY news_date DESC LIMIT :count';

            $result = $db->prepare($sql);
            $result->bindParam(':category', $category, PDO::PARAM_STR);
            $result->bindParam(':subcategory', $subcategory, PDO::PARAM_STR);
            $result->bindParam(':importance', $importance, PDO::PARAM_STR);
            $result->bindParam(':count', $count, PDO::PARAM_INT);
            $result->execute();

            /* $result = $db->query('SELECT news_category.title AS category_title, news.category AS news_category, '
                . 'news.title AS news_title, short_content, news.url AS news_url, news_category.url AS news_category_url, '
                . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
                . 'FROM news_category JOIN news ON news.category=\'' . $category . '\' AND news_category.name=news.category AND news.subcategory=\'' . $subcategory
                . '\' ORDER BY news_date DESC '
                . 'LIMIT ' . $count); */

            $i = 0;
            while ($row = $result->fetch()) {
                $newsList[$i]['category_title'] = $row['category_title'];
                $newsList[$i]['news_category'] = $row['news_category'];
                $newsList[$i]['news_id'] = $row['news_id'];
                $newsList[$i]['news_title'] = $row['news_title'];
                $newsList[$i]['short_content'] = $row['short_content'];
                $newsList[$i]['news_url'] = $row['news_url'];
                $newsList[$i]['news_category_url'] = $row['news_category_url'];
                $newsList[$i]['news_date'] = $row['news_date'];
                $newsList[$i]['news_image'] = $row['news_image'];
                $newsList[$i]['importance'] = $row['importance'];
                $i++;
            }
        } elseif ($category) {

            $sql = 'SELECT news_category.title AS category_title, news.category AS news_category, news.id AS news_id, '
                . 'news.title AS news_title, short_content, news.url AS news_url, news_category.url AS news_category_url, '
                . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
                . 'FROM news_category JOIN news ON news.category=:category AND news_category.name=news.category '
                . 'AND news.importance LIKE :importance ORDER BY news_date DESC LIMIT :count';

            $result = $db->prepare($sql);
            $result->bindParam(':category', $category, PDO::PARAM_STR);
            $result->bindParam(':importance', $importance, PDO::PARAM_STR);
            $result->bindParam(':count', $count, PDO::PARAM_INT);
            $result->execute();

            /* $result = $db->query('SELECT news_category.title AS category_title, news.category AS news_category, '
                . 'news.title AS news_title, short_content, news.url AS news_url, news_category.url AS news_category_url, '
                . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
                . 'FROM news_category JOIN news ON news.category=\'' . $category . '\' AND news_category.name=news.category '
                . 'ORDER BY news_date DESC '
                . 'LIMIT ' . $count); */

            $i = 0;
            while ($row = $result->fetch()) {
                $newsList[$i]['category_title'] = $row['category_title'];
                $newsList[$i]['news_category'] = $row['news_category'];
                $newsList[$i]['news_id'] = $row['news_id'];
                $newsList[$i]['news_title'] = $row['news_title'];
                $newsList[$i]['short_content'] = $row['short_content'];
                $newsList[$i]['news_url'] = $row['news_url'];
                $newsList[$i]['news_category_url'] = $row['news_category_url'];
                $newsList[$i]['news_date'] = $row['news_date'];
                $newsList[$i]['news_image'] = $row['news_image'];
                $newsList[$i]['importance'] = $row['importance'];
                $i++;
            }
        } else {
            $sql = 'SELECT news_category.id AS news_category_id, news_category.title AS category_title, news_category.name AS category_name, '
                . 'news.id AS news_id, news.title AS news_title, short_content, content, news.url AS news_url, news_category.url AS news_category_url, '
                . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
                . 'FROM news_category JOIN news ON news_category.name=news.category '
                . 'AND news.importance LIKE :importance ORDER BY news_date DESC LIMIT :count';

            $result = $db->prepare($sql);
            $result->bindParam(':importance', $importance, PDO::PARAM_STR);
            $result->bindParam(':count', $count, PDO::PARAM_INT);
            $result->execute();

            /* $result = $db->query('SELECT news_category.id AS news_category_id, news_category.title AS category_title, news_category.name AS category_name, '
                . 'news.title AS news_title, short_content, content, news.url AS news_url, news_category.url AS news_category_url, '
                . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
                . 'FROM news_category JOIN news ON news_category.name=news.category '
                . 'ORDER BY news_date DESC '
                . 'LIMIT ' . $count); */

            $i = 0;
            while ($row = $result->fetch()) {
                $newsList[$i]['news_category_id'] = $row['news_category_id'];
                $newsList[$i]['category_title'] = $row['category_title'];
                $newsList[$i]['category_name'] = $row['category_name'];
                $newsList[$i]['news_id'] = $row['news_id'];
                $newsList[$i]['news_title'] = $row['news_title'];
                $newsList[$i]['short_content'] = $row['short_content'];
                $newsList[$i]['content'] = $row['content'];
                $newsList[$i]['news_url'] = $row['news_url'];
                $newsList[$i]['news_category_url'] = $row['news_category_url'];
                $newsList[$i]['news_date'] = $row['news_date'];
                $newsList[$i]['news_image'] = $row['news_image'];
                $newsList[$i]['importance'] = $row['importance'];
                $i++;
            }
        }
        return $newsList;
    }



    // Метод, получающий одну новость
    public static function getNewsItem($url)
    {
        $db = Db::getConnection();
        $newsItem = array();

        $result = $db->query('SELECT news_category.title AS category_title, news_category.name AS category_name, '
            . 'news.id AS news_id, news.title AS news_title, content, news.url AS news_url, news_category.url '
            . 'AS news_category_url, news.subcategory AS subcategory_name, DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, '
            . 'news.image AS news_image FROM news_category JOIN news ON news.url=\'http://24mynews.ru/article/' . $url . '\''
            . ' AND news_category.name=news.category');

        $row = $result->fetch();

        $newsItem['category_title'] = $row['category_title'];
        $newsItem['category_name'] = $row['category_name'];
        $newsItem['news_id'] = $row['news_id'];
        $newsItem['news_title'] = $row['news_title'];
        $newsItem['news_url'] = $row['news_url'];
        $newsItem['news_category_url'] = $row['news_category_url'];
        $newsItem['content'] = $row['content'];
        $newsItem['subcategory_name'] = $row['subcategory_name'];
        $newsItem['news_date'] = $row['news_date'];
        $newsItem['news_image'] = $row['news_image'];

        return $newsItem;
    }

    /* Запоминает в сессию id новости для блока с комментариями */
    public static function rememberNewsId($news_id)
    {
        $_SESSION['news_id'] = $news_id;
    }

    /* *********** */
    /* *********** */
    /* *********** */
    public static function getNewsById($news_id)
    {
        $db = Db::getConnection();
        $newsItem = array();

        $sql = 'SELECT news_category.title AS category_title, news_category.name AS category_name, '
            . 'news.id AS news_id, news.title AS news_title, content, news.url AS news_url, news_category.url '
            . 'AS news_category_url, DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image '
            . 'FROM news_category JOIN news ON news.id=:news_id AND news_category.name=news.category';

        $result = $db->prepare($sql);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();

        $newsItem['category_title'] = $row['category_title'];
        $newsItem['category_name'] = $row['category_name'];
        $newsItem['news_id'] = $row['news_id'];
        $newsItem['news_title'] = $row['news_title'];
        $newsItem['news_url'] = $row['news_url'];
        $newsItem['news_category_url'] = $row['news_category_url'];
        $newsItem['content'] = $row['content'];
        $newsItem['news_date'] = $row['news_date'];
        $newsItem['news_image'] = $row['news_image'];

        return $newsItem;
    }

    public static function getNewsByRegion($region_id, $count = 12)
    {
        $db = Db::getConnection();
        $newsList = array();

        $sql = 'SELECT region.name AS region, region.city AS city, news_category.title AS category_title, '
            . 'news.category AS news_category, news.id AS news_id, news.title AS news_title, short_content, '
            . 'news.url AS news_url, news_category.url AS news_category_url, '
            . 'DATE_FORMAT(news.date, "%d.%m.%Y") AS news_date, news.image AS news_image, importance '
            . 'FROM news '
            . 'JOIN region ON news.region_id=:region_id AND news.region_id=region.id '
            . 'JOIN news_category ON news_category.name=news.category '
            . 'ORDER BY news_date DESC LIMIT :count';

        $result = $db->prepare($sql);
        $result->bindParam(':region_id', $region_id, PDO::PARAM_INT);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['region'] = $row['region'];
            $newsList[$i]['city'] = $row['city'];
            $newsList[$i]['category_title'] = $row['category_title'];
            $newsList[$i]['news_category'] = $row['news_category'];
            $newsList[$i]['news_id'] = $row['news_id'];
            $newsList[$i]['news_title'] = $row['news_title'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['news_url'] = $row['news_url'];
            $newsList[$i]['news_category_url'] = $row['news_category_url'];
            $newsList[$i]['news_date'] = $row['news_date'];
            $newsList[$i]['news_image'] = $row['news_image'];
            $newsList[$i]['importance'] = $row['importance'];
            $i++;
        }

        return $newsList;
    }

    public static function getTitleList($substrNewsTitle = '')
    {
        $newsTitleList = array();
        $db = Db::getConnection();

        $sql = 'SELECT id, title, url, date, image FROM news WHERE title LIKE CONCAT("%", :substrNewsTitle, "%")';

        $result = $db->prepare($sql);
        $result->bindParam(':substrNewsTitle', $substrNewsTitle, PDO::PARAM_STR);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {
            $newsTitleList[$i]['id'] = $row['id'];
            $newsTitleList[$i]['title'] = $row['title'];
            $newsTitleList[$i]['url'] = $row['url'];
            $newsTitleList[$i]['date'] = $row['date'];
            $newsTitleList[$i]['image'] = $row['image'];
            $i++;
        }

        return $newsTitleList;
    }
}
