$(function () {
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 10) {
            $('.navigation-wrap').addClass('scroll-on');
        }
        else {
            $('.navigation-wrap').removeClass('scroll-on');
        }
    })
});

$(function(){
    $('.navbar-toggler').on('click', function(){
        $('.navigation-wrap').addClass('scroll-on');
    })
});

$('.nav-link').on('click', function () {
    $('.navbar-collapse').collapse('hide');
});

//Animaciones
AOS.init({
    //disable: 'mobile'
});