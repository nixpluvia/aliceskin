function topBannerBar__init(){
    $('.btn-toggle-top-banner-bar').click(function() {
        $('html').toggleClass('top-bar-visible');
    });
    console.log('hi');
}


function SliderBox4__init() {
    $('.slider-box-4 > .slider').slick({
      dots: true,
      arrows: false,
      autoplay: true,
    });
}

$(function(){
    // 탑 배너 바
    topBannerBar__init();
    // 상단바 슬라이드
    SliderBox4__init();
})