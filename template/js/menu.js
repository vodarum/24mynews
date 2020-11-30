$('body').on('click', '#toggle-menu', function(e) {
    $('#nav-menu').toggleClass('is-open');
});

window.onscroll = function() {
    if (document.body.scrollTop > document.getElementById('header').offsetHeight) {
        document.getElementById('nav-menu').classList.add('fixed');
    } else {
        document.getElementById('nav-menu').classList.remove('fixed');
    }
}

/* (function() {
    var button = document.getElementById('toggle-menu');
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var menu = document.getElementById('nav-menu');
        menu.classList.toggle('is-open');
    });
})(); */