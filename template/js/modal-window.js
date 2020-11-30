(function() {

    var overlayOpacity = document.getElementById('overlay-opacity');
    var selectRegion = document.getElementById('select-region');
    var geolocationWindow = document.getElementById('geolocation-window');
    var pushGeo = document.getElementById('h-menu__geo');
    var pushSearch = document.getElementById('h-menu__search');
    var searchWindow = document.getElementById('search-window');
    var pushLogin = document.getElementById('h-menu__login-link');
    var authenticationWindow = document.getElementById('authentication-window');
    var closeGeolocationWindow = document.getElementById('geolocation-window__close-cross');
    var closeSearchWindow = document.getElementById('search-window__close-cross');
    var closeAuthenticationWindow = document.getElementById('authentication-window__close-cross');

    var commentSubscribeUnclickable = document.getElementById('comment-subscribe_unclickable');
    var inputAreaUnclickable = document.getElementById('input-area_unclickable');
    var submitCommentUnclickable = document.getElementById('submit-comment_unclickable');

    if (selectRegion != null) {
        selectRegion.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            geolocationWindow.style.display = 'block';
        });
    }
    if (pushGeo != null) {
        pushGeo.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            geolocationWindow.style.display = 'block';
        });
    }

    if (pushSearch != null) {
        pushSearch.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            searchWindow.style.display = 'block';
        });
    }
    /* if (pushLogin != null) {
        pushLogin.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            authenticationWindow.style.display = 'block';
            delete pushLogin;
        });
    } */
    $('body').on('click', '#h-menu__login-link', function() {

        /* let left = Math.round($('#auth-title-item-1').position().left),
            width = Math.round($('#auth-title-item-1').outerWidth()); */

        $('#auth-content-item-0').css('display', 'none');
        $('#auth-content-item-1').css('display', 'block');
        $('.authentication-window__title-area-item_underline').css({
            'width': '45px',
            'left': '122px'
        });

        overlayOpacity.style.display = 'block';
        authenticationWindow.style.display = 'block';
    });

    /* if (commentSubscribeUnclickable != null) {
        commentSubscribeUnclickable.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            authenticationWindow.style.display = 'block';
        });
    } */
    $('body').on('click', '#comment-subscribe_unclickable', function() {
        overlayOpacity.style.display = 'block';
        authenticationWindow.style.display = 'block';
    });
    /* if (inputAreaUnclickable != null) {
        inputAreaUnclickable.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            authenticationWindow.style.display = 'block';
        });
    } */
    $('body').on('click', '#input-area_unclickable', function() {
        overlayOpacity.style.display = 'block';
        authenticationWindow.style.display = 'block';
    });
    /* if (submitCommentUnclickable != null) {
        submitCommentUnclickable.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'block';
            authenticationWindow.style.display = 'block';
        });
    } */
    $('body').on('click', '#submit-comment_unclickable', function() {
        overlayOpacity.style.display = 'block';
        authenticationWindow.style.display = 'block';
    });
    /*  */
    $('body').on('click', '#span-auth', function() {

        /* let left = Math.round($('#auth-title-item-1').position().left),
            width = Math.round($('#auth-title-item-1').outerWidth()); */

        $('#auth-content-item-0').css('display', 'none');
        $('#auth-content-item-1').css('display', 'block');
        $('.authentication-window__title-area-item_underline').css({
            'width': '45px',
            'left': '122px'
        });

        overlayOpacity.style.display = 'block';
        authenticationWindow.style.display = 'block';


    });

    $('body').on('click', '#span-reg', function() {

        /* let left = Math.round($('#auth-title-item-0').position().left),
            width = Math.round($('#auth-title-item-0').outerWidth()); */

        $('#auth-content-item-0').css('display', 'block');
        $('#auth-content-item-1').css('display', 'none');
        $('.authentication-window__title-area-item_underline').css({
            'width': '94px',
            'left': '0px'
        });

        overlayOpacity.style.display = 'block';
        authenticationWindow.style.display = 'block';


    });

    /*  */
    if (closeGeolocationWindow != null) {
        closeGeolocationWindow.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'none';
            geolocationWindow.style.display = 'none';
        });
    }
    if (closeSearchWindow != null) {
        closeSearchWindow.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'none';
            searchWindow.style.display = 'none';
        });
    }
    if (closeAuthenticationWindow != null) {
        closeAuthenticationWindow.addEventListener('click', function(event) {
            event.preventDefault();
            overlayOpacity.style.display = 'none';
            authenticationWindow.style.display = 'none';
        });
    }
    /*  */
    var authTitleItem0 = document.getElementById('auth-title-item-0');
    var authTitleItem1 = document.getElementById('auth-title-item-1');
    var authContentItem0 = document.getElementById('auth-content-item-0');
    var authContentItem1 = document.getElementById('auth-content-item-1');

    var titleUnderline = document.querySelector('.authentication-window__title-area-item_underline');


    authTitleItem0.addEventListener('click', function(event) {
        event.preventDefault();
        authContentItem0.style.display = 'block';
        authContentItem1.style.display = 'none';

        titleUnderline.style.left = authTitleItem0.offsetLeft + 'px';
        titleUnderline.style.width = authTitleItem0.offsetWidth + 'px';
    });
    authTitleItem1.addEventListener('click', function(event) {
        event.preventDefault();
        authContentItem0.style.display = 'none';
        authContentItem1.style.display = 'block';

        titleUnderline.style.left = authTitleItem1.offsetLeft + 'px';
        titleUnderline.style.width = authTitleItem1.offsetWidth + 'px';
    });

})();