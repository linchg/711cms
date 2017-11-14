<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->


<div class="content clearfix">
    <div class="left">
        <div class="crumb02">
            <a>您的位置：</a>
            <a href="/">首页</a>
            <span>&gt;</span>
            <!--{row name='navicat' id=6}-->
            <a href="/">
                <!--{$row.navicat_name}-->
            </a>
            <!--{/row}-->
            <span>&gt;</span>
            <!--{row name='special' id=$special_id}-->
            <a href="/">
                <!--{$special.area_title}-->
            </a>
            <!--{/row}-->
        </div>
        <div class="list-title clearfix" style="padding-left:0">
            <h2 class="con"><span class="title-bg iconSprite"></span>精品专题</h2>
        </div>


        <div class="mod-special">

            <div class="mod-special-list">
                <!--{row name='special' id=$special_id }-->
                <div class="hd clearfix">
                    <h2>
                        <a href="<!--{link m='special' special_id=31 }-->" target="_blank">
                            <!--{$row.area_title}-->
                        </a>
                    </h2>
                </div>
                <div class="bd clearfix">
                    <div class="slide">


                        <div class="tli_apps" style="visibility: visible; overflow: hidden; position: relative; z-index: 2;">
                            <ul class="tli_slide" >
                                <!--{special id=$special_id page=$page per_page=32}-->
                                <li style="overflow: hidden;  width: 81px; height: 116px;">
                                    <a class="pic tsicon" href="<!--{link m='app' app_id=$special.app_id}-->" title="<!--{$special.app_title}-->" target="_blank">
                                        <img src="<!--{imageurl url =$special.app_logo}-->" alt="<!--{$special.app_title}-->">
                                    </a>

                                    <h3 class="js-pro-name" style="display: block;"><!--{$special.app_title}--></h3>
                                    <a href="<!--{link m='app' app_id=$special.app_id}-->" class="js-btn bt-install" style="display: none;" target="_blank">安装</a>
                                </li>
                                <!--{/special}-->
                            </ul>

                        </div>
                        <!--{pagebar name='special_list' id=$special_id page=$page per_page=32}-->
                    </div>
                </div>
                <!--{/row}-->
            </div>
            <script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
            <script src="<!--{$tpl_path}-->js/slides.120313.js"></script>

            <script>
                $(function () {
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
                });
            </script>
        </div>
    </div>

    <div class="right">
        <!--{include file="right-div.php"}-->
    </div>
</div>

<div class="overlay" id="overlay" style="display: none; height: 1978px;"></div>
<a id="toTop" title="返回顶部" target="_self" href="javascript:void(0)" style="display: none;"><i></i></a>

<script src="<!--{$tpl_path}-->js/index.js"></script>
<!--{include file="inc_foot.php"}-->
</body>
</html>

