<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>

    <!--{include file="inc_head.php"}-->
</head>

<body>
<!--{include file="inc_top.php"}-->
<!--{include file="inc_menu.php"}-->
<div class="home">
    <!-- home-slider start -->
    <div class="home-slider-wrap">
        <div class="home-slider">
            <div class="home-slider-con" id="homeSliderCon">
                <div class="banner-l">
                    <div class="slide_container">
                        <ul class="rslides" id="slider">
                            <!--{ad id=30}-->
                            <li>
                                <a href="<!--{$ad.link}-->"><img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->"></a>
                            </li>
                            <!--{/ad}-->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="home-rank-fengyun"><!--recommend 推荐-->
                <h3 class="home-rank-fengyun-title">今日推荐</h3>
                <ul class="home-rank-fengyun-list" id="homeRankFengyun">
                    <!--{recommend id=40 row=8}-->
                    <li
                    <!--{if $recommend.app_sort_show == 1}--> class="current"<!--{/if}-->>
                    <i><!--{$recommend.app_sort_show}--></i>

                    <div class="home-rank-fengyun-icon">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url = imageurl url = $recommend.app_logo}-->" width="68" height="68"
                                 alt="<!--{$recommend.app_title}-->">
                        </a>
                    </div>
                    <h4><!--{$recommend.app_title}--></h4>

                    <p> <!--{if $recommend.parent_id == 1}-->
                        <!--{$recommend.cname}-->
                        <!--{elseif $recommend.parent_id == 2}-->
                        <!--{$recommend.cname}-->
                        <!--{/if}-->|<!--{$recommend.app_down}--></p>
                    <a class="btn btn-style1 btn-sm home-rank-fengyun-list-load" target="_blank"
                       href="<!--{link m='app' app_id=$recommend.app_id}-->">免费下载</a>
                    </li>
                    <!--{/recommend}-->
                </ul>
            </div>
        </div>
    </div>
    <!-- home-slider end -->

    <!-- model start -->
    <div class="model clear">

        <!-- home-recommend start -->
        <div class="submodel-left">
            <div class="model-title">
                <h3>精品推荐</h3>
                <a class="model-title-more" href="<!--{link m='recommends' id=41}-->" target="_blank">更多</a>
            </div>
            <ul class="home-recommend app-panel app-qr-ani">
                <!--{recommend id=41 row=15}-->
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
                           href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank"
                           title="<!--{$recommend.app_title}-->">免费下载</a>
                    </p>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
        <!-- home-recommend end -->

        <!-- home-list start -->
        <div class="submodel-right">
            <div class="model-title">
                <h3>热门排行</h3>
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
                        <a class="btn btn-style2 btn-sm btn-block " target="_blank"
                           href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           title="<!--{$recommend.app_title}-->">免费下载</a>
                    </p>
                </li>

                <!--{/recommend}-->

            </ul>

        </div>
    </div>
    <!-- home-list end -->
</div>
<!-- model end -->

<!-- model start -->
<div class="model clear">

    <div class="submodel-left">

        <div class="model-title">
            <h3>专题</h3>
            <a class="model-title-more" href="<!--{link m='specials'}-->" target="_blank">更多</a>
        </div>

        <div class="home-video">
            <div class="home-video-poster">
                <!--{list name='special' row=3 }-->
                <a href="<!--{link m='special' special_id=$list.area_id}-->" target='_blank'
                   class="home-video-poster<!--{$list.special_sort_show}-->" title="<!--{$list.area_title}-->">
                    <img src="<!--{$list.area_logo}-->" alt="<!--{$list.area_title}-->">
                </a>
                <!--{/list}-->
            </div>
            <ul class="home-video-list">
                <!--{list name='special' row=9 start=4 }-->
                <li>
                    <a href="<!--{link m='special' special_id=$list.area_id}-->"
                       title="<!--{$list.area_title}-->" target="_blank"><!--{$list.area_title}--></a>
                </li>
                <!--{/list}-->
            </ul>
        </div>
    </div>

    <div class="submodel-right">

        <div class="model-title">
            <h3 id="homeArticleNav">
                <!--{infonav cate_id=2}--><span class="current"><!--{$infonav.cname}--></span><!--{/infonav}-->
                <!--{infonav cate_id=3}--> <span><!--{$infonav.cname}--></span><!--{/infonav}-->
                <!--{infonav cate_id=4}--><span><!--{$infonav.cname}--></span><!--{/infonav}-->
            </h3>

            <div class="model-title-more-wrap" id="homeArticleNavMore">
                <a class="model-title-more current" href="<!--{link m='infos' last_cate_id=2}-->"
                   target="_blank">更多</a>
                <a class="model-title-more" href="<!--{link m='infos' last_cate_id=3}-->" target="_blank">更多</a>
                <a class="model-title-more" href="<!--{link m='infos' last_cate_id=4}-->" target="_blank">更多</a>
            </div>
        </div>

        <div class="home-article f14" id="homeArticleList">
            <!-- 新闻类文章 -->
            <ul class="home-article-con current" id="homeArticle1">
                <!--{infolist id=2 row=4}-->
                <li class="current">
                    <a class="home-article-link" href="<!--{link m='info' info_id=$infolist.info_id}-->"
                       title="<!--{$infolist.info_title}-->" target="_blank">
                        <img src="<!--{$infolist.info_img}-->" alt="<!--{$infolist.info_title}-->">
                        <span><!--{$infolist.info_title}--></span>
                    </a>
                </li>
                <!--{/infolist}-->
            </ul>
            <!--策略类文章-->
            <ul class="home-article-con" id="homeArticle2">
                <!--{infolist id=3 row=4}-->
                <li class="current">
                    <a class="home-article-link" href="<!--{link m='info' info_id=$infolist.info_id}-->"
                       title="<!--{$infolist.info_title}-->" target="_blank">
                        <img src="<!--{$infolist.info_img}-->" alt="<!--{$infolist.info_title}-->">
                        <span><!--{$infolist.info_title}--></span>
                    </a>
                </li>
                <!--{/infolist}-->
            </ul>
            <!--活动类文章-->
            <ul class="home-article-con" id="homeArticle3">
                <!--{infolist id=4 row=4}-->
                <li class="current">
                    <a class="home-article-link" href="<!--{link m='info' info_id=$infolist.info_id}-->"
                       title="<!--{$infolist.info_title}-->" target="_blank">
                        <img src="<!--{$infolist.info_img}-->" alt="<!--{$infolist.info_title}-->">
                        <span><!--{$infolist.info_title}--></span>
                    </a>
                </li>
                <!--{/infolist}-->
            </ul>

        </div>

    </div>
</div>

<!-- model start -->
<div class="model clear">

    <!-- home-recommend start -->
    <div class="submodel-left">
        <div class="model-title">
            <h3>最受欢迎</h3>
            <a class="model-title-more" href="<!--{link m='recommends' id=30}-->" target="_blank">更多</a>
        </div>

        <ul class="home-recommend app-panel app-qr-ani">
            <!--{recommend id=30 row=15}-->
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
    <!-- home-recommend end -->

    <!-- home-gift start -->
    <div class="submodel-right">
        <div class="model-title">
            <h3>下载排行</h3>
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
                    <a class="btn btn-style2 btn-sm btn-block " target="_blank"
                       href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="<!--{$recommend.app_title}-->">免费下载</a>
                </p>
            </li>
            <!--{/recommend}-->
        </ul>

    </div>
</div>
<!--游戏开服-->
<!--{navicat}-->
<!--{if ($navicat.navicat_m =='list_service' && $navicat.navicat_enabled =='1')}-->
<div class="kf-box w1000">
    <div class="fl w500">
        <div class="model-title">
            <h3>游戏开服</h3>
        </div>
        <div class="table-box">
            <table class="lk-table">
                <tbody>
                <tr>
                    <td width=150>手机网游</td>
                    <td width=80>开服时间</td>
                    <td width=200>服务区名</td>
                    <td width=80>领取礼包</td>
                    <td width=80>游戏下载</td>
                </tr>
                <!--{seolist  row=8 }-->
                <!--{if $seolist.o_status==2}-->
                <tr>
                    <td width=150><!--{$seolist.o_apptitle}--></td>
                    <td width=80>
                        <!--{$seolist.o_start_time|date_format:"m-d"}--><br/>
                        <!--{$seolist.o_start_time|date_format:"H:i"}-->
                    </td>
                    <td width=200><!--{$seolist.o_region}--></td>
                    <td width=80>
                        <a href="<!--{link m='open_service' app_id=$seolist.o_app_id  open_name=$seolist.o_region}-->">
                            <img src="<!--{$tpl_path}-->images/li_bao.jpg">
                        </a>
                    </td>
                    <td width=80><a href="<!--{link m='app' app_id=$seolist.o_app_id}-->" class="kf-btn">下载</a></td>
                </tr>
                <!--{/if}-->
                <!--{/seolist}-->
                </tbody>
            </table>
        </div>
    </div>
    <div class="fr w500">
        <div class="model-title">
            <h3>礼包开服</h3>
        </div>
        <div class="table-box">
            <table class="lk-table">
                <tbody>
                <tr>
                    <td width=180>手机网游</td>
                    <td width=100>有效时间</td>
                    <td width=80>领取礼包</td>
                    <td width=80>游戏下载</td>
                </tr>
                <!--{openlist row=8}-->
                <!--{if $openlist.o_end_time-time()>0 && $openlist.o_status==2 && $openlist.open_name==$openlist.o_region}-->
                <tr>
                    <td width=180><!--{$openlist.o_apptitle}--><br/>【<!--{$openlist.pname}-->】</td>
                    <td width=100>
                        <!--{$openlist.o_start_time|date_format:"m-d"}-->
                        <!--{$openlist.o_start_time|date_format:"H:i"}--><br/>
                        <!--{$openlist.o_end_time|date_format:"m-d"}-->
                        <!--{$openlist.o_end_time|date_format:"H:i"}-->
                    </td>
                    <td width=80>
                        <a href="<!--{link m='open_packs' app_id=$openlist.p_app_id open_name=$openlist.open_name p_id=$openlist.p_id}-->">
                            <img src="<!--{$tpl_path}-->images/li_bao.jpg">
                        </a>
                    </td>
                    <td width=80><a href="<!--{link m='app' app_id=$openlist.p_app_id}-->" class="kf-btn">下载</a></td>
                </tr>
                <!--{/if}-->
                <!--{/openlist}-->
                </tbody>
            </table>
        </div>
    </div>
    <div><span class="clear clearfix"></span></div>
</div>
<!--{/if}-->
<!--{/navicat}-->
<!--游戏开服结束-->
<!-- model start -->
<div class="model clear">

    <div class="submodel">
        <div class="model-title">
            <h3>装机必备</h3>
            <a class="model-title-more" href="<!--{link m='necessaries'}-->" target="_blank">更多</a>
        </div>

        <div class="model-con home-sort clear">
            <ul class="app-qr-ani">
                <!--{recommend id=31 row=18}-->
                <li>
                    <div class="home-sort-icon">
                        <a class="app-qr-ani-link" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                           title="<!--{$recommend.app_title}-->" target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" class="img-radius"
                                 alt="<!--{$recommend.app_title}-->">
                        </a>
                    </div>
                    <p><!--{$recommend.app_title}--></p>
                    <a class="home-sort-down bg-blue" href="<!--{link m='app' app_id=$recommend.app_id}-->"
                       title="下载《<!--{$recommend.app_title}-->》" target="_blank">下载</a>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
    </div>
</div>
<!-- model end -->

<!-- model start -->
<!-- f-link -->
<div class="home-friend-wrap f14 clear">
    <div class="model">
        <span>友情链接:</span>
        <!--{friendlink type=1}-->
        <!--{if !$friendlink.flink_img}-->
        <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">&nbsp;
            <!--{$friendlink.flink_name}-->&nbsp;</a>
        <!--{else}-->
        <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
            &nbsp; <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->"/>
            <!--{$friendlink.flink_name}-->&nbsp;
        </a>
        <!--{/if}-->
        <!--{/friendlink}-->
    </div>
</div>
<!-- f-link -->
<!-- model end -->

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
