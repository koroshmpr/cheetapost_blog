import $ from "jquery";
require('./bootstrap');
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import WOW from 'wow.js'
import Search from "./search";

const wow = new WOW(
    {
        boxClass: 'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 100,          // distance to the element when triggering the animation (default is 0)
        duration: .5,
        mobile: true,       // trigger animations on mobile devices (default is true)
        live: true,       // act on asynchronously loaded content (default is true)
        callback: function (box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null,    // optional scroll container selector, otherwise use window,
        resetAnimation: true,     // reset animation on end (default is true)
    }
);

wow.init();
$(document).ready(function () {

        $(".nav-pills > button").hover(function (){
            let megaMenu = $(this).children("button")
            if (!megaMenu.hasClass('active')){
                megaMenu.addClass("active")
            }
        })
        $(window).scroll(function () { // check if scroll event happened
            if ($(document).scrollTop() > 130) { // check if user scrolled more than 50 from top of the browser window
                $('.sticky__nav').addClass('position-fixed top-0 shadow-sm');
                $('.sticky-post__detail').removeClass('d-none');
                $('.backTo_Top').removeClass('outro');
                $('.backTo_Top').addClass('intro');

            } else if ($(document).scrollTop() == 0)  {
                $('.backTo_Top').addClass('outro');
                $('.backTo_Top').removeClass('intro');
            }
            else if ($(document).scrollTop() < 30) {
                $('.sticky__nav').removeClass('position-fixed top-0 shadow-sm');
                $('.sticky-post__detail').addClass('d-none');

            }
                })
    }
);
// When the user scrolls the page, execute myFunction
window.onscroll = function() {
    myFunction();
};

function myFunction() {
    if (document.body.classList.contains('single')) {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const search = new Search();

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    //toggle header on time
    const toggleScrollClass = function () {
        if (window.scrollY > 24) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }

    toggleScrollClass();

    //check scroll to take actions on it
    window.addEventListener('scroll', function () {
        toggleScrollClass();
    });

    const swiper = new Swiper('.post_swiper', {
        // Optional parameters
        loop: true,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 30,
        direction: 'horizontal',
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            bulletActiveClass : ''
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            }
        },
        autoplay: {
            delay: 10000,
        },
        disableOnInteraction: false,
    })

})
