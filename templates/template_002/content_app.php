<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--{if $app.app_stitle}-->
    <title><!--{$app.app_stitle}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{/if}-->
    <!--{include file="inc_head.php"}-->

</head>

<body>
<div id="header">

    <!--{include file="inc_top.php"}-->
    <div class="erjinav clearfix">
        <!--{include file="inc_menu.php"}-->
    </div>
</div>


<div id="main" class="layout">

    <!-- inner -->
    <div class="inner">
        <div id="main" class="layout clearfix">
            <div class="app_content">
                <div class="breadnav"><a href="/" target="_self">首页</a>&gt;
                    <!--{row name='app_category' id=$app.last_cate_id}-->
                    <!--{if $row.parent_id ==1}-->
                    <a href="<!--{link m='list_soft'}-->" target="_blank">软件</a>
                    &gt;<a href="<!--{link m='list_soft' cate_id=$app.last_cate_id}-->" target="_blank">
                        <!--{$row.cname}--></a>&gt;
                    <!--{else}-->
                    <a href="<!--{link m='list_game'}-->" target="_blank">游戏</a>
                    &gt;<a href="<!--{link m='list_game' cate_id=$app.last_cate_id}-->" target="_blank">
                        <!--{$row.cname}--></a>&gt;
                    <!--{/if}-->
                    <!--{/row}-->
                    <a href=""><!--{$app.app_title}--></a></div>
                <div class="app_content_intro cbox">

                    <div class="app_content_introbox clearfix">
                        <div class="app_content_introbox1">
                            <div class="app_icon">
                                <i class="app_img_none"></i>
                                <img src="<!--{imageurl url =$app.app_logo}-->" alt="<!--{$app.app_title}-->">
                            </div>
                            <!--{if false}-->
                            <p class="feiyong">
                                <!--{if $app.app_type ==1}-->免费<!--{else}-->收费<!--{/if}-->
                            </p>
                            <!--{/if}-->
                        </div>
                        <div class="app_gcon2">
                            <h1><a href=""><!--{$app.app_title}--></a></h1>

                            <p class="app_gcon2_pf"><span class="level_big">
                                <i id="pfuc_cur" <!--{countstar star=$app.app_recomment}-->></i>
                            </span><em><!--{$app.app_grade}--></em>(已有<!--{$app.app_comments}-->人评分)<a
                                    onclick="setTimeout('document.getElementById(\'commentText\').focus()',120); return false;"
                                    href="javascript:void();" class="woyaopingfen">我要评分</a></p>
                            <dl class="clearfix">
                                <dt>版　本：</dt>
                                <dd><!--{$app.history_version}--></dd>
                                <dt>类　型：</dt>
                                <dd><!--{$row.cname}--></dd>
                                <dt>下载量：</dt>
                                <dd><!--{countdown down=$app.app_down}--></dd>
                                <dt>大　小：</dt>
                                <dd><!--{round($app.history_size/1024/1024,2)}-->MB</dd>
                                <dt>时　间：</dt>
                                <dd><!--{$app.app_update_time|date_format:"%Y-%m-%d"}--></dd>
                            </dl>
                        </div>
                        <div class="app_gcon3">
                            <div class="erweimaxz_tu"><img src="<!--{link m='qrcode' app_id=$app.app_id}-->"></div>
                            <!--二维码图片放到div里面-->
                            <p>扫二维码下载到手机</p>
                            <a href="javascript:void(0)" class="jiucuo"><span>纠错举报</span></a>
                        </div>
                        <div class="jiucuobox">
                            <div class="jiucuo_head"><a href="javascript:void(0)" class="jiucuo_guanbi">关闭</a>纠错举报</div>
                            <div class="jiucuo_con">
                                <form method="post">
                                    <div class="jiucuo_con_tit"><!--{$app.app_title}--></div>
                                    <ul>
                                        <li><input type="checkbox" value="无法下载" name="reportype[1]"
                                                   id="reportype1"><label for="reportype1">无法下载</label></li>
                                        <li><input type="checkbox" value="无法安装启动" name="reportype[2]"
                                                   id="reportype2"><label for="reportype2">无法安装启动</label></li>
                                        <li><input type="checkbox" value="版本太旧需要更新" name="reportype[3]" id="reportype5"><label
                                                for="reportype5">版本太旧需要更新</label></li>
                                        <li><input type="checkbox" value="恶意扣费" name="reportype[4]"
                                                   id="reportype6"><label for="reportype6">恶意扣费</label></li>
                                        <li><input type="checkbox" value="携带病毒" name="reportype[5]"
                                                   id="reportype7"><label for="reportype7">携带病毒</label></li>
                                        <li><input type="checkbox" value="含有恶意插件" name="reportype[6]"
                                                   id="reportype8"><label for="reportype8">含有恶意插件</label></li>
                                        <li><input type="checkbox" value="侵犯版权" name="reportype[7]"
                                                   id="reportype9"><label for="reportype9">侵犯版权</label></li>
                                    </ul>
                                    <textarea name="jiucuotext" id="jiucuotext"></textarea>
                                    <input type="hidden" name="appid" value="708">
                                    <input type="hidden" name="type" value="2">
                                </form>
                            </div>
                            <div class="jiucuo_foot"><input type="submit" name="jubao" value="提交" class="jiucuo_tj"><a
                                    href="#" class="jiucuo_qx">取消</a></div>

                        </div>
                    </div>
                    <!--判断是有有apk下载包-->
                    <div class="app_content_xiazai clearfix">
                        <div class="app_content_xiazai_b">
                            <a href="<!--{link m='download' app_id=$app.app_id}-->">官方下载</a>
                            <a href="<!--{link m='high_speed_download'}-->" class="btn-blue">高速下载</a>
                        </div>
                    </div>
                    <!--判断是有有apk下载包结束-->


                    <div class="app_content_introcon">
                        <h2><a class="zhankai_b" href="javascript:void(0)" style="display: block;">+ 展开全部</a><a
                                class="zhankai_b2"
                                onclick="setTimeout('document.getElementById(\'commentText\').focus()',120); return false;"
                                href="javascript:void();" style="display: none;">- 收起部分</a>《<a href="">
                                <!--{$app.app_title}--></a>》介绍</h2>

                        <div class="app_content_introcon_js" style="display: block; height: 60px;">
                            <!--{$app.app_desc}--><br>
                        </div>
                        <h2>《<a href=""><!--{$app.app_title}--></a>》截图</h2>


                        <div class="infopic">
                            <div class="picbox">
                                <ul class="gallery piclist">
                                    <!--{imagelist app_id=$app.app_id}-->
                                    <li style="width: 213px;"><a rel="prettyPhoto[]" target="_blank"><img
                                                src="<!--{$imagelist.resource_url}-->"></a></li>
                                    <!--{/imagelist}-->
                                </ul>
                            </div>
                            <div class="pic_prev"></div>
                            <div class="pic_next"></div>
                        </div>

                    </div>
                </div>
                <div class="haixihuan cbox">
                    <h2 class="h2tit">你可能还会喜欢</h2>
                    <ul class="clearfix">
                        <!--{relevant cid=$app.last_cate_id row=6 order='app_down desc'}-->
                        <li class="dangge_app">
                            <a href="<!--{link m='content_app' app_id=$relevant.app_id}-->" class="app_icon"><i
                                    class="app_img_none"></i><img src="<!--{imageurl url =$relevant.app_logo}-->"
                                                                  alt="<!--{$relevant.app_title}-->"></a>

                            <div class="app_name"><a href="<!--{link m='content_app' app_id=$relevant.app_id}-->">
                                    <!--{$relevant.app_title}--></a></div>
            <span class="star level_big">
                <i id="pfuc_cur" <!--{countstar star=$relevant.app_recomment}--> ></i>
            </span>
                            <span class="category">类型：<!--{$row.cname}--></span>

                            <div class="app_xiazaib"><a
                                    href="<!--{link m='content_app' app_id=$relevant.app_id}-->">下载</a></div>
                        </li>
                        <!--{/relevant}-->

                    </ul>
                </div>
                <script src="<!--{$tpl_path}-->js/jquery.form.js" type="text/javascript"></script>
                <!--{if !empty($comment_code)}-->
                <!--{commentcode}-->
                <!--{else}-->
                <div class="pinglun_con cbox" id="iwanttocomment">
                    <div id="comment">
                        <!-- pl -->
                        <div class="mod-cmt-list">
                            <div class="hd clearfix">
                                <div class="cmt-tab">
                                </div>
                            </div>
                            <ul class="bd listM_box" id="game_rank">
                                <!--{commentlist  app_id=$app.app_id row=6 }-->
                                <li class="clearfix">
                                    <a href="javascript:;" class="pic">
                                        <img src="<!--{$tpl_path}-->images/107.jpg"/> </a>

                                    <div class="cmt-info">
                                        <p class="uname"><!--{$commentlist.comment_uname}--></p>

                                        <div class="clearfix">

                                            <div class="cmt">
                                                <font style="color:#333333;"></font>
                                                <!--{$commentlist.comment_content}-->
                                            </div>
                                        </div>
                                        <p class="time">
                                            <!--{$commentlist.comment_date|date_format:"%Y-%m-%d %H:%M:%S"}--></p>
                                    </div>
                                </li>
                                <!--{/commentlist}-->
                            </ul>
                            <div class="ft">
                                <!--{list name='app_comment' id=$app.app_id row=1}-->
                                <a id="more_comment" class="more" style="display: none;"> <span>正在加载最近15条评论...</span>
                                </a>
                                <a class="more" id="morePage" style="cursor:pointer;">查看更多评论</a>
                                <!--{/list}-->
                            </div>

                        </div>
                        <!-- pl -->
                    </div>
                </div>
                <div class="pinglun_box cbox">
                    <h2 class="h2tit">发表评论</h2>

                    <div class="post_form clearfix">
                        <div class="post_doing_form">
                            <form id="commentForm" name="quickcommentform"
                                  action="/api.php?c=ajax&m=comment&app_id=<!--{$app.app_id}-->" method="post" class="quickpost">
                                <div class="input_block">
                                    <div class="pingfeng" id="star"><!--pingfeng开始-->
                                        <div>
                                            <div class="clearfix">

                                                <span>您给应用的评分（鼠标选择星星）：</span>
                                                <ul id="rate">
                                                    <li class=""><a href="javascript:;" class="selected">1</a></li>
                                                    <li class=""><a href="javascript:;" class="selected">2</a></li>
                                                    <li class=""><a href="javascript:;" class="selected">3</a></li>
                                                    <li class=""><a href="javascript:;" class="selected">4</a></li>
                                                    <li class=""><a href="javascript:;" class="selected">5</a></li>
                                                </ul>
                                                <span></span>

                                                <p style="display: none; left: 134px;"><em><b>5</b> 分 非常满意</em>强烈推荐</p>
                                            </div>

                                        </div>
                                        <input type="hidden" id="stars" name="stars" value="3">
                                    </div>
                                    <!--pingfeng结束-->

                                    <textarea id="commentText" name="comment" style="resize:none;"></textarea>

                                    <div style="margin-top:10px;width:410px;height:40px;">
                                        <span class="comment_l">
                                            昵称：<input type="text" class="comment_ipt" value="" name="user"/>
                                        </span>
                                        <span class="comment_l">
                                            验证码：<input type="text" style="width:60px;" class="comment_ipt" value=""
                                                       name="xcode" tabindex="4"/>
                                        </span>
                                        <span class="comment_l">
                                            <img onclick="this.src='/api.php?c=index&m=xcode&t='+Math.random();"
                                                 style="width:60px;height:25px;margin:-4px 8px 0 6px; display: inline-block;vertical-align: middle;"
                                                 src="<!--{link m='xcode'}-->" id="chk_code" title="点击更换验证码">
                                        </span>

                                    </div>

                                </div>
                                <div class="submit_block">
                                    <input type="button" id="sub" name="commentsubmit_btn" class="submit" value="发表评论"
                                           onclick="send_comment();">
                                    <span id="showtips" style="color:Red;"></span>
                                </div>
                                <input type="hidden" name="comnum" value="0">
                                <input type="hidden" name="refer" value="detail.php?n=">
                                <input type="hidden" name="appid" value="708">
                                <input type="hidden" name="id" value="commentid">
                                <input type="hidden" name="commentsubmit" value="true">
                                <span id="__quickcommentform_708"></span>
                                <input type="hidden" name="formhash" value="2a6ed5b0">
                            </form>
                        </div>

                        <div class="tips">
                            <p>小贴士：</p>

                            <p>1、为了让您的评论能够被更多玩家看到请勿恶意灌水。</p>

                            <p>2、谢绝人身攻击、地域歧视、刷屏、广告等恶性言论。</p>

                            <p>3、所有评论均代表玩家本人意见，不代表<a href="/">安卓应用</a>立场。</p>
                        </div>
                    </div>
                </div>
                <!--{/if}-->
            </div>
            <div class="sidebar">

                <!--广告-->

                <div class="sidebar_tltj cbox">
                    <h2 class="h2tit mb10">同类热门推荐</h2>
                    <ul>
                        <!--{relevant cid=$app.last_cate_id row=8 order='app_down desc'}-->
                        <li class="dangge_app">
                            <a href="<!--{link m='content_app' app_id=$relevant.app_id}-->" class="app_icon"><i
                                    class="app_img_none"></i><img src="<!--{imageurl url =$relevant.app_logo}-->"
                                                                  alt="<!--{$relevant.app_title}-->"></a>

                            <div class="app_name"><a href="<!--{link m='content_app' app_id=$relevant.app_id}-->">
                                    <!--{$relevant.app_title}--></a></div>
             <span class="star level_big">
       <i id="pfuc_cur" <!--{countstar star=$relevant.app_recomment}--> ></i>
             </span>
                            <span class="category">类型：<!--{$row.cname}--></span>

                            <div class="app_xiazaib"><a
                                    href="<!--{link m='content_app' app_id=$relevant.app_id}-->">下载</a></div>
                        </li>
                        <!--{/relevant}-->
                    </ul>
                </div>
                <div class="sidebar_tltj cbox">
                    <h2 class="h2tit mb10">下载排行</h2>
                    <ul>
                        <!--{recommend id=66 row=10}-->
                        <li class="dangge_app">
                            <a href="<!--{link m='content_app' app_id=$recommend.app_id}-->" class="app_icon"><i
                                    class="app_img_none"></i><img src="<!--{imageurl url = $recommend.app_logo}-->" alt="下载"></a>

                            <div class="app_name"><a href="<!--{link m='content_app' app_id=$recommend.app_id}-->">
                                    <!--{$recommend.app_title}--></a></div>
            <span class="star level_big">
       <i id="pfuc_cur" <!--{countstar star=$recommend.app_recomment}--> ></i>
             </span>
                            <span class="category">类型：<!--{$recommend.cname}--></span>

                            <div class="app_xiazaib"><a href="">下载</a></div>
                        </li>
                        <!--{/recommend}-->

                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!--/ inner -->
    <!--{include file="inc_flink.php"}-->
</div>

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
    $(document).ready(function () {
        var i = 2;
        $("#morePage").click(function () {
            $.ajax({
                type: "POST",
                url: "<!--{link m='commentLoad'}-->",
                data: {'page': i++, 'appid':<!--{$app.app_id}-->},
                dataType: 'json',
                success: function (msg) {
                    if (msg.status == '1') {
                        var game_html = '';
                        $.each(msg.list, function (k, v) {
                            var datecou = new Date(parseInt(v.comment_date) * 1000).Format("yyyy-MM-dd hh:mm:ss");
                            game_html += '<li class="clearfix"><a href="" class="pic" target="_blank"> <img src="<!--{$tpl_path}-->images/107.jpg"></a>';
                            game_html += '<div class="cmt-info">';
                            game_html += '<p class="uname">' + v.comment_uname + '</p>';
                            game_html += '<div class="clearfix">';
                            game_html += '<div class="cmt">';
                            game_html += v.comment_content;
                            game_html += '</div>';
                            game_html += '</div>';
                            game_html += '<p class="time">' + datecou + '</p>';
                            game_html += '</div></li>';
                        });
                        $("#game_rank").append(game_html);
                    } else {
                        $("#morePage").html('加载完成');
                    }
                }
            });
        });
    });
</script>
<script type="application/javascript">
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
    $(document).ready(function () {
        $(".app_content_tu_list").hover(function () {
            $(this).addClass("app_content_tu_hover");
        }, function () {
            $(this).removeClass("app_content_tu_hover");
        });
    });
    $(document).ready(function () {
        $(".zhankai_b").click(function () {
            $(".zhankai_b").css("display", "none");
            $(".zhankai_b2").css("display", "block");
            $(".app_content_introcon_js").css({
                "display": "block",
                "height": "auto",
            });
        });
    });
    $(document).ready(function () {
        $(".zhankai_b2").click(function () {
            $(".zhankai_b2").css("display", "none");
            $(".zhankai_b").css("display", "block");
            $(".app_content_introcon_js").css({
                "display": "block",
                "height": "60px",
            });
        });
    });


    /*--纠错--*/
    $(document).ready(function () {
        $(".jiucuo").click(function () {
            $(".jiucuobox").css("display", "block");
        });
        $(".jiucuo_guanbi").click(function () {
            $(".jiucuobox").css("display", "none");
        });
        $(".jiucuo_qx").click(function () {
            $(".jiucuobox").css("display", "none");
        });
    });
</script>
<!--{include file="inc_foot.php"}-->