<?php

return array(

    /* Вариант роутов, где всего один котроллер (news) с двумя методами:
    index (параметры на вход: категория новостей, подкатегория категории новостей);
    view (параметры на вход: категория новостей, url одной новости) */


    'politics/article/([0-9a-zA-Z_]+)' => 'news/view/politics/$1',
    'politics/([a-z_]+)' => 'news/index/politics/$1',
    'politics$' => 'news/index/politics',

    'economy/article/([0-9a-zA-Z_]+)' => 'news/view/economy/$1',
    'economy/([a-z_]+)' => 'news/index/economy/$1',
    'economy$' => 'news/index/economy',

    'social/article/([0-9a-zA-Z_]+)' => 'news/view/social/$1',
    'social/([a-z_]+)' => 'news/index/social/$1',
    'social$' => 'news/index/social',

    'army/article/([0-9a-zA-Z_]+)' => 'news/view/army/$1',
    'army/([a-z_]+)' => 'news/index/army/$1',
    'army$' => 'news/index/army',

    'culture/article/([0-9a-zA-Z_]+)' => 'news/view/culture/$1',
    'culture/([a-z_]+)' => 'news/index/culture/$1',
    'culture$' => 'news/index/culture',

    'science/article/([0-9a-zA-Z_]+)' => 'news/view/science/$1',
    'science/([a-z_]+)' => 'news/index/science/$1',
    'science$' => 'news/index/science',

    'tech/article/([0-9a-zA-Z_]+)' => 'news/view/tech/$1',
    'tech/([a-z_]+)' => 'news/index/tech/$1',
    'tech$' => 'news/index/tech',

    'auto/article/([0-9a-zA-Z_]+)' => 'news/view/auto/$1',
    'auto/([a-z_]+)' => 'news/index/auto/$1',
    'auto$' => 'news/index/auto',

    'lifestyle/article/([0-9a-zA-Z_]+)' => 'news/view/lifestyle/$1',
    'lifestyle/([a-z_]+)' => 'news/index/lifestyle/$1',
    'lifestyle$' => 'news/index/lifestyle',

    'sport/article/([0-9a-zA-Z_]+)' => 'news/view/sport/$1',
    'sport/([a-z_]+)' => 'news/index/sport/$1',
    'sport$' => 'news/index/sport',
    /*  */
    '^region' => 'region/index',
    /*  */
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'user/register' => 'user/register',

    'comment/view' => 'comment/view',
    'comment/get' => 'comment/get',
    'comment/submit' => 'comment/submit',
    'comment/reply' => 'comment/reply',
    'comment/append' => 'comment/append',
    'comment/count' => 'comment/count',
    'comment/get' => 'comment/get',
    'comment/reaction' => 'comment/reaction',
    'comment/update' => 'comment/update',
    'comment/delete' => 'comment/delete',

    /* Для изменения БД */
    /* 'database' => 'database/index', */
    /* 'database' => 'database/region', */



    /* Первая версия роутов */

    /* 'news/rubric/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/rubric/([a-z]+)' => 'news/view/$1',
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([a-z]+)' => 'news/view/$1',
    'news' => 'news/index', */


    /* Вариант роутов, где контроллером является категория новостей (economy) */

    /* 'economy/article/([0-9a-zA-Z_]+)' => 'economy/view/$1/',
    'economy/([a-z]+)' => 'economy/index/$1/',
    'economy' => 'economy/index', */

);
