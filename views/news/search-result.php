<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Title  -->
    <title>
        <?php echo $currentTitle; ?>
    </title>
    <style>
        body {

            grid-template-areas: "header header header header""nav nav nav nav""content content content content""footer footer footer footer";

        }
    </style>

</head>

<body>
    <!-- Content Start -->
    <div class="content">
        <div class="container">
            <!-- Inner Content Start -->
            <div class="inner-content">

                <!-- Main Start -->
                <div class="main">
                    <div class="search-result">
                        <?php foreach ($data['news_list'] as $oneNews) : ?>
                            <div class="search-result__one-news">
                                <div class="search-result__one-news-section">
                                    <div class="search-result__one-news-title">
                                        <a href="<?php echo $oneNews['url']; ?>">
                                            <h2>
                                                <?php echo $oneNews['title']; ?>
                                            </h2>
                                        </a>
                                    </div>
                                    <div class="search-result__one-news-date">
                                        <?php echo $oneNews['date']; ?>
                                    </div>
                                </div>
                                <div class="search-result__one-news-section">
                                    <div class="search-result__one-news-image">
                                        <a href="<?php echo $oneNews['url']; ?>">
                                            <img src="<?php echo $oneNews['image']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Main End -->

                <!-- Sidebar Start -->
                <aside class="sidebar">
                    <div class="sidebar__element">
                        <!-- Recommend Start -->
                        <div class="recommend-area">
                            <div class="widget-title">
                                <h5>Рекомендуем</h5>
                            </div>
                            <div class="recommend-wrap">
                                <div class="recommend-item">
                                    <div class="recommend-item__image">
                                        <img src="/template/img/blog-img/dm-1.jpg" alt="">
                                    </div>
                                    <div class="recommend-item__description">
                                        <a class="recommend-item__link" href="#">EU council reunites</a>
                                        <div class="recommend-item__date">Nov 29, 2017</div>
                                    </div>
                                </div>
                                <div class="recommend-item">
                                    <div class="recommend-item__image">
                                        <img src="/template/img/blog-img/dm-2.jpg" alt="">
                                    </div>
                                    <div class="recommend-item__description">
                                        <a class="recommend-item__link" href="#">A new way to travel the world</a>
                                        <div class="recommend-item__date">May 29, 2017</div>
                                    </div>
                                </div>
                                <div class="recommend-item">
                                    <div class="recommend-item__image">
                                        <img src="/template/img/blog-img/dm-3.jpg" alt="">
                                    </div>
                                    <div class="recommend-item__description">
                                        <a class="recommend-item__link" href="#">Why choose a bank?</a>
                                        <div class="recommend-item__date">March 20, 2017</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Recommend End -->
                    </div>
                    <div class="sidebar__element">
                        <!-- Advert Start -->
                        <div class="advert-area">
                            <div class="widget-title">
                                <h5>Объявления</h5>
                            </div>
                            <div class="advert-wrap">
                                <div class="advert-item">
                                    <!-- <div class="advert-item__image">
                                    <img src="/template/img/blog-img/dm-1.jpg" alt="">
                                </div> -->
                                    <span>Объявление</span>
                                    <!-- <div class="advert-item__description">
                                    <a class="advert-item__link" href="#">EU council reunites</a>
                                    <div class="advert-item__date">Nov 29, 2017</div>
                                </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Advert End -->
                    </div>
                    <div class="sidebar__element">
                        <!-- Subscribe Start -->
                        <div class="subscribe">
                            <div class="widget-title">
                                <h5>Подписка</h5>
                            </div>
                            <form method="post" action="" class="subform">
                                <div class="form-field">
                                    <input class="textfield" type="text" maxlength="24" name="4879ad6d9af99c5254ff0f6f7b07a7e4" placeholder="Имя">
                                </div>
                                <div class="form-field">
                                    <input class="textfield" type="email" name="email" maxlength="128" placeholder="Ваш e-mail">
                                </div>
                                <div class="form-field">
                                    <input class="button-subscribe" type="submit" value="Подписаться">
                                </div>
                            </form>
                        </div>
                        <!-- Subscribe End -->
                    </div>
                </aside>
                <!-- Sidebar End -->

            </div>
            <!-- Inner Content End -->
        </div>
    </div>
    <!-- Content End -->

</body>

<!-- User Scripts -->
<script src="/template/js/menu.js"></script>
<script src="/template/js/modal-window.js"></script>

</html>