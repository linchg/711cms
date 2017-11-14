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

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <!-- special-item -->
        <ul class="app-box clearfix">
            <!--{list name='special'}-->
            <li class="card special-card normal">
                <div class="special-info">
                    <!--{row name='special' id=$list.area_id}-->
                    <a class="special-icon" href="<!--{link m='special' special_id=$row.area_id}-->">
                        <img src="<!--{$row.area_logo}-->" alt="<!--{$row.area_title}-->" />
                    </a>
                    <div class="special-meta">
                        <span><!--{$row.area_title}--></span>
                        <a class="see-btn" target="_blank" href="<!--{link m='special' special_id=$row.area_id}-->">查看</a>
                    </div>
                    <!--{/row}-->
                </div>
                <ul class="s-applist">
                    <!--{special id=$list.area_id row=6}-->
                    <li class="special-three">
                        <div class="icon-wrap">
                            <a href="<!--{link m='app' app_id=$special.app_id}-->">
                                <img src="<!--{imageurl url =$special.app_logo}-->" width="48" height="48" alt="<!--{$special.app_title}-->" class="icon" />
                            </a>
                        </div>
                        <div class="app-desc">
                            <a href="<!--{link m='app' app_id=$special.app_id}-->" title="<!--{$special.app_title}-->" class="name">
                                <!--{$special.app_title}-->
                            </a>
                            <div class="meta">
                                <span class="install-count"><!--{$special.app_down}--> 人安装</span>
                                <span class="dot"></span>
                                <span title="<!--{$special.history_size}-->"><!--{$special.history_size}--></span>
                            </div>
                        </div>
                        <a class="install-btn" style="display:block;" href="<!--{link m='app' app_id=$special.app_id}-->" >下载</a>
                    </li>
                    <!--{/special}-->
                </ul>
            </li>
            <!--{/list}-->
        </ul>
        <!--/ special-item -->
    </div>

</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>