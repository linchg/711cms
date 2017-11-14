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
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->
<div class="model detail-item">
    <ul class="topic-item">
        <!--{list name='special'}-->
        <li class="topic-item-li">
            <div class="special-info">
                <!--{row name='special' id=$list.area_id}-->
                <a class="special-icon" href="<!--{link m='special' special_id=$row.area_id}-->">
                    <img src="<!--{$row.area_logo}-->" alt="<!--{$row.area_title}-->">
                </a>

                <div class="special-meta"><span><!--{$row.ids_num}--> 款应用</span> <a class="see-btn"
                                                                                    href="<!--{link m='special' special_id=$row.area_id}-->">查看</a>
                </div>
                <!--{/row}-->
                <ul class="home-recommend app-panel app-qr-ani">
                    <!--{special id=$list.area_id row=4}-->
                    <li>
                        <div class="app-panel-icon">
                            <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$special.app_id}-->"
                               target="_blank">
                                <img src="<!--{imageurl url =$special.app_logo}-->" class="img-radius"
                                     title="<!--{$special.app_title}-->">
                            </a>
                        </div>
                        <p class="nowrap f14 lh240"><!--{mb_substr($special.app_title,0,7,'utf-8')}--></p>

                        <p class="ml15 mr15">
                            <a class="btn btn-style2 btn-sm btn-block "
                               href="<!--{link m='app' app_id=$special.app_id}-->"
                               title="下载《<!--{$special.app_title}-->》">免费下载</a>
                        </p>
                    </li>
                    <!--{/special}-->
                </ul>
                <!--{/list}-->
            </div>
        </li>
    </ul>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

</body>
</html>
