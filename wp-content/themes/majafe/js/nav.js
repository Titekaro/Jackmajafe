$(document).ready(function () {
    let nav = $('.navbar');
    let menu = {
        el: $('.navbar-menu'),
        list: $('.menu-list'),
        item: $('.menu__item'),
        btn: $('.navbar-toggle'),
        isOpen: false
    };
    let section = $('.section');
    /**
     * This variable is used to differenciate a scroll event from a scrollTop,
     * and kill the targetSection call when we use a scrollTop.
     * Used in targetSection function and in scrollToSection function.
     * @type {boolean}
     */
    let isAutoScrolling = false;
    /**
     * Initialize first selected menu item.
     */
    menu.item.first().addClass('current');
    /**
     * Manage the navbar position when scrolling:
     * Let it stick the top of the page if we're not at the top of the page.
     * This function is called when we scroll the page.
     */
    let stickNav = function () {
        if ($(window).scrollTop() === 0) {
            nav.removeClass('navbar--fixed');
        } else {
            nav.addClass('navbar--fixed');
        }
    };
    stickNav();
    /**
     * Manage the targeted section when we're scrolling the html page:
     * When we come into a section, the corresponding menu link is targeted as 'current'.
     * This function is called when we scroll the page.
     */
    let targetSection = function () {
        if (!isAutoScrolling) {
            section.each(function () {
                let currentScroll = $(window).scrollTop();
                let sectionPosition = $(this).offset().top;

                if (sectionPosition < currentScroll) {
                    let id = $(this).attr('id');
                    let activeLink = $('[href$="#' + id + '"]');

                    menu.list.children().removeClass('current');
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
    let scrollToSection = function (selectedSection) {
        let theSection = selectedSection.find('a').attr('href');

        if (isAutoScrolling) {
            $('html, body').animate({
                scrollTop: $(theSection).offset().top + 1
            }, 1000, function () {
                isAutoScrolling = false;
            });
        }

    };
    $(window).on('scroll', function () {
        stickNav();
        targetSection();
    });

    /**
     * Add a listener to the menu items to target the current item selected when we click on a menu link.
     */
    menu.item.on('click', function (event) {
        event.preventDefault();
        isAutoScrolling = true;
        menu.list.children().removeClass('current');
        $(this).addClass('current');
        scrollToSection($(this));
    });

    /**
     * This function will toggle a class to show/hide the menu on small screen view.
     * This function is called when we click on the menu btn.
     */
    let toggleMenu = function toggleMenu() {
        if (!menu.isOpen) {
            menu.isOpen = true;
            menu.btn.addClass('active');
            menu.el.addClass('toggle');
            nav.addClass('open');

        } else {
            menu.isOpen = false;
            menu.btn.removeClass('active');
            menu.el.removeClass('toggle');
            nav.removeClass('open');
        }
    };
    menu.btn.on('click', function (event) {
        event.preventDefault();
        toggleMenu();
    });

    /**
     * Clean the toggle class on window resize.
     * This function is called when we resize the window.
     */
    let checkSize = function checkSize() {
        if ($(window).innerWidth() >= 1024) {
            if (menu.isOpen) {
                menu.isOpen = false;
                menu.btn.removeClass('active');
                menu.el.removeClass('toggle');
                nav.removeClass('open');
            }
        }
    };
    $(window).on('resize', function () {
        checkSize();
    });

});