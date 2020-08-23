// 상단 슬라이드 배너
function topBannerBar__init() {
    $('.btn-toggle-top-banner-bar').click(function () {
        $('html').toggleClass('top-bar-hidden');
    });

    $('.slider-box-4 > .slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
    });
}

/* 퀵바 시작 */
function QuickBar__init() {
    var $quickBar = $('.quick-bar');

    // 클릭 전파 금지
    $quickBar.click(function (e) {
        e.stopPropagation();
    });

    // 퀵바 on/off 버튼 함수
    $quickBar.find(' > a').click(function () {
        var $quickBar = $(this).parent();
        var $ul = $quickBar.find(' > ul');

        if ($quickBar.hasClass('active')) {
            $quickBar.removeClass('active');
            // 요소가 위로 사라지게 하는 메서드
            $ul.stop().slideUp(200);
        } else {
            $quickBar.addClass('active');
            // 요소가 아래로 나오게 하는 메서드
            $ul.stop().slideDown(100);
        }
    });

    // 다른 요소 클릭시 퀵바 닫기
    $('body').click(function () {
        if ($quickBar.hasClass('active')) {
            $quickBar.find(' > a').click();
        }
    });

    // 스크롤 위치
    var onScroll1 = function () {
        var top = $(window).scrollTop();

        var minTop = 163;

        if (top < minTop) {
            top = minTop;
        }

        $quickBar.css('top', top);
    };

    $(window).scroll(onScroll1);

    onScroll1();
}
/* 퀵바 끝 */

// 탑 슬라이드 1 시작
function TopSlider1__init() {
    $('.top-slider-1 > .page-menu > li').click(function (e) {
        $(this).siblings('.active').removeClass('active');

        $(this).addClass('active');

        var $slider = $(this).closest('.top-slider-1');

        $slider.find(' > .slides > .active').removeClass('active');
        var index = $(this).index();
        $slider.find(' > .slides > *').eq(index).addClass('active');

        e.stopPropagation();
    });

    setInterval(function () {
        var $current = $('.top-slider-1 > .page-menu > li.active');
        var $post = $current.next();

        if ($post.length == 0) {
            //$post = $current.siblings().eq(0);
            $post = $current.siblings(':first-child');
        }

        $post.click();
    }, 5000);
}
// 탑 슬라이드 1 끝

function SliderBox1__init() {
    $('.slider-box-1 > .slider').slick({
      dots: true,
      arrows: false,
      autoplay: true,
      customPaging: function(slick, index) {
        return '<span><img src="http://aliceskin.com/images/common/whybt_off_0' + (index + 1) + '.png"><img src="http://aliceskin.com/images/common/whybt_on_0' + (index + 1) + '.png"></span>';
      }
    });
}

function SliderBox2__init() {
    $('.slider-box-2 > .slider').slick({
      dots: true,
      fade:true,
      arrows: false,
      autoplay: true,
      customPaging: function(slick, index) {
        return '<span><img src="http://aliceskin.com/images/common/why_off.jpg"><img src="http://aliceskin.com/images/common/why_on.jpg"></span>';
      }
    });
}

function SliderBox3__init() {
    $('.slider-box-3 > .slider').slick({
      dots: true,
      fade:true,
      arrows: false,
      autoplay: true
    });
  }

$(function () {
    // 퀵 바
    QuickBar__init();
    // 탑 배너 바
    topBannerBar__init();
    // 탑 슬라이드 1
    TopSlider1__init();

    // 배너 슬라이드
    SliderBox1__init();
    SliderBox2__init();
    SliderBox3__init();
})