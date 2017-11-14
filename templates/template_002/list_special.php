<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!--{row name='navicat' id=6}-->
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

    <!-- inner -->
    <div class="inner">
        <div class="subject_tit">专题</div>
        <div class="box subjectbox">

            <ul class="clearfix">
                <!--{list name='special'}-->
                <!--{row name='special' id=$list.area_id}-->
                <li class="clearfix ">
                    <div class="zt_tu"><a href="<!--{link m='special' special_id=$row.area_id}-->"><img
                                src="<!--{$row.area_logo}-->"></a></div>
                    <div class="zt_info">
                        <h2><a href="<!--{link m='special' special_id=$row.area_id}-->">
                                <!--{$row.area_title}--></a></h2>

                        <p class="zt_time"><!--{date('Y-m-d',$row.special_time)}--></p>

                        <p><!--{$row.area_html}--></p>
                    </div>
                </li>
                <!--{/row}-->
                <!--{/list}-->
            </ul>

        </div>
    </div>
    <!--/ inner -->
    <!--{include file="inc_flink.php"}-->
</div>
<!--{include file="inc_foot.php"}-->
