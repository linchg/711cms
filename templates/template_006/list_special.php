<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=6}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}-->
        <!--{/if}--></title>
    <meta name="keywords"
          content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->"/>
    <meta name="description"
          content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->"/>
    <!--{/row}-->
    <!--{include file="inc_head.php"}-->
</head>
<body>

<!--{include file="inc_top.php"}-->

<!--{include file="inc_menu.php"}-->

<!-- 当前位置 -->
<div class="box">
    <p class="pos">当前位置：<a href="/">首页</a><b>&gt;</b><a href="<!--{link m='specials'}-->">专题</a></p>
</div>
<!-- 当前位置 -->

<div class="box" style="min-height:690px">
    <div class="box_bg">
        <div class="sub_tit">
            精品专题
        </div>
        <div class="topic_list">
            <!--{list name='special'}-->
            <div class="tli_box"
                 style="border-top-width: 1px; border-top-style: solid; border-top-color: rgb(241, 241, 241); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(241, 241, 241); background-color: rgb(248, 248, 248); background-position: initial initial; background-repeat: initial initial;">

                <div class="tli_img">
                    <a href="<!--{link m='special' special_id=$list.area_id}-->" target="_blank"><img
                            src="<!--{$list.area_logo}-->" alt="<!--{$list.area_title}-->" width="240" height="89"></a>

                    <div class="tli_bg"></div>
                    <div class="tli_word"><em><!--{$list.special_time|date_format:"%m-%d"}--></em><a
                            href="<!--{link m='special' special_id=$list.area_id}-->">
                            <!--{$list.area_title}--></a></div>
                </div>
                <div class="tli_apps">
                    <ul class="tli_slide" style="width: 900px;">
                        <!--{special id=$list.area_id}-->
                        <li>
                            <a href="<!--{link m='app' app_id=$special.app_id}-->" target="_blank">
                                <img src="<!--{imageurl url =$special.app_logo}-->" alt="<!--{$special.app_title}-->"
                                     style="opacity: 1;" width="72" height="72">
                            </a>

                            <p><a href="<!--{link m='app' app_id=$special.app_id}-->" target="_blank">
                                    <!--{$special.app_title}--></a></p>
                        </li>
                        <!--{/special}-->
                    </ul>
                </div>
                <div class="tli_prev"></div>
                <div class="tli_nexton"></div>
            </div>
            <!--{/list}-->
        </div>
    </div>
</div>
<!--{include file="inc_flink.php"}-->
<!--{include file="inc_foot.php"}-->
</body>
</html>