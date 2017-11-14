/**
 * Created by Administrator on 14-6-14.
 */
(function(){
    $.fn.extend({
        liThumb : function(options){
            var defaults = {
                dis:"-140px",
                thumbImg:"thumb-b-img"
            };
            var t = this;
            options  = options || {};
            options = $.extend(defaults,options);
            $(t).hover(function(){
                $(this).find("."+options.thumbImg).stop().animate({top:options.dis},300);
            },function(){
                $(this).find("."+options.thumbImg).stop().animate({top:"0px"},300);
            });
        },
        bannerShow : function(options){
            var defaults = {
                ifCycle : true,
                autoShow : true,
                autoTime : 4000
            };
            options  = options || {};
            options = $.extend(defaults,options);
            var t = this;
            var mainCont = $(t).find(".ban-main"),
                cont = $(t).find(".ban"),
                itemWidth = cont.find("li").width(),
                len = cont.find("li").length,
                index = 0,
                ifMove = false,
                timer = "";
            if(options.ifCycle){
                var oli = cont.children("li:first").clone(),
                    oli1 = cont.children("li:last").clone();
                cont.append(oli);
                cont.prepend(oli1);
                cont.css({width:itemWidth*(len+2)});
            }
            function next(){
                ifMove = true;
                index++;
                cont.stop().animate({left:"-"+itemWidth*index},300,function(){
                    if(index === len+1){
                        index = 1;
                        cont.css({left:"-"+itemWidth+"px"});
                    }
                    ifMove = false;
                });
            }
            function prev(){
                ifMove = true;
                index--;
                cont.stop().animate({left:"-"+itemWidth*index},300,function(){
                    if(index === 0){
                        index = len;
                        cont.css({left:"-"+itemWidth*len+"px"});
                    }
                    ifMove = false;
                });
            }
            $("#next").on("click",function(){
                if(!ifMove){next();}
            });
            $("#prev").on("click",function(){
                if(!ifMove){prev();}
            });
            $(t).mouseenter(function(){
                if(timer){
                    clearTimeout(timer);
                }
            }).mouseleave(function(){
                    if(timer){
                        clearTimeout(timer);
                    }
                    timer = setTimeout(init,options.autoTime);
                });
            function init(){
                next();
                if(options.autoShow){
                    clearTimeout(timer);
                    timer = setTimeout(init,options.autoTime);
                }
            }
            return init();
        },
        slideShow : function(options){
            var defaults = {
                ifCycle : true,
                autoShow : true,
                autoTime : 4000,
                itemUnit : 7
            };
            options  = options || {};
            options = $.extend(defaults,options);
            var t = this;
            var mainCont = $(t).find(".scroll-cont"),
                cont = $(t).find(".scroll-list"),
                contItem = cont.find("li"),
                itemWidth = contItem.width() + 10,
                len = parseInt(contItem.length/options.itemUnit),
                lastItem = contItem.length % options.itemUnit,
                index = 0,
                ifMove = false,
                timer;
            if(options.ifCycle){
                var oCont = cont[0].innerHTML;
                cont.append(oCont);
                //cont.css({left:"-1120px"});
            }
            if(lastItem!==0){
                len+=1;
            }
            function next(){
                var moveDis,
                    left = parseInt(cont.css("left"));
                ifMove = true;
                index++;
                if(lastItem !== 0){
                    if(index === len){
                        moveDis = lastItem * itemWidth;
                    }else{
                        moveDis = itemWidth * options.itemUnit;
                    }
                    cont.stop().animate({left:(left-moveDis)+"px"},300,function(){
                        if(index === len){
                            index = 0;
                            cont.css({left:"0px"});
                        }
                        ifMove = false;
                    });
                }else{
                    cont.stop().animate({left:"-"+index*itemWidth*options.itemUnit},300,function(){
                        if(index === len){
                            index = 0;
                            cont.css({left:"0px"});
                        }
                        ifMove = false;
                    });
                }
            }
            function prev(){//slide
                ifMove = true;
                if(index === 0){
                    cont.css({left:"-"+contItem.length*itemWidth+"px"});
                    index = len;
                }
                var left = parseInt(cont.css("left"));
                index--;
                //console.log(index);
                if(lastItem !== 0){
                    if(index === len-1){
                        moveDis = lastItem * itemWidth;
                    }else{
                        moveDis = itemWidth * options.itemUnit;
                    }
                    cont.stop().animate({left:(left+moveDis)+"px"},300,function(){
//                            if(index === 0){
//                                cont.css({left:"0px"});
//                                index = len+1;
//                            }
                        ifMove = false;
                    });
                }else{
                    cont.stop().animate({left:"-"+index*itemWidth*options.itemUnit},300,function(){
                        ifMove = false;
                    });
                }
            }
            $("#scrollNext").on("click",function(){
                if(!ifMove){next();}
            });
            $("#scrollPrev").on("click",function(){
                if(!ifMove){prev();}
            });
            if(options.autoShow){
                $(t).mouseenter(function(){
                    if(timer){
                        clearTimeout(timer);
                    }
                }).mouseleave(function(){
                        clearTimeout(timer);
                        timer = setTimeout(init,options.autoTime);
                    });
            }
            function init(){
                next();
                if(options.autoShow){
                    clearTimeout(timer);
                    timer = setTimeout(init,options.autoTime);
                }
            }
            return init();
        }
    });
})();
$("#banner").bannerShow();
$("div.mod-thumb-b,li.mod-thumb-b").liThumb();
$("li.mod-thumb").liThumb({dis:"-120px",thumbImg:"thumb-img"});
$("li.mod-thumb-h").liThumb({dis:"-130px",thumbImg:"thumb-img"});
$("ul.mod-list").on("hover","li",function(){
    $(this).toggleClass("hover");
});
$("ul.mod-coming").on("mouseover","li",function(){
    $(this).addClass("curr").siblings().removeClass("curr");
});
$("#slideWrap").slideShow();
$(function(){
    $("ul.mod-nav").on("click","li a",function(){
        var t = this,
            $li = $(t).parent();
        if($li.hasClass("curr")){
            return false;
        } else{
            $li.addClass("curr").siblings().removeClass("curr");
            var ind = $li.index();
            var $box = $li.parents(".mod-box");
            $box.find(".mod-cont").addClass("hide").eq(ind).removeClass("hide");
            $box.find(".mod-cont").eq(ind).find("img").each(function(){
                var oSrc = $(this).attr("o-src");
                $(this).attr("src",oSrc);
            })

        }

    });
});