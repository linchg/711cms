<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $last_cate_id}-->
    <!--{row name='info_category' id=$last_cate_id}-->
    <title><!--{if $row.ctitle}--><!--{$row.ctitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.ckey}--><!--{$row.ckey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.cdesc}--><!--{$row.cdesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=5}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<div class="model">

    <div class="lefts">
        <div class="lefts-title">
            <h3 class="fl">资讯列表</h3>

            <p class="fr">
                <!--{if !$last_cate_id}-->
                <a href="<!--{link m='infos'}-->" class="current">综合</a>
                <!--{else}-->
                <a href="<!--{link m='infos'}-->">综合</a>
                <!--{/if}-->
                <!--{infonav}-->
                <a <!--{if $last_cate_id == $infonav.cate_id}-->class="current"<!--{else}--><!--{/if}--> href="<!--{link m='infos' last_cate_id=$infonav.cate_id}-->"><!--{$infonav.cname}--></a>
                <!--{/infonav}-->
            </p>
        </div>
        <div class="lefts-content">
            <div class="news-top-detail">
                <ul>
                    <!--{infolist id=$last_cate_id page=$page per_page=10}-->
                    <li>
                        <h2><!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                                <a href="<!--{link m='info' info_id=$infolist.info_id}-->"><!--{/if}-->
                                    <!--{$infolist.info_title}--></a></h2>

                        <p><!--{$infolist.info_desc}--></p>

                        <div class="">
                            <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                                <a href="<!--{link m='info' info_id=$infolist.info_id}-->"
                                   class="read-more"><!--{/if}-->[阅读全文]</a>
                                <span>发布时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                        </div>
                    </li>
                    <!--{/infolist}-->
                </ul>
            </div>
            <!--{pagebar name='infolist' id=$last_cate_id page=$page per_page=10}-->
        </div>
    </div>

    <div class="rights">
        <div class="model-title">
            <h3>热门排行</h3>
            <a class="model-title-more" href="<!--{link m='recommends' id=42}-->" target="_blank">更多</a>

        </div>
        <ul class="home-recommend app-panel app-qr-ani">

            <!--{recommend id=42 row=6}-->
            <li>
                <div class="app-panel-icon">
                    <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       target="_blank">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" class="img-radius"
                             title="<!--{$recommend.app_title}-->">
                    </a>
                </div>
                <p class="nowrap f14 lh240"><!--{$recommend.app_title}--></p>

                <p class="ml15 mr15">
                    <a class="btn btn-style2 btn-sm btn-block " target="_blank"
                       href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="<!--{$recommend.app_title}-->">免费下载</a>
                </p>
            </li>

            <!--{/recommend}-->
        </ul>
        <div class="model-title">
            <h3>上升最快</h3>
            <a class="model-title-more" href="<!--{link m='recommends' id=44}-->" target="_blank">更多</a>
        </div>
        <ul class="home-recommend app-panel app-qr-ani">

            <!--{recommend id=44 row=6}-->
            <li>
                <div class="app-panel-icon">
                    <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       target="_blank">
                        <img src="<!--{imageurl url = $recommend.app_logo}-->" class="img-radius"
                             title="<!--{$recommend.app_title}-->">
                    </a>
                </div>
                <p class="nowrap f14 lh240"><!--{$recommend.app_title}--></p>

                <p class="ml15 mr15">
                    <a class="btn btn-style2 btn-sm btn-block " target="_blank"
                       href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="<!--{$recommend.app_title}-->">免费下载</a>
                </p>
            </li>
            <!--{/recommend}-->
        </ul>
    </div>
</div>
<!--{include file="inc_flink.php"}-->

<!--{include file="inc_foot.php"}-->

<script type="text/javascript">


    // 风云榜
    ou.switchList('#homeRankFengyun li', function () {
    });

    // 文章切换
    ou.tab('#homeArticleNav span', '#homeArticleList ul', {},

        function (self, data) {

            var btnMore = '#homeArticleNavMore > a',
                index = $(self).index();

            for (var j = 0; j < $(btnMore).length; j++) {

                if (index !== j) {
                    $(btnMore).eq(j).removeClass(data.activeClass);
                } else {
                    $(btnMore).eq(j).addClass(data.activeClass);
                }

            }
        });

    // 新闻切换
    ou.switchList('#homeArticle1 li');

    // 攻略切换
    ou.switchList('#homeArticle2 li');

    // 活动切换
    ou.switchList('#homeArticle3 li');

    // 公告切换
    ou.switchList('#homeArticle4 li');

    // 测评切换
    ou.switchList('#homeArticle5 li');

    // 关闭PC新版更新海报弹窗
    ou.closeDiv('#btnDialogPc', '#dialogPc');

    // 偶玩客户端弹窗
    ou.dialogWindow({
        dialogId: '#dialogClient',
        btnOpenId: '#btnDialogClientOpen',
        btnCloseId: '#btnDialogClientClose'
    });
</script>


</body>
</html>
