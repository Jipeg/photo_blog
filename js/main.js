let mySwiper;
// closeSlider();
mobAndPC();

$(window).on("resize", mobAndPC);
//onresize = (event) => mobAndPC;

function closeWithEsc(e) {
    // console.log('qweqwe')
    if (e.which == 27) {
        e.preventDefault();
        closeSlider();
    }
}

function closeSlider(){
    $(document).off('keyup',closeWithEsc);
    $(".close-slider").hide();
    //console.log(document.querySelector('.mySwiper'));
    document.querySelector('.mySwiper').className = "gallery";
    document.querySelector('.swiper-wrapper').className = "gallery-list";
    mySwiper.destroy( true, true );
    console.log(mySwiper);
    const qwe3 = document.querySelectorAll('.swiper-slide');
    const qwe4 = document.querySelectorAll('.swiper-button-next, .swiper-button-prev, .swiper-pagination');
    for (const elem of qwe4) {
        elem.style.display = "none";
    }

    for (const elem of qwe3) {
        elem.className = "gallery-item";
    }
    $(".gallery-item").on("click", swiperOn);
    
    //document.onkeyup = null;
    //$(document).keyup(() =>{console.log('уже закрыто сука!')});
}

function swiperOn(e){
    e.preventDefault();
    // обработчики событий!
    $(".close-slider").show();
    $(document).on('keyup',closeWithEsc);
    $(".gallery-item").off("click");

    // поменять везде классы!
    document.querySelector('.gallery').className = "mySwiper swiper ";
    document.querySelector('.gallery-list').className = "swiper-wrapper";
    const qwe3 = document.querySelectorAll('.gallery-item');
    const qwe4 = document.querySelectorAll('.swiper-button-next, .swiper-button-prev, .swiper-pagination');
    for (const elem of qwe4) {
        elem.style.display = "block";
    }

    for (const elem of qwe3) {
        elem.className = "swiper-slide";
    }

    // cоздать свайпер!!
    mySwiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    initialSlide: e.target.getAttribute('alt')-1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    });
    //e.preventDefault();
};

function mobAndPC(){
    if (window.matchMedia("(max-width: 991px)").matches) {
        // мобильная версия слайдера
        //console.log('small');
        $(".gallery-item").off("click", swiperOn);
        $(".close-slider").off("click", closeSlider);
        $(".close-slider").on("click", closeSlider);
        $(".gallery-item").on("click", swiperOn);
        // $(document).keyup(closeWithEsc);
        //querySelectorAll(".gallery-item")

        // if ($.magnificPopup != undefined) {
        //     console.log($.magnificPopup, 'удаляю слайдер пк версии');
        //     $.magnificPopup.close();
        // }
    } else {
        // Пк версия

        if (mySwiper != undefined && !mySwiper.destroyed) closeSlider(); // закроем на всякий!

        $(".close-slider").off("click", closeSlider);
        $(".gallery-item").off("click", swiperOn);
        $(document).off('keyup',closeWithEsc);

        //console.log('large');
        $(".gallery-list").magnificPopup({
            delegate: "a",
            type: "image",
            gallery: {
                enabled: true
            },
            disableOn: function() {
                if( $(window).width() < 991 ) {
                return false;
                }
                return true;
            }
        });
    }
}