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
     * Set up a vanilla swipe detection
     */
    var xDown = null;
    var yDown = null;
    /**
     * Initialize the touch gesture recognition
     * @returns {Touch[] | TouchList}
     */
    var getTouches = function(e) {
        return e.touches ||             // browser API
            e.originalEvent.touches; // jQuery
    };
    /**
     * Get the first touch coords
     */
    var handleTouchStart = function(e) {
        const firstTouch = getTouches(e)[0];
        xDown = firstTouch.clientX;
        yDown = firstTouch.clientY;
    };
    /**
     *
     */
    var handleTouchMove = function(e) {

        if (!xDown || !yDown) {
            return;
        }

        var xUp = e.touches[0].clientX;
        var yUp = e.touches[0].clientY;
        var xDiff = xDown - xUp;
        var yDiff = yDown - yUp;

        if (Math.abs(xDiff) > Math.abs( yDiff )) {
            if (xDiff > 0) {
                /* left swipe */
                i = $(this).index();

                if (i === slide.length - 1) {
                    i = 0;
                } else {
                    i = i + 1;
                }
                activeSlide = slide.eq(i);
                toggleActive();
                clearInterval(sliderInterval);
                autoPlay();

            } else {
                /* right swipe */
                i = $(this).index();

                if (i === 0) {
                    i = slide.length - 1;
                } else {
                    i = i - 1;
                }
                activeSlide = slide.eq(i);
                toggleActive();
                clearInterval(sliderInterval);
                autoPlay();
            }
        } else {
            if ( yDiff > 0 ) {
                /* up swipe */
                return;
            } else {
                /* down swipe */
                return;
            }
        }
        /* reset values */
        xDown = null;
        yDown = null;
    };
    /**
     * Bind the touch events on slides
     */
    slide.bind('touchstart', handleTouchStart);
    slide.bind('touchmove', handleTouchMove);
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