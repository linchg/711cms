<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>

<body>

<div class="apps PC">
    <!--{include file="inc_top.php"}-->
</div>

<div class="wrapper">
    <!--------content------------>
    <div class="ly-content-bg">
        <div class="ly-content">
            <h1 class="ly-h1">网站地图</h1>

            <div class="ly-map">
                <h2><a target="_blank" href="<!--{link m='index'}-->">首页</a></h2>
                <ul>
                    <!--{navicat}-->
                    <li><a target="_blank" href="<!--{link m=$navicat.navicat_m}-->"><!--{$navicat.navicat_name}--></a></li>
                    <!--{/navicat}-->
                </ul>

                <h2><a target="_blank" href="<!--{link m='list_soft'}-->">安卓软件</a></h2>
                <ul>
                    <!--{appnav parent=1}-->
                    <li>
                        <a target="_blank" href="<!--{link m='list_soft' cate_id=$appnav.cate_id}-->">
                            <!--{$appnav.cname}-->
                        </a>
                    </li>
                    <!--{/appnav}-->
                </ul>

                <h2><a target="_blank" href="<!--{link m='list_game'}-->">安卓游戏</a></h2>
                <ul>
                    <!--{appnav parent=2}-->
                    <li>
                        <a target="_blank" href="<!--{link m='list_game' cate_id=$appnav.cate_id}-->">
                            <!--{$appnav.cname}-->
                        </a>
                    </li>
                    <!--{/appnav}-->
                </ul>

                <h2><a target="_blank" href="<!--{link m='list_info'}-->">资讯</a></h2>
                <ul>
                    <!--{infonav}-->

                    <li>
                        <a target="_blank" href="<!--{link m='list_info' last_cate_id=$infonav.cate_id}-->">
                            <!--{$infonav.cname}-->
                        </a>
                    </li>
                    <!--{/infonav}-->
                </ul>

                <h2><a target="_blank" href="<!--{link m='list_necessary'}-->">装机必备</a></h2>
                <ul>
                    <!--{list name='necessary'}-->

                    <li>
                        <a target="_blank" href="<!--{link m='list_necessary' necessary_type=$list.necessary_type}-->">
                            <!--{$list.necessary_title}-->
                        </a>
                    </li>

                    <!--{/list}-->
                </ul>

                <h2><a target="_blank" href="<!--{link m='list_special'}-->">专题</a></h2>
                <ul>
                    <!--{list name='special'}-->
                    <!--{row name='special' id=$list.area_id}-->
                    <li>
                        <a target="_blank" href="<!--{link m='content_special' special_id=$row.area_id}-->">
                            <!--{$row.area_title}-->
                        </a>
                    </li>
                    <!--{/row}-->
                    <!--{/list}-->
                </ul>
            </div>
        </div>
        <!--友情链接 start-->
        <!-- f-link -->
        <div class="box" style="width: 1000px; margin: 10px auto;">
            <div class="itit">友情链接</div>
            <div class="flink">
                <!--{friendlink type=2}-->
                <!--{if !$friendlink.flink_img}-->
                <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                    <b><!--{$friendlink.flink_name}--></b>
                </a>
                <!--{else}-->
                <a target="_blank" href="<!--{$friendlink.flink_url}-->">
                    <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
                    <b><!--{$friendlink.flink_name}--></b>
                </a>
                <!--{/if}-->
                <!--{/friendlink}-->
            </div>
        </div>
        <!-- f-link -->
    </div>
    <!-- /ranking -->
    <!--{include file="inc_foot.php"}-->
</div>
</body>
</html>


