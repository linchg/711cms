/*
*Name : 360Helper UI Script
*Author : sunpeng3@360.cn
*Date: 2011-12-13
*/
//limit image size


/**** init scroll ******/
function intScroll(id){
    var loadCount = 0;
    var allLen = 2;
    var allH = 225;
    var sizes = [
        {w:240,h:400},
        {w:400,h:225}
    ];
    if(!$('#'+id).length) return;
    var con = $('#'+id),
    imgs =  con.find(".overview img"),
    imgW ,
    imgLen = imgs.length,
    imgH;

    if (! imgLen) return ;

    var loader;

    for (var i = 0; i < imgLen; i++) {
        loader = new Image();
        loadWH(loader, i);
        loader.src = imgs[i].getAttribute('_src');
    }

    function loadWH(img, i) {
        img.onload = function() {
            var rw = img.width,
            rh = img.height;

            if (rw > rh) {
                int(1, i);
            } else {
                int(0, i);
            };
        };
    }

    function int(idx, index){
        loadCount++;
        imgW = sizes[idx].w;
        imgH = sizes[idx].h;

        var nowImg = imgs.eq(index);

        nowImg.attr('src', nowImg.attr('_src')).css({
            'width':imgW,
            'height':imgH
        });

        allLen += imgW + 8;
        allH = Math.max(allH, imgH);

        if (loadCount == imgLen) {
            con.find(".overview").css({
                width: allLen,
                height: allH
            });

            con.find(".viewport").css({
                height: imgH + 6
            });
            con.tinyscrollbar({ axis: 'x',scroll: false});
            con.find('.scrollbar').css('visibility', 'visible');
        }
    };
}
intScroll('scrollbar');
/**** end scroll ******/

(function($) {
    $.fn.maxSize = function(mw, mh) {
        var img=$(this),mw = mw ||400 , mh = mh || 400;
        var isIE6 = $.browser.msie && $.browser.version == 6;

        if (!isIE6 && mw && mh) {
            if(!img.css('max-width')){
                img.css({'max-width':mw+'px','max-height':mh+'px'});
            };
            return;
        }
        img.each(function(i){
            var oimg = new Image() , itm = $(this);
            oimg.onload = function(){
                var w = oimg.width, h = oimg.height;
                if (w > h) {
                    itm.css({'width':mw});
                } else {
                    itm.css({'height':mh});
                }
            }
            oimg.src = itm.attr('src');
        });
    }
})(jQuery);

$(function(){
    //remove the default outline of dbtn
    $('a').blur();
    //limit the img size

    //screen show
    if ($("#rollers").length) {
        $('#rollers img').maxSize(400,400);
        $("#rollers").jcl({
          btnNext: "#gors",
          btnPrev:"#gols",
         // circular:false,
          scroll : 1,
          visible: 1,
          speed:600
        });
    };
    //鍚岀被鎺ㄨ崘
    if ($("#crcon").length) {
        $("#crcon").jcl({
            btnNext: "#gorc",
            btnPrev:"#golc",
            // circular:false,
            scroll : 5,
            visible: 5,
            speed:600
        });
    };

    //show all desc
    $('#J-showall').click(function() {
        $('#J-desc').addClass('expand');
        return false;
    });

    $('#showPackage').click(function () {
        $('#J-desc').addClass('expand');
        var hr = $('#data-spliter');
        if (hr.length) {
            // 68 澶撮儴鍥洪《瀵艰埅楂樺害
            var toptarget = hr.offset().top - 68;

            setTimeout(function() {
                $('html, body').animate({scrollTop:toptarget});
            },50);
        };

        return false;
    });

    $('#J-hideall').click(function() {
        $('#J-desc').removeClass('expand');
        return false;
    });
    $(".other-dl-link #game-private-ring").click(function(){
        var ringtit = $('.ringtit');
        if (ringtit.length) {
            // 68 澶撮儴鍥洪《瀵艰埅楂樺害
            var toptarget = ringtit.offset().top - 68;
            setTimeout(function() {
                $('html, body').animate({scrollTop:toptarget});
            },50);
        };
        return false;
    });
    $('#comment_up a').on({
        click:function(){
            $('div.warp').css({'padding-top':'14px'});
        }
    });

    if (window.location.hash == '#comment' && !$.browser.msie) {
        $('div.warp').css({'padding-top':'14px'});
    }

    $('#J-permission-expand').toggle(function () {
        $('.privacy ul').addClass('expand');
        $(this).text('鏀惰捣').addClass("close").removeClass("open");
    }, function () {
        $('.privacy ul').removeClass('expand');
        $(this).text('灞曞紑').addClass("open").removeClass("close");
    });
	$("#J-info-expand").toggle(function() {
		$("#J-shortinfo").hide(0);
		$("#J-fullinfo").show(0);
		$(this).text('鏀惰捣').addClass("close").removeClass("open");
	} , function() {
		$("#J-shortinfo").show(0);
		$("#J-fullinfo").hide(0);
		$(this).text('灞曞紑').addClass("open").removeClass("close");
	});
    $("body").delegate(".mod-rank-list li", "mouseenter", function(){
        $(this).addClass("cur");
    });
    $("body").delegate(".mod-rank-list li", "mouseleave", function(){
        $(this).removeClass("cur");
    })
});



/*tab of commet & snap*/
$('#nsitem li').click(function() {
    var idx = $(this).index();

    $(this).addClass('selected').siblings('li').removeClass('selected');
    $('.mod-detail-cmt').find('.js-view').eq(idx).show().siblings('.js-view').hide();
});

function installCmt() {
    if($("#destUrl").attr('cmtInstalled')) return;
    cm=new Comment("tagBox",g_soft_info.baike_name,'cm');
    cm.count = 5;
    cm.getCommentInfo();
    $("#destUrl").attr('cmtInstalled',true);
    // cm.count = 5;
};

try {
    poll = new POLL(g_soft_info.baike_name , 'poll', 'voteBox', '#poll-wrap');

    var pollInfo = pollInfo || null;

    poll.setData(pollInfo);
    $("#destUrl").val(location.href);
    clogin = new Login(g_soft_info.baike_name,'clogin');

    installCmt();

    var reg_url = 'http://i.360.cn/reg?tpl=baoku&src=mobilem&destUrl='+encodeURIComponent(location.href);
    $("#reg_url").attr('href',reg_url);
} catch(e) {

}

function goPage(sid,pos) {
    var url ="/detail/index/soft_id/"+sid;
    App.browse(sid,pos,url);
}

(function($){
    var vote_already = false;
	
	function removeStarCls() {
		var starHolder = $('#J-stars');
		return $.trim(starHolder[0].className.replace(/star[1-5]/g , ''));
	}
	
    $('#J-stars').on('mouseenter', function () {
        $(this).css('z-index', 2);
    });
    $('#J-stars').on('mouseleave', function () {
        $(this).css('z-index', 0);
        if(!vote_already) {
        	$(this)[0].className = removeStarCls();
        }
    });

    $('#J-stars li').on('mouseover', function () {
		if(vote_already) {
			return;
		}
		var starHolder = $('#J-stars');
		var index = $(this).index() + 1;
		var cls = removeStarCls() + ' star' + index;
		starHolder[0].className = cls;
    });

    $('#J-stars li').on('click', function () {
        if (vote_already) {
            poll.formsub();
            return false;
        }
        vote_already = true;
        var index = $(this).prevAll().length + 1;

        $('#J-stars li').unbind('mouseover');
		$('#J-stars').unbind('mouseleave');
		
		var starHolder = $('#J-stars');
		var classIndex = $(this).index() + 1;
		var cls = removeStarCls() + ' star' + classIndex;
		starHolder[0].className = cls;
		
        // post
        if (index == 1) {
            $('#ipt-vote-bad').attr('checked', true);
        } else if (index == 5) {
            $('#ipt-vote-good').attr('checked', true);
        } else {
            $('#ipt-vote-normal').attr('checked', true);
        }
		
        poll.formsub();

        return false;
    });
})(jQuery);
(function($) {
	var div = null , timer;
	function build() {
		div = $('<div class="erweimadiv"><img width="150" height="150"/><p>鎺ㄨ崘浣跨敤<a href="http://soft.leidian.com/detail/index/soft_id/77208">360鎵嬫満鍗＋</a>鎵弿浜岀淮鐮�</p><i class="dot"></i></div>').appendTo($('body'));
		div.mouseenter(function() {
			clearTimeout(timer);
		}).mouseleave(function() {
			clearTimeout(timer);
			timer = setTimeout(function() {
				div.hide();
			} , 500);
		});
	}
	function setImgSrc(target , url) {
		target = $(target);
		var img = target.find('img')[0];
		if(!img.src) {
			img.src = url;
		}
	}
	var logBarcode = false;
	function setPos(target) {
		target = $(target);
		var offset = target.offset();
		var width = target.width();
		var left = offset.left + width + 12;
		var top = offset.top - 59;
		div.css({
			left : left,
			top : top
		}).show();
		if(logBarcode) {
			return;
		}
		logBarcode = true;
		//鎵撶偣缁熻浜岀淮鐮佸睍绀洪噺
		var data = {
			mod : "barcodedisp",
			softid : (window.g_soft_info && window.g_soft_info.soft_id) || ""
		};
		monitor.log(data , 'disp');
	}
	$('.mod-soft-info .erweima').bind('mouseenter' , function() {
		clearTimeout(timer);
		var me = $(this);
		var imgurl = me.attr('data-erweima');
		if(!imgurl) {
			return;
		}
		if(!div) {
			build();
		}
		setImgSrc(div , imgurl);
		setPos(me);
	}).bind('mouseleave' , function() {
		clearTimeout(timer);
		timer = setTimeout(function() {
			div && div.hide();
		} , 200);
	});
})(jQuery);
(function($) {
	var div = null , timer;
	function findDetail(me) {
		if(!div) {
			me = $(me);
			div = me.find(".detail");
		}
	}
	$('.mod-pro-analysis .mod-safe-analytic .bd li.privacy').mouseenter(function() {
		clearTimeout(timer);
		findDetail(this);
		div.show(0);
	}).mouseleave(function() {
		clearTimeout(timer);
		timer = setTimeout(function() {
			findDetail(this);
			div.hide(0);
		}, 200);
	});
	$('.mod-soft-info .options .setupextra .local').click(function() {
		var data = {
			download_href : this.href,
			mod : 'gamesoftdownloadlocal',
			ref : monitor.data.getPageRef()
		};
		monitor.log(data , 'click2');
		return true;
	});
	$('#detail_reclist').delegate('li' , 'click' , function(e) {
		var target = e.target;
		if($(target).is('.setup')) {
			return;
		}
		if(!$(target).closest('a').length){
			return;
		}
		var data = {
			mod : "appreczhushou",
			ref : monitor.data.getPageRef(),
			relation:(window.g_soft_info && g_soft_info.baike_name) + '|' + $(this).data('name')
		};
		monitor.log(data , 'click2');
		return true;
	});

    
})(jQuery);