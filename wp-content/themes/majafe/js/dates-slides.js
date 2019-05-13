$(document).ready(function () {
    var event = {
        bullet: $('.event-nav__bullet'),
        groupList: $('.events-group-list'),
        group: $('.events-group__item')
    };
    var eventGroupWidth;
    /**
     * Initialize current dateGroup to first.
     * @type {number}
     */
    var i = 0;
    var activeEventGroup = event.group.eq(i).addClass('active');
    event.bullet.eq(i).addClass('active');

    var slideWidth = function () {
        eventGroupWidth = event.group.outerWidth();

        event.groupList.css({
            "transform": "translateX(-" + eventGroupWidth * i + "px)",
            "-webkit-transform": "translateX(-" + eventGroupWidth * i + "px)",
            "transition": "none",
            "-webkit-transition": "none"
        });

    };
    slideWidth();

    $(window).on('resize', function () {
        slideWidth();
    });

    var toggleActive = function () {
        if (event.bullet.hasClass('active')) {
            event.bullet.removeClass('active');
        }
        event.bullet.eq(i).addClass('active');

        if (event.group.hasClass('active')) {
            event.group.removeClass('active');
        }
        activeEventGroup.addClass('active');
    };

    /**
     * Add an event listener on the bullet nav.
     */
    event.bullet.on('click', function () {
        // Define the id of the dates to show, corresponding to the id of the clicked bullet.
        i = $(this).index();
        activeEventGroup = event.group.eq(i);
        event.groupList.css({
            "transform": "translateX(-" + eventGroupWidth * i + "px)",
            "-webkit-transform": "translateX(-" + eventGroupWidth * i + "px)",
            "transition": "transform .6s ease-in-out",
            "-webkit-transition": "transform .6s ease-in-out"
        });
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

                if (i === event.group.length - 1) {
                    i = 0;
                } else {
                    i = i + 1;
                }

                activeEventGroup = event.group.eq(i);
                event.groupList.css({
                    "transform": "translateX(-" + eventGroupWidth * i + "px)",
                    "-webkit-transform": "translateX(-" + eventGroupWidth * i + "px)",
                    "transition": "transform .6s ease-in-out",
                    "-webkit-transition": "transform .6s ease-in-out"
                });
                toggleActive();

            } else {
                /* right swipe */
                i = $(this).index();

                if (i === 0) {
                    i = event.group.length - 1;
                } else {
                    i = i - 1;
                }

                activeEventGroup = event.group.eq(i);
                event.groupList.css({
                    "transform": "translateX(-" + eventGroupWidth * i + "px)",
                    "-webkit-transform": "translateX(-" + eventGroupWidth * i + "px)",
                    "transition": "transform .6s ease-in-out",
                    "-webkit-transition": "transform .6s ease-in-out"
                });
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

    event.group.bind('touchstart', handleTouchStart);
    event.group.bind('touchmove', handleTouchMove);
});