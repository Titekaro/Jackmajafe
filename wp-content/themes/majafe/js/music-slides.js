$(document).ready(function () {
    var musicCover = $('.music-content__items .music__item');
    var musicControl = {
        next: $('.music-content__items .slide-control-next'),
        prev: $('.music-content__items .slide-control-prev')
    };
    /**
     * Initialize current slide to first.
     * @type {number}
     */
    var i = 0;
    var activeCover = musicCover.eq(i).addClass('active');
    /**
     *
     */
    var toggleActive = function () {
        if (musicCover.hasClass('active')) {
            musicCover.removeClass('active');
        }
        activeCover.addClass("active");
    };
    /**
     * Pass to the next slide when we click to the next btn.
     */
    musicControl.next.on('click', function () {
        if (i === musicCover.length - 1) {
            i = 0;
        } else {
            i = i + 1;
        }
        activeCover = musicCover.eq(i);
        toggleActive();
    });
    /**
     * Pass to the preview slide when we click to the prev btn.
     */
    musicControl.prev.on('click', function () {
        if (i === 0) {
            i = musicCover.length - 1;
        } else {
            i = i - 1;
        }
        activeCover = musicCover.eq(i);
        toggleActive();
    });
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

                if (i === musicCover.length - 1) {
                    i = 0;
                } else {
                    i = i + 1;
                }
                activeCover = musicCover.eq(i);
                toggleActive();

            } else {
                /* right swipe */
                i = $(this).index();

                if (i === 0) {
                    i = musicCover.length - 1;
                } else {
                    i = i - 1;
                }
                activeCover = musicCover.eq(i);
                toggleActive();
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

    musicCover.bind('touchstart', handleTouchStart);
    musicCover.bind('touchmove', handleTouchMove);

});