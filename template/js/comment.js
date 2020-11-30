/* Show comment area */

$('body').on('click', '#rgb_comment', function(e) {

    if ($('#single-post__comment-area').css('display') == 'none') {
        $('#single-post__comment-area').css('display', 'block');
        $('#subpostcon-comment__text').css('display', 'none');
        $('#subpostcon-comment__text-hide').css('display', 'unset');

        /* Обёрнуто в проверку, потому что scrollHeight выдаёт ошибку в console, когда комментариев нет */
        if ($('.comment-area').height()) {
            $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight);
        }

    } else {
        $('#single-post__comment-area').css('display', 'none');
        $('#subpostcon-comment__text').css('display', 'unset');
        $('#subpostcon-comment__text-hide').css('display', 'none');
    }

});

/* function showComment() {

    var buttonComment = document.getElementById('rgb_comment');


    buttonComment.addEventListener('click', function(event) {
        event.preventDefault();

        var commentArea = document.getElementById('single-post__comment-area');
        var commentText = document.getElementById('subpostcon-comment__text');
        var commentTextHide = document.getElementById('subpostcon-comment__text-hide');
        var scrollArea = document.getElementById("comment-scroll");

        if ((getComputedStyle(commentArea))['display'] == 'none') {
            commentArea.style.display = 'block';
            commentText.style.display = 'none';
            commentTextHide.style.display = 'unset';
        } else {
            commentArea.style.display = 'none';
            commentText.style.display = 'unset';
            commentTextHide.style.display = 'none';
        }

        if (scrollArea.scrollHeight) {
            scrollArea.scrollTop = scrollArea.scrollHeight;
        }

    });
};

new showComment(); */

/* ---------------------------------------------------------------------------------------------------- */


/* Submit */

$('body').on('click', '#submitComment', function(e) {

    $(`textarea[name="textComment"]`).removeClass('error');

    if ($('.in-reply_load').attr('id')) {
        var in_reply_id = $('.in-reply_load').attr('id');
    } else {
        var in_reply_id = '';
    }

    let textComment = $('textarea[name="textComment"]').val();
    let regexp = /^(?!\s*$).+/;

    /* ??? */
    $(".in_reply-load-area").html('');

    if (regexp.test(textComment)) {
        $.ajax({
            url: 'http://24mynews.ru/comment/submit',
            type: 'POST',
            dataType: 'json',
            data: {
                in_reply_id: in_reply_id,
                text: textComment
            },
            success: function(data) {

                if (data.status) {

                    console.log(data.message);

                    $('textarea[name="textComment"]').val('');

                    $.ajax({
                        url: 'http://24mynews.ru/comment/append',
                        type: 'POST',
                        dataType: 'html',
                        success: function(data) {

                            if ($('.comment-area').height()) {
                                $('.subpostcon-comment__area-for-count').load('http://24mynews.ru/comment/count');

                                $("#comment-scroll").append(data);
                                $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight);

                            } else {
                                $('.subpostcon-comment__area-for-count').load('http://24mynews.ru/comment/count');

                                $("#reload_comments").html(data);
                            }

                        }
                    });

                    /* $.ajax({
                        url: 'http://24mynews.ru/comment/get',
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            event: 'submit'
                        },
                        success: function(data) {
                            $(".single-post__content-down").html(data);
                            $('#single-post__comment-area').css('display', 'block');
                            $('#subpostcon-comment__text').css('display', 'none');
                            $('#subpostcon-comment__text-hide').css('display', 'unset');
                            $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight);
                        }
                    }); */

                    /* $('.subpostcon-comment__area-for-count').load('http://24mynews.ru/comment/get .subpostcon-comment__count:last');

                    $('#reload_comments_area').load('http://24mynews.ru/comment/get #reload_comments', { event: 'submit' }, function() {
                        $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight);
                    }); */

                } else {
                    console.log(data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    } else {
        /* Нельзя отправить пустой комментарий */
        $('textarea[name="textComment"]').addClass('error');
    }
    /* $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight); */
});

/* ---------------------------------------------------------------------------------------------------- */

/* One Comment Context Menu */

$('body').on('click', '.one-comment__context-menu-dottes', function(e) {

    let comment_id = ($(this).attr('id').split('-'))[1];

    if ($(`#context_menu-${comment_id}`).html()) {
        $(`#context_menu-${comment_id}`).remove();
    } else {
        let contextMenu = `<div class="one-comment__contex-menu one-comment__contex-menu-overlay" id="context_menu-${comment_id}">
                            <div class="one-comment__context-menu-item context-menu-update" id="update-${comment_id}">Редактировать</div>
                            <div class="one-comment__context-menu-item context-menu-delete" id="delete-${comment_id}">Удалить</div>
                        </div>`;

        $(`#context_menu_wrap-${comment_id}`).append(contextMenu);
    }

});

/* Update */

$('body').on('click', '.context-menu-update', function(e) {

    let comment_id = ($(this).attr('id').split('-'))[1];

    /*  */
    if ($(`#in_reply-${comment_id}`)) {
        let in_reply_author = $(`#author_in_reply-${comment_id}`).text().trim();
        let in_reply_text = $(`#text_in_reply-${comment_id}`).text().trim();
    }
    /*  */

    let text = $(`#text-${comment_id}`).text().trim();

    $(`#context_menu-${comment_id}`).remove();

    let updateTextArea = `<form class="one-comment__update" id="update_form-${comment_id}">
                            <div class="form-field form-comment">
                                <textarea class="input-area input-area_update" rows="3" placeholder="Напишите комментарий..."></textarea>
                            </div>
                            <div class="form-field button-send">
                                <button class="button-send__input_submit" id="update_comment-${comment_id}" type="button" value="Сохранить">Сохранить</button>
                            </div>
                        </form>`;

    $(`#comment-${comment_id}`).append(updateTextArea);

    $(`#update_form-${comment_id} textarea`).removeClass('error');
    $(`#update_form-${comment_id} textarea`).focus();
    $(`#update_form-${comment_id} textarea`).val(text);

    $('body').on('click', `#update_comment-${comment_id}`, function(e) {

        let updateTextComment = $(`#update_form-${comment_id} textarea`).val();
        let regexp = /^(?!\s*$).+/;

        if (regexp.test(updateTextComment)) {
            $.ajax({
                url: 'http://24mynews.ru/comment/update',
                type: 'POST',
                dataType: 'html',
                data: {
                    comment_id: comment_id,
                    text: updateTextComment
                },
                success: function(data) {

                    $(`#update_form-${comment_id}`).remove();
                    $('.subpostcon-comment__area-for-count').load('http://24mynews.ru/comment/count');
                    $("#reload_comments").html(data);
                    $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }

            });
        } else {
            /* Нельзя отправить пустой комментарий */
            $(`#update_form-${comment_id} textarea`).addClass('error');
        }
    });
});

/* Delete */

$('body').on('click', '.context-menu-delete', function(e) {

    let comment_id = ($(this).attr('id').split('-'))[1];

    $.ajax({
        url: 'http://24mynews.ru/comment/delete',
        type: 'POST',
        dataType: 'html',
        data: {
            comment_id: comment_id
        },
        success: function(data) {

            $('.subpostcon-comment__area-for-count').load('http://24mynews.ru/comment/count');
            $("#reload_comments").html(data);
            $('#comment-scroll').scrollTop($('#comment-scroll')[0].scrollHeight);

        }
    });

});

/* ---------------------------------------------------------------------------------------------------- */

/* Response */


$('body').on('click', '.one-comment__response-title', function(e) {

    $(`textarea[name="textComment"]`).removeClass('error');

    let in_reply_id = ($(this).attr('id').split('-'))[1];
    let in_reply_author = $(`#author-${in_reply_id}`).text().trim();
    let in_reply_text = $(`#text-${in_reply_id}`).text().trim();

    $.ajax({
        url: 'http://24mynews.ru/comment/reply',
        type: 'POST',
        dataType: 'html',
        data: {
            in_reply_id: in_reply_id,
            in_reply_author: in_reply_author,
            in_reply_text: in_reply_text
        },
        success: function(data) {
            $(".in_reply-load-area").html(data);
            $('textarea[name="textComment"]').focus();
        }
    });

    $('body').on('click', '#one-comment__close-cross', function(e) {
        $(".in_reply-load-area").html('');
    });

});

/* ---------------------------------------------------------------------------------------------------- */

/* Reactions */


$('body').on('click', '.core-img_reactions', function(e) {

    let user_reaction = ($(this).attr('id').split('-'))[0];
    var comment_id = ($(this).attr('id').split('-'))[1];

    $.ajax({
        url: 'http://24mynews.ru/comment/reaction',
        type: 'POST',
        dataType: 'json',
        data: {
            user_reaction: user_reaction,
            comment_id: comment_id
        },
        success: function(data) {
            if (data.status) {

                console.log(data.message);

                $(`#likes_count-${comment_id}`).text(data.likes);
                $(`#dislikes_count-${comment_id}`).text(data.dislikes);

            } else {
                console.log(data.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

});