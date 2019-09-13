$(document).ready(function() {
    $('.slider-stocks').slick({
        dots: ($('.slider-stocks').attr('data-dots') == 'true') ? true : false,
        arrows: ($('.slider-stocks').attr('data-arrows') == 'true') ? true : false,
        autoplay: ($('.slider-stocks').attr('data-autoplay') == 'true') ? true : false,
        autoplaySpeed:$('.slider-stocks').attr('data-speed'),
        appendDots: $('.slider-stock-dots'),
        prevArrow: '<button type="button" class="slide-prev slick-prev"></button>',
        nextArrow: '<button type="button" class="slide-next slick-next"></button>',
        adaptiveHeight: true,
        responsive:[
            {
                breakpoint: 992,
                settings: {
                    arrows: false
                }
            }
        ]
    });
});