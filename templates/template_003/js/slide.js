$(function () {
    $("#slider").responsiveSlides({
    auto: true,
    pager: false,
    nav: true,
    speed: 500,
    namespace: "slide"
    });
window.onscroll = function(){
     if ($(window).scrollTop() > 190)
            {
              $('.nav').addClass("nav-fixed");
            }
            else
            {
              $('.nav').removeClass("nav-fixed");
            }
        }
});
