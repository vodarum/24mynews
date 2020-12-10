$('body').on('input', 'input[name="region"]', function(e) {

    let region = $('input[name="region"]').val();

    $('#region_dropdown_list').remove();

    if (region.length > 1) {

        $('#input_region').append('<div class="input-region-list" id="region_dropdown_list"><ul></ul></div>');

        $.ajax({
            url: 'http://24mynews.ru/region/search',
            type: 'POST',
            dataType: 'json',
            data: {
                region: region
            },
            success: function(data) {
                if (data.status) {

                    jQuery.each(data.cityList, function(i, city) {
                        $('#region_dropdown_list ul').append('<li><span>' + city + '</span></li>');
                    });

                    $('body').on('click', '#region_dropdown_list span', function(e) {
                        let selectRegion = $(this).text();
                        if (selectRegion) {
                            $.ajax({
                                url: 'http://24mynews.ru/region/select',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    region: selectRegion
                                },
                                success: function(data) {
                                    if (data.status) {
                                        $('#current_region').text(selectRegion);
                                        $('#select_region').text(selectRegion);
                                        $('input[name="region"]').val('');
                                        $('#region_dropdown_list').remove();

                                        let link = $('.h-menu__news-region a');
                                        if (link.length) {
                                            let href = link.attr('href').split('/')
                                            href.pop();
                                            href.push(data.regInfo['transliteration']);
                                            link.attr('href', href.join('/'));
                                        } else {
                                            let divNewsRegion = $('.h-menu__news-region');
                                            divNewsRegion.css('padding-right', '');
                                            divNewsRegion.append(`<a href="http://24mynews.ru/region/${data.regInfo['transliteration']}">Новости региона</a>`)
                                        }

                                        $('#overlay-opacity').css('display', 'none');
                                        $('#geolocation-window').css('display', 'none');
                                    }
                                }
                            });
                        }
                    });

                } else {
                    $('#region_dropdown_list ul').append('<li>' + data.message + '</li>');
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



$('body').on('click', '#region_list span', function(e) {
    let selectRegion = $(this).text();
    if (selectRegion) {
        $.ajax({
            url: 'http://24mynews.ru/region/select',
            type: 'POST',
            dataType: 'json',
            data: {
                region: selectRegion
            },
            success: function(data) {
                $('#current_region').text(selectRegion);
                $('#select_region').text(selectRegion);
                $('input[name="region"]').val('');
                $('#region_dropdown_list').remove();

                let link = $('.h-menu__news-region a');
                if (link.length) {
                    let href = link.attr('href').split('/')
                    href.pop();
                    href.push(data.regInfo['transliteration']);
                    link.attr('href', href.join('/'));
                } else {
                    let divNewsRegion = $('.h-menu__news-region');
                    divNewsRegion.css('padding-right', 'unset');
                    divNewsRegion.append(`<a href="http://24mynews.ru/region/${data.regInfo['transliteration']}">Новости региона</a>`)
                }

                $('#overlay-opacity').css('display', 'none');
                $('#geolocation-window').css('display', 'none');
            }
        });
    }
});