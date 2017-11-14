<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--{if $special.special_seotitle}-->
    <title><!--{$special.special_seotitle}--></title>
    <meta name="keywords" content="<!--{$special.special_seokey}-->" />
    <meta name="description" content="<!--{$special.special_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$special.special_seokey}-->" />
    <meta name="description" content="<!--{$special.special_seodesc}-->" />
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
        <div class="subject_tit">专题</div>
        <div class="box subjectcon clearfix">

            <div class="zt_con_tu"><img alt="<!--{$special.area_title}-->" src="<!--{$special.area_logo}-->"></div>
            <div class="zt_con_info">
                <h2><!--{$special.area_title}--></h2>

                <p class="zt_con_time">更新时间：<!--{date('Y-m-d',$special.special_time)}--> </p>

                <p><!--{$special.area_html}--></p>

                <div class="bdshare_t bds_tools get-codes-bdshare" id="bdshare">
                    <!-- Baidu Button BEGIN -->
                    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                        <a class="bds_tsina" title="分享到新浪微博" href="#"></a>
                        <a class="bds_qzone" title="分享到QQ空间" href="#"></a>
                        <a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
                        <a class="bds_renren" title="分享到人人网" href="#"></a>
                        <a class="bds_t163" title="分享到网易微博" href="#"></a>
                        <span class="bds_more">更多</span>
                        <a class="shareCount" href="#" title="累计分享0次">0</a>
                    </div>
                    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0"
                            src="http://bdimg.share.baidu.com/static/js/bds_s_v2.js?cdnversion=402847"></script>

                    <script type="text/javascript">
                        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
                    </script>
                    <!-- Baidu Button END -->       </div>
            </div>
            <ul class="zt_con_yy ifenlei clearfix">
                <!--{special id=$special_id page=$page per_page=20}-->
                <li>
                    <div class="ifenlei_list clearfix">
                        <a href="<!--{link m='app' app_id=$special.app_id}-->" class="app_90">
                            <i class="app_img_90"></i>
                            <img src="<!--{imageurl url =$special.app_logo}-->">
                        </a>

                        <p class="app_tit_90"><a href="<!--{link m='app' app_id=$special.app_id}-->"
                                                 target="_blank"><!--{$special.app_title}--></a></p>

                        <div class="app_intro"><!--{countdown down=$special.app_down}-->安装 ·
                            <!--{round($special.history_size/1024/1024,2)}-->MB
                        </div>
                        <p class="app_star_90"><span class="star bigstar10"></span></p>
                    </div>
                </li>
                <!--{/special}-->
            </ul>
            <!--{pagebar name='special_list' id=$special_id page=$page per_page=20}-->
        </div>
        <div class="box">
            <h2 class="h2tit">其他热门专题</h2>
            <ul class="androidZTbox clearfix">
                <!--{list name='special' row=4}-->
                <li><a href="<!--{link m='special' special_id=$list.area_id}-->"><img
                            src="<!--{$list.area_logo}-->"></a>

                    <p><a href="<!--{link m='special' special_id=$list.area_id}-->">
                            <!--{$list.area_title}--></a></p></li>
                <!--{/list}-->
            </ul>
        </div>
    </div>
    <!--/ inner -->
    <!--{include file="inc_flink.php"}-->
</div>
<!--{include file="inc_foot.php"}-->

