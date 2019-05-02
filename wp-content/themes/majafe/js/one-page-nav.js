$(document).ready(function () {
    var root = $('html, body');
    var menu = {
        item: $('.menu__item')
    };
    var section = $('.section');
    /**
     * This variable is used to differenciate a scroll event from a scrollTop,
     * and kill the targetSection call when we use a scrollTop.
     * Used in targetSection function and in scrollToSection function.
     * @type {boolean}
     */
    var isAutoScrolling = false;
    /**
     * Initialize first selected menu item.
     * But detect if we're not targetting a specific section in the url when refreshing it.
     */
    if (window.location.hash) {
        var target = window.location.hash;
        menu.item.find('a[href="' + target + '"]').parent().addClass('current');
    } else {
        menu.item.first().addClass('current');
    }

    /**
     * Manage the targeted section when we're scrolling the html page:
     * When we come into a section, the corresponding menu link is targeted as 'current'.
     * This function is called when we scroll the page.
     */
    var targetSection = function () {
        if (!isAutoScrolling) {
            section.each(function () {
                var currentScroll = $(window).scrollTop();
                var sectionPosition = $(this).position().top;

                if (sectionPosition <= currentScroll) {
                    var id = $(this).attr('id');
                    var activeLink = menu.item.find('a[href="#' + id + '"]');
                    if (menu.item.hasClass('current')) {
                        menu.item.removeClass('current');
                    }
                    activeLink.parent().addClass('current');
                }
            });
        }
    };

    /**
     * Manage the behavior of the jump to a section of the html page:
     * We animate the page to let it smooth scroll to the selected section.
     * This function is called when we click on a menu link.
     */
    var scrollToSection = function (selectedSection) {
        var theSection = selectedSection.find('a').attr('href');

        if (isAutoScrolling) {
            root.stop().animate({
                scrollTop: $(theSection).position().top
            }, 1000, function () {
                isAutoScrolling = false;
                window.location.hash = theSection;
            });
        }

    };

    $(window).on('scroll', function () {
        targetSection();
    });

    /**
     * Add a listener to the menu items to scroll to the item selected when we click on a menu link.
     */
    menu.item.on('click', function () {
        isAutoScrolling = true;
        if (menu.item.hasClass('current')) {
            menu.item.removeClass('current');
        }
        $(this).addClass('current');
        scrollToSection($(this));
    });

    /**
     * Add a listener on every link that has a hash, to target not only menu links.
     */
    $('a[href^="#"]').on('click', function (event) {
        event.preventDefault();
        isAutoScrolling = true;

        var theSection = $(this).attr('href');

        if (isAutoScrolling) {
            root.stop().animate({
                scrollTop: $(theSection).position().top
            }, 1000, function () {
                isAutoScrolling = false;
                window.location.hash = theSection;
            });
            menu.item.find('a[href="' + theSection + '"]').parent().addClass('current');
        }

    });
});