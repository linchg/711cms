$(function(){

   $(".gx-content .gx-text:lt(1)").show();
     $(".gx-title li").hover(function(){
           $(this).addClass("current").siblings().removeClass("current");
           $(".gx-content .gx-text").eq($(".gx-title li").index(this)).show().siblings().hide();
     })//tab 选项卡
    

    $(".mod-soft-item").hover(function(){
      $(this).addClass("hover")
    },function(){
      $(this).removeClass("hover")
    })
    
 // window.onscroll = function(){
 //            if ($(window).scrollTop() > 100)
 //            {
 //              $(".mod-search-hd-bunny").addClass("mod-search-hd-bunny-fold");
 //              $(".mod-search-hd-bunny").css({'top':"0"});
 //              $(".mod-search").addClass("mod-search-current");
 //              $(".mod-nav").hide();
              
 //            }
 //            else
 //            {
 //              $(".mod-search-hd-bunny").removeClass("mod-search-hd-bunny-fold");
 //              $(".mod-search-hd-bunny").removeAttr('style');
 //              $(".mod-search").removeClass("mod-search-current");
 //              $(".mod-nav").show();

 //            }
          
 //          }//top-bar-s
  
    
})
  
    