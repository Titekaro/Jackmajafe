$(document).ready(function () {

    let video = {
        el: $('.video-block-item'),
        wrapper: $('.video-content__gallery')
    };

    // Mouse states
    video.el.hover(
        function () {
            $(this).find('.thumb-hover').css('display', 'block');
        },
        function () {
            $(this).find('.thumb-hover').css('display', 'none');
        }
    );


    /**
     * Initialise the magnific popup plugin
     */
    video.el.each(function () {
       $(this).magnificPopup({
           delegate: 'a',
           type:'iframe',
           iframe: {
               markup: '<div class="mfp-iframe-scaler">'+
                   '<div class="mfp-close"></div>'+
                   '<iframe class="mfp-iframe" frameborder="0" wmode=transparent” allowfullscreen></iframe>'+
                   '<div class="mfp-bottom-bar">'+
                   '<div class="mfp-title"></div>'+
                   '<div class="mfp-counter"></div>'+
                   '</div>' +
                   '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
           },
           srcAction: 'iframe_src'
       });
    });

});