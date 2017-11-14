<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!--{row name='navicat' id=4}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
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

    <div class="box">
        <div class="itit">
            <!--{list name='necessary'}-->
            <a href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->"<!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }--> class="itita"<!--{/if}-->><!--{$list.necessary_title}--></a>
            <!--{/list}-->
        </div>

        <!--{list name='necessary' type=$necessary_type}-->

        <ul class="ihot">
            <h3 class="lefts-title"><!--{$list.necessary_title}--></h3>
            <!--{necessary id=$list.necessary_id page=$page per_page=21}-->
            <li>
                <div class="ihot_list"><a>
                    </a><a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="app_100">
                        <i class="app_img_100"></i>
                        <img src="<!--{imageurl url =$necessary.app_logo}-->" alt="<!--{$necessary.app_title}-->">
                    </a>

                    <p class="app_tit_100"><a href="<!--{link m='app' app_id=$necessary.app_id}-->"
                                              title="<!--{$necessary.app_title}-->" target="_blank">
                            <!--{$necessary.app_title}--></a></p>

                    <p class="app_info"><a href="" target="_blank">
                            <!--{row name='app_category' id=$necessary.last_cate_id}--><!--{$row.cname}-->
                            <!--{/row}--></a> · <!--{round($necessary.history_size/1024/1024,2)}-->MB</p>

                    <div class="iremen_dwon"><a href="<!--{link m='app' app_id=$necessary.app_id}-->">立即下载</a>
                    </div>
                </div>
            </li>
            <!--{/necessary}-->
        </ul>
        <!--{pagebar name='necessary_list' type=$necessary_type page=$page per_page=21}-->
        <!--{/list}-->
    </div>
    <!--{include file="inc_flink.php"}-->
</div>
<!--{include file="inc_foot.php"}-->

