<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!--{row name='navicat' id=4}-->
    <title><!--{if $row.navicat_seotitle}--><!--{$row.navicat_seotitle}--><!--{else}--><!--{$setting.seo_title}--><!--{/if}--></title>
    <meta name="keywords" content="<!--{if $row.navicat_seokey}--><!--{$row.navicat_seokey}--><!--{else}--><!--{$setting.seo_keywords}--><!--{/if}-->" />
    <meta name="description" content="<!--{if $row.navicat_seodesc}--><!--{$row.navicat_seodesc}--><!--{else}--><!--{$setting.seo_description}--><!--{/if}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->

<div class="model">

    <div class="model-titles">
        <!--{list name='necessary'}-->
        <a href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->" <!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }--> class="current"<!--{/if}-->>
            <!--{$list.necessary_title}-->
        </a>

        <!--{/list}-->
    </div>
    <div class="game-s">
        <!--{list name='necessary' type=$necessary_type}-->
        <div class="model-title">
            <h3><!--{$list.necessary_title}--></h3>
        </div>
        <ul class="app-bb">
            <!--{necessary id=$list.necessary_id page=$page per_page=15}-->
            <li>
                <div class="icon-wrap">
                    <a href="<!--{link m='app' app_id=$necessary.app_id}-->">
                        <img src="<!--{imageurl url =$necessary.app_logo}-->" width="68" height="68"
                             alt="<!--{$necessary.app_title}-->" class="icon"/>
                    </a>
                </div>
                <div class="app-desc">
                    <a href="<!--{link m='app' app_id=$necessary.app_id}-->"
                       title="<!--{$necessary.app_title}-->" class="name">
                        <!--{mb_substr($necessary.app_title,0,7,'utf-8')}-->
                    </a>

                    <div class="meta">
                        <span class="install-count"><!--{countdown down=$necessary.app_down}-->人下载</span>
                        <span class="dot">・</span>
                        <span title="<!--{$necessary.history_size}-->"><!--{round($necessary.history_size/1024/1024,2)}-->MB</span>
                    </div>
                </div>
                <a class="install-btn" rel="nofollow" style="display:block;"
                   href="<!--{link m='app' app_id=$necessary.app_id}-->">下载</a>
            </li>
            <!--{/necessary}-->
        </ul>
        <!--{pagebar name='necessary_list' type=$necessary_type page=$page per_page=15}-->
        <!--{/list}-->
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
