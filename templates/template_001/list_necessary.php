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
            <ul class="switch-tab">
                <!--{list name='necessary'}-->
                    <li <!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }--> class="current"<!--{/if}-->id="type_game"><a href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->"><!--{$list.necessary_title}--></a></li>
                <!--{/list}-->
            </ul>

            <div class="switch-div" id="switch-div-soft">
                <!--{list name='necessary' type=$necessary_type}-->
                <div class="app-essential clearfix">
                    <span class="block-title"><!--{$list.necessary_title}--></span>
                    <ul class="app-essential clearfix">
                        <!--{necessary id=$list.necessary_id page=$page per_page=21}-->
                        <li class="small card">
                            <div class="icon-wrap">
                                <a href="<!--{link m='app' app_id=$necessary.app_id}-->">
                                    <img src="<!--{imageurl url =$necessary.app_logo}-->" width="68" height="68" alt="<!--{$necessary.app_title}-->" class="icon" />
                                </a>
                            </div>
                            <div class="app-desc">
                                <a href="<!--{link m='app' app_id=$necessary.app_id}-->" title="<!--{$necessary.app_title}-->" class="name">
                                    <!--{$necessary.app_title}-->
                                </a>
                                <div class="meta">
                                    <span class="install-count"><!--{$necessary.app_down}--> 人下载</span>
                                    <span class="dot"> </span>
                                    <span title="<!--{$necessary.history_size}-->"><!--{$necessary.history_size}--></span>
                                </div>
                            </div>
                            <a class="install-btn" rel="nofollow" style="display:block;" href="<!--{link m='app' app_id=$necessary.app_id}-->">下载</a>
                        </li>
                        <!--{/necessary}-->
                    </ul>
                    <!--{pagebar name='necessary_list' id=$list.necessary_id type=$necessary_type page=$page per_page=21}-->
                </div>
                <!--{/list}-->
            </div>

        </div>
        <!--/ necessary-item -->
    </div>

</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>