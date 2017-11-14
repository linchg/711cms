<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $special.special_seotitle}-->
    <title><!--{$special.special_seotitle}--></title>
    <meta name="keywords" content="<!--{$special.special_seokey}-->"/>
    <meta name="description" content="<!--{$special.special_seodesc}-->"/>
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->
<div class="model">
    <div class="game-s">
        <div class="model-title">
            <h3>应用列表</h3>
        </div>
        <ul class="app-bb">
            <!--{special id=$special_id page=$page per_page=18}-->
            <li>
                <div class="icon-wrap">
                    <a href="<!--{link m='app' app_id=$special.app_id}-->">
                        <img src="<!--{imageurl url =$special.app_logo}-->" width="68" height="68" alt="<!--{$special.app_title}-->"
                             class="icon"/>
                    </a>
                </div>
                <div class="app-desc">
                    <a href="<!--{link m='app' app_id=$special.app_id}-->"
                       title="<!--{$special.app_title}-->" class="name">
                        <!--{mb_substr($special.app_title,0,7,'utf-8')}-->
                    </a>

                    <div class="meta">
                        <span class="install-count"><!--{countdown down=$special.app_down}-->人下载</span>
                        <span class="dot">・</span>
                        <span title="<!--{$special.history_size}-->"><!--{round($special.history_size/1024/1024,2)}-->MB</span>
                    </div>
                </div>
                <a class="install-btn" rel="nofollow" style="display:block;"
                   href="<!--{link m='app' app_id=$special.app_id}-->">下载</a>
            </li>
            <!--{/special}-->
        </ul>
        <!--{pagebar name='special_list' id=$special_id page=$page per_page=18}-->
    </div>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>