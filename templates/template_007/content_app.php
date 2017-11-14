<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<div class="content clearfix">
    <div class="left">
        <div class="list-title clearfix" style="padding-left:0">
            <div class="crumb02">
                <a>您的位置：</a>
                <a href="/">首页</a>
                <span>&gt;</span>
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
                <!--{/row}-->
                <span>&gt;</span>
                <span class="cur"><!--{$app.app_title}--></span>
            </div>
        </div>

        <div id="bd" class="gx-detail ">

            <div class="grid">
                <div class="col9 first">
                    <div class="mod-soft-info clearfix" data-desc="detailinfo">
                        <div class="soft-show">
                            <div class="pic">
                                <img class="pngfix" src="<!--{imageurl url =$app.app_logo}-->">
                            </div>
                        </div>
                        <div class="options">
                            <a class="btn-1 setup" href="<!--{link m='download' app_id=$app.app_id}-->">点击下载</a>
                            <a class="btn-1 setup h-down" href="<!--{link m='high_speed_download'}-->">高速下载</a>

                            <div class="setupextra">
                                <span class="sep"></span>
                                <a href="javascript:void(0)">二维码下载</a>

                                <div class="erweimadiv" style="display: none;"><img width="150" height="150"
                                                                                    src="<!--{link m='qrcode' app_id=$app.app_id}-->"><i
                                        class="dot"></i></div>
                            </div>
                        </div>
                        <div class="intro">

                            <div class="soft-bc-info clearfix">
                                <h1><!--{$app.app_title}--></h1>
                                <span></span>
                            </div>
                            <div class="soft-extra-info">
                                <div class="mod-rate">
                                    <span class="scoretxt"><!--{$app.app_grade}-->分</span>
                                </div>
                                <span class="dl-cnt">下载次数:<!--{countdown down=$app.app_down}--></span>
                                <span
                                    class="update-time">更新时间：<!--{$app.app_update_time|date_format:"%Y-%m-%d"}--> </span>
                            </div>
                            <p class="other-dl-link">从其他市场下载：<!--{$app.app_company}--> </p>
                        </div>

                    </div>
                    <!--end of app info-->
                    <div class="mod-detail-cmt">
                        <div class="hd-s clearfix">
                            <div class="tab">
                                <ul id="nsitem">
                                    <li class="selected"><a href="javascript:;">详细信息 </a></li>
                                </ul>
                            </div>
                        </div>
                        <!--end of nstab-->
                        <div class="bd-s">
                            <div class="mod-pro-detail selected">
                                <div class="mod-pro-analysis">

                                </div>
                                <div class="mod-base-info">
                                    <ul class="clearfix">
                                        <li>大小：<!--{round($app.history_size/1024/1024,2)}-->MB</li>
                                        <li>版本：<!--{$app.history_version}--></li>
                                        <li>系统：<!--{$app.history_system}--></li>
                                        <li>分类：
                                            <!--{row name='app_category' id=$app.last_cate_id}-->
                                            <!--{$row.cname}-->
                                            <!--{/row}-->
                                        </li>
                                        <li>作者：<!--{$app.app_company}--></li>
                                    </ul>
                                </div>
                                <div class="mod-extra-info" id="J-desc">

                                    <div class="bd" id="J-brief">
                                        <!--{$app.app_desc}-->
                                    </div>
                                    <div class="alldesc" id="J-alldesc">
                                        <!--{$app.app_desc}-->
                                    </div>
                                    <div class="ft2" id="J-desc-expand" style="display: block;">
                                        <a href="http://t3.171cms.com/app/14.html#" id="J-showall"
                                           class="showall">展开</a>
                                        <a href="http://t3.171cms.com/app/14.html#" id="J-hideall"
                                           class="hideall">收起</a>
                                    </div>
                                </div>
                                <div id="scrollbar" class="">
                                    <div class="viewport" style="height: 406px;">
                                        <div class="overview" style="width: 1242px; height: 400px; left: 0px;">
                                            <!--{imagelist app_id=$app.app_id}-->
                                            <img _src="<!--{$imagelist.resource_url}-->"
                                                 src="<!--{$imagelist.resource_url}-->"
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
                            </div>
                            <div class="mod-user-cmt">
                                <div class="info">
                                    <h3>用户评价<span></span></h3>
                                </div>
                                <a name="comment"></a>
                                <!--{if !empty($comment_code)}-->
                                <!--{commentcode}-->
                                <!--{else}-->
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
                                                                           type="checkbox" checked="checked">保持登录状态
                                            </label>

                                            <p><span id="err_password"></span> <span id="err_username"></span></p>
                                            <input type="hidden" id="destUrl"
                                                   value="http://soft.leidian.com/detail/index/soft_id/77208"
                                                   name="destUrl" cmtinstalled="true">
                                        </form>
                                    </div>
                                    <div class="ft2">
                                        <a target="_blank" href="http://i.360.cn/findpwd/">忘记密码？</a>
                                        <span>|</span>
                                        <a href="#" id="reg_url">还没有账号？马上注册&gt;&gt;</a>
                                    </div>
                                </div>
                                <div class="mod-cmt">
                                    <div style="margin-top:10px;">
                                        <form action="<!--{link m='comment' app_id=$app.app_id}-->" method="post"
                                              id="commentForm">
                                            <div style="line-height:200%; font-size:14px">网友评论仅供网友表达个人看法，并不表明
                                                <strong>本站</strong> 同意其观点或证实其描述
                                            </div>
                                            <div id="star">
                                                <span style="font-size:14px;">点击星星对应用打分</span>
                                                <ul>
                                                    <li class="pd on"><a href="javascript:;" class="selected">1</a></li>
                                                    <li class="pd on"><a href="javascript:;" class="selected">2</a></li>
                                                    <li class="pd on"><a href="javascript:;" class="selected">3</a></li>
                                                    <li class="pd on"><a href="javascript:;" class="selected">4</a></li>
                                                    <li class="pd on"><a href="javascript:;" class="selected">5</a></li>
                                                </ul>
                                                <span><strong>5 分</strong> (强烈推荐)</span>

                                                <p style="display: none; left: 152px;"><em><b>5</b> 分 非常满意</em>强烈推荐</p>
                                            </div>
                                            <div style="margin-top:5px;">
                                                <textarea name="comment"
                                                          style="width:100%;height:80px;border:1px solid #ccc;font-size:12px;line-height:200%;"></textarea>
                                            </div>
                                            <div style="margin-top:10px;height:40px;">
                                        <span class="comment_l">
                                            昵称：<input type="text" class="comment_ipt" value="" name="user">
                                        </span>
                                        <span class="comment_l">
                                            验证码：<input type="text" style="width:60px;" class="comment_ipt" value=""
                                                       name="xcode" tabindex="4">
                                        </span>
                                        <span class="comment_l">
                                            <img onclick="this.src='/api.php?c=index&m=xcode&t='+Math.random();"
                                                 style="width:60px;height:25px;margin:-4px 8px 0 6px; display: inline-block;"
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
                                                <li class="first selected" id="comment1"><a
                                                        style="cursor:pointer;">全部评论</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="bd listM_box" id="game_rank">
                                        <!--{commentlist  app_id=$app.app_id row=6}-->
                                        <li class="normal-li">
                                            <p class="first">
                                                <a href="javascript:;" class="pic">
                                                    <img src="<!--{$tpl_path}-->images/107.jpg"/></a>
                                                <span class="name"><!--{$commentlist.comment_uname}--></span>
                                                <span><!--{date('Y-m-d H:i',$commentlist.comment_date)}--></span>
                                            </p>

                                            <p class="cmt-content">
                                                <span><!--{$commentlist.comment_content}--></span>
                                            </p>
                                        </li>
                                        <!--{/commentlist}-->
                                    </ul>
                                    <div>
                                        <!--{list name='app_comment' id=$app.app_id row=1}-->
                                        <a id="more_comment" class="more" style="display: none;">
                                            <span>正在加载最近15条评论...</span> </a>
                                        <a class="more" id="morePage" style="cursor:pointer;">查看更多评论</a>
                                        <!--{/list}-->
                                    </div>
                                    <div class="ft2">
                                        <div class="cmt-gotop" id="comment_up">
                                            <a href="#comment">回评论顶部</a>
                                        </div>
                                    </div>
                                    <!--{if empty($app.app_comments) }-->
                                    <!--
                                    <div id="id_no_comment" class="no_page">
                                        该应用暂时还没有评论,欢迎您来抢沙发
                                    </div>-->
                                    <!--{/if}-->
                                </div>
                                <!--{/if}-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of ndlft-->

            </div>
            <!--end main-->
        </div>

    </div>

    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>
</div>
<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>

<!--/ 友情链接 -->

<!--{include file="inc_flink.php"}-->
<div class="ft">
    <!--{include file="inc_foot.php"}-->
</div>
<script>
    $(".setupextra").hover(
        function () {
            $(".erweimadiv").show();
        },
        function () {
            $(".erweimadiv").hide();
        }
    );
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
                            game_html += '<li class="normal-li">';
                            game_html += ' <p class="first">';
                            game_html += ' <p class="first">';
                            game_html += '<a href="" class="pic" target="_blank"> <img src="<!--{$tpl_path}-->images/107.jpg"></a>';
                            game_html += ' <span class="name">' + v.comment_uname + '</span>';
                            game_html += '  <span>' + datecou + '</span>';
                            game_html += ' <div class="cmt"> ';
                            game_html += '</p>';
                            game_html += ' <p class="cmt-content"> ';
                            game_html += '<span>' + v.comment_content + '</span>';
                            game_html += ' </p>';
                            game_html += '</li>';
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
<script type="text/javascript" src="<!--{$tpl_path}-->js/tinyscrollbar.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/detail.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
</body>
</html>
