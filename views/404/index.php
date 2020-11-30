<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Ошибка 404 - Страница не найдена - 24mynews.ru</title>
</head>

<style>
    body {

        grid-template-areas: "header header header header""nav nav nav nav""content content content content""footer footer footer footer";

    }
</style>

<body>

    <!-- Registration Window Start -->
    <!-- ********** -->
    <!-- Registration Window End -->

    <!-- Content Start -->
    <div class="content">
        <div class="container">
            <!-- Inner Content Start -->
            <div class="inner-content">

                <div class="notfound">
                    <div class="notfound__code">
                        404
                    </div>
                    <?php foreach ($data['menu'] as $menuItem) : ?>
                        <?php if ($menuItem['name'] == 'main') : ?>
                            <div class="notfound__text">
                                Запрошенная Вами страница не найдена на <a href="<?php echo $menuItem['url']; ?>">24mynews.ru</a>
                            </div>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>

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