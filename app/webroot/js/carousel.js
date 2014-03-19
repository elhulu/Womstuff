$(document).ready(function () {


    $('.rs-carousel').carousel(
        {
            loop: true,
            pagination: false,
            nextPrevActions: false,
            speed: 'slow',
            autoScroll: true,
            continuous: true,
            pause: 5000
        }
    );

    /* Prev/Next but hover */
    $(document.body).on("mouseenter", ".carouPrevNextBut", function() {

        $(this).clearQueue().fadeTo(300 , 0.5);

    });
    $(document.body).on("mouseout", ".carouPrevNextBut", function() {

        $(this).clearQueue().fadeTo(300 , 0.2);

    });

        /* Prev/Next but click */
    $(document.body).on("click", ".carouslPrevBut", function() {

        $('.rs-carousel').carousel('prev');

    });
    $(document.body).on("click", ".carouslNextBut", function() {

        $('.rs-carousel').carousel('next');

    });




});