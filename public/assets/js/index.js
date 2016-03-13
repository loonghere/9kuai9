$(function() {
	//左侧浮动导航
    var $navFun = function() {
        var st = $(document).scrollTop(),
            headh = $("div.head").height(),
            $nav_classify = $("div.jiu-side-nav");

        if(st > headh){
            $nav_classify.addClass("fixed");
        } else {
            $nav_classify.removeClass("fixed");
        }
    };

    var F_nav_scroll = function () {
        if(navigator.userAgent.indexOf('iPad') > -1){
            return false;
        }
        if (!window.XMLHttpRequest) {
           return;
        }else{
            //默认执行一次
            $navFun();
            $(window).bind("scroll", $navFun);
        }
    }
    F_nav_scroll();
});