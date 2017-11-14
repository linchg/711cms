<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <h2>搜索列表</h2>
        </div>
        <div class="articles">

            <div class="mod-list-app mod-list-apps gx-tab-content gx-content">

                <ul class="clearfix gx-text" id="j-wc-rect" data-keyword="<!--{$keywords}-->" style="height: auto;">
                    <!--{applist search=$keywords row=15}-->
                    <li>
                        <a class="pic" href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url =$applist.app_logo}-->" width="48" height="48">
                        </a>
                        <h4>
                            <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                               title="<!--{$applist.app_title}-->" target="_blank"><!--{$applist.app_title}--></a>
                        </h4>
                        <a class="bt-install setup" href="<!--{link m='app' app_id=$applist.app_id}-->"
                           target="_blank" data-tab="0">安装</a>
                    </li>
                    <!--{/applist}-->
                </ul>
            </div>
            <div class="grid-1 sect-1 clearfix" id="today_recommend" style="display: none;">
                <div class="hd-hot clearfix">
                    <h2 class="ly-moreh">精品推荐<a href="<!--{link m='recommends' id=41}-->" class="ly-more">+ 更多</a></h2>
                </div>
                <div class="articles">
                    <div class="mod-list-app mod-list-apps">
                        <ul class="clearfix">
                            <!--{recommend id=41 row=30}-->
                            <li>
                                <a class="pic" target="_blank" href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="48" height="48"></a>
                                <h4><a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->"
                                       target="_blank"><!--{$recommend.app_title}--></a></h4>
                                <a class="bt-install setup" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                   data-tab="0" target="_blank">安装</a>
                            </li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                </div>
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
        var child_li = $("#j-wc-rect").children("li").index();
        var keyword = $("#j-wc-rect").attr("data-keyword");
        var html = '';
        if(child_li == -1){
            html = '<div class="ly-searchkou">';
            html += '<p>抱歉，没有找到符合条件的“<span>'+ keyword +'</span>”相关内容！</p>';
            html += '</div>';
            $("#j-wc-rect").append(html);
            $("#today_recommend").show();
        }

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