<style type="text/css">
    .carousel-indicators{
        margin-bottom: 0;
    }
    .about-vision-block .section-title{
        /*margin-top: 228px;*/
    }
    @media only screen and (max-width: 768px) {
        .about-vision-block .section-title{
            margin-top: 0;
        }
        .about-vision-block .width-90{
            width: 100% !important;
        }
        .about-vision-block .content-dynamic{
            padding: 20px;
        }
        .star-block-of-review i{
            font-size: 15px;
        }
        .review-text{
            font-size: 10px;
            line-height: 1;
        }
        .review2 {
            top: 27%;
        }
        #hero {
            height: auto;
        }

        #hero .container {
            padding-top: 14px;
        }

        .map-block{
            margin-top: 20px;
        }
    }
    @media only screen and (max-width: 768px) {
        .mobile-hide{
            display: none !important;
        }
        .mobile-show{
            display: block !important;
        }
        .tab-show{
            display: block !important;
        }

        .sidebar{
            width: calc(100% - 20%);
            left: -81%;
        }

        .mtb-mobile-20{
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .kava-sticky{
            width: calc(100% - 50%) !important;
            font-size: 10px !important;
        }
        .home-box-title{
            font-size: 16px;
        }
        h3{
            font-size: 25px !important;
        }
        
    }

    @media (min-width:767px) and (max-width:992px) {
        .about-vision-block .section-title{
            margin-top: 0;
        }
        .about-vision-block .width-90{
            width: 100% !important;
        }
        .about-vision-block .content-dynamic{
            padding: 20px;
        }
        .map-block{
            margin-top: 20px;
        }
        .tab-hide{
            display: none !important;
        }
        .mobile-show{
            display: block !important;
        }
        .tab-show{
            display: block !important;
        }
        .p-of-home-blocks{
            font-size: 9px;
        }
        .num-of-home-blocks-01{
            right: 33.4%;
            top: 14%;
        }
        .num-of-home-blocks-02,.num-of-home-blocks-03{
            right: 29.4%;
            top: 14%;
        }
        .home-info-box{
            padding-left: 20px;
            padding-right: 20px;
        }
    }

    @media only screen and (min-width: 992px) {
        .desktop-hide{
            display: none !important;   
        }
    }

    @media (min-width:992px) and (max-width:1200px) {
        .review-text {
            color: #000;
            font-size: 10px;
        }
    }

    .sidebar{
        overflow-y: scroll;
    }

    .kava-sticky{
        position: fixed;
        z-index: 9999999;
        display: block;
        padding: 10px;
        background: #fff;
        color: #000;
        cursor: pointer;
        left: 0;
        bottom: 40px;
        border-radius: 10px;
        font-size: 12px;
        width: calc(100% - 80%);
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    }
    .kava-sticky:hover{
        left: 5%;
        transform: translateY(0) scale(1.2);
    }
    .kava-sticky p{
        margin-bottom: 0;
    }
    .width-90{
        width: 90%;
    }
    .content-dynamic{
        color: #605c5d;
    }
    .swal2-confirm{
        background: #f26722 !important;
    }
    
    .input-star-rating{
        width: 100%;
        font-size: 15px;
        /*direction: rtl;*/
        text-align: center;
        display: inline-block;
    }
    .rating__icon {
        pointer-events: none;
    }
    .rating__input {
        position: absolute !important;
        left: -9999px !important;
    }

    .rating__input--none {
        display: none
    }

    .rating__label {
        cursor: pointer;
    /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
        padding: 0 0.1em;
        font-size: 33px;
        text-shadow: 1px 1px #000000;
    }

    .rating__icon--star {
        color: #FDD922;
    }

    .rating__input:checked ~ .rating__label .rating__icon--star {
        color: #ccc;
    }

    .input-star-rating:hover .rating__label .rating__icon--star {
        color: #FDD922;
    }

    .rating__input:hover ~ .rating__label .rating__icon--star {
        color: #ccc;
    }



    .blog-list-time{
        text-align: right;
        font-size: 10px !important;
    }
    .carousel-indicators .active {
        opacity: 1;
    }    
    .carousel-indicators li{
        background-color: #f26722;
    }
   .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-slider
    {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
                user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
            touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list
    {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .slick-list:focus
    {
        outline: none;
    }
    .slick-list.dragging
    {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list
    {
        -webkit-transform: translate3d(0, 0, 0);
           -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
             -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
    }

    .slick-track
    {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }
    .slick-track:before,
    .slick-track:after
    {
        display: table;
        content: '';
    }
    .slick-track:after
    {
        clear: both;
    }
    .slick-loading .slick-track
    {
        visibility: hidden;
    }

    .slick-slide
    {
        position: relative;
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }
    [dir='rtl'] .slick-slide
    {
        float: right;
    }
    .slick-slide img
    {
        display: block;
    }
    .slick-slide.slick-loading img
    {
        display: none;
    }
    .slick-slide.dragging img
    {
        pointer-events: none;
    }
    .slick-initialized .slick-slide
    {
        display: block;
    }
    .slick-loading .slick-slide
    {
        visibility: hidden;
    }
    .slick-vertical .slick-slide
    {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden {
        display: none;
    }
</style>
