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

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <!-- game-detail -->
        <div class="crumb">
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
        <div class="detail-wrap ">

            <div class="detail-top clearfix">
                <div class="app-icon">
                    <img src="<!--{imageurl url =$app.app_logo}-->" width="110" height="110" alt="<!--{$app.app_title}-->" />
                </div>
                <div class="app-info">
                    <p class="app-name"> </p>
                    <h1 class="title"><!--{$app.app_title}--></h1>
                    <p class="tagline"> </p>
                    <div class="download-wp">
                        <a class="btn-ss" style="display:inline-block;"  rel="nofollow" href="<!--{link m='download' app_id=$app.app_id}-->">本地下载</a>
                        <a class="btn-rn btn-ss" style="display:inline-block;" href="<!--{link m='high_speed_download'}-->">高速下载</a>
                    </div>
                </div>
                <div class="qr-info">
                    <img src="<!--{link m='qrcode' app_id=$app.app_id}-->" alt="<!--{$app.app_title}--> 下载二维码" style="width:90px;height:90px;" />
                    <a href="<!--{link m='download' app_id=$app.app_id}-->"  rel="nofollow" style="font-size:12px;color:#777">下载 APK 文件</a>
                </div>
                <div class="num-list">
                <span class="item">
                    <i> <!--{$app.app_visitors}--> </i>
                    <b>人浏览</b>
                </span>
                <span class="item love">
                    <i> <!--{countdown down=$app.app_down}--> </i>
                    <b>人下载</b>
                </span>
                    <a title="查看评论" class="item last comment-open" href="#comments">
                        <i> <!--{$app.app_comments}--> </i>
                        <b>人评论</b>
                    </a>
                    <div class="view-stat" id="j-view-stat">
                        <i class="arrow-down"></i>
                    </div>
                    <div class="score-container">
                        <meta content="3" itemprop="ratingValue" />
                        <meta content="15" itemprop="ratingCount" />
                    </div>
                </div>
            </div>

            <div class="cols clearfix">
                <div class="col-left">

                    <div class="screenshot">
                        <h2 class="block-title"><!--{$app.app_title}--> 截图</h2>
                        <div class="appImg clearf">
                            <div class="img">
                                <!--{imagelist app_id=$app.app_id}-->
                                <img alt="<!--{$app.app_title}-->" height="320" src="<!--{$imagelist.resource_url}-->" title="<!--{$app.app_title}-->" />
                                <!--{/imagelist}-->
                            </div>
                        </div>
                    </div>

                    <div class="desc-info">
                        <h2 class="block-title"><!--{$app.app_title}--> 介绍</h2>
                        <div class="con">
                            <!--{$app.app_desc}-->
                        </div>
                    </div>

                    <a name="comments"></a>
                    <div class="comments">
                        <div>
                            <h2 class="block-title"><!--{$app.app_title}--> 评论</h2>
                        </div>
                        <!--{if !empty($comment_code)}-->
                            <!--{commentcode}-->
                        <!--{else}-->
                            <ul class="comments-list tab-panel active" id="game_rank">
                                <!--{commentlist  app_id=$app.app_id row=8 }-->
                                <li class="normal-li">
                                    <p class="first">
                                        <span class="name"><!--{$commentlist.comment_uname}--></span>
                                        <span><!--{date('Y-m-d H:i',$commentlist.comment_date)}--></span>
                                    </p>
                                    <p class="cmt-content">
                                        <span><!--{$commentlist.comment_content}--></span>
                                    </p>
                                </li>
                                <!--{/commentlist}-->
                            </ul>
                            <div class="ft" style="text-align: center;" >
                                <!--{list name='app_comment' id=$app.app_id row=1}-->
                                <a id="more_comment" class="more" style="display: none;"> <span>正在加载最近15条评论...</span> </a>
                                <a  class="more" id="morePage" style="cursor:pointer;">查看更多评论</a>
                                <!--{/list}-->

                            </div>
                            <div style="margin-top:10px;">
                                <form action="/api.php?c=ajax&m=comment&app_id=<!--{$app.app_id}-->" method="post" id="commentForm">
                                    <div style="line-height:200%; font-size:14px">网友评论仅供网友表达个人看法，并不表明 <strong>本站</strong> 同意其观点或证实其描述</div>
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
                                        <textarea name="comment" style="width:100%;height:80px;border:1px solid #ccc;font-size:12px;line-height:200%;resize:none;"></textarea>
                                    </div>
                                    <div style="margin-top:10px;height:40px;">
                                    <span class="comment_l">
                                        昵称：<input type="text" class="comment_ipt" value="" name="user" />
                                    </span>
                                    <span class="comment_l">
                                        验证码：<input type="text" style="width:60px;" class="comment_ipt" value="" name="xcode" tabindex="4" />
                                    </span>
                                    <span class="comment_l">
                                        <img onclick="this.src='/api.php?c=index&m=xcode&t='+Math.random();" style="width:60px;height:25px;margin:-4px 8px 0 6px;vertical-align: bottom;" src="/api.php?c=index&m=xcode" id="chk_code" title="点击更换验证码">
                                    </span>
                                    <span class="comment_l">
                                        <input type="button" style="width:auto;height:26px;" class="comment_ipt" value="发表评论" onclick="send_comment();" id="sub">
                                    </span>
                                    </div>
                                </form>
                            </div>
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
                                for (i = 1; i <= aLi.length; i++)
                                {
                                    aLi[i - 1].index = i;
                                    //鼠标移过显示分数
                                    aLi[i - 1].onmouseover = function ()
                                    {
                                        fnPoint(this.index);
                                        //浮动层显示
                                        oP.style.display = "block";
                                        //计算浮动层位置
                                        oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
                                        //匹配浮动层文字内容
                                        oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
                                    };
                                    //鼠标离开后恢复上次评分
                                    aLi[i - 1].onmouseout = function ()
                                    {
                                        fnPoint();
                                        //关闭浮动层
                                        oP.style.display = "none"
                                    };
                                    //点击后进行评分处理
                                    aLi[i - 1].onclick = function ()
                                    {
                                        $("#xx").val($(this).children(".selected").text());
                                        iStar = this.index;
                                        oP.style.display = "none";
                                        oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")"
                                    }
                                }
                                //评分处理
                                function fnPoint(iArg)
                                {
                                    //分数赋值
                                    iScore = iArg || iStar;
                                    for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "pd on" : "";
                                }
                                function send_comment()
                                {
                                    $.post($('#commentForm').attr('action'), $('#commentForm').serialize(), function(result){
                                        if (!result) {
                                            alert('远程服务器无响应');
                                            return false;
                                        }
                                        alert(result.msg);
                                    }, 'json');
                                }
                            </script>
                        <!--{/if}-->
                    </div>
                </div>

                <div class="col-right">
                    <div class="infos">
                        <h2 class="block-title"><!--{$app.app_title}--> 信息</h2>
                        <dl class="infos-list">
                            <dt>大小</dt>
                            <dd><!--{round($app.history_size/1024/1024,2)}-->MB</dd>
                            <dt>分类</dt>
                            <dd><!--{row name='app_category' id=$app.last_cate_id}-->
                                <!--{$row.cname}-->
                                <!--{/row}--></dd>
                            <dt>更新</dt>
                            <dd><!--{$app.app_update_time|date_format:"%Y-%m-%d"}--></dd>
                            <dt>版本</dt>
                            <dd><!--{$app.history_version}--></dd>
                            <dt>要求</dt>
                            <dd><!--{$app.history_system}--></dd>
                            <dt>厂商</dt>
                            <dd><!--{$app.app_company}--></dd>
                            <dt>网站</dt>
                            <dd><!--{$app.app_company_url}--></dd>
                        </dl>
                        <div class="clearfix" style="height:25px"></div>

                        <h2 class="block-title"><!--{$app.app_title}--> 相关应用</h2>
                        <ul class="side-list">
                            <!--{relevant cid=$app.last_cate_id row=5}-->
                            <li>
                                <a href="<!--{link m='app' app_id=$relevant.app_id}-->" target="_blank">
                                    <img src="<!--{imageurl url =$relevant.app_logo}-->" alt="<!--{$relevant.app_title}-->下载" />
                                </a>
                                <p>
                                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->" target="_blank">
                                        <!--{$relevant.app_title}-->
                                    </a>
                                    <br />
                                    <span>下载：<!--{countdown down=$relevant.app_down}--> 次</span>
                                </p>
                                <a href="<!--{link m='app' app_id=$relevant.app_id}-->" target="_blank" class="install-btn">下载</a>
                            </li>
                            <!--{/relevant}-->
                        </ul>
                        <div class="clearfix" style="height:25px"></div>

                        <h2 class="block-title"><!--{$app.app_title}--> 同类热门</h2>
                        <ul class="side-list">
                            <!--{relevant cid=$app.last_cate_id row=5 order='app_down desc'}-->
                            <li>
                                <a href="<!--{link m='app' app_id=$relevant.app_id}-->" target="_blank">
                                    <img src="<!--{imageurl url =$relevant.app_logo}-->" alt="<!--{$relevant.app_title}-->下载" />
                                </a>
                                <p>
                                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->" target="_blank">
                                        <!--{$relevant.app_title}-->
                                    </a>
                                    <br />
                                    <span>下载：<!--{countdown down=$relevant.app_down}--> 次</span>
                                </p>
                                <a href="<!--{link m='app' app_id=$relevant.app_id}-->" target="_blank" class="install-btn">下载</a>
                            </li>
                            <!--{/relevant}-->
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <!-- game-detail -->
    </div>

</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

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
                            game_html += '<li class="normal-li">';
                            game_html += ' <p class="first">';
                            game_html += ' <span class="name">'+v.comment_uname+'</span>';
                            game_html += '  <span>'+datecou+'</span>';
                            game_html += ' <div class="cmt"> ';
                            game_html += '</p>';
                            game_html += ' <p class="cmt-content"> ';
                            game_html += '<span>'+v.comment_content+'</span>';
                            game_html += ' </p>';
                            game_html += '</li>';
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
