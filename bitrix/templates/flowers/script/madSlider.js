﻿(function ($) {

    $.fn.lbSlider = function (options) {
        var options = $.extend({
            leftBtn: 'leftBtn',
            rightBtn: 'rightBtn',
            quantity: 1,
            autoPlay: false,  // true or false
            autoPlayDelay: 10  // delay in seconds
        }, options);

        var make = function () {
            $(this).css('overflow', 'hidden');
            var el = $(this).children('ul');
            el.css({
                position: 'relative',
                left: '0'
            });

            var sliderFirst = el.children('li').slice(0, options.quantity);
            var tmp = '';
            sliderFirst.each(function () {
                tmp = tmp + '<li>' + $(this).html() + '</li>';
            });
            sliderFirst = tmp;
            var sliderLast = el.children('li').slice(-options.quantity);
            tmp = '';
            sliderLast.each(function () {
                tmp = tmp + '<li>' + $(this).html() + '</li>';
            });
            sliderLast = tmp;

            var elRealQuant = el.children('li').length;
            el.append(sliderFirst);
            el.prepend(sliderLast);
            var elWidth = el.width() / options.quantity;
            el.children('li').css({
                float: 'left',
                width: elWidth
            });
            var elQuant = el.children('li').length;
            el.width(elWidth * elQuant);
            el.css('left', '-' + elWidth * options.quantity + 'px');

            function disableButtons() { $('.' + options.leftBtn + ', .' + options.rightBtn).addClass('inactive'); }
            function enableButtons() { $('.' + options.leftBtn + ', .' + options.rightBtn).removeClass('inactive'); }

            $('.' + options.leftBtn).click(function (event) {
                event.preventDefault();
                if (!$(this).hasClass('inactive')) {
                    disableButtons();
                    el.animate({ left: '+=' + elWidth + 'px' }, 300,
                        function () {
                            if ($(this).css('left') == '0px') { $(this).css('left', '-' + elWidth * elRealQuant + 'px'); }
                            enableButtons();
                        }
                    );
                }
                return false;
            });

            $('.' + options.rightBtn).click(function (event) {
                event.preventDefault();
                if (!$(this).hasClass('inactive')) {
                    disableButtons();
                    el.animate({ left: '-=' + elWidth + 'px' }, 300,
                        function () {
                            if ($(this).css('left') == '-' + (elWidth * (options.quantity + elRealQuant)) + 'px') { $(this).css('left', '-' + elWidth * options.quantity + 'px'); }
                            enableButtons();
                        }
                    );
                }
                return false;
            });

            if (options.autoPlay) {
                function aPlay() {
                    $('.' + options.rightBtn).click();
                    delId = setTimeout(aPlay, options.autoPlayDelay * 1000);
                }
                var delId = setTimeout(aPlay, options.autoPlayDelay * 1000);
                el.hover(
                    function () {
                        clearTimeout(delId);
                    },
                    function () {
                        delId = setTimeout(aPlay, options.autoPlayDelay * 1000);
                    }
                );
            }
        };
        return this.each(make);
    };

})(jQuery);