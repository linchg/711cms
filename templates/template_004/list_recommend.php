<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>

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
        <div class="grid-1 sect-1 clearfix mt10 gx-sec-1">
            <div class="hd-hot clearfix">
                <!--{row name='recommend' id=$id}-->
                <h2><!--{$row.area_title}--></h2>
                <!--{/row}-->
            </div>
            <div class="articles">
                <div class="mod-list-app mod-list-apps gx-tab-content gx-content">

                    <ul class="clearfix gx-text">
                        <!--{recommend id=$id}-->
                        <li>
                            <a class="pic" href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" width="48" height="48">
                            </a>
                            <h4>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                   title="<!--{$recommend.app_title}-->" target="_blank"><!--{$recommend.app_title}--></a>
                            </h4>
                            <a class="bt-install setup" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                               target="_blank" data-tab="0">安装</a>
                        </li>
                        <!--{/recommend}-->
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
</body>
</html>
