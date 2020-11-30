<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Title  -->
    <title>
        <?php echo $currentTitle; ?>
    </title>
    <style>
        body {

            grid-template-areas: "header header header header""nav nav nav nav""mobnav mobnav mobnav mobnav""content content content content""footer footer footer footer";

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

                    <?php $globalCount = 0; ?>
                    <?php $сountNews = count($data['news_list']); ?>

                    <?php for ($i = 0; $i < 2; $i++) : ?>
                        <!-- One Category News -->
                        <div class="one-category-news__wrap">
                            <!-- Row Top Start -->
                            <div class="one-category-news__row_top">

                                <?php for ($count = $globalCount; $count < $сountNews; $count++) : ?>
                                    <?php if ($count == $globalCount + 3) : ?>
                                        <?php $globalCount = $count; ?>
                                        <?php break; ?>
                                    <?php endif; ?>

                                    <div class="one-category-news__content-col third-col">

                                        <div class="one-category-news__content-row">
                                            <div class="ocn-news-title">
                                                <a href="<?php echo ($data['news_list'][$count])['news_url']; ?>">
                                                    <h2><?php echo ($data['news_list'][$count])['news_title']; ?></h2>
                                                </a>
                                            </div>
                                            <div class="ocn-news-text">
                                                <?php echo ($data['news_list'][$count])['short_content']; ?>
                                            </div>
                                        </div>

                                        <div class="one-category-news__content-row">
                                            <div class="ocn-news-image">
                                                <img src="<?php echo ($data['news_list'][$count])['news_image']; ?>" alt="">
                                            </div>
                                            <div class="ocn-news-date">
                                                <?php echo ($data['news_list'][$count])['news_date']; ?>
                                            </div>
                                        </div>

                                    </div>

                                <?php endfor; ?>

                            </div>
                            <!-- Row Top End -->

                            <!-- Midlle Top Start -->
                            <div class="one-category-news__row_midlle">

                                <?php for ($count = $globalCount; $count < $сountNews; $count++) : ?>
                                    <?php if ($count == $globalCount + 2) : ?>
                                        <?php $globalCount = $count; ?>
                                        <?php break; ?>
                                    <?php endif; ?>

                                    <div class="one-category-news__content-col half-col">

                                        <div class="one-category-news__content-row">
                                            <div class="ocn-news-title">
                                                <a href="<?php echo ($data['news_list'][$count])['news_url']; ?>">
                                                    <h2><?php echo ($data['news_list'][$count])['news_title']; ?></h2>
                                                </a>
                                            </div>
                                            <div class="ocn-news-text">
                                                <?php echo ($data['news_list'][$count])['short_content']; ?>
                                            </div>
                                        </div>

                                        <div class="one-category-news__content-row">
                                            <div class="ocn-news-image">
                                                <img src="<?php echo ($data['news_list'][$count])['news_image']; ?>" alt="">
                                            </div>
                                            <div class="ocn-news-date">
                                                <?php echo ($data['news_list'][$count])['news_date']; ?>
                                            </div>
                                        </div>

                                    </div>
                                <?php endfor; ?>
                            </div>
                            <!-- Midlle Top End -->
                            <!-- Down Top Start -->
                            <div class="one-category-news__row_down">

                                <?php for ($count = $globalCount; $count < $сountNews; $count++) : ?>
                                    <?php if ($count == $globalCount + 1) : ?>
                                        <?php $globalCount = $count; ?>
                                        <?php break; ?>
                                    <?php endif; ?>

                                    <div class="one-category-news__content-col single-col">

                                        <!-- Mobile Content Start -->
                                        <div class="one-category-news__content-row one-category-news__content-row_mobile">
                                            <div class="ocn-news-title">
                                                <a href="<?php echo ($data['news_list'][$count])['news_url']; ?>">
                                                    <h2><?php echo ($data['news_list'][$count])['news_title']; ?></h2>
                                                </a>
                                            </div>
                                            <div class="ocn-news-text">
                                                <?php echo ($data['news_list'][$count])['short_content']; ?>
                                            </div>
                                        </div>

                                        <div class="one-category-news__content-row one-category-news__content-row_mobile">
                                            <div class="ocn-news-image">
                                                <img src="<?php echo ($data['news_list'][$count])['news_image']; ?>" alt="">
                                            </div>
                                            <div class="ocn-news-date">
                                                <?php echo ($data['news_list'][$count])['news_date']; ?>
                                            </div>
                                        </div>
                                        <!-- Mobile Content End -->

                                        <div class="one-category-news__content-row_flex">

                                            <div class="one-category-news__content-col_flex">
                                                <div class="ocn-news-image">
                                                    <img src="<?php echo ($data['news_list'][$count])['news_image']; ?>" alt="">
                                                </div>
                                            </div>

                                            <div class="one-category-news__content-col_flex">
                                                <div class="ocn-news-title">
                                                    <a href="<?php echo ($data['news_list'][$count])['news_url']; ?>">
                                                        <h2><?php echo ($data['news_list'][$count])['news_title']; ?></h2>
                                                    </a>
                                                </div>
                                                <div class="ocn-news-text">
                                                    <?php echo ($data['news_list'][$count])['short_content']; ?>
                                                </div>
                                                <div class="ocn-news-date">
                                                    <?php echo ($data['news_list'][$count])['news_date']; ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                <?php endfor; ?>

                            </div>
                            <!-- Down Top End -->
                        </div>
                    <?php endfor; ?>
                </div>
                <!-- Main End -->

                <!-- Sidebar Start -->
                <aside class="sidebar">

                    <!-- Breaking News Start -->
                    <div class="main-news">
                        <div class="widget-title">
                            <h5>Последние новости</h5>
                        </div>

                        <?php $countBreakingNews = 0; ?>
                        <?php foreach ($data['news_list'] as $oneBreakingNews) : ?>
                            <?php if ($oneBreakingNews['importance'] == 'secondary') : ?>
                                <div class="single-news-widget">
                                    <a href="<?php echo $oneBreakingNews['news_url']; ?>">
                                        <!-- <img src="<?php echo $oneBreakingNews['news_image']; ?>" alt=""> -->
                                        <img src="/template/img/blog-img/bn-1.jpg" alt="">
                                    </a>
                                    <div class="breaking-news-category">
                                        <p>breaking news</p>
                                    </div>
                                    <div class="breaking-news-title">
                                        <h2>
                                            <a href="<?php echo $oneBreakingNews['news_url']; ?>"><?php echo $oneBreakingNews['news_title']; ?></a>
                                        </h2>
                                    </div>
                                </div>
                                <?php $countBreakingNews++; ?>
                                <?php if ($countBreakingNews == 2) : ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                    <!-- Breaking News End -->

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