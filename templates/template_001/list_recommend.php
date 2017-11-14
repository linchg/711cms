<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=4}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <!-- necessary-item -->
        <div class="app-box">

            <div class="switch-div" id="switch-div-soft">

                <div class="app-essential clearfix">
                    <!--{row name='recommend' id=$id}-->
                    <span class="block-title"><!--{$row.area_title}--></span>
                    <!--{/row}-->
                    <ul class="app-essential clearfix">
                        <!--{recommend id=$id}-->
                        <li class="small card">
                            <div class="icon-wrap">
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="68" height="68" alt="<!--{$recommend.app_title}-->" class="icon" />
                                </a>
                            </div>
                            <div class="app-desc">
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="name">
                                    <!--{$recommend.app_title}-->
                                </a>
                                <div class="meta">
                                    <span class="install-count"><!--{$recommend.app_down}--> 人下载</span>
                                    <span class="dot"> </span>
                                    <span title="<!--{$recommend.history_size}-->"><!--{$recommend.history_size}--></span>
                                </div>
                            </div>
                            <a class="install-btn" rel="nofollow" style="display:block;" href="<!--{link m='app' app_id=$recommend.app_id}-->">下载</a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>

            </div>

        </div>
        <!--/ necessary-item -->
    </div>

</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>
