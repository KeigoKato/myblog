$(document).ready(function() {

/*
_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
    ページの先頭に戻るボタンの昨日を実装
_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
*/
var $scrollBtn = $('#page-top');
var $window = $(window);
$scrollBtn.hide();
$(window).on('scroll', function () {
    if ($(this).scrollTop() > 200) {
        $scrollBtn.fadeIn();
    } else {
        $scrollBtn.fadeOut();
    }
});
$scrollBtn.on('click', function () {
    $('body,html').animate({scrollTop: 0}, 500);
    return false;
});


/*
_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
    ヘッダーメニューを固定する
_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
*/
var headerOffsetTop = $('.under-navmenu').offset().top;
var navHeight = $('.under-navmenu').css('height');
$window.on('scroll', function(){
    if ($window.scrollTop() > headerOffsetTop) {
        $('.under-navmenu').addClass('sticky');
        $('#breadcrumbs').css('margin-top', navHeight);
    } else {
        $('.under-navmenu').removeClass('sticky');
        $('#breadcrumbs').css('margin-top', 0);
    }
});

/*
_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
    BootSrap4のJS
_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
*/
// ツールチップ
$('[data-toggle="tooltip"]').tooltip();



});
