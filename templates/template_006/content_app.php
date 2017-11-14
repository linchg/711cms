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

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<!-- 当前位置 -->
<div class="box">
    <p class="pos">当前位置：
        <a href="/">首页</a><b>&gt;</b>
        <!--{row name='app_category' id=$app.last_cate_id}-->
        <!--{if $row.parent_id ==1}-->
        <a href="<!--{link m='softs'}-->">软件</a>
        <b>&gt;</b>
        <a href="<!--{link m='softs' cate_id=$app.last_cate_id}-->"><!--{$row.cname}--></a>
        <!--{else}-->
        <a href="<!--{link m='games'}-->">游戏</a>
        <b>&gt;</b>
        <a href="<!--{link m='games' cate_id=$app.last_cate_id}-->"><!--{$row.cname}--></a>
        <!--{/if}-->
        <!--{/row}-->
        <b>&gt;</b>
        <span><!--{$app.app_title}--></span>
    </p>
</div>
<!-- 当前位置 -->

<div class="box2">
    <div class="as_main fl">
        <div class="app">
            <div class="app_leftinfo">
                <img src="<!--{imageurl url =$app.app_logo}-->" width="100" height="100" data-bd-imgshare-binded="1">
                <h1><!--{$app.app_title}--></h1>
                <p>大小：<em><!--{round($app.history_size/1024/1024,2)}-->MB</em>更新：<em><!--{$app.app_update_time|date_format:"%Y-%m-%d"}--></em>版本：<em><!--{$app.history_version}--></em></p>
                <p>分类：<!--{row name='app_category' id=$app.last_cate_id}-->
                    <b><a><!--{$row.cname}--></a></b>
                    <!--{/row}-->
                <ul class="app_btn">
                    <li>
                        <a href="<!--{link m='download' app_id=$app.app_id}-->" style="color:#FFF;"><span class="btn_phone" style="background-color: rgb(74, 193, 92);"><i></i>本地下载</span></a>
                    </li>
                    <li>
                        <a class="btn_velocity" href="<!--{link m='high_speed_download'}-->"><i></i>高速下载</a>
                    </li>

                </ul>
            </div>
            <div class="app_rightcode">
                <div class="rcode_box">
                    <h2>扫码安装</h2>
                    <div class="rcode_140"><img src="<!--{link m='qrcode' app_id=$app.app_id}-->" data-bd-imgshare-binded="1"></div>
                    <!--<a href="#" target="_blank">扫码工具下载</a>-->
                </div>
                <div class="rcode_tri"></div>
            </div>
            <div class="app_hang">
                <!--<a href="" class="hang_3">电脑版</a>-->
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="ad_728" style="padding-bottom:0px;"></div>
        <div class="app_info">
            <h2><!--{$app.app_title}-->截图</h2>
            <div class="infopic">
                <div class="picbox">
                    <ul class="piclist" style="width: 1860px;">
                        <!--{imagelist app_id=$app.app_id}-->
                        <li style="width: 180px;"><a href="<!--{$imagelist.resource_url}-->" data-lightbox="s1" data-text="<!--{$app.app_title}-->"><img src="<!--{$imagelist.resource_url}-->" alt="<!--{$app.app_title}-->" data-bd-imgshare-binded="1" height="320"></a></li>
                        <!--{/imagelist}-->
                    </ul>
                </div>
                <div class="gn_prev"></div>
                <div class="gn_next"></div>
            </div>
        </div>
        <div class="app_info">
            <h2>官方介绍</h2>
            <div class="p_info"><!--{$app.app_desc}--></div>
            <div class="p_more"><a href="javascript:;">更多...</a></div>
        </div>
        <div class="app_info">
            <div><h2><!--{$app.app_title}-->相关应用</h2></div>
            <ul class="wz_list_double">
                <!--{relevant cid=$app.last_cate_id row=6}-->
                <li>
                    <em><a><!--{row name='app_category' id=$app.last_cate_id}--><!--{$row.cname}--><!--{/row}--></a></em>
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->" class="wz_tit" target="_blank"><!--{$relevant.app_title}--></a>
                </li>
                <!--{/relevant}-->
            </ul>
        </div>
        <div id="dlode" name="dlode" class="app_info">
            <div><h2>下载<!--{$app.app_title}-->的用户还下载了</h2></div>
            <ul class="cai_list">
                <!--{relevant cid=$app.last_cate_id row=8}-->
                <li>
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->"><img src="<!--{imageurl url =$relevant.app_logo}-->" title="<!--{$relevant.app_title}-->" data-bd-imgshare-binded="1"></a>
                    <section>
                        <h3><a href="<!--{link m='app' app_id=$relevant.app_id}-->"><!--{$relevant.app_title}--></a></h3>
                        <p>大小: <!--{round($relevant.history_size/1024/1024,2)}-->MB</p>
                        <p><a href="<!--{link m='app' app_id=$relevant.app_id}-->">下载</a></p>
                    </section>
                </li>
                <!--{/relevant}-->
            </ul>
        </div>

        <div class="app_info">
            <h2><!--{$app.app_title}-->安卓版评论</h2>
            <!--{if !empty($comment_code)}-->
            <!--{commentcode}-->
            <!--{else}-->
            <div class="mod-user-cmt" style="padding:0 20px;">
                <div class="info"></div>
                <a name="comment"></a>

                <!-- 评论提交表单 -->
                <div class="mod-cmt">
                    <div style="margin-top:10px;">
                        <form action="<!--{link m='comment' app_id=$app.app_id}-->" method="post" id="commentForm">
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
                                <p style="display: none; left: 128px;"><em><b>4</b> 分 满意</em>还不错</p>
                            </div>
                            <div style="margin-top:5px;">
                                <textarea name="comment" style="width:100%;height:80px;border:1px solid #ccc;font-size:12px;line-height:200%;"></textarea>
                            </div>
                            <div style="margin-top:10px;height:40px;">
                                <span class="comment_l">
                                    昵称：<input type="text" class="comment_ipt" value="" name="user">
                                </span>
                                <span class="comment_l">
                                    验证码：<input type="text" style="width:60px;" class="comment_ipt" value="" name="xcode" tabindex="4">
                                </span>
                                <span class="comment_l">
                                    <img onclick="this.src='/api.php?c=index&m=xcode&t='+Math.random();" style="width:60px;height:25px;margin:-4px 8px 0 6px; display: inline-block;vertical-align: middle;" src="<!--{link m='xcode'}-->" id="chk_code" title="点击更换验证码">
                                </span>
                                <span class="comment_l">
                                    <input type="button" style="width:auto;height:26px;" class="comment_ipt" value="发表评论" onclick="send_comment();" id="sub">
                                </span>
                            </div>
                        </form>
                    </div>
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
                            /*发表评论成功当前页面刷新*/
                            location.reload();
                        }, 'json');
                    }
                </script>
                <!-- 评论提交表单 -->

                <!-- 评论列表 -->
                <div class="mod-cmt-list">
                    <div class="hd clearfix">
                        <div class="cmt-tab">
                            <ul class="clearfix">
                                <li class="first selected" id="comment1"><a name="comment">全部评论</li>
                            </ul>
                        </div>
                    </div>
                    <ul class="bd listM_box" id="game_rank" id="comment_num2">
                        <!--{commentlist  app_id=$app.app_id row=6}-->
                        <li class="normal-li">
                            <p class="first">
                                <a href="javascript:;" class="pic">
                                    <img src="<!--{$tpl_path}-->images/107.jpg"/> </a>
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
                        <a id="more_comment" class="more" style="display: none;"> <span>正在加载最近15条评论...</span> </a>
                        <a  class="more" id="morePage" style="cursor:pointer; margin-right:300px;">查看更多评论</a>
                        <!--{/list}-->
                    </div>
                    <div class="ft">
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
                <!-- 评论列表 -->
            </div>
            <!--{/if}-->
        </div>
    </div>

    <!-- 热门推荐应用 -->
    <div class="as_sub fr">
        <div class="tj_app">
            <div class="sub_tit"><!--{row name='recommend' id=29}--><!--{$row.area_title}--><!--{/row}--></div>
            <ul>
                <!--{recommend id=29 row=10}-->
                <li>
                    <a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{imageurl url = $recommend.app_logo}-->"  width="50" height="50"></a>
                    <div class="app_name"><a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->"><!--{$recommend.app_title}--></a></div>
                    <p><a target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->" class="btn_new">下载</a><!--{countdown down=$recommend.app_down}-->+人在玩</p>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
        <span class="pic_gap"></span>
        <span class="pic_gap"></span>
    </div>
    <!-- 热门推荐应用 -->
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
                            game_html += '<a href="" class="pic" target="_blank"> <img src="<!--{$tpl_path}-->images/107.jpg"></a>';
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