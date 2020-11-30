<!DOCTYPE html>
<html lang="ru">

<body>

    <div class="one-comment__in-reply in-reply_load" id="<?php echo $data['in_reply_id']; ?>">
        <div class="window__close-cross">
            <img class="core-img" src="/template/img/core-img/close.svg" alt="" id="one-comment__close-cross">
        </div>
        <div class="one-comment__in-reply-content in-reply-content_load">
            <div class="one-comment__author one-comment__author_in-reply">
                <?php echo $data['in_reply_author']; ?>
            </div>
            <div class="one-comment__text one-comment__text_in-reply">
                <?php echo $data['in_reply_text']; ?>
            </div>
        </div>
    </div>

</body>


</html>