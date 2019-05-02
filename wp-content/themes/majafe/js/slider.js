$(document).ready(function () {
    var scrollDownEl = $('.scroll-down');
    var sliderInterval;
    var slide = $('.slide');
    var sliderControl = {
        next: $('.slider-container .slide-control-next'),
        prev: $('.slider-container .slide-control-prev')
    };
    var bullet = $('.slide-nav__bullet');
    /**
     * Initialize current slide to first.
     * @type {number}
     */
    var i = 0;
    var activeSlide = slide.eq(i).addClass('active');
    bullet.eq(i).addClass('active');
    /**
     *
     */
    var toggleActive = function () {
        if (slide.hasClass('active')) {
            slide.removeClass('active');
        }
        activeSlide.addClass("active");

        if (bullet.hasClass('active')) {
            bullet.removeClass('active');
        }
        bullet.eq(i).addClass('active');
    };
    /**
     * Active the next slide.
     */
    var autoLoop = function () {
        if (i < slide.length - 1) {
            i = i + 1;
        }
        else if (i === slide.length - 1) {
            i = 0;
        }
        activeSlide = slide.eq(i);
        toggleActive();
    };
    /**
     * Set the autoplay of the slider.
     */
    var autoPlay = function () {
        sliderInterval = setInterval(autoLoop, 6000);
    };
    autoPlay();
    /**
     * Pass to the next slide when we click to the next btn.
     */
    sliderControl.next.on('click', function () {
        if (i === slide.length - 1) {
            i = 0;
        } else {
            i = i + 1;
        }
        activeSlide = slide.eq(i);
        toggleActive();
        clearInterval(sliderInterval);
        autoPlay();
    });
    /**
     * Pass to the preview slide when we click to the prev btn.
     */
    sliderControl.prev.on('click', function () {
        if (i === 0) {
            i = slide.length - 1;
        } else {
            i = i - 1;
        }
        activeSlide = slide.eq(i);
        toggleActive();
        clearInterval(sliderInterval);
        autoPlay();
    });
    /**
     * Add an event listener on the bullet nav.
     */
    bullet.on('click', function () {
        // Define the id of the slide to show, corresponding to the id of the clicked bullet.
        i = $(this).index();
        activeSlide = slide.eq(i);
        toggleActive();
        clearInterval(sliderInterval);
        autoPlay();
    });

    var toggleScrollDown = function () {
        if ($(window).scrollTop() > 10) {
            scrollDownEl.addClass('remove');
        } else {
            scrollDownEl.removeClass('remove')
        }
    };

    $(window).on('scroll', function () {
        toggleScrollDown();
    })

});