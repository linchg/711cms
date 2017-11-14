<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="apps PC">
    <!--{include file="inc_top.php"}-->
    <div class="container">
        <!--{include file="inc_menu.php"}-->
        <!-- banner -->
        <div class="banner">
            <div class="banner-l">
                <div class="slide_container">
                    <ul class="rslides" id="slider">
                        <!--{ad id=30}-->
                        <li>
                            <a href="<!--{$ad.link}-->" target="_blank">
                                <img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->" />
                            </a>
                        </li>
                        <!--{/ad}-->
                    </ul>
                </div>
            </div>
            <div class="news-item">
                <div class="news-item-title">
                    <!--{infolist id=2 row=1}-->
                    <div class="big-tit">
                        <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank">
                            <!--{$infolist.info_title}-->
                        </a>
                    </div>
                    <div class="big-art">
                        <p>
                            <!--{if count($infolist.info_desc) > 1}-->
                            <!--{$infolist.info_desc}-->
                            <!--{else}-->
                            <!--{$infolist.info_body|truncate:60:'...'}-->
                            <!--{/if}-->
                            <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank">[详细]</a>
                        </p>
                    </div>
                    <!--{/infolist}-->
                </div>
                <div class="news-item-content">
                    <ul>
                        <!--{infolist id=4 row=3}-->
                        <li class="public-icon">
                            <a href="<!--{link m='info' info_id=$infolist.info_id}-->" target="_blank">
                                <!--{mb_substr($infolist.info_title,0,23,'utf-8')}-->
                            </a>
                        </li>
                        <!--{/infolist}-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- banner -->
        <div><span class="clear clearfix"></span></div>
        <div class="app-box">
            <span class="block-title">
                <!--{row name='recommend' id=40}--><!--{$row.area_title}--><!--{/row}-->
            </span>
            <ul class="wc-rect clearfix">
                <!--{recommend id=29 row=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" width="68" height="68" alt="<!--{$recommend.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="name">
                            <!--{$recommend.app_title}-->
                        </a>
                        <div class="meta">
                            <!--{if $recommend.parent_id == 1}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='softs' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='games' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{/if}-->
                            <span class="install-count"><!--{$recommend.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$recommend.history_size}-->"><!--{$recommend.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$recommend.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/recommend}-->
            </ul>
            <span class="block-title"><!--{row name='recommend' id=30}--><!--{$row.area_title}--><!--{/row}--></span>
            <ul class="wc-rect clearfix">
                <!--{recommend id=30 row=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" width="68" height="68" alt="<!--{$recommend.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="name">
                            <!--{$recommend.app_title}-->
                        </a>
                        <div class="meta">
                            <!--{if $recommend.parent_id == 1}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='softs' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='games' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{/if}-->
                            <span class="install-count"><!--{$recommend.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$recommend.history_size}-->"><!--{$recommend.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$recommend.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/recommend}-->
            </ul>
            <span class="block-title"><!--{row name='recommend' id=31}--><!--{$row.area_title}--><!--{/row}--></span>
            <ul class="wc-rect clearfix">
                <!--{recommend id=31 row=15}-->
                <li class="card" >
                    <div class="icon-wrap">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">
                            <img src="<!--{imageurl url = $recommend.app_logo}-->" width="68" height="68" alt="<!--{$recommend.app_title}-->" class="icon" />
                        </a>
                    </div>
                    <div class="app-desc">
                        <a href="<!--{link m='app' app_id=$recommend.app_id}-->" title="<!--{$recommend.app_title}-->" class="name">
                            <!--{$recommend.app_title}-->
                        </a>
                        <div class="meta">
                            <!--{if $recommend.parent_id == 1}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='softs' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{elseif $recommend.parent_id == 2}-->
                            <a class="tag-link" target="_blank" href="<!--{link m='games' cate_id=$recommend.cate_id}-->"><!--{$recommend.cname}--></a>
                            <!--{/if}-->
                            <span class="install-count"><!--{$recommend.app_down}--> 人安装</span>
                            <span class="dot"></span>
                            <span title="<!--{$recommend.history_size}-->"><!--{$recommend.history_size}--></span>
                        </div>
                        <div class="comment">
                            <!--{$recommend.app_desc}-->
                        </div>
                    </div>
                    <a class="install-btn" href="<!--{link m='app' app_id=$recommend.app_id}-->" target="_blank">下载</a>
                </li>
                <!--{/recommend}-->
            </ul>
            <a class="block-title" href="#">精品专题</a>
            <ul class="app-box clearfix">
                <li class="card special-card normal">
                    <div class="special-info">
                        <!--{row name='special' id=31}-->
                        <a class="special-icon" href="<!--{link m='special' special_id=$row.area_id}-->">
                            <img src="<!--{$row.area_logo}-->" alt="<!--{$row.area_title}-->" />
                        </a>
                        <div class="special-meta">
                            <span><!--{$row.area_title}--></span>
                            <a class="see-btn" target="_blank" href="<!--{link m='special' special_id=$row.area_id}-->">查看</a>
                        </div>
                        <!--{/row}-->
                    </div>
                    <ul class="s-applist">
                        <!--{special id=31 row=4}-->
                        <li class="special-three">
                            <div class="icon-wrap">
                                <a href="<!--{link m='app' app_id=$special.app_id}-->">
                                    <img src="<!--{imageurl url =$special.app_logo}-->" width="48" height="48" alt="<!--{$special.app_title}-->" class="icon" />
                                </a>
                            </div>
                            <div class="app-desc">
                                <a href="<!--{link m='app' app_id=$special.app_id}-->" title="<!--{$special.app_title}-->" class="name">
                                    <!--{$special.app_title}-->
                                </a>
                                <div class="meta">
                                    <span class="install-count"><!--{$special.app_down}--> 人安装</span>
                                    <span class="dot"></span>
                                    <span title="<!--{$special.history_size}-->"><!--{$special.history_size}--></span>
                                </div>
                            </div>
                            <a class="install-btn" style="display:block;" href="<!--{link m='app' app_id=$special.app_id}-->" >下载</a>
                        </li>
                        <!--{/special}-->
                    </ul>
                </li>
                <li class="card special-card normal">
                    <div class="special-info">
                        <!--{row name='special' id=32}-->
                        <a class="special-icon" href="<!--{link m='special' special_id=$row.area_id}-->">
                            <img src="<!--{$row.area_logo}-->" alt="<!--{$row.area_title}-->" />
                        </a>
                        <div class="special-meta">
                            <span><!--{$row.area_title}--></span>
                            <a class="see-btn" target="_blank" href="<!--{link m='special' special_id=$row.area_id}-->">查看</a>
                        </div>
                        <!--{/row}-->
                    </div>
                    <ul class="s-applist">
                        <!--{special id=32 row=4}-->
                        <li class="special-three">
                            <div class="icon-wrap">
                                <a href="<!--{link m='app' app_id=$special.app_id}-->">
                                    <img src="<!--{imageurl url =$special.app_logo}-->" width="48" height="48" alt="<!--{$special.app_title}-->" class="icon" />
                                </a>
                            </div>
                            <div class="app-desc">
                                <a href="<!--{link m='app' app_id=$special.app_id}-->" title="<!--{$special.app_title}-->" class="name">
                                    <!--{$special.app_title}-->
                                </a>
                                <div class="meta">
                                    <span class="install-count"><!--{$special.app_down}--> 人安装</span>
                                    <span class="dot"></span>
                                    <span title="<!--{$special.history_size}-->"><!--{$special.history_size}--></span>
                                </div>
                            </div>
                            <a class="install-btn" style="display:block;" href="<!--{link m='app' app_id=$special.app_id}-->" >下载</a>
                        </li>
                        <!--{/special}-->
                    </ul>
                </li>
                <li class="card special-card normal">
                    <div class="special-info">
                        <!--{row name='special' id=33}-->
                        <a class="special-icon" href="<!--{link m='special' special_id=$row.area_id}-->">
                            <img src="<!--{$row.area_logo}-->" alt="<!--{$row.area_title}-->" />
                        </a>
                        <div class="special-meta">
                            <span><!--{$row.area_title}--></span>
                            <a class="see-btn" target="_blank" href="<!--{link m='special' special_id=$row.area_id}-->">查看</a>
                        </div>
                        <!--{/row}-->
                    </div>
                    <ul class="s-applist">
                        <!--{special id=33 row=4}-->
                        <li class="special-three">
                            <div class="icon-wrap">
                                <a href="<!--{link m='app' app_id=$special.app_id}-->">
                                    <img src="<!--{imageurl url =$special.app_logo}-->" width="48" height="48" alt="<!--{$special.app_title}-->" class="icon" />
                                </a>
                            </div>
                            <div class="app-desc">
                                <a href="<!--{link m='app' app_id=$special.app_id}-->" title="<!--{$special.app_title}-->" class="name">
                                    <!--{$special.app_title}-->
                                </a>
                                <div class="meta">
                                    <span class="install-count"><!--{$special.app_down}--> 人安装</span>
                                    <span class="dot"></span>
                                    <span title="<!--{$special.history_size}-->"><!--{$special.history_size}--></span>
                                </div>
                            </div>
                            <a class="install-btn" style="display:block;" href="<!--{link m='app' app_id=$special.app_id}-->" >下载</a>
                        </li>
                        <!--{/special}-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- f-link -->
<div class="f-link">
    <span>友情链接：</span>
    <!--{friendlink type=1}-->
    <!--{if !$friendlink.flink_img}-->
    <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->"><!--{$friendlink.flink_name}--></a>
    <!--{else}-->
    <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
        <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->" />
        <!--{$friendlink.flink_name}-->
    </a>
    <!--{/if}-->
    <!--{/friendlink}-->
</div>
<!-- f-link -->
<!--{include file="inc_foot.php"}-->
</body>
</html>