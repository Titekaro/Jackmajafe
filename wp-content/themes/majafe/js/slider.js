$(document).ready(function () {
    var scrollDownEl = $('.scroll-down');
    var sliderInterval;
    var slide = {
        el: $('.slide'),
        active: $('.slide.active')
    };
    var sliderControl = {
        next: $('.slider-container .slide-control-next'),
        prev: $('.slider-container .slide-control-prev')
    };
    var bullet = $('.slide-nav__bullet');
    var videoEl;
    var autoPlay;
    /**
     * Initialize current slide to first.
     * @type {number}
     */
    var i = 0;
    var activeSlide = slide.el.eq(i).addClass('active');
    bullet.eq(i).addClass('active');

    /**
     * Toggle an 'active' class on bullets and slides
     */
    var toggleActive = function () {
        activeSlide = slide.el.eq(i);

        if (slide.el.hasClass('active')) {
            slide.el.removeClass('active');
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
        if (i < slide.el.length - 1) {
            i = i + 1;
        }
        else if (i === slide.el.length - 1) {
            i = 0;
        }
        toggleActive();
        detectVideo();
    };
    /**
     * Stop video
     */
    var stopVideo = function () {
        videoEl = $('.slide video');

        if(videoEl.length) {
            videoEl.off();
            videoEl[0].pause();
            videoEl[0].currentTime = 0;
        }
    };
    /**
     * Manage the slider loop control if it contains video.
     */
    var detectVideo = function () {
        stopVideo();
        activeSlide = slide.el.eq(i);
        videoEl = activeSlide.children('video');

        if (videoEl.length)  {
            videoEl[0].currentTime = 0;
            videoEl[0].play();

            videoEl.on('ended', function () {
                autoLoop();
                $(this).off();
            });
        } else {
            autoPlay = setTimeout(autoLoop, 6000);
        }
    };
    detectVideo();
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

                if (i === slide.el.length - 1) {
                    i = 0;
                } else {
                    i = i + 1;
                }
                clearTimeout(autoPlay);
                toggleActive();
                detectVideo();

            } else {
                /* right swipe */
                i = $(this).index();

                if (i === 0) {
                    i = slide.el.length - 1;
                } else {
                    i = i - 1;
                }
                clearTimeout(autoPlay);
                toggleActive();
                detectVideo();
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
    slide.el.bind('touchstart', handleTouchStart);
    slide.el.bind('touchmove', handleTouchMove);
    /**
     * Pass to the next slide when we click to the next btn.
     */
    sliderControl.next.on('click', function (e) {
        e.stopPropagation();
        if (i === slide.el.length - 1) {
            i = 0;
        } else {
            i = i + 1;
        }
        clearTimeout(autoPlay);
        toggleActive();
        detectVideo();
    });
    /**
     * Pass to the preview slide when we click to the prev btn.
     */
    sliderControl.prev.on('click', function (e) {
        e.stopPropagation();
        if (i === 0) {
            i = slide.el.length - 1;
        } else {
            i = i - 1;
        }
        clearTimeout(autoPlay);
        toggleActive();
        detectVideo();
    });
    /**
     * Add an event listener on the bullet nav.
     */
    bullet.on('click', function (e) {
        e.stopPropagation();
        // Define the id of the slide to show, corresponding to the id of the clicked bullet.
        i = $(this).index();
        clearTimeout(autoPlay);
        toggleActive();
        detectVideo();
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