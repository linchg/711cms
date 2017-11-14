<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--{if $cate_id}-->
    <!--{row name='app_category' id=$cate_id}-->
    <title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=2}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{/if}-->
    <!--{include file="inc_head.php"}-->

</head>

<body>

<div id="header">
    <!--{include file="inc_top.php"}-->
    <div class="erjinav clearfix">

        <!--{include file="inc_menu.php"}-->
    </div>
</div>


<div id="main" class="layout">

    <!-- inner -->
    <div class="inner">
        <div class="leibie">
            <div class="clearfix"><p class="leibie_l">游戏类别：</p>

                <p class="leibie_r"><a href="<!--{link m='games'}-->" <!--{if $cate_id>0}--><!--{else}-->class="dangqian"<!--{/if}-->><em>全部</em></a>
                    <!--{appnav parent=2}-->
                    <a href="<!--{link m='games' cate_id=$appnav.cate_id}-->" <!--{if $cate_id == $appnav.cate_id}-->class="dangqian"<!--{/if}-->><em>  <!--{$appnav.cname}--></em></a>
                    <!--{/appnav}-->


                </p></div>
        </div>
        <div class="box gamebox">
            <ul class="ifenlei clearfix">
                <!--{applist page=$page parent=2 id=$cate_id row=24 per_page=24}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='app' app_id=$applist.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url =$applist.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='app' app_id=$applist.app_id}-->">
                                <!--{$applist.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$applist.app_down}-->人安装 ·
                            <!--{round($applist.history_size/1024/1024,2)}-->MB
                        </div>
                        <p class="app_star_90"><span class="star bigstar<!--{countstar star=$applist.app_recomment type=1}-->"></span></p>
                    </div>
                </li>
                <!--{/applist}-->
            </ul>
            <!--{pagebar name='applist' page=$page parent=2 id=$cate_id row=24 per_page=24}-->
        </div>
    </div>
    <!--/ inner -->
    <!--{include file="inc_flink.php"}-->
</div>
<!--{include file="inc_foot.php"}-->
