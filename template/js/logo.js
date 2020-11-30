(function() {
    console.log(document.documentElement.clientWidth);
    if (document.documentElement.clientWidth < 576) {
        console.log(document.getElementById('logo').classList);
        document.getElementById('logo').classList.add('logo_mobile');
    } else {
        document.getElementById('logo').classList.remove('logo_mobile');
    };
})();