/**
 * Created by Administrator on 14-6-14.
 */
var reqPrefix = "http://android.d.cn";

//function topDoLogin(){if(!arguments.length){var username=$("#topLoginBoxUserName").val();var password=$("#topLoginBoxPassword").val();var error;if(!username||"乐号/用户名/邮箱/手机号"==username){error="请输入用户名!";$("#topLoginBoxUserName").focus()}if(!password||"请输入密码"==password){error="请输入密码!";$("#topLoginBoxPassword").focus()}if((!username||"乐号/用户名/邮箱/手机号"==username)&&(!password||"请输入密码"==password)){error="请输入用户名和密码!";$("#topLoginBoxUserName").focus();$("#topLoginBoxPassword").addClass("inputTextOut")}if(error){$("#topLoginMsg").html(error);shakeDiv();return}var autoLogin=$("#topAutoLogin").attr("checked");aysnLogin(username,password,autoLogin?1:0,window.location.href,loginFailCacllback)}else{sideURL=arguments[0];var username=$("#UserName").val();var password=$("#Password").val();var error;if(!username||"乐号/用户名/邮箱/手机号"==username){error="请输入用户名!";$("#UserName").addClass("v-error");$("#Password").removeClass("v-error")}if(!password||"请输入密码"==password){error="请输入密码!";$("#Password").addClass("v-error");$("#UserName").removeClass("v-error")}if((!username||"乐号/用户名/邮箱/手机号"==username)&&(!password||"请输入密码"==password)){error="请输入用户名和密码!";$("#Password").addClass("v-error");$("#UserName").addClass("v-error")}if(error){$("#topLoginMsg1").html(error);return}else{$("#topLoginMsg1").html("");$("#Password").removeClass("v-error");$("#UserName").removeClass("v-error")}var autoLogin="";aysnLogin(username,password,0,location.href,loginFailCacllback1,"side",sideURL);return false}}function test(){alert("")}function loginFailCacllback(msg){if(msg){$("#topLoginMsg").html(msg);shakeDiv()}}function loginFailCacllback1(msg){if(msg){$("#topLoginMsg1").html(msg);if(msg=="您的密码有误，请重新输入"){$("#Password").addClass("v-error")}if(msg=="该帐号不存在"){$("#UserName").addClass("v-error")}}else{$("#UserName").removeClass("v-error");$("#Password").removeClass("v-error")}shakeDiv()}var shakeModel=function(options,callback){var i=-191,n=1*2,ref=i,range=range||-173,interval;interval=setInterval(function(){if(options.num<4){i+=n;callback.call(null,options.el,i);if(i>=range){n=-1*2}else{if(i===ref){n=1*2;options.num+=1}}}else{clearInterval(interval)}},1)};function shakeDiv(){shakeModel({num:0,el:document.getElementById("topDMainBox")},function(e,i){e.style.left=i+"px"})}function getCookieLoginCommon(name){var arr=document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));if(arr!=null){return decodeURI(unescape(arr[2],"utf-8"))}return null}$(document).ready(function(){var userInfo=getCookieLoginCommon("DJ_MEMBER_INFO");var dmbi=getCookieLoginCommon("dmbi");var avatar=String(getCookieLoginCommon("avatar"));var avatar_url=(avatar=='""')?"http://img.d.cn/2013/web_index/wwwdcn/images/default.jpg":avatar;if(userInfo&&dmbi){userInfo=decodeURI(userInfo);var showName=userInfo.substring(0,userInfo.indexOf("("));var showNum=userInfo.substring(userInfo.indexOf("(")+1,userInfo.indexOf(")"));var newMessageCnt=0;var logined_html='<div class="menuShow" id="logined_menuShow_top"><a href="javascript:void(0)" class="login">'+showName+'</a><span class="arrDrop"></span>';logined_html+='</div><div class="menuHide r10"><div class="userPanel"><img id="avatar_url_top_id" src='+avatar_url+' class="userFace"/>';logined_html+='<div class="userInfo"><p>'+showName+"</p><p>乐号："+showNum+'</p><p><a href="http://my.d.cn/message/index.php" target="_blank">有<em id="newMessageCnt_em_id">'+newMessageCnt+"</em>未读消息</a></p>";logined_html+='<p><a href="http://my.d.cn/" target="_blank" class="rb">My当乐</a><a href="javascript:void(0);" onclick="logout(window.location.href);return false;">退出</a></p></div></div></div>';$("#logined_li").html(logined_html)}});$(document).ready(function(){$(".siteNavMenu li").hover(function(){$(this).addClass("hover");$(this).children(".menuHide").show()},function(){$(this).removeClass("hover");$(this).children(".menuHide").hide()})});
(function($){
    $.fn.extend({
        autoSearch : function(options){
            var that = this;
            var options = $.extend({
                dataType: 'json',
                reqURL: reqPrefix+"/search/ls",
                result: $("#searchResult"), //搜索建议结果
                keyTime: 300, //延迟时间
                currClass: "over"
            }, options || {});
            var result = options.result,
                timer,
                index = -1,
                reqURL = options.reqURL,
                currClass = options.currClass,
                list,
                form = $("#sForm");
            form.submit(function (e) {
                if ($.trim(form.find("#key").val()) == "") {
                    return false;
                } else {
                    return searchSubmit();
                }
            });
            $(that).focus(function(){
                //$("#detailForm").removeClass("form-cover");
                if($.trim($(this).val)!= ""){
                    request();
                }
            });
            $(that).blur(function(){
                //$("#detailForm").addClass("form-cover");
                hide();
            });
            function searchSubmit(){
                if(index!=-1){
                    var url = list.eq(index).find("a").attr("href");
                    if(url!=""){
                        location.href = url;
                        return false;
                    }
                }else{
                    document.getElementById('sForm').submit();
                }
            }
            function asQuery(dom, options) {
                dom.on("keyup", handleKey);
            }
            function handleKey(e) {
                var code = e.keyCode,
                    $t = $(that);
                if (/13$|38$|40$/.test(code) && !/none/.test(result.css('display'))) {
                    e.preventDefault();
                    switch (code) {
                        case 13:
                            selected();
                            break;
                        case 38:
                            up();
                            break;
                        case 40:
                            down();
                            break;
                    }
                } else {
                    switch (code) {
                        case 13:
                            if ($.trim($t.val() == "")) {
                                return false;
                            } else {
                                document.getElementById("sForm").submit();
                                return false;
                            }
                            break;
                        case 38:
                        case 40:
                            return;
                            break;
                        default:
                            window.clearInterval(timer);
                            timer = window.setTimeout(request, options.keyTime);
                            break;
                    }
                }
            }

            function hide() {
                result.fadeOut();
                index = -1;
            }
            function selected() {
                var url = '',
                    jObj;
                if (index >= 0) {
                    jObj = list.eq(index).find("a");
                    $(that).val(jObj.attr("title"));
                    url = jObj.attr("href");
                }
                hide();
                if (url == '') {
                    document.getElementById('sForm').submit();
                }
                else {
                    location.href = url;
                    return false;
                }
                return true;
            }
            function request() {
                var q = $(that).val();
                if (q.length) {
                    $.ajax({
                        type: 'GET',
                        dataType: options.dataType,
                        url: reqURL+'?t='+new Date().getTime(),
                        data: { keyword: q },
                        success: function (data) {
                            setData(data, q);
                            index = -1;
                        }
                    });
                } else {
                    hide();
                }
            }
            function up() {
                var len = list.length;
                if (index <= -1) {
                    index = len - 1;
                }
                index -= 1;
                list.removeClass(currClass).eq(index).addClass(currClass);
            }

            function down() {
                var len = list.length;
                if (index >= len - 1) {
                    index = -1;
                }
                index += 1;
                list.removeClass(currClass).eq(index).addClass(currClass);
            }

            function setData(data, q) {
                var html = '',
                    tag=reqPrefix+"/search/tag?keyword=",
                    dev=reqPrefix+"/vendor/",
                    news = "";
                if (data.dev && data.dev.length > 0) {
                    $.each(data.dev,function(i,obj){
                        html += '<ul class="dev-tag"><li><a href="';
                        html += dev+obj.code+'.html" title="' + obj.name;
                        html += '" target="_blank">”'+obj.highlighterName+'“厂商的全部应用</a></li></ul>';
                    });
                }
                if( data.tags && data.tags.length>0){
                    $.each(data.tags,function(ind,obj){
                        html += '<ul class="dev-tag">';
                        html += '<li><a href="' + tag +obj.name + '" target="_blank" title="';
                        html  +=  obj.name + '">含"' + obj.highlighterName+ '"标签的应用</a></li><ul>';
                    });
                }
                if (data.apps && data.apps.length > 0) {
                    html += '<ul class="re-game">';
                    $.each(
                        data.apps,
                        function(ind, obj) {
                            var v = 'v';
                            html += '<li><a href="' + obj.href + '" target="_blank" title="'
                            html += obj.name + '"><img src="'
                            html += obj.icon + '" alt="' + obj.name + '" /><span>'
                            html += obj.name + '</span></a></li>';
                            /*if(obj.latestVersionNameFormatShort == ""){
                                html += obj.name + '</span></a></li>';
                            }else{
                                html += obj.name + '&nbsp;' + v + obj.latestVersionNameFormatShort + '</span>';
                            }*/

                        });
                    html += '</ul></div>';
                }
                if (data.news && data.news.length > 0) {
                    html += '<ul class="re-info">';
                    $.each(data.news, function(ind, obj) {
                        if(obj.originalUrl && obj.originalUrl.length > 0) {
                            news = obj.originalUrl;
                        } else {
                            if(obj.resourceType == 3){
                            	
                            	if(obj.netGameNewsUrl && obj.netGameNewsUrl.length > 0){
                            		news = obj.netGameNewsUrl;
                            	}else{
                            		news = reqPrefix+"/news/"+obj.id+".html";
                            	}
                            }else if(obj.resourceType == 7){
                                news = reqPrefix+"/specialtopic/"+obj.id+".html";
                            }
                        }
                        html += '<li><a href="' + news + '" target="_blank" title="' + obj.title + '">'
                        html += obj.highlighterTitle + '</a></li>';
                    });
                    html += '</ul></div>';
                }
                if(html!=""){
                    result[0].innerHTML = html;
                    result.show();
                    index = -1;
                    list = result.find("li");
                }else{
                	result.hide();
                }
            }
            return this.each(function () {
                return asQuery($(that), options);
            });
        }
    });
})(jQuery);
/*弹框*/
(function ($) {
    $.overlay = function (param) {
        var opts = $.extend({}, $.overlay.defaults, param),
            clickElem = opts.clickId,
            windowElem = $("#" + opts.contentId),
            closeElem = $("#" + opts.closeId),
            overlay=$("#overlay"),
            height =  ___getPageSize()[1] + "px";
        function windowHide() {
            overlay.hide();
            windowElem.css("visibility","hidden");
        }
        $(clickElem).unbind("click").bind("click", function () {
            overlay.show();
            overlay.css({ "height": ___getPageSize()[1] + "px" });
            windowElem.css({"left":"50%","visibility":"visible"});
        });
        closeElem.unbind("click").bind("click", function (e) {
            windowHide();
            $("#login-reg-msg").text("");
        });
    };
    $.overlay.defaults = {
        clickId: "#demo",
        contentId: "windows",
        closeId: "close"
    };
})(jQuery);
$.overlay({
    clickId: "#jubao",
    contentId: "report",
    closeId: "reportClose"
});
/*mousewheel.js*/
(function($){var types=['DOMMouseScroll','mousewheel'];if($.event.fixHooks){for(var i=types.length;i;){$.event.fixHooks[types[--i]]=$.event.mouseHooks}}$.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var i=types.length;i;){this.addEventListener(types[--i],handler,false)}}else{this.onmousewheel=handler}},teardown:function(){if(this.removeEventListener){for(var i=types.length;i;){this.removeEventListener(types[--i],handler,false)}}else{this.onmousewheel=null}}};$.fn.extend({mousewheel:function(fn){return fn?this.bind("mousewheel",fn):this.trigger("mousewheel")},unmousewheel:function(fn){return this.unbind("mousewheel",fn)}});function handler(event){var orgEvent=event||window.event,args=[].slice.call(arguments,1),delta=0,returnValue=true,deltaX=0,deltaY=0;event=$.event.fix(orgEvent);event.type="mousewheel";if(orgEvent.wheelDelta){delta=orgEvent.wheelDelta/120}if(orgEvent.detail){delta=-orgEvent.detail/3}deltaY=delta;if(orgEvent.axis!==undefined&&orgEvent.axis===orgEvent.HORIZONTAL_AXIS){deltaY=0;deltaX=-1*delta}if(orgEvent.wheelDeltaY!==undefined){deltaY=orgEvent.wheelDeltaY/120}if(orgEvent.wheelDeltaX!==undefined){deltaX=-1*orgEvent.wheelDeltaX/120}args.unshift(event,delta,deltaX,deltaY);return($.event.dispatch||$.event.handle).apply(this,args)}})(jQuery);
/*jscrollPane.js*/
(function(b,a,c){b.fn.jScrollPane=function(e){function d(D,O){var ay,Q=this,Y,aj,v,al,T,Z,y,q,az,aE,au,i,I,h,j,aa,U,ap,X,t,A,aq,af,am,G,l,at,ax,x,av,aH,f,L,ai=true,P=true,aG=false,k=false,ao=D.clone(false,false).empty(),ac=b.fn.mwheelIntent?"mwheelIntent.jsp":"mousewheel.jsp";aH=D.css("paddingTop")+" "+D.css("paddingRight")+" "+D.css("paddingBottom")+" "+D.css("paddingLeft");f=(parseInt(D.css("paddingLeft"),10)||0)+(parseInt(D.css("paddingRight"),10)||0);function ar(aQ){var aL,aN,aM,aJ,aI,aP,aO=false,aK=false;ay=aQ;if(Y===c){aI=D.scrollTop();aP=D.scrollLeft();D.css({overflow:"hidden",padding:0});aj=D.innerWidth()+f;v=D.innerHeight();D.width(aj);Y=b('<div class="jspPane" />').css("padding",aH).append(D.children());al=b('<div class="jspContainer" />').css({width:aj+"px",height:v+"px"}).append(Y).appendTo(D)}else{D.css("width","");aO=ay.stickToBottom&&K();aK=ay.stickToRight&&B();aJ=D.innerWidth()+f!=aj||D.outerHeight()!=v;if(aJ){aj=D.innerWidth()+f;v=D.innerHeight();al.css({width:aj+"px",height:v+"px"})}if(!aJ&&L==T&&Y.outerHeight()==Z){D.width(aj);return}L=T;Y.css("width","");D.width(aj);al.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()}Y.css("overflow","auto");if(aQ.contentWidth){T=aQ.contentWidth}else{T=Y[0].scrollWidth}Z=Y[0].scrollHeight;Y.css("overflow","");y=T/aj;q=Z/v;az=q>1;aE=y>1;if(!(aE||az)){D.removeClass("jspScrollable");Y.css({top:0,width:al.width()-f});n();E();R();w()}else{D.addClass("jspScrollable");aL=ay.maintainPosition&&(I||aa);if(aL){aN=aC();aM=aA()}aF();z();F();if(aL){N(aK?(T-aj):aN,false);M(aO?(Z-v):aM,false)}J();ag();an();if(ay.enableKeyboardNavigation){S()}if(ay.clickOnTrack){p()}C();if(ay.hijackInternalLinks){m()}}if(ay.autoReinitialise&&!av){av=setInterval(function(){ar(ay)},ay.autoReinitialiseDelay)}else{if(!ay.autoReinitialise&&av){clearInterval(av)}}aI&&D.scrollTop(0)&&M(aI,false);aP&&D.scrollLeft(0)&&N(aP,false);D.trigger("jsp-initialised",[aE||az])}function aF(){if(az){al.append(b('<div class="jspVerticalBar" />').append(b('<div class="jspCap jspCapTop" />'),b('<div class="jspTrack" />').append(b('<div class="jspDrag" />').append(b('<div class="jspDragTop" />'),b('<div class="jspDragBottom" />'))),b('<div class="jspCap jspCapBottom" />')));U=al.find(">.jspVerticalBar");ap=U.find(">.jspTrack");au=ap.find(">.jspDrag");if(ay.showArrows){aq=b('<a class="jspArrow jspArrowUp" />').bind("mousedown.jsp",aD(0,-1)).bind("click.jsp",aB);af=b('<a class="jspArrow jspArrowDown" />').bind("mousedown.jsp",aD(0,1)).bind("click.jsp",aB);if(ay.arrowScrollOnHover){aq.bind("mouseover.jsp",aD(0,-1,aq));af.bind("mouseover.jsp",aD(0,1,af))}ak(ap,ay.verticalArrowPositions,aq,af)}t=v;al.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function(){t-=b(this).outerHeight()});au.hover(function(){au.addClass("jspHover")},function(){au.removeClass("jspHover")}).bind("mousedown.jsp",function(aI){b("html").bind("dragstart.jsp selectstart.jsp",aB);au.addClass("jspActive");var s=aI.pageY-au.position().top;b("html").bind("mousemove.jsp",function(aJ){V(aJ.pageY-s,false)}).bind("mouseup.jsp mouseleave.jsp",aw);return false});o()}}function o(){ap.height(t+"px");I=0;X=ay.verticalGutter+ap.outerWidth();Y.width(aj-X-f);try{if(U.position().left===0){Y.css("margin-left",X+"px")}}catch(s){}}function z(){if(aE){al.append(b('<div class="jspHorizontalBar" />').append(b('<div class="jspCap jspCapLeft" />'),b('<div class="jspTrack" />').append(b('<div class="jspDrag" />').append(b('<div class="jspDragLeft" />'),b('<div class="jspDragRight" />'))),b('<div class="jspCap jspCapRight" />')));am=al.find(">.jspHorizontalBar");G=am.find(">.jspTrack");h=G.find(">.jspDrag");if(ay.showArrows){ax=b('<a class="jspArrow jspArrowLeft" />').bind("mousedown.jsp",aD(-1,0)).bind("click.jsp",aB);x=b('<a class="jspArrow jspArrowRight" />').bind("mousedown.jsp",aD(1,0)).bind("click.jsp",aB);
    if(ay.arrowScrollOnHover){ax.bind("mouseover.jsp",aD(-1,0,ax));x.bind("mouseover.jsp",aD(1,0,x))}ak(G,ay.horizontalArrowPositions,ax,x)}h.hover(function(){h.addClass("jspHover")},function(){h.removeClass("jspHover")}).bind("mousedown.jsp",function(aI){b("html").bind("dragstart.jsp selectstart.jsp",aB);h.addClass("jspActive");var s=aI.pageX-h.position().left;b("html").bind("mousemove.jsp",function(aJ){W(aJ.pageX-s,false)}).bind("mouseup.jsp mouseleave.jsp",aw);return false});l=al.innerWidth();ah()}}function ah(){al.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function(){l-=b(this).outerWidth()});G.width(l+"px");aa=0}function F(){if(aE&&az){var aI=G.outerHeight(),s=ap.outerWidth();t-=aI;b(am).find(">.jspCap:visible,>.jspArrow").each(function(){l+=b(this).outerWidth()});l-=s;v-=s;aj-=aI;G.parent().append(b('<div class="jspCorner" />').css("width",aI+"px"));o();ah()}if(aE){Y.width((al.outerWidth()-f)+"px")}Z=Y.outerHeight();q=Z/v;if(aE){at=Math.ceil(1/y*l);if(at>ay.horizontalDragMaxWidth){at=ay.horizontalDragMaxWidth}else{if(at<ay.horizontalDragMinWidth){at=ay.horizontalDragMinWidth}}h.width(at+"px");j=l-at;ae(aa)}if(az){A=Math.ceil(1/q*t);if(A>ay.verticalDragMaxHeight){A=ay.verticalDragMaxHeight}else{if(A<ay.verticalDragMinHeight){A=ay.verticalDragMinHeight}}au.height(A+"px");i=t-A;ad(I)}}function ak(aJ,aL,aI,s){var aN="before",aK="after",aM;if(aL=="os"){aL=/Mac/.test(navigator.platform)?"after":"split"}if(aL==aN){aK=aL}else{if(aL==aK){aN=aL;aM=aI;aI=s;s=aM}}aJ[aN](aI)[aK](s)}function aD(aI,s,aJ){return function(){H(aI,s,this,aJ);this.blur();return false}}function H(aL,aK,aO,aN){aO=b(aO).addClass("jspActive");var aM,aJ,aI=true,s=function(){if(aL!==0){Q.scrollByX(aL*ay.arrowButtonSpeed)}if(aK!==0){Q.scrollByY(aK*ay.arrowButtonSpeed)}aJ=setTimeout(s,aI?ay.initialDelay:ay.arrowRepeatFreq);aI=false};s();aM=aN?"mouseout.jsp":"mouseup.jsp";aN=aN||b("html");aN.bind(aM,function(){aO.removeClass("jspActive");aJ&&clearTimeout(aJ);aJ=null;aN.unbind(aM)})}function p(){w();if(az){ap.bind("mousedown.jsp",function(aN){if(aN.originalTarget===c||aN.originalTarget==aN.currentTarget){var aL=b(this),aO=aL.offset(),aM=aN.pageY-aO.top-I,aJ,aI=true,s=function(){var aR=aL.offset(),aS=aN.pageY-aR.top-A/2,aP=v*ay.scrollPagePercent,aQ=i*aP/(Z-v);if(aM<0){if(I-aQ>aS){Q.scrollByY(-aP)}else{V(aS)}}else{if(aM>0){if(I+aQ<aS){Q.scrollByY(aP)}else{V(aS)}}else{aK();return}}aJ=setTimeout(s,aI?ay.initialDelay:ay.trackClickRepeatFreq);aI=false},aK=function(){aJ&&clearTimeout(aJ);aJ=null;b(document).unbind("mouseup.jsp",aK)};s();b(document).bind("mouseup.jsp",aK);return false}})}if(aE){G.bind("mousedown.jsp",function(aN){if(aN.originalTarget===c||aN.originalTarget==aN.currentTarget){var aL=b(this),aO=aL.offset(),aM=aN.pageX-aO.left-aa,aJ,aI=true,s=function(){var aR=aL.offset(),aS=aN.pageX-aR.left-at/2,aP=aj*ay.scrollPagePercent,aQ=j*aP/(T-aj);if(aM<0){if(aa-aQ>aS){Q.scrollByX(-aP)}else{W(aS)}}else{if(aM>0){if(aa+aQ<aS){Q.scrollByX(aP)}else{W(aS)}}else{aK();return}}aJ=setTimeout(s,aI?ay.initialDelay:ay.trackClickRepeatFreq);aI=false},aK=function(){aJ&&clearTimeout(aJ);aJ=null;b(document).unbind("mouseup.jsp",aK)};s();b(document).bind("mouseup.jsp",aK);return false}})}}function w(){if(G){G.unbind("mousedown.jsp")}if(ap){ap.unbind("mousedown.jsp")}}function aw(){b("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp");if(au){au.removeClass("jspActive")}if(h){h.removeClass("jspActive")}}function V(s,aI){if(!az){return}if(s<0){s=0}else{if(s>i){s=i}}if(aI===c){aI=ay.animateScroll}if(aI){Q.animate(au,"top",s,ad)}else{au.css("top",s);ad(s)}}function ad(aI){if(aI===c){aI=au.position().top}al.scrollTop(0);I=aI;var aL=I===0,aJ=I==i,aK=aI/i,s=-aK*(Z-v);if(ai!=aL||aG!=aJ){ai=aL;aG=aJ;D.trigger("jsp-arrow-change",[ai,aG,P,k])}u(aL,aJ);Y.css("top",s);D.trigger("jsp-scroll-y",[-s,aL,aJ]).trigger("scroll")}function W(aI,s){if(!aE){return}if(aI<0){aI=0}else{if(aI>j){aI=j}}if(s===c){s=ay.animateScroll}if(s){Q.animate(h,"left",aI,ae)
}else{h.css("left",aI);ae(aI)}}function ae(aI){if(aI===c){aI=h.position().left}al.scrollTop(0);aa=aI;var aL=aa===0,aK=aa==j,aJ=aI/j,s=-aJ*(T-aj);if(P!=aL||k!=aK){P=aL;k=aK;D.trigger("jsp-arrow-change",[ai,aG,P,k])}r(aL,aK);Y.css("left",s);D.trigger("jsp-scroll-x",[-s,aL,aK]).trigger("scroll")}function u(aI,s){if(ay.showArrows){aq[aI?"addClass":"removeClass"]("jspDisabled");af[s?"addClass":"removeClass"]("jspDisabled")}}function r(aI,s){if(ay.showArrows){ax[aI?"addClass":"removeClass"]("jspDisabled");x[s?"addClass":"removeClass"]("jspDisabled")}}function M(s,aI){var aJ=s/(Z-v);V(aJ*i,aI)}function N(aI,s){var aJ=aI/(T-aj);W(aJ*j,s)}function ab(aV,aQ,aJ){var aN,aK,aL,s=0,aU=0,aI,aP,aO,aS,aR,aT;try{aN=b(aV)}catch(aM){return}aK=aN.outerHeight();aL=aN.outerWidth();al.scrollTop(0);al.scrollLeft(0);while(!aN.is(".jspPane")){s+=aN.position().top;aU+=aN.position().left;aN=aN.offsetParent();if(/^body|html$/i.test(aN[0].nodeName)){return}}aI=aA();aO=aI+v;if(s<aI||aQ){aR=s-ay.verticalGutter}else{if(s+aK>aO){aR=s-v+aK+ay.verticalGutter}}if(aR){M(aR,aJ)}aP=aC();aS=aP+aj;if(aU<aP||aQ){aT=aU-ay.horizontalGutter}else{if(aU+aL>aS){aT=aU-aj+aL+ay.horizontalGutter}}if(aT){N(aT,aJ)}}function aC(){return -Y.position().left}function aA(){return -Y.position().top}function K(){var s=Z-v;return(s>20)&&(s-aA()<10)}function B(){var s=T-aj;return(s>20)&&(s-aC()<10)}function ag(){al.unbind(ac).bind(ac,function(aL,aM,aK,aI){var aJ=aa,s=I;Q.scrollBy(aK*ay.mouseWheelSpeed,-aI*ay.mouseWheelSpeed,false);return aJ==aa&&s==I})}function n(){al.unbind(ac)}function aB(){return false}function J(){Y.find(":input,a").unbind("focus.jsp").bind("focus.jsp",function(s){ab(s.target,false)})}function E(){Y.find(":input,a").unbind("focus.jsp")}function S(){var s,aI,aK=[];aE&&aK.push(am[0]);az&&aK.push(U[0]);Y.focus(function(){D.focus()});D.attr("tabindex",0).unbind("keydown.jsp keypress.jsp").bind("keydown.jsp",function(aN){if(aN.target!==this&&!(aK.length&&b(aN.target).closest(aK).length)){return}var aM=aa,aL=I;switch(aN.keyCode){case 40:case 38:case 34:case 32:case 33:case 39:case 37:s=aN.keyCode;aJ();break;case 35:M(Z-v);s=null;break;case 36:M(0);s=null;break}aI=aN.keyCode==s&&aM!=aa||aL!=I;return !aI}).bind("keypress.jsp",function(aL){if(aL.keyCode==s){aJ()}return !aI});if(ay.hideFocus){D.css("outline","none");if("hideFocus" in al[0]){D.attr("hideFocus",true)}}else{D.css("outline","");if("hideFocus" in al[0]){D.attr("hideFocus",false)}}function aJ(){var aM=aa,aL=I;switch(s){case 40:Q.scrollByY(ay.keyboardSpeed,false);break;case 38:Q.scrollByY(-ay.keyboardSpeed,false);break;case 34:case 32:Q.scrollByY(v*ay.scrollPagePercent,false);break;case 33:Q.scrollByY(-v*ay.scrollPagePercent,false);break;case 39:Q.scrollByX(ay.keyboardSpeed,false);break;case 37:Q.scrollByX(-ay.keyboardSpeed,false);break}aI=aM!=aa||aL!=I;return aI}}function R(){D.attr("tabindex","-1").removeAttr("tabindex").unbind("keydown.jsp keypress.jsp")}function C(){if(location.hash&&location.hash.length>1){var aK,aI,aJ=escape(location.hash.substr(1));try{aK=b("#"+aJ+', a[name="'+aJ+'"]')}catch(s){return}if(aK.length&&Y.find(aJ)){if(al.scrollTop()===0){aI=setInterval(function(){if(al.scrollTop()>0){ab(aK,true);b(document).scrollTop(al.position().top);clearInterval(aI)}},50)}else{ab(aK,true);b(document).scrollTop(al.position().top)}}}}function m(){if(b(document.body).data("jspHijack")){return}b(document.body).data("jspHijack",true);b(document.body).delegate("a[href*=#]","click",function(s){var aI=this.href.substr(0,this.href.indexOf("#")),aK=location.href,aO,aP,aJ,aM,aL,aN;if(location.href.indexOf("#")!==-1){aK=location.href.substr(0,location.href.indexOf("#"))}if(aI!==aK){return}aO=escape(this.href.substr(this.href.indexOf("#")+1));aP;try{aP=b("#"+aO+', a[name="'+aO+'"]')}catch(aQ){return}if(!aP.length){return}aJ=aP.closest(".jspScrollable");aM=aJ.data("jsp");aM.scrollToElement(aP,true);if(aJ[0].scrollIntoView){aL=b(a).scrollTop();aN=aP.offset().top;if(aN<aL||aN>aL+b(a).height()){aJ[0].scrollIntoView()}}s.preventDefault()
})}function an(){var aJ,aI,aL,aK,aM,s=false;al.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.jsp",function(aN){var aO=aN.originalEvent.touches[0];aJ=aC();aI=aA();aL=aO.pageX;aK=aO.pageY;aM=false;s=true}).bind("touchmove.jsp",function(aQ){if(!s){return}var aP=aQ.originalEvent.touches[0],aO=aa,aN=I;Q.scrollTo(aJ+aL-aP.pageX,aI+aK-aP.pageY);aM=aM||Math.abs(aL-aP.pageX)>5||Math.abs(aK-aP.pageY)>5;return aO==aa&&aN==I}).bind("touchend.jsp",function(aN){s=false}).bind("click.jsp-touchclick",function(aN){if(aM){aM=false;return false}})}function g(){var s=aA(),aI=aC();D.removeClass("jspScrollable").unbind(".jsp");D.replaceWith(ao.append(Y.children()));ao.scrollTop(s);ao.scrollLeft(aI);if(av){clearInterval(av)}}b.extend(Q,{reinitialise:function(aI){aI=b.extend({},ay,aI);ar(aI)},scrollToElement:function(aJ,aI,s){ab(aJ,aI,s)},scrollTo:function(aJ,s,aI){N(aJ,aI);M(s,aI)},scrollToX:function(aI,s){N(aI,s)},scrollToY:function(s,aI){M(s,aI)},scrollToPercentX:function(aI,s){N(aI*(T-aj),s)},scrollToPercentY:function(aI,s){M(aI*(Z-v),s)},scrollBy:function(aI,s,aJ){Q.scrollByX(aI,aJ);Q.scrollByY(s,aJ)},scrollByX:function(s,aJ){var aI=aC()+Math[s<0?"floor":"ceil"](s),aK=aI/(T-aj);W(aK*j,aJ)},scrollByY:function(s,aJ){var aI=aA()+Math[s<0?"floor":"ceil"](s),aK=aI/(Z-v);V(aK*i,aJ)},positionDragX:function(s,aI){W(s,aI)},positionDragY:function(aI,s){V(aI,s)},animate:function(aI,aL,s,aK){var aJ={};aJ[aL]=s;aI.animate(aJ,{duration:ay.animateDuration,easing:ay.animateEase,queue:false,step:aK})},getContentPositionX:function(){return aC()},getContentPositionY:function(){return aA()},getContentWidth:function(){return T},getContentHeight:function(){return Z},getPercentScrolledX:function(){return aC()/(T-aj)},getPercentScrolledY:function(){return aA()/(Z-v)},getIsScrollableH:function(){return aE},getIsScrollableV:function(){return az},getContentPane:function(){return Y},scrollToBottom:function(s){V(i,s)},hijackInternalLinks:b.noop,destroy:function(){g()}});ar(O)}e=b.extend({},b.fn.jScrollPane.defaults,e);b.each(["mouseWheelSpeed","arrowButtonSpeed","trackClickSpeed","keyboardSpeed"],function(){e[this]=e[this]||e.speed});return this.each(function(){var f=b(this),g=f.data("jsp");if(g){g.reinitialise(e)}else{b("script",f).filter('[type="text/javascript"],:not([type])').remove();g=new d(f,e);f.data("jsp",g)}})};b.fn.jScrollPane.defaults={showArrows:false,maintainPosition:true,stickToBottom:false,stickToRight:false,clickOnTrack:true,autoReinitialise:false,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,contentWidth:c,animateScroll:false,animateDuration:300,animateEase:"linear",hijackInternalLinks:false,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:0,arrowButtonSpeed:0,arrowRepeatFreq:50,arrowScrollOnHover:false,trackClickSpeed:0,trackClickRepeatFreq:70,verticalArrowPositions:"split",horizontalArrowPositions:"split",enableKeyboardNavigation:true,hideFocus:false,keyboardSpeed:0,initialDelay:300,speed:30,scrollPagePercent:0.8}})(jQuery,this);

/*下载相关JS*/
var Overlay = {
    overlay : $("#overlay"),
    pop : function(opts){
        var windowElem = $("#" + opts.contentId),
            closeElem = $("#" + opts.closeId),
            height =  ___getPageSize()[1] + "px";
        Overlay.overlay.show();
        Overlay.overlay.css({ "height": ___getPageSize()[1] + "px" });
        windowElem.css({"left":"50%","visibility":"visible"});
        closeElem.unbind("click").bind("click", function (e) {
            Overlay.overlay.hide();
            windowElem.css("visibility","hidden");
        });
    }
};
/**
 * Created by Administrator on 2015/4/9.
 */
var AdaptDown = function (reqPrefix) {
    //用到的时候才初始化，只初始化一次
    var instantiated;
    function init(args) {
        var args = args || {};
        //通用信息
        var $atName = $("#adaptSet .at-name"),   //设置机型框手机机型是
            $brandVal = $("#brandValue"), //设置机型框手机品牌
            $typeVal = $("#modelValue"), //选择机型框手机型号
            $topAdapt = $("#topAdapt"), //头部展示机型区域
            dami = getCookie("dami"), //安卓用户id
            damiInfo = unescape(String(getCookie("damiInfo")).replace(/\\/g, "%")); //本地存储的用户机型
        //详情页会用到的相关信息
        var $deHasSet = $("#deHasSet"),
            $deAdapt = $("#deAdapt");
        var modelValue = [],  //记录请求过的机型
            modelName = [],   //记录机型对应的型号名
            _brandPara = "",  //品牌
            _modelPara = "",  //型号
            localRt,
            localRi;
        _totalInit();
        /**
         * 刷新页面进行的的初始化
         * 非详情页只需要设置头部，详情页还要适配顶部下载
         * @private
         * todo 缓存详情页请求到的包解析出来的html
         */
        function _totalInit() {
            if(damiInfo!=="null" && damiInfo != "other"){
                _brandPara = damiInfo.split("#")[0];
                _modelPara = damiInfo.split("#")[1];
                _setTopArea(true, _brandPara, _modelPara);
            }else{
                _setTopArea(false);
            }
            //如果是详情页，要处理顶部下载的适配
            if (args.ifDetail) {
                detailBtnCtrl({
                    rt: args.rt,
                    ri: args.ri,
                    gather: "top"
                },false,true);
                $("div.version-title").on("click",function(){
                    $that=$(this).parent();
                    var rt_ri = $that.data("gather");
                    if($that.hasClass("gather-show")) {
                        $that.removeClass("gather-show").find(".down-loading").show();
                        $that.find(".version-download").hide();

                    } else {
                        $that.addClass("gather-show").siblings().removeClass("gather-show");
                        detailBtnCtrl({
                            rt: rt_ri.split("_")[1],
                            ri: rt_ri.split("_")[0],
                            gather: rt_ri
                        });
                    }
                });
                $(".version-download").on("mouseover", "li" ,function(){
                    $(this).find(".de-drop").show();
                }).on("mouseout",function(){
                    $(this).find(".de-drop").hide();
                });
                $("#deHasSet").on("mouseenter","li.de-head-btn",function(){
                    var t = $(this).find(".de-drop");
                    if(t.find("li").length >= 0){
                        t.show();
                    }
                });
                $("#deHasSet").on("mouseleave","li.de-head-btn",function(){
                    $(this).find(".de-drop").hide();
                });
            }
        }
        /**
         * 验证是否登录
         * @returns true为已登录，false为未登录
         * @private
         */
        function _ifLog() {
            return DJPASS().isLogin();
        }
        /**
         * 头部与机型框的机型展示
         * @param hasSet 是否设置过手机型号
         * @param brand 手机品牌
         * @param model 手机型号
         * @private
         */
        function _setTopArea(hasSet, brand, model) {
            var brand = brand || "",
                model = model || "",
                html = "";
            if (hasSet) {
                html+='机型：';
                html+='<a class="set-adapt" href="javascript:" title="设置机型" onclick="Adapt.adapt(false)">';
                html+='<span class="m-name">'+brand+' '+model+'</span>(修改)</a>';
                /*设置机型框的两个框*/
                $brandVal.html(brand);
                $typeVal.html(model);
                $atName.html(brand + " " + model);
            } else {
                html='<a class="set-adapt" href="javascript:" onclick="Adapt.adapt(false)">设置机型</a>';
            }
            $topAdapt.html(html);
        }
        /**
         * 处理顶部下载按钮的适配以及聚合下载的适配
         * @param options
         * ｛
         *      rt: resourceType
         *      ri: resourceId
         *      gather: 标识具体触发位置的父级元素属性，为top说明是头部
         *  ｝
         * @param ifDown 标识是否适配完了执行下载
         * @param ifFirst 标识是否是第一次进入页面头部的更新
         * @returns {boolean}
         * 详情页头部的设置和下面聚合下载按钮的设置
         */
        function detailBtnCtrl(options, ifDown, ifFirst) {
            var options = options || {},
                ifDown = ifDown || false;
            var t = $('[data-gather=' + options.gather +']'),
                html = "";
            var rt = options.rt;
            var ri = options.ri;
            //如果不存在gather或者没找到gather对应的元素或者不提供当乐下载包，return
            if( !options.gather || t.length <= 0 || t.data("downjoyUrl") == false) {
                return false;
            }
            $.ajax({
                type: "POST",
                url: reqPrefix + '/rm/red/' + rt + '/' + ri,
                data: {
                    brand: _brandPara,
                    model: _modelPara
                },
                success: function (data) {
                    if(data && !data.msg) {
                        if (!data.pkgs || data.pkgs.length === 0){
                            return false;
                        }
                        if (!data.isSet) { //如果不需要设置机型
                            //如果是详情页头部,没有任何问题
                            if(options.gather === "top") {
                            	var isNotDownjoyUrl=t.attr("data-notDownjoyUrl");
                                html = _showDownBtn(data.pkgs, rt, ri, true,isNotDownjoyUrl) || "";
                                $deHasSet.find(".de-down").html(html);
                                $deAdapt.hide();
                                $deHasSet.show();
                            } else { //是下面的聚合下载时
                            	var isNotDownjoyUrl=t.attr("data-notDownjoyUrl");
                                html = _showDownBtn(data.pkgs, rt, ri,false,isNotDownjoyUrl) || "";
                                t.find(".gather-adpat").hide();
                                t.find(".version-download").html(html);
                                t.find(".down-loading").hide();
                                t.find(".version-download").show();
                            }
                            if(data.pkgs.length === 1 && ifDown) {
                                downPush(data.pkgs[0].pkgUrl, rt, ri);
                            }
                        } else{ //如果需要设置机型
                            !ifFirst && adapt(ifDown, options);
                        }
                    } else if (data.msg != "") {
                        return false;
                    }
                },
                error: function () {
                    alert("请稍后再试");
                    return false;
                }
            });
        }
        /**
         * 根据手机品牌获取手机型号
         * @param brand 当前选择的手机品牌
         * @private
         */
        function _getTypeDate(brand) {
            var brandValue = encodeURIComponent(brand);
            //如果已经请求过了，就不再重复请求
            if (modelValue[brandValue]) {
                $typeVal.html(modelName[brandValue][0]);
                $("#typeUl").html(modelValue[brandValue]);
                $("#type").scrollBar({showCont : "typeLi",tri : "typeTri"});
                $atName.html($brandVal.html()+" "+$typeVal.html());
            } else {
                $.ajax({
                    type: "GET",
                    url: reqPrefix+'/asych/lsmodel?brand=' + brandValue,
                    dataType: "json",
                    success: function(data){
                        var len = data.length,
                            html="";
                        if(len!=0){
                            modelName[brandValue] = [];
                            for(var i=0;i<len;i++){
                                html+='<li cpu="'+data[i].cpu+'">'+data[i].modelName+'</li>';
                                modelName[brandValue].push(data[i].modelName);
                            }
                            modelValue[brandValue] = html;
                            $typeVal.html(data[0].modelName);
                            $("#typeUl").html(html);
                            $("#type").scrollBar({showCont:"typeLi",tri:"typeTri"});
                            $atName.html($brandVal.html()+" "+$typeVal.html());
                        } else{
                            $typeVal.html("请选择手机型号");
                            $("#typeUl").html("");
                        }
                    },
                    error: function () {
                        alert("网络状况差，请稍后重试");
                        return false;
                    }
                });
            }
        }
        /**
         * 设置机型框下拉框事件
         * @param opts
         * @returns {*}
         */
        $.fn.scrollBar = function(opts){
            opts=opts||{};
            var t=$(this),
                defaults={
                    showCont:"brandLi",
                    tri:"brandTri"
                };
            opts=$.extend(defaults,opts);
            var $show=$("#"+opts.showCont),
                $tri=$("#"+opts.tri);
            function showCont(){
                $tri.addClass("hover");
                $show.show().jScrollPane();
            }
            function init(){
                setEvents();
            }
            function hide(){
                $("#adaptSet .label-arrow").removeClass("hover");
                $("#typeLi,#brandLi").hide();
            }
            function setEvents(){
                $tri.off("click").on("click",function(){
                    if($show.css("display")=="none"){
                        hide();
                        showCont();
                    }else{
                        hide();
                    }
                });
                $show.off("click").on("click", "li", function(){
                    var txt=$(this).text();
                    t.find(".label-choosen").html(txt);
                    hide();
                    if(opts.showCont=="brandLi"){
                        _getTypeDate(txt);
                    }else{
                        $atName.html($brandVal.html()+" "+$typeVal.html());
                    }
                });
            }
            return init();
        };
        /**
         * 点击设置机型后的动作
         * @param ifDown 为true，则设置完后要进行下载动作，用于点击下载按钮后设置机型的操作
         * @param gatherElem 看有没有触发设置的元素，有，说明是详情页头部或者聚合处触发的
         */
        function adapt(ifDown, options) {
            //手机品牌下拉框
            var $brandUl = $("#brandUl"),$brandValue = $("#brandValue").text().trim();
            /*
             展示设置机型框
             */
            Overlay.pop({contentId:"adaptSet",closeId:"adaptSetC"});
            //如果没请求过手机品牌去请求一次手机品牌
            if ($brandUl.find("li").length <= 0) {
                /*拿手机品牌*/
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: reqPrefix+'/asych/lsmodelbrand',
                    success: function (data){
                        var len = data.length,
                            html="";
                        for(var i=0;i<len;i++){
                            html+='<li>'+data[i].value+'</li>';
                        }
                        $brandUl.html(html);
                        $("#brand").scrollBar();//设置滚动条相关
                    },
                    error : function () {
                        alert("网络状况差，请稍后重试");
                        return false;
                    }
                });
            }
            if($brandValue !=="请选择手机品牌"){
            	$.ajax({
                    type: "GET",
                    url: reqPrefix+'/asych/lsmodel?brand=' + $brandValue,
                    dataType: "json",
                    success: function(data){
                        var len = data.length,
                            html="";
                        if(len!=0){
                           
                            for(var i=0;i<len;i++){
                                html+='<li cpu="'+data[i].cpu+'">'+data[i].modelName+'</li>';
                                
                            }
                            
                            $("#typeUl").html(html);
                            $("#type").scrollBar({showCont:"typeLi",tri:"typeTri"});
                          
                        } 
                    },
                    error: function () {
                        alert("网络状况差，请稍后重试");
                        return false;
                    }
                });
            }
                
           
            
            /**
             * todo,是否存在这种情况：只有品牌，机型为空
             */
            ////如果有默认的品牌，就再去请求机型
            //if (Adapt.$bVal.html() != "请选择手机品牌") {
            //    _getTypeDate(brand);
            //}
            /*完成按钮事件绑定*/
            $("#atSubmit").off("click").on("click",function(){
                _setAdapt(ifDown, options);
                $("#adaptSet").css("visibility","hidden");
                $("#overlay").hide();
            });
            $("#atNot").off("click").on("click",function(){
                _noAdapt(ifDown,options);
                $("#adaptSet").css("visibility","hidden");
                $("#overlay").hide();
            });//没找到机型按钮事件
        }

        /**
         * 点成完成后的事件
         * @param ifDown 是否是点击下载触发的设置机型，是则要触发下载
         * @param gatherId 如果是点击下载的触发，会有个专门的id来标识触发的地方
         * @returns {boolean}
         * @private
         * todo 详情页下载结构处理
         */
        function _setAdapt(ifDown, options) {
            var $bValT = $brandVal.html(),
                $tValT = $typeVal.html();
            var options = options || {};
            var $gatherWrap = $("#js_versionList");
            if($bValT=="请选择手机品牌" || $tValT=="请选择手机型号"){
                return false;
            }else{
                //设置cookie和头部
                _brandPara = $bValT;
                _modelPara = $tValT;
                SetCookie("damiInfo",escape($bValT+"#"+$tValT));
                _setTopArea(true,$bValT,$tValT);
                //如果登录了，后台要保存用户选择的品牌和机型
                if(_ifLog()){
                    $.ajax({
                        type:"POST",
                        url:reqPrefix+'/asych/addModel',
                        data:{
                            dami: dami,
                            brand: $bValT,
                            model: $tValT
                        },
                        success:function(){
                            return;
                        }
                    });
                }
                //如果不是详情页，只有是下载触发的才需要去请求
                if (!args.ifDetail) {
                    if(ifDown){
                        $.ajax({
                            type: "POST",
                            url: reqPrefix + '/rm/red/' + localRt + '/' + localRi,
                            data: {
                                brand: $bValT,
                                model: $tValT
                            },
                            success: function (data) {
                                if (!data.pkgs || data.pkgs.length === 0) {
                                    return false;
                                }
                                _handleLink(data);
                            }
                        });
                    }
                } else {  //如果是详情页
                    if(options.gather) {
                        if (options.gather == "top") {
                            detailBtnCtrl(options,ifDown);
                            if($gatherWrap.find(".gather-show").length === 1) {
                                $gatherWrap.find(".gather-show .version-title").trigger("click").trigger("click");
                            }
                        } else { //如果不是头部，除了设置他本身，还要设置头部
                            detailBtnCtrl(options,ifDown);
                            detailBtnCtrl({
                                rt: args.rt,
                                ri: args.ri,
                                gather: "top"
                            },false);
                        }
                    } else { //没有说明是顶部设置机型触发的设置框,顶部和展开的聚合处都要适配
                        detailBtnCtrl({
                            rt: args.rt,
                            ri: args.ri,
                            gather: "top"
                        },false);
                        if($gatherWrap.find(".gather-show").length === 1) {
                            $gatherWrap.find(".gather-show .version-title").trigger("click").trigger("click");
                        }
                    }
                }
            }
        }
        function _noAdapt(ifDown, options) {
            var $gatherWrap = $("#js_versionList");
            SetCookie("damiInfo",escape("other"));
            $brandVal.html("请选择手机品牌");
            $typeVal.html("请选择手机型号");
            $atName.html("");
            _setTopArea(false);
            $("#typeUl").html(""); //有必要清空手机型号的选择条，不然不选择机型也能选择型号
            _brandPara = "other";
            _modelPara = "other";
            options = options || {};
            if (!args.ifDetail) {
                if(ifDown){
                    $.ajax({
                        type:"POST",
                        url:reqPrefix+'/rm/red/' + localRt + '/' + localRi,
                        success:function(data){
                            if(!data.pkgs || data.pkgs.length === 0){
                                return false;
                            }
                            if(!data.msg && data.pkgs){
                                _handleLink(data);
                            }
                        },
                        error: function () {
                            alert("请稍后再试");
                            return false;
                        }
                    });
                }
            } else {
                if(options.gather) {
                    if (options.gather == "top") {
                        detailBtnCtrl(options,ifDown);
                        if($gatherWrap.find(".gather-show").length === 1) {
                            $gatherWrap.find(".gather-show .version-title").trigger("click").trigger("click");
                        }
                    } else { //如果不是头部，除了设置他本身，还要设置头部
                        detailBtnCtrl(options,ifDown);
                        detailBtnCtrl({
                            rt: args.rt,
                            ri: args.ri,
                            gather: "top"
                        },false);
                    }
                } else { //没有说明是顶部设置机型触发的设置框,顶部和展开的聚合处都要适配
                    detailBtnCtrl({
                        rt: args.rt,
                        ri: args.ri,
                        gather: "top"
                    },false);
                    if($gatherWrap.find(".gather-show").length === 1) {
                        $gatherWrap.find(".gather-show .version-title").trigger("click").trigger("click");
                    }
                }
            }
        }
        /**
         * 点击箭头下载按钮 只有首页和列表页用到
         * @param obj this
         * @param rt resourceType
         * @param ri resourceId
         */
        function adaptDown(obj,rt,ri) {
            localRt = rt;
            localRi = ri;
            $.ajax({
                type:"POST",
                url:reqPrefix+'/rm/red/'+rt+'/'+ri,
                data:{
                    brand: _brandPara,
                    model: _modelPara
                },
                success:function(data){
                    if(!data.pkgs || data.pkgs.length === 0){
                        return false;
                    }
                    if(!data.msg){
                        if(data.pkgs){
                            if(!data.isSet){//如果不需要设置机型
                                _handleLink(data);
                            }else{ //如果需要设置机型
                                adapt(true);
                            }
                        }
                    }else if(data.msg != ""){
                        alert(data.msg);
                        return false;
                    }
                },
                error: function () {
                    alert("请稍后再试");
                    return false;
                }
            });
        }
        /**
         * 统计下载行为
         * @param to 下载的包地址
         */
        function  downPush(to, rt, ri, ifDpk) {
            var hintnot = getCookie("hintnot"),user=decodeURI(getCookie("DJ_MEMBER_INFO")),user_id=null;
            if(user && user != 'null'){
            	user_id=user.split("(")[1].split(")")[0];
            }
            if(hintnot != 1 && ifDpk == 1){
                _firstShowDpk(function(){
                    $.ajax({
                        type:"POST",
                        url:reqPrefix+'/rm/dpush',
                        data:{
                            rt: rt,
                            ri: ri,
                            user:user_id
                        },
                        success:function(re){
                            if(to){
                            	if(re.score>1){
                            		var k = '<div class="integral">下载<span>积分<em>+' + re.score + "</em></span><span>金币<em>+" + re.score + "</em></span></div>";
                                    $("body").append(k);
                                    $(".integral").delay(2000).animate({opacity: 0}, 1000, function() {
                                        $(this).remove()
                                    });
                            	}
                            	
                                window.location.href = to;
                            }
                            return true;
                        }
                    });
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: reqPrefix + '/rm/dpush',
                    data: {
                        rt: rt,
                        ri: ri,
                        user:user_id
                    },
                    success: function (re) {
                        if (to) {
                        	if(re.score>1){
                        		var k = '<div class="integral">下载<span>积分<em>+' + re.score + "</em></span><span>金币<em>+" + re.score + "</em></span></div>";
                                $("body").append(k);
                                $(".integral").delay(2000).animate({opacity: 0}, 1000, function() {
                                    $(this).remove()
                                });
                        	}
                            window.location.href = to;
                        }
                        return true;
                    },
                    error: function () {
                        alert("请稍后再试");
                        return false;
                    }
                });
            }

        }
        /**
         * dpk直接下载处理函数
         * @param callback
         */
        function _firstShowDpk(callback){
            var $hint = $("#Hint");
            var $close = $("#hintClose");
            var $hintNot = $hint.find("span.hint-not");
            var $hintSure = $hint.find("a.hint-submit");
            Overlay.pop({contentId:"Hint",closeId:"hintClose"});
            $hintNot.find("a").bind("click",function(){
                //不在提示判断，添加和去掉相应的css样式
                $hintNot.hasClass("hint-not-curr")? $hintNot.removeClass("hint-not-curr") : $hintNot.addClass("hint-not-curr");
            });
            $close.one("click",function(){
                if(!$hintNot.hasClass("hint-not-curr") && getCookie("hintnot") == null){
                    var exp = new Date();
                    exp.setTime(exp.getTime()+86400000-(exp.getHours()*60*60+exp.getMinutes()*60+exp.getSeconds())*1000);
                    document.cookie = "hintnot=1"+ ";expires=" + exp.toGMTString();
                }else if($hintNot.hasClass("hint-not-curr")){
                    var exp = new Date(2020,1,1);
                    exp.setTime(exp.getTime());
                    document.cookie = "hintnot=1"+ ";expires=" + exp.toGMTString();
                }
                if(typeof callback == "function"){
                    callback();
                }
            });
            $hintSure.one("click",function(){
                $hint.css("visibility","hidden");
                $("#overlay").hide();
                if(!$hintNot.hasClass("hint-not-curr") && getCookie("hintnot") == null){
                    var exp = new Date();
                    exp.setTime(exp.getTime()+86400000-(exp.getHours()*60*60+exp.getMinutes()*60+exp.getSeconds())*1000);
                    document.cookie = "hintnot=1"+ ";expires=" + exp.toGMTString();
                }else if($hintNot.hasClass("hint-not-curr")){
                    var exp = new Date(2020,1,1);
                    exp.setTime(exp.getTime());
                    document.cookie = "hintnot=1"+ ";expires=" + exp.toGMTString();
                }
                if(typeof callback == "function"){
                    callback();
                }
            });
        }

        /**
         * 处理拿到的下载地址
         * @param data
         * @returns {boolean}
         * @private
         */
        function _handleLink(data) {
            var hintnot = getCookie("hintnot"),
                html = "";
            if(data.pkgs.length == 1){ //如果返回只有一个包，直接下载
                if(data.pkgs[0].isDPK==0){
                    downPush(data.pkgs[0].pkgUrl, localRt, localRi);
                }else{
                    if(hintnot != 1){
                        _firstShowDpk(function(){
                            downPush(data.pkgs[0].pkgUrl, localRt, localRi);
                        });
                    }else{
                        downPush(data.pkgs[0].pkgUrl, localRt, localRi);
                    }
                }
                return false;
            }else{
                for(var i = 0,len = data.pkgs.length;i<len;i++){
                    html += '<li><a href="javascript:void(0)" title="'+data.pkgs[i].name;
                    html += '" onclick="Adapt.downPush(\''+data.pkgs[i].pkgUrl+'\','+ localRt +','+ localRi+')"><span><i></i>'+data.pkgs[i].name+'</span></a></li>';
                }
                var showAllLink = function(){
                    $("#adaptMore").find(".adapt-ul").html(html).on("click","li a",function(){
                        $("#adptMore").css("visibility","hidden");
                        $("#overlay").hide();
                    });
                    Overlay.pop({contentId:"adaptMore",closeId:"adaptMore"});
                }
                //如果是dpk包，切还未提示过，则暂时提示
                if(data.pkgs[0].isDPK == 0 && hintnot != 1){
                    _firstShowDpk(showAllLink);
                }else{
                    showAllLink();
                }
            }
        }

        /**
         * 详情页下载按钮结构的处理
         * @param data 传给showDownBtn的包
         * @returns {boolean}
         * @private
         */
        function _showDownBtn(data, rt, ri, ifDimen,ifGF) {
            var iHtml = "",
                pcHtml = "",
                baiduHtml = "",
                baidubtn = "",
                ifBaidu = 0;
            if(data && data.length > 0){
                if(data.length === 1){ //只有一个包的情况下
                	if(ifGF==true){
                		iHtml='<a class="de-head-btn de-off-btn" title="官方下载" href='+data[0].resOfficialUrl+' target="_blank">官方下载</a>'
                	}else{
	                	if(ifDimen) {
	                        if(data[0].qrcode && data[0].qrcode!== "") {
	                            if(data[0].isDPK != 1){
	                                $("#deDimen").find("img").attr("src",data[0].qrcode);
	                            } else{
	                                $("#deDimDpk").find("img").attr("src",data[0].qrcode);
	                                $("div.de-dimen").hide().eq(2).show();
	                            }
	
	                        }else{
	                            $("div.de-dimen").hide().eq(1).show();
	                        }
	                    }
	                    if(data[0].isDPK ==0){
	                        iHtml += '<li class="de-head-btn">';
	                        iHtml += '<a href="javascript:void(0)" title="'+data[0].name;
	                        iHtml += '" onclick="Adapt.downPush(\''+data[0].pkgUrl+'\','+ rt+',' + ri + ')" class="de-head-btn de-pc-btn">立即下载</a></li>';
	                    }else{
	                        iHtml += '<li class="de-head-btn">';
	                        iHtml += '<a href="javascript:void(0)" title="'+data[0].name;
	                        iHtml += '" onclick="Adapt.downPush(\''+data[0].pkgUrl+'\','+ rt+',' + ri + ',1)" class="de-head-btn de-pc-btn">立即下载</a></li>';
	                    }
	                    iHtml += '<li class="de-head-btn"><a href="javascript:;" title="安装到手机" ';
	                    iHtml += 'base64="'+data[0].base64+'" class="de-head-btn de-mob-btn"';
	                    iHtml += ' onclick="Plugin.DownloadApp(this,'+rt+','+ri+')">';
	                    iHtml += '安装到手机</a>';
	                    if(data[0].baiduUrl !== ""){
	                        iHtml += '<li class="de-head-btn">';
	                        iHtml += '<a href="'+data[0].baiduUrl+'" title="'+data[0].name;
	                        iHtml += '" class="de-head-btn de-baidu-btn" target="_blank">百度网盘</a></li>';
	                    }
	                }
            	}else{ //多个包的情况下
                    iHtml += '<li class="de-head-btn">';
                    iHtml += '<a href="javascript:;" title="立即下载" class="de-head-btn de-pc-btn">立即下载</a>';
                    iHtml += '<ul class="de-drop">';
                    pcHtml += '<li class="de-head-btn"><a href="javascript:;" title="安装到手机" ';
                    pcHtml += 'class="de-head-btn de-mob-btn">安装到手机</a>';
                    pcHtml += '<ul class="de-drop">';
                    for(var i = 0,len = data.length;i<len;i++){
                        if(data[i].isDPK ==0){
                            iHtml += '<li>';
                            iHtml += '<a href="javascript:void(0)" title="'+data[i].name;
                            iHtml += '" onclick="Adapt.downPush(\''+data[0].pkgUrl+'\','+ rt+',' + ri + ')"><i></i>' + data[i].name + '</a></li>';
                        }else{
                            iHtml += '<li>';
                            iHtml += '<a href="javascript:void(0)" title="'+data[i].name;
                            iHtml += '" onclick="Adapt.downPush(\''+data[0].pkgUrl+'\','+ rt+',' + ri + ',1)"><i></i>' + data[i].name + '</a></li>';
                        }
                        pcHtml += '<li><a href="javascript:;" title="'+data[i].name+'" ';
                        pcHtml += 'base64="'+data[i].base64+'"';
                        pcHtml += ' onclick="DownloadApp(this,'+rt+','+ri+')">';
                        pcHtml += '<i></i>' + data[i].name+'</a>';
                        pcHtml += '</li>';
                        if(data[i].baiduUrl !== ""){
                            ifBaidu = 1;
                            baidubtn += '<li>';
                            baidubtn += '<a href="'+data[i].baiduUrl+'" title="'+data[i].name;
                            baidubtn += '"><i></i>' + data[i].name + '</a></li>';
                        }
                    }
                    if(ifBaidu === 1){
                        baiduHtml += '<li class="de-head-btn"><a href="javascript:;" title="百度网盘" ';
                        baiduHtml += 'class="de-head-btn de-baidu-btn" target="_blank">百度网盘</a>';
                        baiduHtml += '<ul class="de-drop">';
                        baiduHtml += baidubtn + '</ul></li>';
                    }
                    pcHtml += '</ul></li>';
                    iHtml += '</ul></li>' + pcHtml + baiduHtml;
                    ifDimen && $("div.de-dimen").hide().eq(0).show();
                }
                return iHtml;
                //InfoAdapt.$deHasSet.find(".de-down").html(iHtml);
                //InfoAdapt.$deAdapt.hide();
                //InfoAdapt.$deHasSet.show();
            }else{
                return false;
            }
        }
        /**
         * 要暴露的接口
         */
        return {
            adapt: adapt,
            adaptDown: adaptDown,
            downPush: downPush,
            detailBtnCtrl: detailBtnCtrl
        };
    }

    return {
        getInstance: function (args) {
            if (!instantiated) {
                instantiated = init(args);
            }
            return instantiated;
        }
    };
}(reqPrefix);
var Adapt = AdaptDown.getInstance(detailArgs || {});
/**/
var _browser_type = function () {
    var ua = navigator.userAgent.toLowerCase(),
        type = "unkonwn";
    if (/msie/i.test(ua) || /trident/i.test(ua)) {
        type = "IE";
    } else if (/firefox/i.test(ua)) {
        type = "Firefox";
    } else if (/chrome/i.test(ua) && /webkit/i.test(ua) && /mozilla/i.test(ua)) {
        if (/360EE/i.test(ua)) {
            type = "360";
        } else {
            type = "Chrome";
        }
    } else if (/opera/i.test(ua)) {
        type = "Opera";
    } else if (/webkit/i.test(ua)) {
        type = "Safari";
    }
    return type;
} ();
/*BHO*/
function DownloadPC_Client() {
    var browser = _browser_type;
    //$.post("/ashx/ClickBtnLog.ashx",
    //    { appid: Plugin.appId , apptype: Plugin.appType, platform:2, client: 'creationnews', btntype: 'DownloadPC_ClientBtn', browser: browser },
    //    function (data) {
            window.location.href = "http://ios.d.cn/Subject/ProductShow/Download.ashx?c=pcandroid0&t=pcCDN&v=android000";
            if (browser == 'IE') {
                window.event.returnValue = false;
            }
    //
    //    },
    //    "text"
    //);
}
var Plugin = {
    $iePop: $("#ieBox"),
    $popBox: $("#clientBox"),
    $overlay: $("#overlay"),
    appId:"",
    appType:"",
    $id: function () {
        var elements = new Array();
        for (var i = 0; i < arguments.length; i++) {
            var element = arguments[i];
            if (typeof element == 'string')
                element = document.getElementById(element);
            if (arguments.length == 1)
                return element;
            elements.push(element);
        }
        return elements;
    },
    _createDom: function (tag, id, Obj, hide) {
        var nbox = Plugin.$id(id),
            k;
        if (!nbox) {
            nbox = document.createElement(tag);
            nbox.id = id;
            if (typeof (Obj) != 'undefined' && Obj) {
                for (k in Obj) nbox[k] = Obj[k];
            }
            if (typeof (hide) != 'undefined') nbox.style.cssText = 'display:none;';
            document.body.appendChild(nbox);
        }
        return nbox;
    },
    _createPlugin: function (obj,base,rt,ri) {
        var device = Plugin.$id('dlObject'),
            browser = _browser_type;
        if (!device) device = Plugin._createDom('div', 'dlObject');
        if (device.innerHTML.length <= 0) {
            switch (browser) {
                case 'IE':
                    device.innerHTML = '<object id="dangle" style="Z-INDEX: 8" classid="CLSID:8B0F1B27-E483-42AD-9775-7186A92B228A" width="10" height="10"></object>';
                    break;
                case "Chrome":
                    device.innerHTML = '<embed id="dangle" type="application/npdlplugin" width="3" height="2">';
                    var pls = navigator.plugins;
                    pls.refresh(false);
                    break;
                case "Firefox":
                    device.innerHTML = '<embed id="dangle" type="application/npdlfxplugin" width="3" height="2">';
                    var pls = navigator.plugins;
                    pls.refresh(false);
                    break;
                default:
                    device.innerHTML = '<object id="dangle" style="Z-INDEX: 8" classid="CLSID:8B0F1B27-E483-42AD-9775-7186A92B228A" width="10" height="10"></object>';
                    break;
            }
        }
        Plugin.startdownload(obj, browser,rt,ri,base);
    },
    DownloadApp: function (obj,rt,ri,base) {
        base = base?base :$(obj).attr("base64");
        if (base && base != "") {
            Plugin._createPlugin(obj,base,rt,ri);
            obj.onclick = null;
            setTimeout(function () {
                obj.onclick = function () {
                    Plugin.DownloadApp(this,base);
                    return false;
                }
            }, 1000);
        }else return;
    },
    startdownload: function (obj, browser_type,rt,ri,base) {

        var base = base || "";
        var dl = Plugin.$id('dangle'),
            $obj = $(obj),
            appid = ri,
            apptype = rt,
            $iePop = Plugin.$iePop,
            $popBox = Plugin.$popBox,
            base64 = base?base :$(obj).attr("base64");
        if (dl) {
            try {
                switch (browser_type) {
                    case 'IE':
                        try {
                            dl.CallMothod("dangleandroidurl:" + base64);
                            //Plugin.AddClickBtnLog(appid,apptype,"DownloadAppBtn");
                        }
                        catch (e) {
                            Plugin.showPop($iePop, $("#ieClose"),appid,apptype);
                            $("#downClient").unbind("click").bind("click", function () {
                                Plugin.windowHide($iePop);
                            });
                            $("#ieDown").unbind("click").bind("click", function () {
                                var t = window.location.href;
                                var popup = window.open("dangleandroidurl:" + base64);
                                setTimeout(function () { popup.close(); }, 3000);
                                Plugin.windowHide($iePop);
                                window.event.returnValue = false;
                                //Plugin.AddClickBtnLog(appid,apptype, "DownloadAppBtn");
                            });
                        }
                        break;
                    case 'Chrome':
                    case 'Firefox':
                        dl.CallMothod('dangleandroidurl:'+base64);
                        //Plugin.AddClickBtnLog(appid,apptype, "DownloadAppBtn");
                        break;
                    default:
                        window.location.href = "dangleandroidurl:" + base64;
                        window.event.returnValue = false;
                        //Plugin.AddClickBtnLog(appid,apptype, "DownloadAppBtn");
                        break;
                }
            } catch (e) {
                Plugin.showPop($popBox, $("#clientClose"),appid,apptype);
                $("#clientDown").unbind("click").bind("click", function () {
                    Plugin.windowHide($popBox);
                });
            }
        }
    },
    AddClickBtnLog: function (appid,apptype, btntype) {
        var browser = _browser_type;
        $.post("/Utility/AddClickBtnLog.ashx",
            { appid: appid,apptype:apptype,platform:2, client: 'creationnews', btntype: btntype, browser: browser  },
            function (data) { },
            "text"
        );
    },
    overlaySize: function (id) {
        var height = document.body.clientHeight + "px";
        $("#" + id).css({ "height": height });
    },
    windowHide: function (box){
        Plugin.$overlay.hide();
        box.css("display", "none");
    },
    showPop: function (box, close,appid,apptype) {
        Plugin.$overlay.show();
        Plugin.overlaySize('overlay');
        box.css({ "left": "50%", "display": "block" });
        $(window).resize(function () {
            Plugin.overlaySize("overlay");
        });
        close.unbind("click").bind("click", function (e) {
            //Plugin.AddClickBtnLog(appid,apptype,"DownloadPC_ClientCloseBtn");
            Plugin.windowHide(box);
        });
        return false;
    }
};
/*喜欢和取消喜欢* Coll.coll(rt,ri)*/
var Coll = {
    ifDone : true,
    ifLog : function(){
        return DJPASS().isLogin();
    },
    coll : function(obj,rt,ri,ifDe){
        var ifDe = ifDe || false;
        var html = '<span class="coll-msg"></span>';
        var $obj = $(obj);
        $obj.append(html);
        var $coNum = $obj.find("#coNum");
        var coNum;
        if(Coll.ifLog()){//如果登录了
            if(Coll.ifDone){
                Coll.ifDone = false;
                if(!$obj.hasClass("curr")){
                    $.ajax({
                        type:"POST",
                        url:reqPrefix+'/asych/changeFavorite',
                        dataType:"json",
                        data:{
                            ri:ri,
                            rt:rt,
                            f:1
                        },
                        success:function(data){
                            if(data.msg === ""){
                                if(!ifDe){
                                    $obj.addClass("curr").find("span").html("喜欢成功").css("display", "block").animate({ top: '-50px' }, 1000, function () {
                                        $(this).css({ display: 'none', top: '-15px',color: '#ff8b3e' });
                                    });
                                }else{
                                    coNum = parseInt($coNum.html());
                                    $obj.addClass("curr").find(".coll-msg").html("+1").css("display", "block").animate({ top: '-50px' }, 1000, function () {
                                        $(this).css({ display: 'none', top: '-15px',color: '#ff8b3e' });
                                        $coNum.html(coNum + 1);
                                    });
                                }
                                Coll.ifDone = true;
                            }else{
                                $obj.find(".coll-msg").html("稍等片刻").css({"display":"block","color":"#888"}).animate({ top: '-50px' }, 1000, function () {
                                    $(this).css({ display: 'none', top: '-15px',color: '#ff8b3e' });
                                });
                                Coll.ifDone = true;
                                return false;
                            }
                        }
                    });
                }else{
                    $.ajax({
                        type:"POST",
                        url:reqPrefix+'/asych/changeFavorite',
                        dataType:"json",
                        data:{
                            f:0,
                            ri:ri,
                            rt:rt
                        },
                        success:function(data){
                            if(data.msg === ""){
                                if(!ifDe){
                                    $obj.removeClass("curr").find("span").html("取消成功").css("display", "block").animate({ top: '-50px' }, 1000, function () {
                                        $(this).css({ display: 'none', top: '-15px',color: '#ff8b3e' });
                                    });
                                }else{
                                    coNum = parseInt($coNum.html());
                                    $obj.removeClass("curr").find(".coll-msg").html("-1").css("display", "block").animate({ top: '-50px' }, 1000, function () {
                                        $(this).css({ display: 'none', top: '-15px',color: '#ff8b3e' });
                                        $coNum.html(coNum - 1);
                                    });
                                }
                                Coll.ifDone = true;
                            }else{
                                $obj.find(".coll-msg").html("稍等片刻").css({"display":"block","color":"#888"}).animate({ top: '-50px' }, 1000, function () {
                                    $(this).css({ display: 'none', top: '-15px',color: '#ff8b3e' });
                                });
                                Coll.ifDone = true;
                                return false;
                            }
                        }
                    });
                }
            }else{
                return false;
            }
        }else{ //如果没登录
            Overlay.pop({contentId:"baseLog",closeId:"baseLogC"});
        }
    }
};
function toTopHide() {
    if (document.documentElement.scrollTop + document.body.scrollTop > 400) {
        document.getElementById("toTop").style.display = "block";
    } else {
        document.getElementById("toTop").style.display = "none";
    }
}
$("ul.rank-cont").on("hover",".rank-front",function(){
    $(this).toggleClass("hover");
});

$(".ventor-list-game").hover(
    function(){
    $(this).css({"border-color":"#59ad00"});
    $(this).find(".star-bg").hide();
    $(this).find(".down-btn").css({"display":"block"});
},
function(){
    $(this).css({"border-color":"#ececec"});
    $(this).find(".star-bg").show();
    $(this).find(".down-btn").hide();
});
function scrollto(ele){
	if(ele){
		$(window).scrollTop($(ele).offset().top);
	}
}
