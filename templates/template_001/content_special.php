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

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <div class="app-box">
            <span class="block-title">应用列表</span>
            <ul id="j-wc-rect" class="wc-rect clearfix">
                <!--{special id=$special_id page=$page per_page=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$special.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url =$special.app_logo}-->" width="68" height="68" alt="<!--{$special.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$special.app_id}-->" title="<!--{$special.app_title}-->" class="name">
                            <!--{$special.app_title}-->
                        </a>
                        <div class="meta">
                            <a class="tag-link" href="<!--{link m='softs' cate_id=$special.cate_id}-->"><!--{$special.cname}--></a>
                            <span class="install-count"><!--{$special.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$special.history_size}-->"><!--{$special.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$special.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$special.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/special}-->
            </ul>
            <!--{pagebar name='special_list' id=$special_id page=$page per_page=15}-->
        </div>
    </div>

</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>