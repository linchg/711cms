<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--{row name='navicat' id=4}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<body>
<!--header-->
<div class="header">
    <h2><font style="max-width:68%" class="overcut">装机必备</font></h2>
    <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>


<ul class="cate" id="section_categorys">
    <li id="section_categorys_tab0" class="cur"><a href="#">软件必备</a></li>
    <li id="section_categorys_tab1"><a href="#">游戏必备</a></li>

</ul>
<div id="bd">
    <!--{list name='necessary' type=1}-->
    <ul id="section_hot_soft" class="soft_list">
        <!--{necessary id=$list.necessary_id}-->
        <li>
            <a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="con">
                <img src="<!--{imageurl url =$necessary.app_logo}-->" class="photo" />
                <div class="info">
                    <span class="size"><!--{round($necessary.history_size/1024/1024,2)}-->MB <br /><!--{countdown down=$necessary.app_down}-->次下载 </span>
                </div>
                <div class="detail">
                    <h3><!--{$necessary.app_title}--></h3>
                    <div class="stars_holder">
                        <div class="stars" <!--{countstar star=$necessary.app_recomment}-->></div>
                    </div>
                </div>
            </a>
            <a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="down"> <span>下载</span> </a>
        </li>
        <!--{/necessary}-->
    </ul>
    <!--{/list}-->

    <!--{list name='necessary' type=2}-->
    <ul id="section_hot_game" class="soft_list" style="display: none;">
    <!--{necessary id=$list.necessary_id}-->
    <li>
        <a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="con">
            <img src="<!--{imageurl url =$necessary.app_logo}-->" class="photo" />
            <div class="info">
                <span class="size"><!--{round($necessary.history_size/1024/1024,2)}-->MB <br /><!--{countdown down=$necessary.app_down}-->次下载 </span>
            </div>
            <div class="detail">
                <h3><!--{$necessary.app_title}--></h3>
                <div class="stars_holder">
                    <div class="stars" <!--{countstar star=$necessary.app_recomment}-->></div>
            </div>
            </div>
        </a>
        <a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="down"> <span>下载</span> </a>
    </li>
    <!--{/necessary}-->
</ul>
<!--{/list}-->

</div>
<!--{include file="inc_foot.php"}-->
<script>
    $(function(){
        $("#section_categorys_tab0").click(function () {
            $("#section_hot_soft").show();
            $("#section_categorys_tab0").addClass("cur");
            $("#section_categorys_tab1,#section_categorys_tab2,#section_categorys_tab3").removeClass("cur");
            $("#section_hot_game,#section_hot_rank,#section_hot_category").hide();
        });
        $("#section_categorys_tab1").click(function () {
            $("#section_hot_game").show();
            $("#section_categorys_tab1").addClass("cur");
            $("#section_categorys_tab0,#section_categorys_tab2,#section_categorys_tab3").removeClass("cur");
            $("#section_hot_soft,#section_hot_rank,#section_hot_category").hide();
        });

    })
</script>

</body>
</html>