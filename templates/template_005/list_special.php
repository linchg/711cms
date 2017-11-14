<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=6}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="wrapper">
    <!--{include file="inc_top.php"}-->
    <!--{include file="inc_menu.php"}-->

<!--main-->
<div class="main">
    <div class="wp">
        <div class="mod-special">
            <!--{list name='special'}-->
            <div class="mod-special-list">
                <div class="hd clearfix">
                    <h2>
                        <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                            <!--{$list.area_title}--></a>
                    </h2>
                </div>
                <div class="bd clearfix">
                    <div class="show">
                        <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank">
                            <img src="<!--{$list.area_logo}-->" alt="<!--{$list.area_title}-->">
                        </a>
                    </div>
                    <div class="slide">
                        <a href="javascript:;" class="prev js-prev<!--{$list.special_sort_show -1}--> disabled">&lt;</a>

                        <div class="roll-list js-roll-list">
                            <ul class="clearfix">
                                <!--{special id=$list.area_id row=12}-->
                                <li>
                                    <a class="pic tsicon" href="<!--{link m='app' app_id=$special.app_id}-->"
                                       title="<!--{$special.app_title}-->" target="_blank">
                                        <img src="<!--{imageurl url =$special.app_logo}-->" alt="<!--{$special.app_title}-->">
                                    </a>

                                    <h3 class="js-pro-name" style="display: block;"><!--{$special.app_title}--></h3>
                                    <a href="<!--{link m='app' app_id=$special.app_id}-->"
                                       class="js-btn bt-install"
                                       style="display: none;" target="_blank">安装</a>
                                </li>
                                <!--{/special}-->
                            </ul>
                        </div>
                        <a href="javascript:;" class="next js-next<!--{$list.special_sort_show -1}-->">&gt;</a>
                    </div>
                </div>
            </div>
            <!--{/list}-->
        </div>

    </div>
</div>
<!-- /main-->
</div>
<!--{include file="inc_foot.php"}-->
<script type="text/javascript" src="<!--{$tpl_path}-->js/bc.js"></script>
<script type="text/javascript" src="<!--{$tpl_path}-->js/slides.120313.js"></script>

<script>;
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
    });</script>

</body>
</html>



