<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{if $info.info_title}-->
    <title><!--{$info.info_title}--></title>
    <meta name="keywords" content="<!--{$info.info_seokey}-->" />
    <meta name="description" content="<!--{$info.info_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>

<body>

<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<div class="model detail-item">
    <!--  <div class="bread-crumbs w1200">
          <a href="#">首页</a> &gt; <a href="#">游戏中心</a> &gt; <a href="#">网络游戏</a> &gt; 苍穹变
      </div>-->

    <div class="lefts detail-item-l">
        <div class="all-detail-item mb10">
            <div class="all-detail-item-title">
                <h1 class="top-title"><!--{$info.info_title}--></h1>

                <div class="top-others">
                    <span>时间：<!--{$info.info_update_time|date_format:"%Y-%m-%d"}--></span>
                    <span>作者：<!--{$info.info_author}--></span>
                    <span>来源：<!--{$info.info_from}--></span>
                    <span>浏览量：<!--{$info.info_visitors}--></span>
                </div>
            </div>
            <div class="all-detail-item-content">
                <!--{$info.info_body}-->
            </div>

            <div class="next-prev-item">
                <!--{if (is_array($info_prev) && sizeof($info_prev) > 0)}-->
                    <a href="<!--{link m='info' info_id=$info_prev.info_id}-->" class="fl">
                        上一篇：<!--{mb_substr($info_prev.info_title,0,20,'utf-8')}-->
                    </a>
                <!--{/if}-->
                <!--{if (is_array($info_next) && sizeof($info_next) > 0)}-->
                    <a href="<!--{link m='info' info_id=$info_next.info_id}-->" class="fr">
                        下一篇：<!--{mb_substr($info_next.info_title,0,20,'utf-8')}-->
                    </a>
                <!--{/if}-->
            </div>
        </div>
        <div class="ly-art">
            <h2 class="fs16">相关文章<a href="<!--{link m='infos' last_cate_id=$last_cate_id}-->" class="fr"
                                    style="color:#0B99BC">+更多</a></h2>
            <ul class="fs12">
                <!--{infolist id=$last_cate_id row=5}-->
                <li>
                    <!--{if $infolist.info_url}--><a href="<!--{$infolist.info_url}-->" target="_blank"><!--{else}-->
                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->"><!--{/if}-->
                        <!--{$infolist.info_title}--></a>
                    <span><!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                </li>
                <!--{/infolist}-->
            </ul>
        </div>

    </div>

    <div class="rights">
        <div class="model-title">
            <h3>热门排行榜</h3>
            <a class="model-title-more" href="<!--{link m='recommends' id=42}-->" target="_blank">更多</a>

        </div>
        <ul class="home-recommend app-panel app-qr-ani">

            <!--{recommend id=42 row=9}-->
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
                    <a class="btn btn-style2 btn-sm btn-block "
                       href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="<!--{$recommend.app_title}-->">免费下载</a>
                </p>
            </li>

            <!--{/recommend}-->
        </ul>
        <div class="model-title">
            <h3>飙升榜</h3>
            <a class="model-title-more" href="<!--{link m='recommends' id=44}-->" target="_blank">更多</a>
        </div>
        <ul class="home-recommend app-panel app-qr-ani">

            <!--{recommend id=44 row=9}-->
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
                    <a class="btn btn-style2 btn-sm btn-block "
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
