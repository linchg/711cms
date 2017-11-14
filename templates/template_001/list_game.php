<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $cate_id}-->
        <!--{row name='app_category' id=$cate_id}-->
        <title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
        <meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
        <meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
        <!--{/row}-->
    <!--{else}-->
        <!--{row name='navicat' id=3}-->
        <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
        <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
        <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
        <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="apps PC">

    <!--{include file="inc_top.php"}-->

    <div class="container">

        <!--{include file="inc_menu.php"}-->

        <!-- fl -->
        <span class="block-title">类别</span>
        <ul class="fl-item">
            <li>
                <a href="<!--{link m='games'}-->">全部</a>
            </li>
            <!--{appnav parent=2}-->
            <li>
                <a href="<!--{link m='games' cate_id=$appnav.cate_id}-->">
                    <!--{$appnav.cname}-->
                </a>
            </li>
            <!--{/appnav}-->
        </ul>
        <!--/ fl -->

        <div class="app-box">
            <!--{if $cate_id}-->
            <!--{row name='app_category' id=$cate_id}-->
            <span class="block-title"><!--{$row.cname}--></span>
            <!--{/row}-->
            <!--{else}-->
            <span class="block-title">全部游戏</span>
            <!--{/if}-->
            <ul id="j-wc-rect" class="wc-rect clearfix">
                <!--{applist page=$page parent=2 id=$cate_id row=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url =$applist.app_logo}-->" width="68" height="68" alt="<!--{$applist.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" title="<!--{$applist.app_title}-->" class="name">
                            <!--{$applist.app_title}-->
                        </a>
                        <div class="meta">
                            <a class="tag-link" href="<!--{link m='games' cate_id=$applist.cate_id}-->"><!--{$applist.cname}--></a>
                            <span class="install-count"><!--{$applist.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$applist.history_size}-->"><!--{$applist.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$applist.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$applist.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/applist}-->
            </ul>
            <!--{pagebar name='applist' page=$page parent=2 id=$cate_id row=15}-->
        </div>
    </div>

</div>

<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>