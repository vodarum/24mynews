<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?php echo $data['news_item']['news_title']; ?></title>
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

                    <!-- Single Post Start -->
                    <div class="single-post">
                        <div class="news-category-title">
                            <a href="<?php echo $data['news_item']['news_category_url']; ?>"><?php echo $data['news_item']['category_title']; ?></a>
                        </div>
                        <article class="single-post__content">
                            <div class="single-post__title">
                                <h2><?php echo $data['news_item']['news_title']; ?></h2>
                            </div>
                            <div class="single-post__date">
                                <p><?php echo $data['news_item']['news_date']; ?></p>
                            </div>
                            <div class="single-post__image">
                                <img src="<?php echo $data['news_item']['news_image']; ?>" alt="">
                            </div>
                            <div class="single-post__text">
                                <?php $content = (array_values(array_diff(preg_split('/\r\n|\r|\n/', $data['news_item']['content']), array('', NULL, false)))); ?>
                                <?php $count = count($content); ?>
                                <?php $i = 0; ?>
                                <?php foreach ($content as $contentParagraph) : ?>
                                    <p><?php echo $contentParagraph; ?></p>
                                    <?php if ($count >= 5 && $i == 3) : ?>
                                        <div class="read-more read-more_float_left">
                                            <div class="read-more__container">
                                                <div class="read-more__list">
                                                    <div class="read-more__img">
                                                        <a href="#">
                                                            <img src="/template/img/blog-img/18.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="read-more__title">
                                                        <a href="#">У 40% россиян из-за пандемии сократились доходы</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </div>
                        </article>

                        <!-- Subpost Contacts Start -->
                        <div class="single-post__subpost-contacts">
                            <div class="single-post__subpost-contacts-item">
                                <div class="subpostcon-telegram">
                                    <a href="https://ttttt.me/" target="_blank" class="subpostcon-telegram__link">
                                        <span class="subpostcon-telegram__icon">
                                            <img class="core-img" src="/template/img/core-img/telegram.svg" alt="">
                                        </span>
                                        <span class="subpostcon-telegram__text">Наш&nbsp;Telegram</span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-post__subpost-contacts-item">
                                <div class="subpostcon-yandex">
                                    <a href="https://yandex.ru/news/?from=tabbar" target="_blank" class="subpostcon-yandex__link">
                                        <span class="subpostcon-yandex__icon">
                                            <img class="core-img" src="/template/img/core-img/yandex.svg" alt="">
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-post__subpost-contacts-item">
                                <div class="subpostcon-comment" id="rgb_comment" data-label="comment">
                                    <div id="comments_block">
                                        <a href="javascript://" class="subpostcon-comment__open-comments">
                                            <span class="subpostcon-comment__icon">
                                                <img class="core-img" src="/template/img/core-img/comments.svg" alt="">
                                            </span>
                                            <span class="subpostcon-comment__text" id="subpostcon-comment__text">
                                                <span>Комментарии</span>
                                                <span class="subpostcon-comment__area-for-count"><i class="subpostcon-comment__count">(<?php echo count($data['comments']); ?>)</i></span>
                                            </span>
                                            <span class="subpostcon-comment__text-hide" id="subpostcon-comment__text-hide">Скрыть</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Subpost Contacts End -->
                        <!-- Comment Area Start -->
                        <div class="single-post__comment-area" id="single-post__comment-area">
                            <div class="single-post__comment-area-item comment-area-item-up">
                                <div class="comment-area-header">
                                    <div class="comment-area-header__title">
                                        <span>Комментарии</span>
                                        <span class="subpostcon-comment__area-for-count"><i class="subpostcon-comment__count">(<?php echo count($data['comments']); ?>)</i>:</span>
                                    </div>
                                    <div class="comment-area-header__subscribe" id="comment-subscribe_unclickable">
                                        <span class="checkbox-frame">
                                            <img class="core-img" src="/template/img/core-img/square.svg" alt="">
                                        </span>
                                        <span class="checkbox-title">Подписаться на комментарии</span>
                                        <!-- <form>
                                            <div>
                                                <input type="checkbox" id="subscribeComment" name="subscribe" value="newsletter">
                                                <label for="subscribeComment">Подписаться на комментарии</label>
                                            </div>
                                        </form> -->
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="single-post__comment-area-item comment-area-item-middle" id="reload_comments_area">
                                <div class="reload_comments" id="reload_comments">
                                    <?php if ($data['comments']) : ?>
                                        <div class="comment-area" id="comment-scroll">
                                            <?php foreach ($data['comments'] as $oneComment) : ?>
                                                <div class="one-comment" id="comment-<?php echo $oneComment['id']; ?>">

                                                    <div class="one-comment__author">
                                                        <div class="one-comment__author-avatar">
                                                            <img class="core-img" src="/template/img/core-img/sad.svg" alt="">
                                                        </div>
                                                        <div class="one-comment__author-name" id="author-<?php echo $oneComment['id']; ?>">
                                                            <?php echo $oneComment['user']; ?>
                                                        </div>
                                                    </div>

                                                    <div class="one-comment__body">

                                                        <?php if (LOGGED) : ?>
                                                            <?php if ($oneComment['user_id'] == $_SESSION['user']['id']) : ?>
                                                                <div class="one-comment__context-menu-wrap" id="context_menu_wrap-<?php echo $oneComment['id']; ?>">
                                                                    <img class="core-img one-comment__context-menu-dottes" id="context_menu_dottes-<?php echo $oneComment['id']; ?>" src="/template/img/core-img/more.svg" alt="">
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if (isset($oneComment['in_reply_id'])) : ?>

                                                            <?php $indexReply = array_search($oneComment['in_reply_id'], array_column($data['comments'], 'id')); ?>

                                                            <?php if ($indexReply !== FALSE) : ?>
                                                                <!-- 11/11/2020 -->
                                                                <div class="one-comment__in-reply" id="in_reply-<?php echo $oneComment['id']; ?>">
                                                                    <div class=" one-comment__in-reply-content">
                                                                        <div class="one-comment__author one-comment__author_in-reply" id="author_in_reply-<?php echo $oneComment['id']; ?>">
                                                                            <?php echo ($data['comments'][$indexReply])['user']; ?>
                                                                        </div>
                                                                        <div class="one-comment__text one-comment__text_in-reply" id="text_in_reply-<?php echo $oneComment['id']; ?>">
                                                                            <?php echo ($data['comments'][$indexReply])['text']; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- 11/11/2020 -->
                                                            <?php else : ?>

                                                                <div class=" one-comment__in-reply">
                                                                    <div class="one-comment__in-reply-content one-comment__in-reply-content-delete">
                                                                        Комментарий был удалён пользователем
                                                                    </div>
                                                                </div>

                                                            <?php endif; ?>

                                                        <?php endif; ?>

                                                        <div class="one-comment__content">

                                                            <div class="one-comment__text" id="text-<?php echo $oneComment['id']; ?>">
                                                                <?php echo $oneComment['text']; ?>
                                                            </div>
                                                            <div class="one-comment__submit-date">
                                                                <?php echo $oneComment['submit_date']; ?>
                                                            </div>

                                                        </div>

                                                        <div class="one-comment__footer">

                                                            <div class="one-comment__response">
                                                                <div class="one-comment__response-title" id="replyto-<?php echo $oneComment['id']; ?>">
                                                                    Ответить
                                                                </div>
                                                            </div>
                                                            <div class="one-comment__reactions">
                                                                <div class="one-comment__reactions-item">
                                                                    <div class="one-comment__reactions-icon">
                                                                        <img class="core-img core-img_reactions core-img_like" id="like-<?php echo $oneComment['id']; ?>" src="/template/img/core-img/like.svg" alt="">
                                                                    </div>
                                                                    <div class="one-comment__reactions-count likes-count" id="likes_count-<?php echo $oneComment['id']; ?>">
                                                                        <?php echo $oneComment['likes_count']; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="one-comment__reactions-item">
                                                                    <div class="one-comment__reactions-icon">
                                                                        <img class="core-img core-img_reactions core-img_dislike" id="dislike-<?php echo $oneComment['id']; ?>" src="/template/img/core-img/dislike.svg" alt="">
                                                                    </div>
                                                                    <div class="one-comment__reactions-count dislikes-count" id="dislikes_count-<?php echo $oneComment['id']; ?>">
                                                                        <?php echo $oneComment['dislikes_count']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <!-- <form class="one-comment__update" id="">
                                                        <div class="form-field form-comment">
                                                            <textarea class="input-area input-area_update" rows="3" id="" placeholder="Напишите комментарий..."></textarea>
                                                        </div>
                                                        <div class="form-field button-send">
                                                            <button class="button-send__input_submit" id="updateComment" name="updateComment" type="button" value="Сохранить">Сохранить</button>
                                                        </div>
                                                    </form> -->

                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="comment-area_none">
                                            <span>Эту новость пока не комментировали.</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!--  -->
                            <div class="single-post__comment-area-item comment-area-item-down" id="input-comment-area_load">
                                <?php if (!LOGGED) : ?>
                                    <div class="single-post__comment-area-load" id="comment-area_unclickable">
                                        <span>Чтобы оставить комментарий,</span>
                                        <span class="span-auth" id="span-auth">авторизуйтесь</span>
                                        <span>или</span>
                                        <span class="span-reg" id="span-reg">зарегистрируйтесь</span>

                                        <!-- <div class="form-field">
                                            <div class="input-area input-area_unclickable" id="input-area_unclickable"></div>
                                        </div>
                                        <div class="form-field button-send">
                                            <button class="button-send__input_submit" id="submit-comment_unclickable" value="Отправить комментарий">Отправить комментарий</button>
                                        </div> -->
                                    </div>
                                <?php else : ?>
                                    <div class="in_reply-load-area"></div>
                                    <form class="single-post__comment-area-load" id="comment-area_clickable">
                                        <div class="form-field form-comment">
                                            <textarea class="input-area" name="textComment" rows="5" id="" placeholder="Напишите комментарий..."></textarea>
                                        </div>
                                        <div class="form-field button-send">
                                            <button class="button-send__input_submit" id="submitComment" name="submitComment" type="button" value="Отправить комментарий">Отправить комментарий</button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>

                            <!--  -->
                            <!-- COMMENT AREA -->
                            <!--  -->
                        </div>
                        <!-- Comment Area End -->

                        <!-- Registration Window Start -->
                        <!-- ********** -->
                        <!-- Registration Window End -->
                    </div>
                    <!-- Single Post End -->

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

                        <!-- <div class="single-news-widget">
                            <a href="#">
                                <img src="/template/img/blog-img/bn-2.jpg" alt="">
                            </a>
                            <div class="breaking-news-category">
                                <p>breaking news</p>
                            </div>
                            <div class="breaking-news-title">
                                <h2>
                                    <a href="#">Путин объявил о выходе из режима нерабочих дней</a>
                                </h2>
                            </div>
                        </div> -->

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
                                <button class="button-subscribe" value="Подписаться">Подписаться</button>
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
<script src="/template/js/comment.js"></script>
<!-- <script src="/template/js/modal-window.js"></script> -->


</html>