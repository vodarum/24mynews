<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Газета - Все новости</title>
    <link rel="stylesheet" href="/template/libs/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/template/libs/owlcarousel/assets/owl.theme.default.css">
</head>

<body>
  
    <!-- Registration Window Start -->
    <!-- ********** -->
    <!-- Registration Window End -->

    <!-- Carousel Start -->
    <div class="owl-carousel-wrapper">
        <div class="container container_carousel">
            <div class="owl-carousel owl-theme owl-loaded" id="carouselId" style="grid-area: carousel;">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php foreach ($data['main_news'] as $crslItem) : ?>
                            <div class="owl-item" style="background-image: url(<?php echo $crslItem['news_image']; ?>);">
                                <div class="news-category-title">
                                    <a href="<?php echo $crslItem['news_category_url']; ?>"><?php echo $crslItem['category_title']; ?></a>
                                </div>
                                <div class="crsl-news-date">
                                    <p><?php echo $crslItem['news_date']; ?></p>
                                </div>
                                <div class="crsl-news-title">
                                    <h2>
                                        <a href="<?php echo $crslItem['news_url']; ?>"><?php echo $crslItem['news_title']; ?></a>
                                    </h2>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Marquee Start -->
    <!-- <div class="latest-news-marquee-area">
        <div class="simple-marquee-container">
            <div class="marquee">
                <ul class="marquee-content-items">
                    <li>
                        <a href="#"><span class="latest-news-time">10:40</span> The Facebook Live stream that could presage TV</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">11:02</span> Opinion: It's time to start talking about impeachment</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">12:37</span> Clinton aims to shore up Wisconsin with new TV ads</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">13:59</span> Trump signs tax bill before leaving for Mar-a-Lago</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- Marquee End -->

    <!-- Content Start -->
    <div class="content">
        <div class="container">
            <!-- Inner Content Start -->
            <div class="inner-content">

                <!-- Main Start -->
                <div class="main">

                    <?php $globalCount = 0; ?>
                    <?php $сountNews = count($data['main_news']); ?>

                    <!-- Top Single News Start -->

                    <?php for ($count = $globalCount; $count < $сountNews; $count++) : ?>

                        <?php if ($count == $globalCount + 1) : ?>
                            <?php $globalCount = $count; ?>
                            <?php break; ?>
                        <?php endif; ?>

                        <div class="top-single-news">
                            <div class="news-category-title">
                                <a href="<?php echo ($data['main_news'][$count])['news_category_url']; ?>"><?php echo ($data['main_news'][$count])['category_title']; ?></a>
                            </div>
                            <article class="ts-news-content">
                                <div class="ts-news-title">
                                    <h2><?php echo ($data['main_news'][$count])['news_title']; ?></h2>
                                </div>
                                <div class="ts-news-date">
                                    <p><?php echo ($data['main_news'][$count])['news_date']; ?></p>
                                </div>
                                <div class="ts-news-image">
                                    <img src="<?php echo ($data['main_news'][$count])['news_image']; ?>" alt="">
                                </div>
                                <div class="ts-news-text">
                                    <p><?php echo ($data['main_news'][$count])['short_content']; ?></p>
                                </div>
                            </article>
                            <a class="button-continue" href="<?php echo ($data['main_news'][$count])['news_url']; ?>">Читать далее</a>
                        </div>

                    <?php endfor; ?>

                    <!-- Other Top News Start -->
                    <div class="other-top-news">

                        <?php for ($count = $globalCount; $count < $сountNews; $count++) : ?>
                            <?php if ($count == $globalCount + 2) : ?>
                                <?php $globalCount = $count; ?>
                                <?php break; ?>
                            <?php endif; ?>

                            <article class="one-other-top-news">
                                <div class="oot-news-image">
                                    <a href="<?php echo ($data['main_news'][$count])['news_url']; ?>"><img src="<?php echo ($data['main_news'][$count])['news_image']; ?>" alt=""></a>
                                </div>
                                <article class="oot-news-content">
                                    <div class="news-category-title">
                                        <a href="<?php echo ($data['main_news'][$count])['news_category_url']; ?>"><?php echo ($data['main_news'][$count])['category_title']; ?></a>
                                    </div>
                                    <div class="oot-news-title">
                                        <h2>
                                            <a href="<?php echo ($data['main_news'][$count])['news_url']; ?>"><?php echo ($data['main_news'][$count])['news_title']; ?></a>
                                        </h2>
                                    </div>
                                    <div class="oot-news-date">
                                        <p><?php echo ($data['main_news'][$count])['news_date']; ?></p>
                                    </div>
                                    <div class="oot-news-text">
                                        <p><?php echo ($data['main_news'][$count])['short_content']; ?></p>
                                    </div>
                                </article>
                            </article>

                        <?php endfor; ?>

                    </div>
                    <!-- Other Top News End -->

                    <!-- Category Top News Start -->
                    <div class="category-top-news">
                        <?php foreach ($data['menu'] as $oneCategory) : ?>
                            <?php if ($oneCategory['name'] != 'main') : ?>
                                <!-- One Category Top News Start -->
                                <div class="one-category-top-news">
                                    <div class="news-category-title">
                                        <a href="<?php echo $oneCategory['url']; ?>"><?php echo $oneCategory['title']; ?></a>
                                    </div>
                                    <!-- News List Start -->
                                    <div class="oct-news-list">
                                        <?php $arrnewsOfCategory = array(); ?>

                                        <!-- Col-1 Start -->
                                        <article class="oct-news-list-col-1">
                                            <?php foreach ($data['news_list'][$oneCategory['name']] as $col_1_newsOfCategory) : ?>
                                                <?php if ($col_1_newsOfCategory['category_title'] == $oneCategory['title']) : ?>
                                                    <?php array_push($arrnewsOfCategory,  $col_1_newsOfCategory['news_url']); ?>
                                                    <div class="oct-news-image">
                                                        <a href="<?php echo $col_1_newsOfCategory['news_url']; ?>"><img src="<?php echo $col_1_newsOfCategory['news_image']; ?>" alt=""></a>
                                                    </div>
                                                    <div class="oct-news-title">
                                                        <h2>
                                                            <a href="<?php echo $col_1_newsOfCategory['news_url']; ?>"><?php echo $col_1_newsOfCategory['news_title']; ?></a>
                                                        </h2>
                                                        <span class="mobile-oct-news-date"><?php echo $col_1_newsOfCategory['news_date']; ?></span>
                                                    </div>
                                                    <div class="oct-news-date">
                                                        <p><?php echo $col_1_newsOfCategory['news_date']; ?></p>
                                                    </div>
                                                    <?php break; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </article>
                                        <!-- Col-1 End -->
                                        <!-- Col-2 Start -->
                                        <div class="oct-news-list-col-2">
                                            <?php $countNews_Col_2 = 0; ?>
                                            <?php foreach ($data['news_list'][$oneCategory['name']] as $col_2_newsOfCategory) : ?>
                                                <?php if (
                                                    $col_2_newsOfCategory['category_title'] == $oneCategory['title']
                                                    && !(in_array($col_2_newsOfCategory['news_url'],  $arrnewsOfCategory, false))
                                                ) : ?>
                                                    <?php array_push($arrnewsOfCategory,  $col_2_newsOfCategory['news_url']); ?>
                                                    <article class="oct-news-list-row">
                                                        <div class="oct-news-title">
                                                            <h2>
                                                                <a href="<?php echo $col_2_newsOfCategory['news_url']; ?>"><?php echo $col_2_newsOfCategory['news_title']; ?></a>
                                                            </h2>
                                                            <span class="mobile-oct-news-date"><?php echo $col_2_newsOfCategory['news_date']; ?></span>
                                                        </div>
                                                        <div class="oct-news-date">
                                                            <p><?php echo $col_2_newsOfCategory['news_date']; ?></p>
                                                        </div>
                                                    </article>
                                                    <?php $countNews_Col_2++; ?>
                                                <?php endif; ?>
                                                <?php if ($countNews_Col_2 == 2) : ?>
                                                    <?php break; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- Col-2 End -->
                                        <!-- Col-3 Start -->
                                        <div class="oct-news-list-col-3">
                                            <?php $countNews_Col_3 = 0; ?>
                                            <?php foreach ($data['news_list'][$oneCategory['name']] as $col_3_newsOfCategory) : ?>
                                                <?php if (
                                                    $col_3_newsOfCategory['category_title'] == $oneCategory['title']
                                                    && !(in_array($col_3_newsOfCategory['news_url'],  $arrnewsOfCategory))
                                                ) : ?>
                                                    <?php array_push($arrnewsOfCategory,  $col_2_newsOfCategory['news_url']); ?>
                                                    <article class="oct-news-list-row">
                                                        <div class="oct-news-title">
                                                            <h2>
                                                                <a href="<?php echo $col_3_newsOfCategory['news_url']; ?>"><?php echo $col_3_newsOfCategory['news_title']; ?></a>
                                                            </h2>
                                                            <span class="mobile-oct-news-date"><?php echo $col_3_newsOfCategory['news_date']; ?></span>
                                                        </div>
                                                        <div class="oct-news-date">
                                                            <p><?php echo $col_3_newsOfCategory['news_date']; ?></p>
                                                        </div>
                                                    </article>
                                                    <?php $countNews_Col_3++; ?>
                                                <?php endif; ?>
                                                <?php if ($countNews_Col_3 == 2) : ?>
                                                    <?php break; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- Col-3 End -->
                                    </div>
                                    <!-- News List End -->
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <!-- One Category Top News End -->


                        <!-- ********** -->

                        <!-- One Category Top News Start -->
                        <!-- <div class="one-category-top-news">
                            <div class="news-category-title">
                                <a href="#">Категория</a>
                            </div> -->
                        <!-- News List Start -->
                        <!-- <div class="oct-news-list"> -->
                        <!-- Col-1 Start -->
                        <!-- <article class="oct-news-list-col-1">
                                    <div class="oct-news-image">
                                        <img src="/template/img/blog-img/23.jpg" alt="">
                                    </div>
                                    <div class="oct-news-title">
                                        <h2>
                                            <a href="#">На Украине намерены помешать завершению проекта «Северный поток — 2»</a>
                                        </h2>
                                        <span class="mobile-oct-news-date">28.04.2020</span>
                                    </div>
                                    <div class="oct-news-date">
                                        <p>28.04.2020</p>
                                    </div>
                                </article> -->
                        <!-- Col-1 End -->
                        <!-- Col-2 Start -->
                        <!-- <div class="oct-news-list-col-2">
                                    <article class="oct-news-list-row">
                                        <div class="oct-news-title">
                                            <h2>
                                                <a href="#">Путин поручил разработать новый пакет мер поддержки бизнеса</a>
                                            </h2>
                                            <span class="mobile-oct-news-date">28.04.2020</span>
                                        </div>
                                        <div class="oct-news-date">
                                            <p>28.04.2020</p>
                                        </div>
                                    </article>
                                    <article class="oct-news-list-row">
                                        <div class="oct-news-title">
                                            <h2>
                                                <a href="#">В Кремле прокомментировали снижение уровня самоизоляции</a>
                                            </h2>
                                            <span class="mobile-oct-news-date">28.04.2020</span>
                                        </div>
                                        <div class="oct-news-date">
                                            <p>28.04.2020</p>
                                        </div>
                                    </article>
                                </div> -->
                        <!-- Col-2 End -->
                        <!-- Col-3 Start -->
                        <!-- <div class="oct-news-list-col-3">
                                    <article class="oct-news-list-row">
                                        <div class="oct-news-title">
                                            <h2>
                                                <a href="#">Песков прокомментировал слова об оказании прямой материальной помощи</a>
                                            </h2>
                                            <span class="mobile-oct-news-date">28.04.2020</span>
                                        </div>
                                        <div class="oct-news-date">
                                            <p>28.04.2020</p>
                                        </div>
                                    </article>
                                    <article class="oct-news-list-row">
                                        <div class="oct-news-title">
                                            <h2>
                                                <a href="#">ЕР примет участие в подготовке плана по восстановлению доходов россиян</a>
                                            </h2>
                                            <span class="mobile-oct-news-date">28.04.2020</span>
                                        </div>
                                        <div class="oct-news-date">
                                            <p>28.04.2020</p>
                                        </div>
                                    </article>
                                </div> -->
                        <!-- Col-3 End -->
                        <!-- </div> -->
                        <!-- News List End -->
                        <!-- </div> -->
                        <!-- One Category Top News End -->

                    </div>
                    <!-- Category Top News End -->
                </div>
                <!-- Main End -->

                <!-- Sidebar Start -->
                <aside class="sidebar">

                    <!-- Breaking News Start -->
                    <div class="main-news">

                        <div class="widget-title">
                            <h5>Последние новости</h5>
                        </div>

                        <?php for ($count = $globalCount; $count < $сountNews; $count++) : ?>
                            <?php if ($count == $globalCount + 2) : ?>
                                <?php $globalCount = $count; ?>
                                <?php break; ?>
                            <?php endif; ?>

                            <div class="single-news-widget">
                                <a href="<?php echo ($data['main_news'][$count])['news_url']; ?>">
                                    <img src="<?php echo ($data['main_news'][$count])['news_image']; ?>" alt="">
                                </a>
                                <div class="breaking-news-category">
                                    <p>breaking news</p>
                                </div>
                                <div class="breaking-news-title">
                                    <h2>
                                        <a href="<?php echo ($data['main_news'][$count])['news_url']; ?>"><?php echo ($data['main_news'][$count])['news_title']; ?></a>
                                    </h2>
                                </div>
                            </div>

                        <?php endfor; ?>

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
                                    <img src="/template/img/blog-img/dm-2.jpg" alt="">
                                </div>
                                <div class="recommend-item__description">
                                    <a class="recommend-item__link" href="#">A new way to travel the world</a>
                                    <div class="recommend-item__date">May 29, 2017</div>
                                </div>
                            </div>
                            <!--  <div class="recommend-item">
                                <div class="recommend-item__image">
                                    <img src="/template/img/blog-img/dm-3.jpg" alt="">
                                </div>
                                <div class="recommend-item__description">
                                    <a class="recommend-item__link" href="#">Why choose a bank?</a>
                                    <div class="recommend-item__date">March 20, 2017</div>
                                </div>
                            </div> -->
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


    <!-- Video Container Start -->
    <!-- <div class="video-container">
        <div class="container">
            <div class="inner-video-container">
                <div class="section-title">
                    <h5>Видео</h5>
                </div>
                <div class="invid-row">
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                </div>
                <div class="invid-row">
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                    <div class="invid-col">
                        <iframe src="https://www.youtube.com/embed/A7AN9yf2JVg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h6>Капитан Америка - ходячая мораль</h6>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Video Container End -->

    <!-- Slider Start -->
    <div class="slider-wrapper">
        <div class="container container_slider">

            <div class="slider-frame-hidden">

                <ul class="slider-list">

                    <li class="slider-element">
                        <div class="slide-img">
                            <img src="/template/img/blog-img/bitcoin.jpg" alt="0">
                        </div>
                        <article class="slide-content">
                            <div class="slide-category-title">
                                <a href="#">Финансы</a>
                            </div>
                            <div class="slide-news-title">
                                <h2>
                                    <a href="#">Move over, bitcoin.<br>Here comes litecoin</a>
                                </h2>
                            </div>
                            <div class="slide-news-date">
                                <p>28.04.2020</p>
                            </div>
                            <div class="slide-news-text">
                                <p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же новая модель
                                    организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений.</p>
                            </div>
                        </article>
                    </li>

                    <li class="slider-element">
                        <div class="slide-img">
                            <img src="/template/img/blog-img/bitcoin.jpg" alt="1">
                        </div>
                        <article class="slide-content">
                            <div class="slide-category-title">
                                <a href="#">Финансы</a>
                            </div>
                            <div class="slide-news-title">
                                <h2>
                                    <a href="#">Move over, bitcoin.<br>Here comes litecoin</a>
                                </h2>
                            </div>
                            <div class="slide-news-date">
                                <p>28.04.2020</p>
                            </div>
                            <div class="slide-news-text">
                                <p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же новая модель
                                    организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений.</p>
                            </div>
                        </article>
                    </li>

                    <li class="slider-element">
                        <div class="slide-img">
                            <img src="/template/img/blog-img/bitcoin.jpg" alt="2">
                        </div>
                        <article class="slide-content">
                            <div class="slide-category-title">
                                <a href="#">Финансы</a>
                            </div>
                            <div class="slide-news-title">
                                <h2>
                                    <a href="#">Move over, bitcoin.<br>Here comes litecoin</a>
                                </h2>
                            </div>
                            <div class="slide-news-date">
                                <p>28.04.2020</p>
                            </div>
                            <div class="slide-news-text">
                                <p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же новая модель
                                    организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений.</p>
                            </div>
                        </article>
                    </li>

                    <li class="slider-element">
                        <div class="slide-img">
                            <img src="/template/img/blog-img/bitcoin.jpg" alt="3">
                        </div>
                        <article class="slide-content">
                            <div class="slide-category-title">
                                <a href="#">Финансы</a>
                            </div>
                            <div class="slide-news-title">
                                <h2>
                                    <a href="#">Move over, bitcoin.<br>Here comes litecoin</a>
                                </h2>
                            </div>
                            <div class="slide-news-date">
                                <p>28.04.2020</p>
                            </div>
                            <div class="slide-news-text">
                                <p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же новая модель
                                    организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений.</p>
                            </div>
                        </article>
                    </li>

                    <li class="slider-element">
                        <div class="slide-img">
                            <img src="/template/img/blog-img/bitcoin.jpg" alt="4">
                        </div>
                        <article class="slide-content">
                            <div class="slide-category-title">
                                <a href="#">Финансы</a>
                            </div>
                            <div class="slide-news-title">
                                <h2>
                                    <a href="#">Move over, bitcoin.<br>Here comes litecoin</a>
                                </h2>
                            </div>
                            <div class="slide-news-date">
                                <p>28.04.2020</p>
                            </div>
                            <div class="slide-news-text">
                                <p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки дальнейших направлений развития. Задача организации, в особенности же новая модель
                                    организационной деятельности влечет за собой процесс внедрения и модернизации новых предложений.</p>
                            </div>
                        </article>
                    </li>

                </ul>

            </div>

            <div class="slider-arrow-left"></div>
            <div class="slider-arrow-right"></div>
            <div class="slider-dots"></div>

        </div>
    </div>
    <!-- Slider End -->

</body>

<!-- Vendor Scripts -->
<script src="/template/libs/owlcarousel/owl.carousel.min.js"></script>

<!-- User Scripts -->
<script src="/template/js/menu.js"></script>
<script src="/template/js/slide.js"></script>
<script src="/template/js/carousel.js"></script>
<script src="/template/js/modal-window.js"></script>
<!-- Вызов карусели -->
<script>
    new Ant()
</script>

</html>