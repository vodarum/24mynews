$('body').on('input', 'input[name="search"]', function(e) {

    let substrNewsTitle = $('input[name="search"]').val();

    if (substrNewsTitle.length > 2) {

        $('.search-window__inner-down').html('<div class="search-results"><ul class="search-results__news-list"></ul></div>');

        $.ajax({
            url: 'http://24mynews.ru/search',
            type: 'POST',
            dataType: 'json',
            data: {
                substrNewsTitle: substrNewsTitle
            },
            success: function(data) {
                if (data.status) {

                    jQuery.each(data.newsTitleList, function(i, newsTitle) {
                        $('.search-results__news-list').append(`<li class="search-results__news-list-item"><a href="${newsTitle['url']}">${newsTitle['title']}</a></li>`);
                    });

                } else {
                    $('.search-results__news-list').html(`<li class="search-results__not-found">${data.message}</li>`);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

});

/* $('body').on('click', 'input[name="searchButton"]', function(e) {

    e.preventDefault();

    let substrNewsTitle = $('input[name="search"]').val();

    $.ajax({
        url: 'http://24mynews.ru/search',
        type: 'POST',
        dataType: 'json',
        data: {
            substrNewsTitle: substrNewsTitle
        },
        success: function(data) {
            if (data.status) {

                jQuery.each(data.newsTitleList, function(i, newsTitle) {
                    $('.search-results__news-list').append(`<li class="search-results__news-list-item"><a href="${newsTitle['url']}">${newsTitle['title']}</a></li>`);
                });

            } else {
                $('.search-results__news-list').html(`<li class="search-results__not-found">${data.message}</li>`);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

}); */