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
            <!--{row name='recommend' id=$id}-->
            <h3><!--{$row.area_title}--></h3>
            <!--{/row}-->
        </div>
        <ul class="app-bb">
            <!--{recommend id=$id page=$page per_page=15}-->
            <li>
                <div class="icon-wrap">
                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" width="68" height="68" alt="<!--{$recommend.app_title}-->"
                             class="icon"/>
                    </a>
                </div>
                <div class="app-desc">
                    <a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="<!--{$recommend.app_title}-->" class="name">
                        <!--{mb_substr($recommend.app_title,0,8,'utf-8')}-->
                    </a>

                    <div class="meta">
                        <span class="install-count"><!--{countdown down=$recommend.app_down}-->人下载</span>
                        <span class="dot">・</span>
                        <span title="<!--{$recommend.history_size}-->"><!--{round($recommend.history_size/1024/1024,2)}-->MB</span>
                    </div>
                </div>
                <a class="install-btn" rel="nofollow" style="display:block;"
                   href="<!--{link m='app' app_id=$recommend.app_id}-->">下载</a>
            </li>
            <!--{/recommend}-->
        </ul>
        <!--{pagebar name='recommend_list' id=$id page=$page per_page=15}-->
    </div>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>
