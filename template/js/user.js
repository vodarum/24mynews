/*
    Авторизация
 */

/* Вызов функции по событию "click" на кнопке */
/* $('button[name="submitLogin"]').click(function(e) */
$('body').on('click', '#submitLogin', function(e) {
    console.log('отработало нажатие СабмитЛог');

    /* В данном случае preventDefault() отключает стандартное поведение обработчика
    отправки формы и не перезагружает страницу */
    /* e.preventDefault(); */

    $(`input`).removeClass('error');

    let emailLogin = $('input[name="emailLogin"]').val(),
        passwordLogin = $('input[name="passwordLogin"]').val();

    $.ajax({
        url: 'http://24mynews.ru/user/login',
        type: 'POST',
        dataType: 'json',
        data: {
            email: emailLogin,
            password: passwordLogin
        },
        success: function(data) {
            if (data.status) {
                $('#overlay-opacity').css('display', 'none');
                $('#authentication-window').css('display', 'none');

                $("#h-menu__log span").attr('class', data.valueLayout['nameClassOrId']);
                $("#h-menu__log span").attr('id', data.valueLayout['nameClassOrId']);
                $("#h-menu__log img").attr('src', data.valueLayout['pathImg']);
                $("#h-menu__log p").html(data.valueLayout['textP']);

                /* Dottes */
                $("#reload_comments").load('http://24mynews.ru/comment/get');
                /* Dottes */

                $("#input-comment-area_load").load('http://24mynews.ru/comment/view', { event: 'login' });

                $(".for-login form").trigger('reset');

                /* $('#comment-area_unclickable').addClass('none');
                $('#comment-area_clickable').removeClass('none'); */
                // document.location.href = '/profile.php';
            } else {
                if (data.type === 1) {
                    data.errors_fields.forEach(function(errorField) {
                        $(`input[name="${errorField}"]`).addClass('error');
                    });
                }

                // $('.msg').removeClass('none').text(data.message);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

});

/*
    Регистрация
 */

$('button[name="submitReg"]').click(function(e) {
    console.log('отработало нажатие СабмитРег');

    /* В данном случае preventDefault() отключает стандартное поведение обработчика
    отправки формы и не перезагружает страницу */
    /* e.preventDefault(); */

    $(`input`).removeClass('error');
    console.log('отработало удаление подсветки ошибки поля');

    let nameUser = $('input[name="nameUser"]').val(),
        surnameUser = $('input[name="surnameUser"]').val(),
        emailReg = $('input[name="emailReg"]').val(),
        passwordReg = $('input[name="passwordReg"]').val(),
        passwordConfirm = $('input[name="passwordConfirm"]').val();

    $.ajax({
        url: 'http://24mynews.ru/user/register',
        type: 'POST',
        dataType: 'json',
        data: {
            name: nameUser,
            surname: surnameUser,
            email: emailReg,
            password: passwordReg,
            passwordConfirm: passwordConfirm
        },
        success(data) {
            console.log('отработал аякс');
            if (data.status) {
                console.log('отработало условие по статусу1');

                let left = Math.round($('#auth-title-item-1').position().left),
                    width = Math.round($('#auth-title-item-1').outerWidth());

                $('#auth-content-item-0').css('display', 'none');
                $('#auth-content-item-1').css('display', 'block');
                $('.authentication-window__title-area-item_underline').css({
                    'left': left + 'px',
                    'width': width + 'px'
                });

                $('#overlay-opacity').css('display', 'block');
                $('#authentication-window').css('display', 'block');

                $(".for-registration form").trigger('reset');
            } else {
                console.log('отработало условие по статусу2');
                if (data.type === 1) {
                    data.errors_fields.forEach(function(errorField) {
                        $(`input[name="${errorField}"]`).addClass('error');
                    });
                }

                /*  $('.msg').removeClass('none').text(data.message); */

            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

});

/* Выход */

/* $('#h-menu__logout-link').click(function(e) */
$('body').on('click', '#h-menu__logout-link', function(e) {

    $.ajax({
        url: 'http://24mynews.ru/user/logout',
        dataType: 'json',
        success: function(data) {
            if (data.status) {

                $("#h-menu__log span").attr('class', data.valueLayout['nameClassOrId']);
                $("#h-menu__log span").attr('id', data.valueLayout['nameClassOrId']);
                $("#h-menu__log img").attr('src', data.valueLayout['pathImg']);
                $("#h-menu__log p").html(data.valueLayout['textP']);

                /* Dottes */
                $("#reload_comments").load('http://24mynews.ru/comment/get');
                /* Dottes */

                $("#input-comment-area_load").load('http://24mynews.ru/comment/view', { event: 'logout' });

                $(".for-login form").trigger('reset');

                /* $('#comment-area_unclickable').removeClass('none');
                $('#comment-area_clickable').addClass('none'); */

                console.log('сработал logout');

            }
        }
    });
});