<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc">
    <!--{include file="inc_top.php"}-->
    <!---------banner------------>
    <div class="big-banner">
        <div id="slideBox" class="slideBox  mt80">
            <div class="bd">
                <div class="tempWrap" >
                    <ul>
                        <!--{ad id=32}-->
                        <li>
                            <a href="<!--{$ad.link}-->"><img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->"></a>
                        </li>
                        <!--{/ad}-->
                    </ul>
                </div>
            </div>
            <div class="hdli">
                <ul>
                    <li class=""></li>
                    <li class="on"></li>
                    <li class=""></li>
                    <li class=""></li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        TouchSlide({
            slideCell:"#slideBox",
            titCell:".hdli ul",
            mainCell:".bd ul",
            effect:"leftLoop",
            autoPage:true,
            autoPlay:true
        });
    </script>

    <div id="bd">
    <!--{include file="inc_menu.php"}-->
        <!--------search----------->
        <div class="ly-search">
            <p>
                <input type="text" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value=''}" onBlur="if(value==''){value='请输入搜索内容'}" class="i-search" id="search-input" data-rewrite="<!--{$setting.is_site_rewrite}-->">
                <a href="javascript:;" id="search-btn"></a>
            </p>
        </div>

        <section class="section section-soft">
        <div class="le-tabview">
            <div class="g-title header">
                <h2 class="title">软件</h2>
                <ul class="le-tabs">
                    <li id="section_soft_hot_tab" class="active"><a href="javascript:void(0)">热门</a></li>
                    <li id="section_soft_rank1_tab"><a href="javascript:void(0)">精品</a></li>
                    <li id="section_soft_rank2_tab"><a href="javascript:void(0)">飙升</a></li>
                </ul>
            </div>
            <div class="views">
                <div id="hot_tab" class="view-item active">
                    <div class="soft_hot" id="section_hot">
                        <ul>
                            <!--{recommend id="45" row=4}-->
                            <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="120" height="120"/>

                                    <p><!--{$recommend.app_title}--></p>
                                </a>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">下载</a>
                            </li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <ul class="soft_list">
                        <!--{recommend id="45" row=8 start=4}-->
                        <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="con">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" class="photo" width="54" height="54"/>

                                <div class="info">
                                    <span class="size"><!--{round($recommend.history_size/1024/1024,2)}-->MB <br/><!--{countdown down=$recommend.app_down}-->次下载 </span>
                                </div>
                                <div class="detail">
                                    <h3><!--{$recommend.app_title}--></h3>

                                    <div class="stars_holder">
                                        <div class="stars" <!--{countstar star=$recommend.app_recomment}-->></div>
                                    </div>
                                </div>
                            </a> <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">
                                <span>下载</span> </a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
                <div id="rank1_tab" class="view-item" style="display: none;">
                    <div class="soft_hot" id="section_rank1">
                        <ul>
                            <!--{recommend id="47" row=4}-->
                            <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="120" height="120"/>

                                    <p><!--{$recommend.app_title}--></p></a>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">下载</a>
                            </li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <ul class="soft_list">
                        <!--{recommend id="47" row=8 start=4}-->
                        <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="con">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" class="photo" width="54" height="54"/>

                                <div class="info">
                                    <span class="size"><!--{round($recommend.history_size/1024/1024,2)}-->MB <br/><!--{countdown down=$recommend.app_down}-->次下载 </span>
                                </div>
                                <div class="detail">
                                    <h3><!--{$recommend.app_title}--></h3>

                                    <div class="stars_holder">
                                        <div class="stars" <!--{countstar star=$recommend.app_recomment}-->></div>
                                    </div>
                                </div>
                            </a> <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">
                                <span>下载</span>
                            </a>
                        </li>

                        <!--{/recommend}-->
                    </ul>
                </div>
                <div id="rank2_tab" class="view-item" style="display: none;">
                    <div class="soft_hot" id="section_rank2">
                        <ul>
                            <!--{recommend id="49" row=4}-->
                            <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="120" height="120"/>

                                    <p><!--{$recommend.app_title}--></p></a>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">下载</a></li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <ul class="soft_list">
                        <!--{recommend id="49" row=8 start=4}-->
                        <li>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="con">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" class="photo" width="54" height="54"/>

                                <div class="info">
                                    <span class="size"><!--{round($recommend.history_size/1024/1024,2)}-->MB <br/><!--{countdown down=$recommend.app_down}-->次下载 </span>
                                </div>
                                <div class="detail">
                                    <h3><!--{$recommend.app_title}--></h3>

                                    <div class="stars_holder">
                                        <div class="stars" <!--{countstar star=$recommend.app_recomment}-->></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down"><span>下载</span> </a>
                        </li>

                        <!--{/recommend}-->
                    </ul>
                </div>
            </div>
        </div>

        <footer class="more">
            <a class="block-link" href="<!--{link m='softs'}-->">
                <span style="vertical-align:middle">进入软件频道首页</span><img src="<!--{$tpl_path}-->images/t01c3ae36e1480c0b30.png"/>
            </a>
        </footer>
    </section>
    <section class="section section-game">
        <div class="le-tabview">
            <div class="g-title header">
                <h2 class="title">游戏</h2>
                <ul class="le-tabs">
                    <li id="section_game_hot_tab" class="active"><a href="javascript:void(0)">热门</a></li>
                    <li id="section_game_rank1_tab"><a href="javascript:void(0)">精品</a></li>
                    <li id="section_game_rank2_tab"><a href="javascript:void(0)">飙升</a></li>
                </ul>
            </div>
            <div class="views">
                <div id="game_hot_tab" class="view-item active">
                    <div class="soft_hot" id="section_hot_game">
                        <ul>
                            <!--{recommend id="46" row=4}-->
                            <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="120" height="120"/>

                                    <p><!--{$recommend.app_title}--></p></a>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">下载</a></li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <ul class="soft_list">
                        <!--{recommend id="46" row=8 start=4}-->
                        <li>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="con">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" class="photo" width="54" height="54"/>

                                <div class="info">
                                    <span class="size"><!--{round($recommend.history_size/1024/1024,2)}-->MB <br/><!--{countdown down=$recommend.app_down}-->次下载 </span>
                                </div>
                                <div class="detail">
                                    <h3><!--{$recommend.app_title}--></h3>
                                    <div class="stars_holder">
                                        <div class="stars" <!--{countstar star=$recommend.app_recomment}-->></div>
                                    </div>
                                </div>
                            </a>
                            <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down"><span>下载</span> </a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
                <div id="game_rank1_tab" class="view-item" style="display: none;">
                    <div class="soft_hot">
                        <ul>
                            <!--{recommend id="48" row=4}-->
                            <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="120" height="120"/>

                                    <p><!--{$recommend.app_title}--></p></a>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">下载</a></li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <ul class="soft_list">
                        <!--{recommend id="48" row=8 start="4"}-->
                        <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="con">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" class="photo" width="54" height="54"/>

                                <div class="info">
                                    <span class="size"><!--{round($recommend.history_size/1024/1024,2)}-->MB <br/><!--{countdown down=$recommend.app_down}-->次下载 </span>
                                </div>
                                <div class="detail">
                                    <h3><!--{$recommend.app_title}--></h3>

                                    <div class="stars_holder">
                                        <div class="stars" <!--{countstar star=$recommend.app_recomment}-->></div>
                                    </div>
                                </div>
                            </a> <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">
                                <span>下载</span> </a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
                <div id="game_rank2_tab" class="view-item" style="display: none;">
                    <div class="soft_hot">
                        <ul>
                            <!--{recommend id="50" row=4}-->
                            <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                                    <img src="<!--{imageurl url = $recommend.app_logo}-->" width="120" height="120"/>

                                    <p><!--{$recommend.app_title}--></p></a>
                                <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">下载</a></li>
                            <!--{/recommend}-->
                        </ul>
                    </div>
                    <ul class="soft_list">
                        <!--{recommend id="50" row=8 start="4"}-->
                        <li><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="con">
                                <img src="<!--{imageurl url = $recommend.app_logo}-->" class="photo" width="54" height="54"/>

                                <div class="info">
                                    <span class="size"><!--{round($recommend.history_size/1024/1024,2)}-->MB <br/><!--{countdown down=$recommend.app_down}-->次下载 </span>
                                </div>
                                <div class="detail">
                                    <h3><!--{$recommend.app_title}--></h3>

                                    <div class="stars_holder">
                                        <div class="stars" <!--{countstar star=$recommend.app_recomment}-->></div>
                                    </div>
                                </div>
                            </a> <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down">
                                <span>下载</span> </a>
                        </li>
                        <!--{/recommend}-->
                    </ul>
                </div>
            </div>
        </div>
        <footer class="more">
            <a class="block-link" href="<!--{link m='games'}-->">
                <span style="vertical-align:middle">进入游戏频道首页</span>
                <img src="<!--{$tpl_path}-->images/t01c3ae36e1480c0b30.png"/>
            </a>
        </footer>
    </section>
</div>
<!--{include file="inc_foot.php"}-->
</div>
</body>
</html>