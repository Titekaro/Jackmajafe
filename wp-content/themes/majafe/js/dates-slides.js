$(document).ready(function () {
    let event = {
        bullet: $('.event-nav__bullet'),
        groupList: $('.events-group-list'),
        group: $('.events-group__item')
    };
    let eventGroupWidth;
    /**
     * Initialize current dateGroup to first.
     * @type {number}
     */
    let i = 0;
    let activeEventGroup = event.group.eq(i).addClass('active');
    event.bullet.eq(i).addClass('active');

    let slideWidth = function () {
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

    let toggleActive = function () {
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

});