(function ($) {
    "use strict";

    function countdownActive($scope, $) {
        $('[data-countdown]').each(function () {

            var $this = $(this),
                finalDate = $(this).data('countdown');
            if (!$this.hasClass('countdown-full-format')) {
                $this.countdown(finalDate, function (event) {
                    $this.html(event.strftime('<div class="single"><p>Days</p><h1>%D</h1></div> <div class="single"><p>Hours</p><h1>%H</h1></div> <div class="single"><p>Minutes</p><h1>%M</h1></div> <div class="single"><p>SECONDS</p><h1>%S</h1></div>'));
                });
            } else {
                $this.countdown(finalDate, function (event) {
                    $this.html(event.strftime('<div class="single"><p>Years</p><h1>%Y</h1></div> <div class="single"><p>Months</p><h1>%m</h1></div> <div class="single"><p>Weeks</p><h1>%W</h1></div> <div class="single"><p>Days</p><h1>%d</h1></div> <div class="single"><p>Hours</p><h1>%H</h1></div> <div class="single"><p>Minutes</p><h1>%M</h1></div> <div class="single"><p>SECONDS</p><h1>%S</h1></div>'));
                });
            }
        });
    }
    function partnerActive($scope, $) {
        var slider = new Swiper(".partner-active", {
            loop: true,
            spaceBetween: 0,
            speed: 400,
            slidesPerView: 6,
            autoplay: {
                enabled: true,
                delay: 6000
            },
            breakpoints: {
                '1600': {
                    slidesPerView: 6,
                },
                '1200': {
                    slidesPerView: 4,
                },
                '992': {
                    slidesPerView: 4,
                },
                '768': {
                    slidesPerView: 3,
                },
                '576': {
                    slidesPerView: 2,
                },
                '0': {
                    slidesPerView: 2,
                },
            },
        });
    }
    function testimonialActive($scope, $) {
        var slider = new Swiper(".testimonial-slider", {
            loop: true,
            spaceBetween: 0,
            speed: 400,
            slidesPerView: 1,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                enabled: true,
                delay: 6000
            },
            breakpoints: {
                '1600': {
                    slidesPerView: 1,
                },
                '768': {
                    slidesPerView: 1,
                },
                '576': {
                    slidesPerView: 1,
                },
                '0': {
                    slidesPerView: 1,
                },
            },
        });
    }
    function partnerActiveTwo($scope, $) {
        var slider = new Swiper(".partner-slider-two", {
            loop: true,
            spaceBetween: 20,
            speed: 400,
            slidesPerView: 9,
            autoplay: {
                enabled: true,
                delay: 6000
            },
            breakpoints: {
                '1600': {
                    slidesPerView: 9,
                },
                '1200': {
                    slidesPerView: 7,
                },
                '992': {
                    slidesPerView: 6,
                },
                '768': {
                    slidesPerView: 5,
                },
                '576': {
                    slidesPerView: 4,
                },
                '0': {
                    slidesPerView: 3,
                },
            },
        });
    }
    function xboActive($scope, $) {
        if ($(".xbo").length) {
            $('.xbo').appear();
            $(document.body).on('appear', '.xbo', function (e) {
                var odo = $(".xbo");
                odo.each(function () {
                    var countNumber = $(this).attr("data-count");
                    $(this).html(countNumber);
                });
                window.xboOptions = {
                    format: 'd',
                };
            });
        }
    }
    function testimonialActiveTwo($scope, $) {
        var slider = new Swiper(".xb-testimonial-slider", {
            loop: true,
            spaceBetween: 0,
            speed: 400,
            slidesPerView: 1,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                enabled: true,
                delay: 6000
            },
            breakpoints: {
                '1600': {
                    slidesPerView: 1,
                },
                '768': {
                    slidesPerView: 1,
                },
                '576': {
                    slidesPerView: 1,
                },
                '0': {
                    slidesPerView: 1,
                },
            },
        });
    }

    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/int-countdown.default', countdownActive)
            elementorFrontend.hooks.addAction('frontend/element_ready/int-brand.default', partnerActive)
            elementorFrontend.hooks.addAction('frontend/element_ready/int-testimonial.default', testimonialActive)
            elementorFrontend.hooks.addAction('frontend/element_ready/int-brand-v2.default', partnerActiveTwo)
            elementorFrontend.hooks.addAction('frontend/element_ready/int-funfact.default', xboActive)
            elementorFrontend.hooks.addAction('frontend/element_ready/int-testimonial-v2.default', testimonialActiveTwo)
        }
    });

})(jQuery);