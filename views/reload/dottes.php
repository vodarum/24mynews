<!DOCTYPE html>
<html lang="ru">

<body>

    <?php if (LOGGED) : ?>
        <?php if ($oneComment['user_id'] == $_SESSION['user']['id']) : ?>
            <div class="one-comment__context-menu-wrap" id="context_menu_wrap-<?php echo $oneComment['id']; ?>">
                <img class="core-img one-comment__context-menu-dottes" id="context_menu_dottes-<?php echo $oneComment['id']; ?>" src="/template/img/core-img/more.svg" alt="">
            </div>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>