var $ = jQuery;

// SVG file to SVG code convert JS Start
function img2svg() {
    jQuery('.in-svg').each(function(i, e) {
        var $img = jQuery(e);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');
            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', ' ' + imgClass + ' replaced-svg');
            }
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');
            // Replace image with new SVG
            $img.replaceWith($svg);
        }, 'xml');
    });
}
img2svg();
// SVG file to SVG code convert JS End

// Menu Toggle JS
jQuery(document).ready(function() {
    jQuery(".toggle__menu").click(function() {
        jQuery(".header__menu").slideToggle();
        jQuery(".toggle__menu").toggleClass("open");
        jQuery("body").toggleClass("menu-open");
    });
});
var swiperPartner = new Swiper(".vx__popular--slider", {
    spaceBetween: 30,
    slidesPerView: 4,
    navigation: {
        nextEl: ".swiper-next",
        prevEl: ".swiper-prev",
    },
    breakpoints: {
        315: {
            slidesPerView: 1
        },
        414: {
            slidesPerView: 2
        },
        767: {
            slidesPerView: 3
        },
        992: {
            slidesPerView: 4
        }
    }
});
// Menu Toggle JS
// AOS JS Start
AOS.init();
// AOS JS End

// Number Counter
var counted = 0;
$(window).scroll(function() {

    var oTop = $('.vx__countsection').offset().top - window.innerHeight;
    if (counted == 0 && $(window).scrollTop() > oTop) {
        $('.counter').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                    countNum: countTo
                },

                {

                    duration: 1500,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
        });
        counted = 1;
    }

});
// Number Counter

// What Our Clients Say About Us Slider Start JS
var swiper = new Swiper('.swiper-our-clients', {
    pagination: '.swiper-pagination',
    slidesPerView: 2,
    centeredSlides: true,
    paginationClickable: true,
    loop: true,
    spaceBetween: 30,
    slideToClickedSlide: true,
    navigation: {
        nextEl: ".vx__swiper-prev",
        prevEl: ".vx__swiper-next"
    },
});
// What Our Clients Say About Us Slider End JS
// What Our Clients Say About Us Slider End JS
var swiper = new Swiper(".partner-slider", {
    slidesPerView: 7,
    spaceBetween: 25,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        1199: {
            slidesPerView: 7
        },
        767: {
            slidesPerView: 5
        },
        414: {
            slidesPerView: 3
        },
        315: {
            slidesPerView: 2
        },
        100: {
            slidesPerView: 1
        }
    }
});
AOS.init();
AOS.init({
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 1000, // values from 0 to 3000, with step 50ms
});

// Video Toggle JS
$(document).ready(function() {
    $('body').on('click', '.vx__play-button', function() {
        if ($(this).attr('data-click') == 1) {
            $(this).attr('data-click', 0)
            $('.bf__video')[0].pause();
        } else {
            $(this).attr('data-click', 1)
            $('.bf__video')[0].play();
        }
    });
});
// Video Toggle JS
// Modal Popup JS
jQuery(document).ready(function() {
    jQuery(".open-modal").click(function() {
        jQuery("body").addClass("popup-open");
    });
    jQuery(".close__modal").click(function() {
        jQuery("body").removeClass("popup-open");
    });
    // Dropdown Start JS
    $(".drop-down .selected a").click(function() {
        $(".drop-down .options ul").toggle();
    });

    //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
    $(".drop-down .options ul li a").click(function() {
        var text = $(this).html();
        $(".drop-down .selected a span").html(text);
        $(".drop-down .options ul").hide();
    });
    //HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("drop-down"))
            $(".drop-down .options ul").hide();
    });
    // Dropdown End JS
    // Steps Js Start
    var totalSteps = $(".steps li").length;

    $(".submit").on("click", function() {
        return false;
    });

    $(".steps li:nth-of-type(1)").addClass("active");
    $(".myContainer .form-container:nth-of-type(1)").addClass("active");

    $(".form-container").on("click", ".next", function() {
        $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active");
        $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");
    });

    $(".form-container").on("click", ".back", function() {
        $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active");
        $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY");
    });


    /*=========================================================
    *     If you won't to make steps clickable, Please comment below code
    =================================================================*/
    $(".steps li").on("click", function() {
        var stepVal = $(this).find("span").text();
        $(this).prevAll().addClass("active");
        $(this).addClass("active");
        $(this).nextAll().removeClass("active");
        $(".myContainer .form-container").removeClass("active flipInX");
        $(".myContainer .form-container:nth-of-type(" + stepVal + ")").addClass("active flipInX");
    });
    // Steps Js End

    // Tab menu Start
    $('[name=tab]').each(function(i, d) {
        var p = $(this).prop('checked');
        //   console.log(p);
        if (p) {
            $('article').eq(i)
                .addClass('on');
        }
    });

    $('[name=tab]').on('change', function() {
        var p = $(this).prop('checked');

        // $(type).index(this) == nth-of-type
        var i = $('[name=tab]').index(this);

        $('article').removeClass('on');
        $('article').eq(i).addClass('on');
    });

});
// Modal Popup JS

// Mobile number Start
const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
// Mobile number End

// Tab menu JS Start
function openForm(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
var input = document.querySelector('input[name=tags]');

// Tab menu JS End