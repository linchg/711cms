/* focus */
(function(d, D, v) {
    d.fn.responsiveSlides = function(h) {
        var b = d.extend({
            auto: !0,
            speed: 1E3,
            timeout: 7E3,
            pager: !1,
            nav: !1,
            random: !1,
            pause: !1,
            pauseControls: !1,
            prevText: "Previous",
            nextText: "Next",
            maxwidth: "",
            controls: "",
            namespace: "rslides",
            before: function() {},
            after: function() {}
        },
        h);
        return this.each(function() {
            v++;
            var e = d(this),
            n,
            p,
            i,
            k,
            l,
            m = 0,
            f = e.children(),
            w = f.size(),
            q = parseFloat(b.speed),
            x = parseFloat(b.timeout),
            r = parseFloat(b.maxwidth),
            c = b.namespace,
            g = c + v,
            y = c + "_nav " + g + "_nav",
            s = c + "_here",
            j = g + "_on",
            z = g + "_s",
            o = d("<ul class='" + c + "_tabs " + g + "_tabs' />"),
            A = {
                "float": "left",
                position: "relative"
            },
            E = {
                "float": "none",
                position: "absolute"
            },
            t = function(a) {
                b.before();
                f.stop().fadeOut(q, 
                function() {
                    d(this).removeClass(j).css(E)
                }).eq(a).fadeIn(q, 
                function() {
                    d(this).addClass(j).css(A);
                    b.after();
                    m = a
                })
            };
            b.random && (f.sort(function() {
                return Math.round(Math.random()) - 0.5
            }), e.empty().append(f));
            f.each(function(a) {
                this.id = z + a
            });
            e.addClass(c + " " + g);
            h && h.maxwidth && e.css("max-width", r);
            f.hide().eq(0).addClass(j).css(A).show();
            if (1 < 
            f.size()) {
                if (x < q + 100) return;
                if (b.pager) {
                    var u = [];
                    f.each(function(a) {
                        a = a + 1;
                        u = u + ("<li><a href='#' class='" + z + a + "'>" + a + "</a></li>")
                    });
                    o.append(u);
                    l = o.find("a");
                    h.controls ? d(b.controls).append(o) : e.after(o);
                    n = function(a) {
                        l.closest("li").removeClass(s).eq(a).addClass(s)
                    }
                }
                b.auto && (p = function() {
                    k = setInterval(function() {
                        var a = m + 1 < w ? m + 1: 0;
                        b.pager && n(a);
                        t(a)
                    },
                    x)
                },
                p());
                i = function() {
                    if (b.auto) {
                        clearInterval(k);
                        p()
                    }
                };
                b.pause && e.hover(function() {
                    clearInterval(k)
                },
                function() {
                    i()
                });
                b.pager && (l.bind("click", 
                function(a) {
                    a.preventDefault();
                    b.pauseControls || i();
                    a = l.index(this);
                    if (! (m === a || d("." + j + ":animated").length)) {
                        n(a);
                        t(a)
                    }
                }).eq(0).closest("li").addClass(s), b.pauseControls && l.hover(function() {
                    clearInterval(k)
                },
                function() {
                    i()
                }));
                if (b.nav) {
                    c = "<a href='#' class='" + y + " prev'>" + b.prevText + "</a><a href='#' class='" + y + " next'>" + b.nextText + "</a>";
                    h.controls ? d(b.controls).append(c) : e.after(c);
                    var c = d("." + g + "_nav"),
                    B = d("." + g + "_nav.prev");
                    c.bind("click", 
                    function(a) {
                        a.preventDefault();
                        if (!d("." + j + ":animated").length) {
                            var c = f.index(d("." + j)),
                            a = c - 1,
                            c = c + 1 < w ? m + 1: 0;
                            t(d(this)[0] === B[0] ? a: c);
                            b.pager && n(d(this)[0] === B[0] ? a: c);
                            b.pauseControls || i()
                        }
                    });
                    b.pauseControls && c.hover(function() {
                        clearInterval(k)
                    },
                    function() {
                        i()
                    })
                }
            }
            if ("undefined" === typeof document.body.style.maxWidth && h.maxwidth) {
                var C = function() {
                    e.css("width", "100%");
                    e.width() > r && e.css("width", r)
                };
                C();
                d(D).bind("resize", 
                function() {
                    C()
                })
            }
        })
    }
})(jQuery, this, 0);
$(function() {
    $(".f580x265").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
		timeout: 5000,
        speed: 700
    });
});

/****/
$(document).ready(function(){
	/*border-bottom*/
	$('.list_rank').each(function(){
		$(this).children().last().css('border','none');	
	})
	/*tab*/
	$('.all_tit li').click(function(){
		all_tit = $(this).parent();
		b_all = all_tit.parent();
		index = all_tit.children('li').index($(this));
		all_tit.children('li').removeClass('tit_on');
		$(this).addClass('tit_on');
		b_all.children('.con').hide();
		b_all.children('.con').eq(index).show();
	})
	/*sub tab*/
	$('.c_tab li').click(function(){
		c_tab = $(this).parent();
		i = c_tab.children('li').index($(this));
		c_tab.children('li').removeClass('on');
		$(this).addClass('on');
		c_tab.parent().children('.c_list').hide();
		c_tab.parent().children('.c_list').eq(i).show();
	})
	/*wy tab*/
	$('.wy_tit li').click(function(){
		wyindex = $('.wy_tit li').index($(this));
		$('.wy_tit li').removeClass('on');
		$(this).addClass('on');
		$('.wy_con').hide();
		$('.wy_con').eq(wyindex).show();
	})
	/*scroll*/
	num = $('#li_scroll li').length/8;
	for(i=0 ; i<num ; i++){
		$('#li_num').append('<li></li>');		
	}
	$('#li_num li').eq(0).addClass('hover');
	timer = setInterval('slider(-1)',8000);
	$('#li_num li').click(function(){
		index = $('#li_num li').index($(this));
		clearInterval(timer);	
		slider(index);
		timer = setInterval('slider(-1)',8000);
	})
	/*xt*/
	$('.choose_xt').hover(function(){
		$('.xt_pop').show();
	},function(){
		$('.xt_pop').hide();
	})
	/*sr*/
	$('.sear_list li').hover(function(){
			$(this).css('background','#f8f8f8');
		},function(){
			$(this).css('background','#fff');
	})
	/*zt*/
	$('.tli_slide li').hover(function(){
			$(this).children('a').children('img').fadeTo(100,0.8);
		},function(){
			$(this).children('a').children('img').fadeTo(100,1);
	})	
	
	$('.tli_box:odd').css({'border-top':'1px solid #F1F1F1','border-bottom':'1px solid #F1F1F1','background':'#f8f8f8'});
	
	/*download*/
	$('.app_btn li:first').hover(function(){
			$(this).children('span').css('background-color','#63C671');
			$(this).children('.phone_box').show();
		},function(){
			$(this).children('span').css('background-color','#4AC15C');
			$(this).children('.phone_box').hide();
	})
	$('.msg_txt').click(function(){
		if($(this).val() == '输入您的手机号码'){
			$(this).val('');	
		}
	})
	$('.msg_txt').blur(function(){
		if($(this).val() == ''){
			$(this).val('输入您的手机号码');	
		}
	})
	//info pic
	
	$('.gn_next').click(function(){
		
		if($('.piclist').is(':animated')){
			$('.piclist').stop(true,true);
		}
		
		ml = parseInt($('.piclist').css('left'));
		r = liw - (668 - ml);
		if(r<668){
			s = r - 15;
		}else{
			s = 668;
		}
		$('.piclist').animate({left: ml - s + 'px'},'slow');			
	})
	
	$('.gn_prev').click(function(){
		
		if($('.piclist').is(':animated')){
			$('.piclist').stop(true,true);
		}
		
		ml = parseInt($('.piclist').css('left'));
		if(ml>-668){
			s = ml;
		}else{
			s = -668;
		}
		$('.piclist').animate({left: ml - s + 'px'},'slow');			
	})
	
	$('.p_more').click(function(){
		if($(this).children('a').html()=='更多...'){
			$(this).children('a').html('收起...');
			$('.p_info').css('height','auto');	
		}else{
			$(this).children('a').html('更多...');
			$('.p_info').css('height','100px');	
		}
	})
	
	//
	ulw = new Array();
	$('.tli_box').each(function(i){
		ulw[i] = $(this).children().children('.tli_slide').children().length * 100;
		$(this).children().children('.tli_slide').css('width', ulw[i] + 'px');
		if(ulw[i]>600){
			$(this).children('.tli_next').attr('class','tli_nexton');
		}
		
		$(this).find('.tli_nexton').live('click',function(){
			if($('.tli_slide').is(':animated')){
				$('.tli_slide').stop(true,true);
			}	
			
			ml = parseInt($(this).prev().prev().children('.tli_slide').css('left'));
			r = ulw[i] - (600-ml);
			if(r<600){
				s = r;
				$(this).attr('class','tli_next');
			}else{
				s = 600;
			}
			$(this).prev().prev().children('.tli_slide').animate({left: ml - s + 'px'},'slow');	
			$(this).prev().attr('class','tli_prevon');
		})
		
		$(this).find('.tli_prevon').live('click',function(){			
			if($('.tli_slide').is(':animated')){
				$('.tli_slide').stop(true,true);
			}		
			ml = parseInt($(this).prev().children('.tli_slide').css('left'));
			if(ml>=-600){
				s = ml;
				$(this).attr('class','tli_prev');	
			}else{
				s = -600;
			}
			$(this).prev().children('.tli_slide').animate({left: ml - s + 'px'},'slow');
			$(this).next().attr('class','tli_nexton');
		})
		
	})
    $('.choose').click(function(){
        var param = {
            title : "选择机型",
            modal : true,
            unloadOnHide : true
        }
        Boxy.load("/Common/AllBrands/", param);
    });

	//game_gl
	$('.gtj_tit li').click(function(){
		index = $('.gtj_tit li').index($(this));
		$('.gtj_tit li').removeClass('active');
		$(this).addClass('active');	
		$('.gjt_con').hide();
		$('.gjt_con').eq(index).show();
	})
	
	//zq
	$('.sy_min ul li:last').css('border','none');
	//g_menu
	$('.gmenu_list li').hover(function(){
		$(this).children('.subnav').show();
		$(this).addClass('menuon');
	},function(){
		$(this).children('.subnav').hide();	
		$(this).removeClass('menuon');
	})
	
	$('.xq_show').hover(function(){
		$(this).children('.g_xq').show();
		},function(){
		$(this).children('.g_xq').hide();	
	})
	$('.gz_ewm').hover(function(){
		$(this).children().show();	
		},function(){
		$(this).children().hide();
	})
	$('.strategy_tab li').click(function(){
		index = $('.strategy_tab li').index($(this));
		$('.strategy_tab li').removeClass('stab_on');	
		$(this).addClass('stab_on');
		$('.strategy_c').hide();
		$('.strategy_c').eq(index).show();
	})
	
	//lb
	$('.lb_info').each(function(){
		if($(this).children('span').length>0){
			$(this).css('padding-bottom','25px');
		} 
		$(this).children('span').toggle(function(){
			$(this).html('收起');	
			$(this).prev('p').css('height','auto')
		},function(){
			$(this).html('查看全部');	
			$(this).prev('p').css('height','60px')	
		})
		
	})
	//xq_vers
	$('.vers_tit li').click(function(){
		index = $('.vers_tit li').index($(this));
		$('.vers_tit li').removeClass('vers_on');
		$(this).addClass('vers_on');
		$('.vers_con').hide();
		$('.vers_con').eq(index).show();
	})
	
})
/* scroll function */
function slider(i){
	ml = parseInt($('#li_scroll').css('margin-left'));
	dot = $('#li_num li').index($('.hover'));
	if(i == -1){
		ml = ml - 952;
		dot = dot + 1;
	}else{
		ml = -952 * i;
		dot = i;
	}
	if(ml<-952*(num-1)){
		ml = dot = 0;
	}
	$('#li_scroll').animate({'margin-left':ml+'px'},'fast');
	$('.hover').removeClass('hover');
	$('#li_num li').eq(dot).addClass('hover');
	
}
/****/
//info pic
$(window).load(function(){
	liw = 0;
	$('.piclist li').each(function(){
		liw += $(this).width()+15;
		$(this).css('width',$(this).width()+'px');
	})
	$('.piclist').width( liw + 'px');	
})

function brand_models(brand_id){
    var data = get_brand_model(brand_id);
    var first_char = data[0]['model_first_char'];
    var html = "<dl><dt>"+first_char+"</dt><dd>";
    for(var i=0;i<data.length;i++){
        if(data[i]['model_first_char']!=first_char){
            first_char = data[i]['model_first_char'];
            html += "</dd></dl>";
            html += "<dl><dt>"+first_char+"</dt><dd>";
            html += "<a href='javascript:setUserDevice("+data[i]['model_id']+");'>"+data[i]['model_short']+"</a>";
        }else{
            html += "<a href='javascript:setUserDevice("+data[i]['model_id']+");'>"+data[i]['model_short']+"</a>";
        }
    }
    html += "</dd></dl>";
    console.log(html);
    $(".sel_brand_models").html(html);
}

/**机型选择*/
function get_brand_model(brand_id){
    var ret = "";
    $.ajax({
        type : "get",
        url : "/Model/BrandModel/",
        data : "brand_id="+brand_id,
        async : false,
        success : function(data){
            ret = JSON.parse(data);
        }
    })
    return ret;
}
function setUserOS( os ) {
    var ajax_url = 'http://count.liqucn.com/api/ajax.php?action=dialog&type=setUserOS&os='+os;
    $.ajax({
        type : "get",
        async:true,
        cache: false,
        url : ajax_url,
        dataType : "jsonp",
        jsonp: "callbackparam",//服务端用于接收callback调用的function名的参数
        jsonpCallback:"success_jsonpCallback",//callback的function名称
        success : function(json){
            if( json ) onPhoneFlowCompleted( json );
        },
        error:function(){
            alert('fail');
        }
    });
}
function setUserDevice( deviceID ) {
    var ajax_url = 'http://count.liqucn.com/api/ajax.php?action=dialog&type=setUserDevice&deviceID='+deviceID;
    $.ajax({
        type : "get",
        async:true,
        cache: false,
        url : ajax_url,
        dataType : "jsonp",
        jsonp: "callbackparam",//服务端用于接收callback调用的function名的参数
        jsonpCallback:"success_jsonpCallback",//callback的function名称
        success : function(json){
            if( json ) onPhoneFlowCompleted( json );
        },
        error:function(){
            alert('fail');
        }
    });
}
function onPhoneFlowCompleted( redirectURL ) {
    document.location.href = redirectURL;
}

function clearUserDevice(){
    $.get("/Model/CleanCookie/",function(){
        window.location.href = "http://www.liqucn.com/";
    });
}
function search(event){
    var keycode;

    if(window.event) // IE 浏览器
    {
        keycode = event.keyCode
    }
    else if(event.which) // Netscape/Firefox/Opera浏览器
    {
        keycode = event.which
    }
    if(keycode==13) //13为enter键值
    {
        go_to();
    }
}
function go_to(){
    var word = document.getElementById("txt_search").value;
    window.location.href = "/search/download/"+word;
}

function report_app(IndexID_value){
	var report_url="/api/report_app.php?IndexID="+IndexID_value;
	$.fn.colorbox({transition:"elastic", innerWidth:660, innerHeight:300+110, scrolling:false, preloading:false, overlayClose:false, iframe:false, opacity:0.5, href:report_url, close:'关闭'});
    return true;
}