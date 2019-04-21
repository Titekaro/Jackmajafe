$(document).ready(function () {
    let nav = $('.navbar');
    let menu = {
        el: $('.navbar-menu'),
        list: $('.menu-list'),
        item: $('.menu__item'),
        btn: $('.navbar-toggle'),
        isOpen: false
    };

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

    $(window).on('scroll', function () {
        stickNav();
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