jQuery(document).ready(function ($) {
    // Toggle voor mobiel
    $('.js-toggle-mobile').click(function () {
        $(this).toggleClass('active');
        $('.menuBox').toggleClass('open');
        $('#headerCntr').toggleClass('active');
    });

    // Sticky header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 5) {
            $('#headerCntr').addClass('sticky');
        } else {
            $('#headerCntr').removeClass('sticky');
        }
    });

    // Voeg class toe bij klikken op zoekveld
    $('.js-search-field').click(function () {
        $('.searchBox').addClass('open');
    });

    // Verwijder class bij sluiten van zoekveld
    $('.js-close-search').click(function () {
        $('.searchBox').removeClass('open');
    });

    // Js-footer-toggle
    $('.js-footer-toggle').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).next('.hidden-menu').slideToggle();
    });

    $('.gform_wrapper input').each(function () {
        $(this).on('focus', function () {
            $(this).parent().parent('.gfield').addClass('active');
        });

        $(this).on('blur', function () {
            if ($(this).val().length == 0) {
                $(this).parent().parent('.gfield').removeClass('active');
            }
        });

        if ($(this).val() != '') $(this).parent('.css').addClass('active');
    });

    $('.gform_wrapper textarea').each(function () {
        $(this).on('focus', function () {
            $(this).parent().parent('.gfield').addClass('active');
        });

        $(this).on('blur', function () {
            if ($(this).val().length == 0) {
                $(this).parent().parent('.gfield').removeClass('active');
            }
        });

        if ($(this).val() != '') $(this).parent('.css').addClass('active');
    });
});

document.querySelectorAll('.schema-faq-question').forEach(function (question) {
    question.addEventListener('click', function () {
        const answer = this.nextElementSibling;

        this.classList.toggle('faq-q-open');

        if (answer.style.height) {
            answer.style.height = null;
        } else {
            answer.style.height = answer.scrollHeight + "px";
        }
    });
});

jQuery(document).ready(function($) {
    $('.open-ninja-form').click(function(e) {
        e.preventDefault();
        
        $('#ninja-form-popup').fadeIn(300);

        $('body').append('<div id="popup-overlay"></div>');
        $('#popup-overlay').css({
            'position': 'fixed',
            'top': 0,
            'left': 0,
            'width': '100%',
            'height': '100%',
            'background': 'rgba(0,0,0,0.6)',
            'z-index': 9998
        }).click(function() {
            $('#ninja-form-popup').fadeOut(300);
            $(this).remove();
        });
    });

    $(document).on('click', '#close-popup', function() {
        $('#ninja-form-popup').fadeOut(300);
        $('#popup-overlay').remove();
    });
});
