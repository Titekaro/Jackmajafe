$(document).ready(function () {
    let date = {
        el: $('.date-item'),
        bullet: '',
        group: '',
    };

    let activeDateGroup;
    let i = 0;

    /**
     * Sort my array of dates chronologically.
     */

    /**
     * Returns an array with arrays of the given size.
     *
     * @param myArray {Array} Array to split
     * @param chunkSize {Integer} Size of each group
     */
    let chunkArray = function (myArray, chunkSize) {
        let results = [];

        while (myArray.length) {
            results.push(myArray.splice(0, chunkSize));
        }
        return results;
    };

    /**
     * Split an array into groups of dates.
     * Create a wrapper for each group of dates.
     * Then add the bullet controls.
     * The number of bullets depends on the number of group of dates.
     *
     */
    if (date.el) {
        let dateGroups = chunkArray(date.el, 5);
        let bulletAmount = dateGroups.length;

        for (let i = 0; i < dateGroups.length; i++) {
            $(dateGroups[i]).wrapAll('<div class="date-group"></div>');
        }

        $('<ol class="date-nav bullet-nav"></ol>').insertAfter('.tour-content__dates');

        for (let i = 0; i < bulletAmount; i++) {
            $('.date-nav').append('<li class="date-nav__bullet bullet-nav__item"><a class="bullet"></a></li>');
        }

        date.group = $('.date-group');
        date.bullet = $('.date-nav__bullet');
        activeDateGroup = date.group.eq(i).addClass('active');
    }

    let toggleActive = function () {
        if (date.group.hasClass('active')) {
            date.group.removeClass('active');
        }
        activeDateGroup.addClass("active");

        if (date.bullet.hasClass('active')) {
            date.bullet.removeClass('active');
        }
        date.bullet.eq(i).addClass('active');
    };

    /**
     * Add an event listener on the bullet nav.
     */
    date.bullet.on('click', function () {
        // Define the id of the dates to show, corresponding to the id of the clicked bullet.
        i = $(this).index();
        activeDateGroup = date.group.eq(i);
        toggleActive();
    });

});