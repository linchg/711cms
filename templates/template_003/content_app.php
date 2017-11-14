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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".box").jCarouselLite({
                btnPrev: ".prev",
                btnNext: ".next",
                auto: 40000,//图片停留时间
                scroll: 1,//每次滚动覆盖的图片个数
                speed: 1000, //设置速度，0是不动。其次就是数字越大 ，移动越慢。
                vertical: false,//横向（true），竖向（false）
                visible: 4, //显示的数量
                circular: false //是否循环
            });
            $(".boxImg ul li:not(:first)").hide();
            $(".box ul li").each(function (i) {
                $(this).mouseover(function () {
                    $(".boxImg ul li").hide();
                    $($(".boxImg ul li")[i % ($(".box ul li").length / 3)]).fadeIn("slow");
                })
            })
        });
    </script>

</head>

<body>
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<div class="model crumb">
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

<div class="gamed model">

    <!-- 游戏基本信息 start -->
    <div class="gamed-app">

        <div class="gamed-app-mes left">
            <div class="gamed-app-icon">
                <img class="icon-app" src="<!--{imageurl url =$app.app_logo}-->" alt="<!--{$app.app_title}-->"
                     title="<!--{$app.app_title}-->">
            </div>
            <h4 class="f20 font-bold"><!--{$app.app_title}--></h4>

            <!--  <p class="f14">
                  <i class="icon-start-on"></i>
                  <i class="icon-start-on"></i>
                  <i class="icon-start-on"></i>
                  <i class="icon-start-on"></i>
                  <i class="icon-start-off"></i>
              </p>-->
            <p class="f12 down_padding">大小：<!--{round($app.history_size/1024/1024,2)}-->MB</p>
            <p class="f12 down_padding">下载次数：<!--{countdown down=$app.app_down}-->次</p>
        </div>

        <div class="gamed-app-qr right">
            <div class="left">
                <p class="clear"><a class="mt5 btn btn-style8 btn-xl " href="<!--{link m='download' app_id=$app.app_id}-->">立即下载</a></p>
                <p class="clear"><a class="mt5 btn btn-style8 btn-style08 btn-x2" href="<!--{link m='high_speed_download'}-->">高速下载</a></p>
            </div>
            <div class="gamed-app-qr-code right">
                <p class="f14 tr">扫描二维码下载</p>
                <img class="icon-app mt5" src="<!--{link m='qrcode' app_id=$app.app_id}-->" alt="<!--{$app.app_title}-->"/>
            </div>
        </div>
    </div>
    <!-- 游戏基本信息 start -->

    <!-- 精彩图集 start -->
    <h4 class="gamed-title">精彩图集</h4>
    <!-- 重置slick 样式 -->

    <div class="overflowh pb30">

        <div id="scroll">
            <span class="prev">上一张</span>

            <div class="box">
                <ul>
                    <!--{imagelist app_id=$app.app_id}-->
                    <li>
                        <img alt="<!--{$app.app_title}-->" height="320" src="<!--{$imagelist.resource_url}-->"
                             title="<!--{$app.app_title}-->"/>
                    </li>
                    <!--{/imagelist}-->
                </ul>
            </div>
            <span class="next">下一张</span>

            <div class="boxImg">
                <ul>
                    <!--{imagelist app_id=$app.app_id}-->
                    <li><img alt="<!--{$app.app_title}-->" height="320" src="<!--{$imagelist.resource_url}-->"
                             title="<!--{$app.app_title}-->"/></li>
                    <!--{/imagelist}-->
                </ul>
            </div>
        </div>

    </div>
    <!-- 精彩图集 end -->

    <!-- 游戏详情 start -->
    <h4 class="gamed-title">基本详情</h4>

    <div class="gamed-intro">
        <!--{$app.app_desc}-->
    </div>
    <!-- 游戏详情 end -->

    <!--游戏评论 start-->
    <h4 class="gamed-title">评论</h4>
    <div class="gamed-intro" style="margin-top:10px;">
        <!--{if !empty($comment_code)}-->
        <!--{commentcode}-->
        <!--{else}-->
        <form action="<!--{link m='comment' app_id=$app.app_id}-->" method="post" id="commentForm">
            <div style="line-height:200%; font-size:14px">网友评论仅供网友表达个人看法，并不表明 <strong>本站</strong> 同意其观点或证实其描述</div>
            <div id="star">
                <span style="font-size:14px;" >点击星星对应用打分</span>
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
                                <img onclick="this.src='/api.php?c=index&m=xcode&t='+Math.random();" style="width:60px;height:25px;margin:-4px 8px 0 6px;vertical-align: middle;" src="<!--{link m='xcode'}-->" id="chk_code" title="点击更换验证码">
                            </span>
                            <span class="comment_l">
                                <input type="button" style="width:auto;height:26px;" class="comment_ipt" value="发表评论" onclick="send_comment();" id="sub">
                            </span>
            </div>
        </form>
        <div class="mod-cmt-list">
            <div class="hd clearfix">
                <div class="cmt-tab">
                    <ul class="clearfix">
                        <li class="first selected" id="comment1"> <a href="#comment" name="comment">全部评论</a> </li>
                    </ul>
                </div>
            </div>
            <ul class="bd listM_box" id="game_rank">
                <!--{commentlist  app_id=$app.app_id row=5 }-->
                <li class="clearfix">
                    <a href="javascript:;" class="pic">
                        <img src="<!--{$tpl_path}-->images/108.jpg"/>
                    </a>
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
                <div class="cmt-gotop" id="comment_up">
                    <a href="#comment">回评论顶部</a>
                </div>
            </div>
            <div id="id_no_comment" class="no_page" style="display: none;">
                该应用暂时还没有评论,欢迎您来抢沙发
            </div>
        </div>
        <!--{/if}-->
    </div>
    <script>
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
        $(".setupextra").hover(
            function () {
                $(".erweimadiv").show();
            },
            function () {
                $(".erweimadiv").hide();
            }
        );
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
                                game_html += '<li class="clearfix"><a href="" class="pic" target="_blank"> <img src="<!--{$tpl_path}-->images/108.jpg"></a>';
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

    <!--游戏评论 end-->

    <!-- 猜你喜欢 start -->
    <h4 class="gamed-title">猜你喜欢</h4>
    <ul class="gamed-related app-qr-ani">
        <!--{relevant cid=$app.last_cate_id row=8 order='app_down desc'}-->
        <li>
            <div class="gamed-related-icon">
                <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$relevant.app_id}-->"
                   title="<!--{$relevant.app_title}-->" target="_blank">
                    <img class="icon-app" src="<!--{imageurl url =$relevant.app_logo}-->" alt="<!--{$relevant.app_title}-->">
                </a>
            </div>
            <h5 class="f14"><!--{$relevant.app_title}--></h5>

            <!--{row name='app_category' id=$relevant.last_cate_id}--><p class="f12">
                <!--{$row.cname}-->
            </p><!--{/row}-->
            <a class="btn btn-style2 ml100 ml110 mt5" href="<!--{link m='app' app_id=$relevant.app_id}-->"
               title="下载《<!--{$relevant.app_title}-->》游戏" target="_blank">下载</a>
        </li>
        <!--{/relevant}-->
    </ul>
    <!-- 猜你喜欢 end -->

</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>
