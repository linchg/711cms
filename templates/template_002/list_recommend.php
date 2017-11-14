<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
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
        <!--{row name='recommend' id=$id}-->
        <div class="subject_tit"><!--{$row.area_title}--></div>
        <!--{/row}-->


        <ul class="ihot" >
            <!--{recommend id=$id page=$page per_page=21}-->
            <li>
                <div class="ihot_list"><a>
                    </a><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="app_100">
                        <i class="app_img_100"></i>
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->">
                    </a>

                    <p class="app_tit_100"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"
                                              title="<!--{$recommend.app_title}-->" target="_blank">
                            <!--{$recommend.app_title}--></a></p>

                    <p class="app_info"><a href="" target="_blank">
                            <!--{row name='app_category' id=$recommend.last_cate_id}--><!--{$row.cname}-->
                            <!--{/row}--></a> · <!--{round($recommend.history_size/1024/1024,2)}-->MB</p>

                    <div class="iremen_dwon"><a href="<!--{link m='app' app_id=$recommend.app_id}-->">立即下载</a>
                    </div>
                </div>
            </li>
            <!--{/recommend}-->
        </ul>
        <!--{pagebar name='recommend_list' id=$id page=$page per_page=21}-->
    </div>
    <!--{include file="inc_flink.php"}-->
</div>
<!--{include file="inc_foot.php"}-->

