<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $app.app_stitle}-->
    <title><!--{$app.app_stitle}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="wrapper">
    <!--{include file="inc_top.php"}-->
    <!--{include file="inc_menu.php"}-->

    <!--main-->
    <div class="main">
        <div class="wp">
            <div class="crumb">
                <a>您的位置：</a>
                <a href="/">首页</a> &gt;
                <!--{row name='app_category' id=$app.last_cate_id}-->
                <!--{if $row.parent_id ==1}-->
                <a href="<!--{link m='softs'}-->">软件</a>
                <span>&gt;</span>
                <a href="<!--{link m='softs' cate_id=$app.last_cate_id}-->"><!--{$row.cname}--></a>
                <!--{else}-->
                <a href="<!--{link m='games'}-->">游戏</a>
                <span>&gt;</span>
                <a href="<!--{link m='games' cate_id=$app.last_cate_id}-->"><!--{$row.cname}--></a>
                <!--{/if}-->
                <!--{/row}-->&gt;
                <a class="cur" href="#"><!--{$app.app_title}--></a>

                <div class="row row_detail">
                    <!--游戏/软件信息 begin-->
                    <div class="article">
                        <!--信息 begin-->
                        <div class="apk_info_box">
                            <div class="Mimg">
                                <img width="72" height="72" alt="" src="<!--{imageurl url =$app.app_logo}-->">
                                <span class="layer"></span>
                            </div>
                            <div class="tit_area clearfix">
                                <h1><!--{$app.app_title}--></h1>

                                <div class="score_area">
                            <span class="level_big">
                                <i id="pfuc_cur" <!--{countstar star=$app.app_recomment}-->></i>
                            </span>

                                    <div class="pop_ret" id="pf_cure" style="display:none;">点亮星星评分(目前选择<em
                                            id="pf_cure_score">10</em>分)<i class="arrow_up"></i></div>
                                </div>
                            </div>
                            <ul class="legend_list">
                                <li><a class="legend_qq" rel="nofollow" href="javascript:;" title="经腾讯手机管家检测安全">安全认证</a>
                                </li>
                            </ul>
                            <ul class="prop_area">
                                <li>版本：<!--{$app.history_version}--></li>
                                <li>人气：<!--{countdown down=$app.app_down}--></li>
                                <li>更新：<!--{$app.app_update_time|date_format:"%Y-%m-%d"}--></li>
                                <li>大小：<!--{round($app.history_size/1024/1024,2)}-->MB</li>
                                <li>系统要求：<!--{$app.history_system}--></li>
                                <li class="block_item">
                                    <!-- Baidu Button BEGIN -->
                                    <div class="bdsharebuttonbox bdshare-button-style0-16">
                                        <a href="#" class="bds_more" data-cmd="more"></a>
                                        <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
                                        <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
                                        <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
                                        <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
                                        <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
                                    </div>
                                    <script>window._bd_share_config = {
                                            "common": {
                                                "bdSnsKey": {},
                                                "bdText": "<!--{$app.app_title}-->",
                                                "bdMini": "2",
                                                "bdMiniList": false,
                                                "bdPic": "",
                                                "bdStyle": "0",
                                                "bdSize": "16"
                                            }, "share": {}
                                        };
                                        with (document)0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];</script>
                                    <!-- Baidu Button END -->
                                </li>
                            </ul>
                            <div class="dl_area">
                                <div class="btn_trig">
                                    <input type="hidden" id="dxOrWt" value="dx">
                                    <a href="<!--{link m='download' app_id=$app.app_id}-->" class="btn btn_dl"
                                       id="quickDown" title="<!--{$app.app_title}-->下载"
                                       rel="nofollow">立即下载</a>
                                    <a href="<!--{link m='high_speed_download'}-->" class="mt12 ly-btn2" rel="nofollow">高速下载</a>
                                </div>
                                <div class="ewm">
                                    <img width="82" height="82" alt="" src="<!--{link m='qrcode' app_id=$app.app_id}-->">
                                </div>
                            </div>
                        </div>
                        <!--信息 end-->
                        <!--选项卡 begin-->
                        <div class="phone_tab">
                            <ul class="clearfix">
                                <li><a> 介绍</a></li>
                            </ul>
                        </div>
                        <!--选项卡 end-->
                        <!--介绍 begin-->
                        <div class="intro_box">
                            <div id="mprodm_sub" style="display: block;">
                                <div id="waiheight" style="height: 60px; overflow: hidden;">
                                    <!--{$app.app_desc}-->
                                </div>
                            </div>
                            <div id="mprodm_all" style="display: none;">
                                <!--{$app.app_desc}-->
                            </div>
                            <div id="zkbutton" class="intro_oper" style="display: block;"><a
                                    onclick="zhankai('mprodm_all','mprodm_sub','sqbutton','zkbutton')"
                                    href="javascript:void(0)" target="_self">[展开↓]</a></div>
                            <div id="sqbutton" class="intro_oper" style="display: none;"><a
                                    onclick="zhankai('mprodm_sub','mprodm_all','zkbutton','sqbutton')" target="_self"
                                    href="javascript:void(0)">[收起↑]</a></div>
                        </div>
                        <!--介绍 end-->
                        <!--轮播条 begin-->

                        <div id="scrollbar" class="scroll-cont">
                            <div class="viewport" style="height: 406px;">
                                <div class="overview" style="width: 1242px; height: 400px; left: 0px;">
                                    <!--{imagelist app_id=$app.app_id}-->
                                    <img _src="<!--{$imagelist.resource_url}-->" src="<!--{$imagelist.resource_url}-->"
                                         style="width: 240px; height: 400px;"/>
                                    <!--{/imagelist}-->
                                </div>
                            </div>
                            <div class="scrollbar" style="width: 685px; visibility: visible;">
                                <div class="track" style="width: 685px;">
                                    <div class="thumb" style="left: 0px; width: 377.797906602254px;">
                                        <div class="thumb-star"></div>
                                        <div class="thumb-end"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--轮播条 end-->

                        <!-- 评论 begin -->
                        <div class="mod-user-cmt">
                            <div class="info">
                                <h3>用户评价<span></span></h3>
                            </div>
                            <!--{if !empty($comment_code)}-->
                            <!--{commentcode}-->
                            <!--{else}-->
                            <a name="comment"></a>

                            <div class="mod-login" style="display: none;">
                                <div class="bd">
                                    <form id="login_form">
                                        <label>用户</label>
                                        <input id="userName" name="username" type="text" value="" class="ipt"
                                               autocomplete="off">
                                        <label>密码</label>
                                        <input name="pwd" id="pwd" type="password" value="" class="ipt">
                                        <input type="button" value="登录" class="btn-login" id="login">
                                        <label class="save-me"> <input id="isKeepAlive" name="keep_login" value="1"
                                                                       type="checkbox" checked="checked">保持登录状态 </label>

                                        <p><span id="err_password"></span> <span id="err_username"></span></p>
                                        <input type="hidden" id="destUrl"
                                               value="http://soft.leidian.com/detail/index/soft_id/77208" name="destUrl"
                                               cmtinstalled="true">
                                    </form>
                                </div>

                                <div class="ft">
                                    <a target="_blank" href="http://i.360.cn/findpwd/">忘记密码？</a>
                                    <span>|</span>
                                    <a href="http://i.360.cn/reg?tpl=baoku&amp;src=mobilem&amp;destUrl=http%3A%2F%2Fsoft.leidian.com%2Fdetail%2Findex%2Fsoft_id%2F77208"
                                       id="reg_url">还没有账号？马上注册&gt;&gt;</a>
                                </div>
                            </div>
                            <div class="mod-cmt">
                                <div class="bd">
                                    <form action="<!--{link m='comment' app_id=$app.app_id}-->" method="post"
                                          id="commentForm">
                                        <div style="line-height:200%; font-size:14px">网友评论仅供网友表达个人看法，并不表明
                                            <strong>本站</strong> 同意其观点或证实其描述
                                        </div>
                                        <div id="star">
                                            <span style="font-size:14px;">点击星星对应用打分</span>
                                            <ul>
                                                <li class=""><a href="javascript:;" class="selected">1</a></li>
                                                <li class=""><a href="javascript:;" class="selected">2</a></li>
                                                <li class=""><a href="javascript:;" class="selected">3</a></li>
                                                <li class=""><a href="javascript:;" class="selected">4</a></li>
                                                <li class=""><a href="javascript:;" class="selected">5</a></li>
                                            </ul>
                                            <span></span>

                                            <p style="display: none; left: 134px;"><em><b>5</b> 分 非常满意</em>强烈推荐</p>
                                        </div>
                                        <div style="margin-top:5px;">
                                        <textarea name="comment"
                                                  style="width:100%;height:80px;border:1px solid #ccc;font-size:12px;line-height:200%;resize:none;"></textarea>
                                        </div>
                                        <div style="margin-top:10px;height:40px;">
                                        <span class="comment_l">
                                            昵称：<input type="text" class="comment_ipt" value="" name="user"/>
                                        </span>
                                        <span class="comment_l">
                                            验证码：<input type="text" style="width:60px;" class="comment_ipt" value=""
                                                       name="xcode" tabindex="4"/>
                                        </span>
                                        <span class="comment_l">
                                            <img onclick="this.src='<!--{link m='xcode'}-->'"
                                                 style="width:60px;height:25px;margin:-4px 8px 0 6px; display: inline-block;vertical-align: middle;"
                                                 src="<!--{link m='xcode'}-->" id="chk_code" title="点击更换验证码">
                                        </span>
                                        <span class="comment_l">
                                            <input type="button" style="width:auto;height:26px;" class="comment_ipt"
                                                   value="发表评论" onclick="send_comment();" id="sub">
                                        </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mod-cmt-list">
                                <div class="hd clearfix">
                                    <div class="cmt-tab">
                                        <ul class="clearfix">
                                            <li class="first selected" id="comment1"><a style="cursor:pointer;">全部评论</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="bd listM_box" id="game_rank">
                                    <!--{commentlist  app_id=$app.app_id row=6}-->
                                    <li class="clearfix">
                                        <a href="javascript:;" class="pic">
                                            <img src="<!--{$tpl_path}-->images/107.jpg"/> </a>

                                        <div class="cmt-info">
                                            <p class="uname"><!--{$commentlist.comment_uname}--></p>

                                            <div class="clearfix">

                                                <div class="cmt">
                                                    <font style="color:#333333;"></font> <!--{$commentlist.comment_content}-->
                                                </div>
                                            </div>
                                            <p class="time"><!--{$commentlist.comment_date|date_format:"%Y-%m-%d %H:%M:%S"}--></p>
                                        </div>
                                    </li>
                                    <!--{/commentlist}-->
                                </ul>

                                                                <div class="ft" >
                                                                    <!--{list name='app_comment' id=$app.app_id row=1}-->
                                    <a id="more_comment" class="more" style="display: none;"> <span>正在加载最近15条评论...</span> </a>
                                    <a  class="more" id="morePage" style="cursor:pointer;">查看更多评论</a>
                                    <!--{/list}-->

                                    <div class="cmt-gotop" id="comment_up">
                                        <a href="#comment">回评论顶部</a>
                                    </div>
                                </div>
                                <!--{if empty($app.app_comments) }-->
                                <div id="id_no_comment" class="no_page" >
                                    该应用暂时还没有评论,欢迎您来抢沙发
                                </div>
                                <!--{/if}-->
                            </div>
                            <!--{/if}-->
                        </div>
                        <!-- 评论 edn -->
                    </div>

                    <!--游戏/软件信息 end-->
                    <!--边栏信息 start-->
                    <div class="aside">
                        <!--相关推荐 begin-->
                        <div class="MboxA kfz_part">
                            <div class="boxA_hd">
                                <h3>相关推荐</h3>
                            </div>
                            <div class="boxA_bd" id="tab_1">
                                <ul class="MproB">

                                    <!--{relevant cid=$app.last_cate_id row=8 order='app_down desc'}-->
                                    <li>
                                        <div class="Mimg Mimg_64white">
                                            <img width="64" height="64" alt="<!--{$relevant.app_title}-->"
                                                 src="<!--{imageurl url =$relevant.app_logo}-->">
                                            <span class="layer"></span>
                                            <a title="<!--{$relevant.app_title}-->"
                                               href="<!--{link m='app' app_id=$relevant.app_id}-->" class="link"
                                               target="_blank"></a>
                                        </div>
                                    <span class="name"><a href="<!--{link m='app' app_id=$relevant.app_id}-->"
                                                          title="<!--{$relevant.app_title}-->" target="_blank">
                                            <!--{$relevant.app_title}--></a></span>
                                    </li>
                                    <!--{/relevant}-->
                                </ul>
                            </div>
                        </div>
                        <!--相关推荐 end-->
                        <!--下载排行 begin-->
                        <div class="MboxA dlrank_part">
                            <div class="boxA_hd">
                                <h3>下载排行</h3>
                            </div>
                            <div class="boxA_bd">
                                <div class="apklist apklist_32white" id="tab_3">
                                    <ul class="clearfix">
                                        <!--{recommend id=66 row=10}-->
                                        <li>
                                            <span class="ord"><!--{$recommend.app_sort_show}--></span>
                                        <span class="pic">
                                           <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                              target="_blank">
                                               <img height="32" width="32" alt="<!--{$recommend.app_title}-->"
                                                    src="<!--{imageurl url = $recommend.app_logo}-->"/>
                                           </a>
                                        </span>
                                        <span class="name">
                                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                               target="_blank"><!--{$recommend.app_title}--></a>
                                        </span>
                                            <span class="layer"></span>
                                            <a class="link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                               target="_blank" title="<!--{$recommend.app_title}-->"></a>
                                        </li>
                                        <!--{/recommend}-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--下载排行 end-->
                    </div>
                    <!--边栏信息 end-->
                </div>
            </div>
        </div>
    </div>
    <!-- /main-->
</div>
<!--{include file='inc_foot.php'}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/tinyscrollbar.js"></script>
<script>
    /**** scroll ******/
    function intScroll(id) {
        var loadCount = 0;
        var allLen = 2;
        var allH = 225;
        var sizes = [
            {w: 240, h: 400},
            {w: 400, h: 225}
        ];
        if (!$('#' + id).length) return;
        var con = $('#' + id),
            imgs = con.find(".overview img"),
            imgW,
            imgLen = imgs.length,
            imgH;

        if (!imgLen) return;

        var loader;

        for (var i = 0; i < imgLen; i++) {
            loader = new Image();
            loadWH(loader, i);
            loader.src = imgs[i].getAttribute('_src');
        }

        function loadWH(img, i) {
            img.onload = function () {
                var rw = img.width,
                    rh = img.height;

                if (rw > rh) {
                    int(1, i);
                } else {
                    int(0, i);
                }
                ;
            };
        }

        function int(idx, index) {
            loadCount++;
            imgW = sizes[idx].w;
            imgH = sizes[idx].h;

            var nowImg = imgs.eq(index);

            nowImg.attr('src', nowImg.attr('_src')).css({
                'width': imgW,
                'height': imgH
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
                con.tinyscrollbar({axis: 'x', scroll: false});
                con.find('.scrollbar').css('visibility', 'visible');
            }
        };
    }
    intScroll('scrollbar');
    /**** end scroll ******/

    function showmj() {
        window.document.getElementById('showmj').style.display = 'none';
        window.document.getElementById('hiddenmj').style.display = '';
        for (i = 2; i < 4; i++) {
            window.document.getElementById('list_' + i).style.display = '';
        }
    }
    function hiddenmj() {
        window.document.getElementById('showmj').style.display = '';
        window.document.getElementById('hiddenmj').style.display = 'none';
        for (i = 2; i < 4; i++) {
            window.document.getElementById('list_' + i).style.display = 'none';
        }
        window.document.location.hash = "mj";
    }
    // iframe自动获取高度
    function iFrameHeight() {
        var ifm = document.getElementById("commentframe");
        var subWeb = document.frames ? document.frames["commentframe"].document : ifm.contentDocument;
        if (ifm != null && subWeb != null) {
            ifm.height = subWeb.body.offsetHeight;
        }
    }
    // 评分
    var flag = false;
    function pfucmscore(val) {
        $('#pf_cure_score').html(val);
        $('#pf_cure').show();
        $('#pf_cure').css({'left': (-72 + ((val / 2 - 1) * 19)) + 'px'});
        $('#pfuc_cur').hide();
    }
    function pfucmoscore() {
        if (flag == false) {
            $('#pf_cure').hide();
        }
        $('#pfuc_cur').show();
    }
    function pfucscore(val) {
        $('#pf_cure_score').html(val);
        $('#socremain').hide();
        $('#pf_cure').html('感谢打分！您的评分是<em id="pf_cure_score">' + val + '</em>分。');
        $('#pfuc_cur').css({'width': 8.4 * 10 + '%'});
        $('#pf_cure').show();
        setTimeout(function () {
            $('#pf_cure').hide()
        }, 1 * 2000);
        var request_s_url = "/softPhoneScore.php?id=" + 131596 + "&score=" + val;
        $.ajax({
            query: request_s_url,
            onsucc: function (data) {
                return false;
            }
        })
        flag = true;
    }
    function zhankai(showdiv, hidediv, showbutton, hidebutton) {
        $('#' + showdiv).show();
        $('#' + hidediv).hide();
        $('#' + showbutton).show();
        $('#' + hidebutton).hide();
    }
    function showmj() {
        window.document.getElementById('showmj').style.display = 'none';
        window.document.getElementById('hiddenmj').style.display = '';
        for (i = 2; i < 4; i++) {
            window.document.getElementById('list_' + i).style.display = '';
        }
    }
    function hiddenmj() {
        window.document.getElementById('showmj').style.display = '';
        window.document.getElementById('hiddenmj').style.display = 'none';
        for (i = 2; i < 4; i++) {
            window.document.getElementById('list_' + i).style.display = 'none';
        }
        window.document.location.hash = "mj";
    }
    var oStar = document.getElementById("star");
    var aLi = oStar.getElementsByTagName("li");
    var oUl = oStar.getElementsByTagName("ul")[0];
    var oSpan = oStar.getElementsByTagName("span")[1];
    var oP = oStar.getElementsByTagName("p")[0];
    var i = iScore = iStar = 0;
    var aMsg = [
        "很不满意|不给力",
        "不满意|凑合",
        "一般|一般",
        "满意|还不错",
        "非常满意|强烈推荐"
    ]
    for (i = 1; i <= aLi.length; i++) {
        aLi[i - 1].index = i;
        //鼠标移过显示分数
        aLi[i - 1].onmouseover = function () {
            fnPoint(this.index);
            //浮动层显示
            oP.style.display = "block";
            //计算浮动层位置
            oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
            //匹配浮动层文字内容
            oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
        };
        //鼠标离开后恢复上次评分
        aLi[i - 1].onmouseout = function () {
            fnPoint();
            //关闭浮动层
            oP.style.display = "none"
        };
        //点击后进行评分处理
        aLi[i - 1].onclick = function () {
            $("#xx").val($(this).children(".selected").text());
            iStar = this.index;
            oP.style.display = "none";
            oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")"
        }
    }
    //评分处理
    function fnPoint(iArg) {
        //分数赋值
        iScore = iArg || iStar;
        for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "pd on" : "";
    }
    function send_comment() {
        $.post($('#commentForm').attr('action'), $('#commentForm').serialize(), function (result) {
            if (!result) {
                alert('远程服务器无响应');
                return false;
            }
            alert(result.msg);
        }, 'json');
    }
</script>
<script type="text/javascript">
    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }
    $(document).ready(function() {
        var i = 2;
        $("#morePage").click(function() {
            $.ajax({
                type: "POST",
                url: "<!--{link m='commentLoad'}-->",
                data: {'page': i++,'appid':<!--{$app.app_id}-->},
                dataType: 'json',
                success: function (msg) {
                    if (msg.status == '1') {
                        var game_html = '';
                        $.each(msg.list, function (k, v) {
                            var datecou = new Date(parseInt(v.comment_date) * 1000).Format("yyyy-MM-dd hh:mm:ss");
                            game_html += '<li class="clearfix"><a href="" class="pic" target="_blank"> <img src="<!--{$tpl_path}-->images/107.jpg"></a>';
                            game_html += ' <div class="cmt-info"> ';
                            game_html += ' <p class="uname">' + v.comment_uname +'</p>';
                            game_html += ' <div class="clearfix">';
                            game_html += ' <div class="cmt"> ';
                            game_html += v.comment_content;
                            game_html += '</div> ';
                            game_html += '</div> ';
                            game_html += '<p class="time">'+datecou+'</p>';
                            game_html += '</div></li>';
                        });
                        $("#game_rank").append(game_html);
                    }else{
                        $("#morePage").html('加载完成');
                    }
                }
            });
        });
    });
</script>
</body>
</html>

