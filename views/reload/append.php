<!DOCTYPE html>
<html lang="ru">

<body>

    <div class="one-comment" id="comment-<?php echo $data['last_comment']['id']; ?>">

        <div class="one-comment__author">
            <div class="one-comment__author-avatar">
                <img class="core-img" src="/template/img/core-img/sad.svg" alt="">
            </div>
            <div class="one-comment__author-name" id="author-<?php echo $data['last_comment']['id']; ?>">
                <?php echo $data['last_comment']['user']; ?>
            </div>
        </div>

        <div class="one-comment__body">

            <?php if (LOGGED) : ?>
                <?php if ($data['last_comment']['user_id'] == $_SESSION['user']['id']) : ?>
                    <div class="one-comment__context-menu-wrap" id="context_menu_wrap-<?php echo $data['last_comment']['id']; ?>">
                        <img class="core-img one-comment__context-menu-dottes" id="context_menu_dottes-<?php echo $data['last_comment']['id']; ?>" src="/template/img/core-img/more.svg" alt="">
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($data['last_comment']['in_reply_id'])) : ?>

                <?php $indexReply = array_search($data['last_comment']['in_reply_id'], array_column($data['comments'], 'id')); ?>

                <?php if ($indexReply !== FALSE) : ?>

                    <div class="one-comment__in-reply">
                        <div class="one-comment__in-reply-content">
                            <div class="one-comment__author one-comment__author_in-reply">
                                <?php echo ($data['comments'][$indexReply])['user']; ?>
                            </div>
                            <div class="one-comment__text one-comment__text_in-reply">
                                <?php echo ($data['comments'][$indexReply])['text']; ?>
                            </div>
                        </div>
                    </div>

                <?php else : ?>

                    <div class="one-comment__in-reply">
                        <div class="one-comment__in-reply-content one-comment__in-reply-content-delete">
                            Комментарий был удалён пользователем
                        </div>
                    </div>

                <?php endif; ?>

            <?php endif; ?>

            <div class="one-comment__content">

                <div class="one-comment__text" id="text-<?php echo $data['last_comment']['id']; ?>">
                    <?php echo $data['last_comment']['text']; ?>
                </div>
                <div class="one-comment__submit-date">
                    <?php echo $data['last_comment']['submit_date']; ?>
                </div>

            </div>

            <div class="one-comment__footer">

                <div class="one-comment__response">
                    <div class="one-comment__response-title" id="replyto-<?php echo $data['last_comment']['id']; ?>">
                        Ответить
                    </div>
                </div>
                <div class="one-comment__reactions">
                    <div class="one-comment__reactions-item">
                        <div class="one-comment__reactions-icon">
                            <img class="core-img core-img_reactions core-img_like" id="like-<?php echo $data['last_comment']['id']; ?>" src="/template/img/core-img/like.svg" alt="">
                        </div>
                        <div class="one-comment__reactions-count likes-count" id="likes_count-<?php echo $data['last_comment']['id']; ?>">
                            <?php echo $data['last_comment']['likes_count']; ?>
                        </div>
                    </div>
                    <div class="one-comment__reactions-item">
                        <div class="one-comment__reactions-icon">
                            <img class="core-img core-img_reactions core-img_dislike" id="dislike-<?php echo $data['last_comment']['id']; ?>" src="/template/img/core-img/dislike.svg" alt="">
                        </div>
                        <div class="one-comment__reactions-count dislikes-count" id="dislikes_count-<?php echo $data['last_comment']['id']; ?>">
                            <?php echo $data['last_comment']['dislikes_count']; ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>