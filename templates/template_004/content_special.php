<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $special.special_seotitle}-->
    <title><!--{$special.special_seotitle}--></title>
    <meta name="keywords" content="<!--{$special.special_seokey}-->" />
    <meta name="description" content="<!--{$special.special_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc4">
    <div id="hd">
        <div class="mod-search-hd-bunny">
            <!--{include file="inc_top.php"}-->
            <!--{include file="inc_menu.php"}-->
        </div>
    </div>

<div id="bd">
    <div class="mod-topic-crumb">
        <a href="/">首页</a>
        <span>&gt;</span>
        <a href="<!--{link m='specials'}-->">特色专题</a>
        <span>&gt;</span>
        <span class="str"><!--{$special.area_title}--></span>
    </div>
    <div id="mod-topic-detail" class="clearfix">
        <p class="img"><img src="<!--{$special.area_logo}-->" __lazypushed="1"/></p>

        <div class="detail">

            <h2><!--{$special.area_title}--></h2>

            <!--   <p class="share note"> 分享到：<a href="javascript:;" class="weibo pngfix" data-share="weibo"
                                             title="新浪微博">新浪微博</a>
                   <a href="javascript:;" class="tweibo pngfix" data-share="tweibo" title="腾讯微博">腾讯微博</a> <a
                       href="javascript:;" class="qzone pngfix" data-share="qzone" title="QQ空间">QQ空间</a> <a
                       href="javascript:;" class="renren pngfix" data-share="renren" title="人人网">人人网</a> <a
                       href="javascript:;" class="douban pngfix" data-share="douban" title="豆瓣网">豆瓣网</a> </span>
               </p>-->
            <p class="desc note">
                <!--{$special.area_html}-->
            </p>

        </div>
    </div>
    <div class="mod-topic-block">
        <div class="mod-topic-title clearfix">
            <h3>软件</h3>
        </div>
        <div class="mod-topic-cont">

            <ul class="mod-soft-list">
                <!--{special id=$special_id page=$page per_page=12}-->
                <li class="mod-soft-item mod-item">
                    <span>
                        <p class="img"><a href="<!--{link m='app' app_id=$special.app_id}-->" class="pic"
                                          target="_blank">
                                <img class="pngfix" src="<!--{imageurl url =$special.app_logo}-->"/> </a>
                        </p>
                        <h4><span class="mod-topic-check"></span>
                            <a class="em" href="<!--{link m='app' app_id=$special.app_id}-->"
                               title="<!--{$special.app_title}-->" target="_blank"><!--{$special.app_title}--></a>
                            <span class="mod-topic-rec" title=""></span>
                        </h4>
                        <ul class="info note">
                            <li class="sort"><!--{$special.cname}--></li>
                            <li class="score"><span class="stars pngfix"><em class="pngfix" <!--{countstar star=$special.app_recomment}-->></em></span> <span
                                    class="em"><!--{$special.app_grade}-->分</span></li>
                            <li class="dl">下载次数：<!--{countdown down=$special.app_down}-->次</li>
                        </ul>
                        <p class="desc note"><!--{$special.app_seodesc}-->...
                            <a href="<!--{link m='app' app_id=$special.app_id}-->" class="em" target="_blank">查看详情&gt;&gt;</a>
                        </p>
                    </span>

                    <p class="action" id="install_166429_524">
                        <a href="<!--{link m='app' app_id=$special.app_id}-->" target="_blank"
                           class="mod-topic-setup bt-install bt-install-2 setup">点击下载</a>
                    </p>
                </li>
                <!--{/special}-->
            </ul>
        </div>
        <div class="ft">
            <!--{pagebar name='special_list' id=$special_id page=$page per_page=12}-->
        </div>
    </div>
    <!--end列表内容-->
    <div class="mod-topic-block" id="js-slide">
        <div class="mod-topic-title">
            <h3>推荐专题</h3>
        </div>
        <div class="mod-topic-cont">

            <div class="mod-other-list special-list js-views roll-list">
                <ul class="clearfix">
                    <!--{list name='special' row=4}-->

                    <li class="mod-other-item mod-item">
                        <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                            <img src="<!--{$list.area_logo}-->" data-original="<!--{$list.area_logo}-->"/>
                            <span class="name"><!--{$list.area_title}--></span>
                        </a>
                    </li>

                    <!--{/list}-->
                </ul>
            </div>

        </div>
    </div>
    <!--{include file="inc_flink.php"}-->
</div>
</div>
<!--{include file="inc_foot.php"}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
<script src="<!--{$tpl_path}-->js/slides.120313.js"></script>
<script>$(function () {
        $(".slide .js-roll-list").each(function (i) {
            if ($(this).find('li').length) {

                $(this).jcl({
                    btnNext: ".js-next" + i,
                    btnPrev: ".js-prev" + i,
                    afterEnd: function () {
                        if (window.PicLazyUtil) {
                            PicLazyUtil.pushImgs();
                            PicLazyUtil.testImgs();
                        }
                    },
                    circular: false,
                    scroll: 6,
                    visible: 1,
                    speed: 600

                });
            }

        });

        $("body").delegate(".js-roll-list li", "mouseenter", function () {
            $(this).find(".js-pro-name").hide().siblings(".js-btn").css("display", "inline-block");
        });

        $("body").delegate(".js-roll-list li", "mouseleave", function () {
            $(this).find(".js-pro-name").show().siblings(".js-btn").hide();
        });
    });</script>
</body>
</html>
