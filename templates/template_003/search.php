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
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->
<div class="model">
    <div class="game-s">
        <div class="model-title">
            <h3>搜索列表</h3>
        </div>
        <ul class="app-bb" id="j-wc-rect" data-keyword="<!--{$keywords}-->">
            <!--{applist search=$keywords row=15}-->
            <li>
                <div class="icon-wrap">
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->">
                        <img src="<!--{imageurl url =$applist.app_logo}-->" width="68" height="68" alt="<!--{$applist.app_title}-->"
                             class="icon"/>
                    </a>
                </div>
                <div class="app-desc">
                    <a href="<!--{link m='app' app_id=$applist.app_id}-->"
                       title="<!--{$applist.app_title}-->" class="name">
                        <!--{$applist.app_title}-->
                    </a>

                    <div class="meta">
                        <span class="install-count"><!--{countdown down=$applist.app_down}-->人下载</span>
                        <span class="dot">・</span>
                        <span title="<!--{$applist.history_size}-->"><!--{round($applist.history_size/1024/1024,2)}-->MB</span>
                    </div>
                </div>
                <a class="install-btn" rel="nofollow" style="display:block;"
                   href="<!--{link m='app' app_id=$applist.app_id}-->">下载</a>
            </li>
            <!--{/applist}-->
        </ul>
    </div>

    <div class="model clear" style="display: none;" id="today_recommend">
        <!-- home-recommend start -->
        <div class="submodel-left">
            <div class="model-title">
                <h3>精品推荐</h3>
                <a class="model-title-more" href="<!--{link m='recommends' id=41}-->" target="_blank">更多</a>
            </div>
            <ul class="home-recommend app-panel app-qr-ani">
                <!--{recommend id=41 row=15}-->
                <li>
                    <div class="app-panel-icon">
                        <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" class="img-radius"
                                 title="<!--{$recommend.app_title}-->">
                        </a>
                    </div>
                    <p class="nowrap f14 lh240"><!--{$recommend.app_title}--></p>

                    <p class="ml15 mr15">
                        <a class="btn btn-style2 btn-sm btn-block "
                           href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                           title="<!--{$recommend.app_title}-->">免费下载</a>
                    </p>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
        <!-- home-recommend end -->

        <!-- home-list start -->
        <div class="submodel-right">
            <div class="model-title">
                <h3>热门排行榜</h3>
                <a class="model-title-more" href="<!--{link m='recommends' id=42}-->" target="_blank">更多</a>
            </div>
            <ul class="home-recommend app-panel app-qr-ani">
                <!--{recommend id=42 row=9}-->
                <li>
                    <div class="app-panel-icon">
                        <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" class="img-radius"
                                 title="<!--{$recommend.app_title}-->">
                        </a>
                    </div>
                    <p class="nowrap f14 lh240"><!--{$recommend.app_title}--></p>

                    <p class="ml15 mr15">
                        <a class="btn btn-style2 btn-sm btn-block " target="_blank"
                           href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           title="<!--{$recommend.app_title}-->">免费下载</a>
                    </p>
                </li>

                <!--{/recommend}-->

            </ul>

        </div>
    </div>
</div>

</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

<script>
    $(function(){
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
    });
</script>

</body>
</html>