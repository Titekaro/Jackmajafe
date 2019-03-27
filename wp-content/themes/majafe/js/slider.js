$(document).ready(function () {
    let sliderInterval;
    let slide = $('.slide');
    let control = {
        next: $('.slide-control-next'),
        prev: $('.slide-control-prev')
    };
    let bullet = $('.slide-nav__bullet');

    /**
     * Initialize current slide to first.
     * @type {number}
     */
    let i = 0;
    let activeSlide = slide.eq(i).addClass('active');
    bullet.eq(i).addClass('current');
    /**
     *
     */
    let toggleActive = function () {
        if (slide.hasClass('active')) {
            slide.removeClass('active');
        }
        activeSlide.addClass("active");

        if (bullet.hasClass('current')) {
            bullet.removeClass('current');
        }
        bullet.eq(i).addClass('current');
    };
    /**
     * Active the next slide.
     */
    let autoLoop = function () {
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
    let autoPlay = function () {
        sliderInterval = setInterval(autoLoop, 6000);
    };
    autoPlay();
    /**
     * Pass to the next slide when we click to the next btn.
     */
    control.next.on('click', function() {
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
    control.prev.on('click', function() {
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
    bullet.on('click', function() {
        // Define the id of the slide to show, corresponding to the id of the clicked bullet.
        i = $(this).index();
        activeSlide = slide.eq(i);
        toggleActive();
        clearInterval(sliderInterval);
        autoPlay();
    })

});