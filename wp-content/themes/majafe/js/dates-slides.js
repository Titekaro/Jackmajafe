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
    var activeEventGroup = event.group.eq(i);
    activeEventGroup.addClass('active');
    event.bullet.eq(i).addClass('active');

    /**
     * This function will display the targeted slide via a transition animation.
     */
    var displayActiveSlide = function () {
        eventGroupWidth = event.group.outerWidth();

        event.groupList.css({
            "transform": "translateX(-" + eventGroupWidth * i + "px)",
            "-webkit-transform": "translateX(-" + eventGroupWidth * i + "px)",
            "transition": "transform .6s ease-in-out",
            "-webkit-transition": "transform .6s ease-in-out"
        });

    };
    displayActiveSlide();

    $(window).on('resize', function () {
        displayActiveSlide();
    });

    var toggleActive = function () {
        activeEventGroup = event.group.eq(i);

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
     * Define the id of the dates to show, corresponding to the id of the clicked bullet.
     */
    event.bullet.on('click', function () {
        i = $(this).index();
        displayActiveSlide();
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

                displayActiveSlide();
                toggleActive();

            } else {
                /* right swipe */
                i = $(this).index();

                if (i === 0) {
                    i = event.group.length - 1;
                } else {
                    i = i - 1;
                }

                displayActiveSlide();
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

    /**
     * This function will target the first event group that has not only past dates.
     * To display it as the first active slide.
     */
    if (event.groupList) {
        event.group.each(function () {
            var el = $(this).find('.events-list');

            if (el) {
                var dateEl = el.find('.event__item');
                var pastEl = el.find('.event__item.event__item--past');

                if (dateEl.length !== pastEl.length) {
                    i = $(this).index();
                    displayActiveSlide();
                    toggleActive();
                    return false;
                } else {
                    i = $(this).index();
                    displayActiveSlide();
                    toggleActive();
                }
            }

        });
    }

});