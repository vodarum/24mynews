<!DOCTYPE html>
<html lang="ru">

<body>

    <div class="overlay-opacity" id="overlay-opacity"></div>

    <!-- Header Start -->
    <header class="header" id="header">
        <div class="container">
            <div class="header-inner">
                <div class="logo">
                    <?php foreach ($data['menu'] as $menuItem) : ?>
                        <?php if ($menuItem['name'] == 'main') : ?>
                            <a href="<?php echo $menuItem['url']; ?>">
                                <img class="core-img" src="/template/img/core-img/logo.png" alt="Газета">
                            </a>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="h-menu">
                    <div class="h-menu__item">
                        <div class="h-menu__geolocation">
                            <div class="h-menu__name-region">
                                <a class="h-menu__select-region" id="select-region">Волгоград</a>
                            </div>
                            <div class="h-menu__geolocation-window" id="geolocation-window">
                                <div class="window__close-cross">
                                    <img class="core-img" src="/template/img/core-img/close.svg" alt="" id="geolocation-window__close-cross">
                                </div>
                                <div class="h-menu__geolocation-window-wrap">
                                    <div class="geolocation-window__current-region">
                                        <p>Текущий регион: Волгоград</p>
                                    </div>
                                    <div class="h-menu__geolocation-window-inner">
                                        <div class="geolocation-window__item">
                                            <div class="geolocation-window__select-region">
                                                <div class="select-region-text">
                                                    <p>Выберите интересующий регион:</p>
                                                </div>
                                                <div class="select-region-list">
                                                    <div class="select-region-col">
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Москва</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Санкт-Петербург</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Казань</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Ростов-на-Дону</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Краснодар</a>
                                                        </div>
                                                    </div>
                                                    <div class="select-region-col">
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Владивосток</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Новосибирск</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Самара</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Уфа</a>
                                                        </div>
                                                        <div class="select-region-row">
                                                            <a class="top-city" href="#">Челябинск</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="geolocation-window__item geolocation-window__item_down">
                                            <div class="geolocation-window__input-region">
                                                <div class="input-region-text">
                                                    <p>Если вы не знаете, к какому Федеральному округу принадлежит город, введите его название в поле:</p>
                                                </div>
                                                <input class="input-region-area" type="text" maxlength="32" placeholder="Введите город...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php foreach ($data['menu'] as $menuItem) : ?>
                                <?php if ($menuItem['name'] == 'region') : ?>

                                    <div class="h-menu__news-region">
                                        <a href="<?php echo $menuItem['url']; ?>">Новости региона</a>
                                    </div>

                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="h-menu__item">
                        <div class="h-menu__services">
                            <div class="h-menu__services-item h-menu__search" id="h-menu__search">
                                <a class="h-icon h-icon_search" href="#" title="Поиск по сайту">
                                    <img class="core-img" src="/template/img/core-img/search.svg" alt="">
                                </a>
                            </div>
                            <!-- Search Modal Window -->
                            <div class="h-menu__search-window" id="search-window">
                                <div class="search-window__inner">
                                    <div class="search-window__inner-up">
                                        <div class="search-window__inner-up-item_left">
                                            <form class="search-window__search-form" action="">
                                                <fieldset class="search-window__search-fieldset">
                                                    <label class="search-field search-field__input-text-wrap" for="">
                                                        <input class="search-field__input-text" type="text" id="searchInput" value="" placeholder="Введите запрос...">
                                                    </label>
                                                    <label class="search-field search-field__input-submit-wrap" for="">
                                                        <input class="search-field__input-submit" type="submit" value="Найти">
                                                    </label>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="search-window__inner-up-item_right">
                                            <div class="search-window__close-cross-area">
                                                <div class="window__close-cross">
                                                    <img class="core-img" src="/template/img/core-img/close.svg" alt="" id="search-window__close-cross">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="search-window__inner-down">
                                        <div class="search-window__popular-area">
                                            <div class="search-window__popular-row">
                                                <div class="search-window__popular-title">
                                                    Сегодня чаще всего ищут:
                                                </div>
                                                <ul class="search-window__popular-list">
                                                    <li class="search-window__popular-list-item">
                                                        <a href="">Все о пандемии коронавируса</a>
                                                    </li>
                                                    <li class="search-window__popular-list-item">
                                                        <a href="">Закон о кредитных каникулах для граждан и малого бизнеса</a>
                                                    </li>
                                                    <li class="search-window__popular-list-item">
                                                        <a href="">Ответы на самые популярные вопросы о цифровых пропусках</a>
                                                    </li>
                                                    <li class="search-window__popular-list-item">
                                                        <a href="">Ситуация в Нагорном Карабахе</a>
                                                    </li>
                                                    <li class="search-window__popular-list-item">
                                                        <a href="">Как отличить коронавирус от ОРВИ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Search Modal Window -->
                            </div>
                            <div class="h-menu__services-item h-menu__geo" id="h-menu__geo">
                                <a class="h-icon h-icon_geo" href="#" title="Геоопределение">
                                    <img class="core-img" src="/template/img/core-img/location.svg" alt="">
                                </a>
                            </div>
                            <?php foreach ($data['menu'] as $menuItem) : ?>
                                <?php if ($menuItem['name'] == 'main') : ?>
                                    <?php if (!LOGGED) : ?>
                                        <div class="h-menu__services-item h-menu__login" id="h-menu__login">
                                            <!-- submit -->
                                            <a class="h-menu__login-link" href="<?php echo $menuItem['url']; ?>user/login">
                                                <img class="core-img" src="/template/img/core-img/login.svg" alt="">
                                                <p>Войти</p>
                                            </a>
                                        </div>
                                    <?php else : ?>
                                        <div class="h-menu__services-item h-menu__logout" id="h-menu__logout">
                                            <a class="h-menu__logout-link" href="<?php echo $menuItem['url']; ?>user/logout">
                                                <img class="core-img" src="/template/img/core-img/logout.svg" alt="">
                                                <p>Выйти</p>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="menu-toggle-wrap">
                    <div class="menu-toggle" id="toggle-menu"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Registration Window Start -->
    <div class="authentication-window" id="authentication-window">
        <div class="window__close-cross">
            <img class="core-img" src="/template/img/core-img/close.svg" alt="" id="authentication-window__close-cross">
        </div>
        <div class="authentication-window__container">
            <div class="authentication-window__title-area">
                <div class="authentication-window__title-area-item item-0" id="auth-title-item-0">
                    <div class="item-title">Регистрация</div>
                </div>
                <div class="authentication-window__title-area-item item-1" id="auth-title-item-1">
                    <div class="item-title">Войти</div>
                </div>
                <div class="authentication-window__title-area-item_underline" style="left: 122px; width: 45px;"></div>
            </div>
            <div class="authentication-window__content">
                <div class="auth-content-item item-0" id="auth-content-item-0">
                    <div class="auth-description auth-login__text">
                        <p>
                            Для регистрации на сайте заполните, пожалуйста, все поля формы. На указанный e-mail мы пришлем ссылку на Ваш профиль.
                        </p>
                    </div>
                    <div class="auth-login__form for-registration">

                        <?php foreach ($data['menu'] as $menuItem) : ?>
                            <?php if ($menuItem['name'] == 'main') : ?>

                                <form method="post" action="<?php echo $menuItem['url']; ?>user/register" class="auth-login__form-inner">
                                    <div class="form-field">
                                        <input class="textfield textfield_for-auth registration" type="text" maxlength="24" name="nameUser" placeholder="Имя">
                                    </div>
                                    <div class="form-field">
                                        <input class="textfield textfield_for-auth registration" type="text" maxlength="24" name="surnameUser" placeholder="Фамилия">
                                    </div>
                                    <div class="form-field">
                                        <input class="textfield textfield_for-auth registration" type="email" name="email" maxlength="128" placeholder="E-mail">
                                    </div>
                                    <div class="form-field">
                                        <input class="textfield textfield_for-auth registration" type="password" name="password" placeholder="Пароль">
                                    </div>
                                    <div class="form-field">
                                        <input class="button-subscribe button-subscribe_login" type="submit" name="submitReg" value="Зарегистрироваться">
                                    </div>
                                </form>

                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>

                <div class="auth-content-item item-1" id="auth-content-item-1">
                    <div class="auth-description auth-login__text">
                        <p>
                            Для использования сервисов сайта и возможности комментирования укажите свой e-mail. На этот e-mail мы пришлем код авторизации.
                        </p>
                    </div>
                    <div class="auth-login__form for-login">

                        <?php foreach ($data['menu'] as $menuItem) : ?>
                            <?php if ($menuItem['name'] == 'main') : ?>

                                <form method="post" action="<?php echo $menuItem['url']; ?>user/login" class="auth-login__form-inner">
                                    <div class="form-field">
                                        <input class="textfield textfield_for-auth login" type="email" name="email" maxlength="128" placeholder="Ваш e-mail">
                                    </div>
                                    <div class="form-field">
                                        <input class="textfield textfield_for-auth registration" type="password" name="password" placeholder="Пароль">
                                    </div>
                                    <div class="form-field">
                                        <input class="button-subscribe button-subscribe_login" type="submit" name="submitLogin" value="Войти">
                                    </div>
                                </form>

                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>


                    </div>
                    <div class="auth-description auth-social__text">
                        <p>
                            Авторизация через аккаунты в&nbsp;соцсетях
                        </p>
                    </div>
                    <div class="auth-login__social">
                        <div class="auth-login__social-item">
                            <a target="_blank" href="https://facebook.com/">
                                <img class="core-img social-icon" src="/template/img/social/facebook.svg" alt="">
                            </a>
                        </div>
                        <div class="auth-login__social-item">
                            <a target="_blank" href="https://google.com/">
                                <img class="core-img social-icon" src="/template/img/social/google-plus.svg" alt="">
                            </a>
                        </div>
                        <div class="auth-login__social-item">
                            <a target="_blank" href="https://twitter.com/">
                                <img class="core-img social-icon" src="/template/img/social/twitter.svg" alt="">
                            </a>
                        </div>
                        <div class="auth-login__social-item">
                            <a target="_blank" href="https://vk.com/">
                                <img class="core-img social-icon" src="/template/img/social/vk.svg" alt="">
                            </a>
                        </div>
                        <div class="auth-login__social-item">
                            <a target="_blank" href="https://ok.ru/">
                                <img class="core-img social-icon" src="/template/img/social/odnoklassniki.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="auth-description auth-agreement__text">
                        <p>
                            Входя на сайт, Вы принимаете условия <a class="auth-agreement__link" target="_blank" href="https://rg.ru/useragreement/">соглашения</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Window End -->

    <!-- Nav Start -->
    <nav class="nav" id="nav-menu">
        <div class="container">
            <ul>
                <?php foreach ($data['menu'] as $menuItem) : ?>
                    <?php if ($menuItem['name'] != 'region') : ?>
                        <li><a href="<?php echo $menuItem['url']; ?>"><?php echo $menuItem['title']; ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
    <!-- Nav End -->

</body>

<!-- Vendor Scripts -->
<script src="/template/libs/jquery/jquery-3.5.1.min.js"></script>

</html>