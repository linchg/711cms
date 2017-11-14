<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--{if $app.app_stitle}-->
    <title><!--{$app.app_stitle}--></title>
    <meta name="keywords" content="<!--{$app.app_seokey}-->" />
    <meta name="description" content="<!--{$app.app_seodesc}-->" />
    <!--{else}-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
    <meta name="description" content="<!--{$setting.seo_description}-->" />
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
        <!--nav-->
        <div class=" text-center nav-color elementwidth text-big padding-left padding-right" style="height: 40px">
            <div class="line">
               <div class="xl2 xs2 xm2 xb2">
            <a class="icon-angle-left text-large ellipsis" href="Javascript:history.go(-1);void(0);"></a>
        </div>
             <div class="xl8 xs8 xm8 xb8" style="height: 20px;overflow:hidden;margin-top: 8px">
            <span class="text-white text-big"><!--{$app.app_title}--></span>
        </div>
                <div class="xl2 xs2 xm2 xb2 padding-small-top">
                    <a href="javascript:void(0)" id="search"><span class="icon-search text-white" style="font-size: 20px"></span></a>
                </div>
            </div>
        </div>
        <div class="hidden" id="dialog" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#FFFFFF;z-index:10;display:block;overflow-x:hidden;overflow-y:auto;">
            <div class="text-center elementwidth text-big padding-left padding-right bg-sub" style="height: 40px">
                <form method="post" action="#" class="form-inline">
                    <div class="line">
                        <div class="xl2 xs2 xm2 xb2 margin-small-top">
                            <span class="icon-angle-left text-large text-white" id="close"></span>
                        </div>
                        <div class="xl8 xs8 xm8 xb8 margin-small-top">
                            <input type="text" class="input" value=""  data-url="/index.php?c=index&m=search" id="search-input" onkeydown="if(event.keyCode == 13) search_app()" name="keyword" placeholder="精品应用、海量搜索"  style="height: 30px">
                        </div>
                        <div class="xl2 xs2 xm2 xb2 margin-small-top">
                            <button type="button" id="search-btn" onclick="search_app()" class="button button-small bg"><span class="icon-search text-sub"></span></button>
                        </div>
                    </div>
                </form>
            </div>
         <div class="form-group">
<div class="field">
<div class="line">
<p class="text-left">大家都在搜</p>
</div>
<ul class="list-inline height text-big">

    <!--{keyword row=4}-->
    <li style=" height:40px"><a  href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--><!--<span class="text-green icon-arrow-up"></span>--></a></li>
    <!--{/keyword}-->
</ul>
</div>
</div>
        </div>
       
       
       
       <!-- inner -->
          <div class="container padding-top padding-right padding-left padding-bottom">
    <div class="line">
        <div class="media media-x">
            <a href="javascript:void(0);" class="float-left">
                <img src="<!--{imageurl url =$app.app_logo}-->" class="radius-big game-icon">
            </a>
            <div class="float-right padding-top"><a href="<!--{link m='download' app_id=$app.app_id}-->" class="button button-small border-sub">下载</a></div>
            <div class="media-body">
                <strong><!--{$app.app_title}--></strong>
                <div class="line padding-small-bottom padding-small-top">
                    <span class="star bigstar35 text-left"></span>
                </div>
                <p class="text-left height-little margin-small-bottom text-small text-gray"><!--{countdown down=$app.app_down}-->万下载<span>|</span><!--{round($app.history_size/1024/1024,2)}-->MB</p>
            </div>
        </div>
    </div>
</div>
<div class="container" style="width: 300px;">
    <div class="swiper-container swiper-container-horizontal" id="gallery">
        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-300px, 0px, 0px);">
            <!--{imagelist app_id=$app.app_id}-->
                       <div class="swiper-slide swiper-slide-next" style="width: 300px;"><img src="<!--{$imagelist.resource_url}-->" class="img-responsive"></div>
            <!--{/imagelist}-->

                    </div>
        <div class="swiper-pagination swiper-pagination-clickable"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
    </div>
</div>
<div class="container padding-big-top padding-right padding-left ">
    <div class="container">
        <div class="line padding-right padding-left">
            <div class="xl6 xs6 xm6 xb6">
                <div class="text-big border-left border-sub border-big">应用介绍</div>
            </div>
        </div>
        <hr>
        <div class="line padding-right padding-left">
            <div>
                <p class="text-indent text-left text-small text-gray" style="height: 70px;overflow: hidden" id="content">
                    <!--{$app.app_desc}-->
                </p>
            </div>
                <div class="text-right collapse">
                    <a class="" id="collapse">+展开全部</a>
                </div>
        </div>
    </div>
    
    <div class="container">
        <div class="line padding-right padding-left">
            <div class="text-left text-big border-left border-sub border-big">你可能还喜欢</div>
        </div>
        <hr>
        <div class="line padding-bottom text-center">
            <!--{relevant cid=$app.last_cate_id row=3 order='app_down desc'}-->
                  <div class="xl3 xs3 xm3 xb3">
                <div class="media clearfix">
                    <a href="<!--{link m='app' app_id=$relevant.app_id}-->"><img src="<!--{imageurl url =$relevant.app_logo}-->" class="radius-big game-icon"></a>
                    <div class="media-body text-center padding-left">
                        <p class="text-small" style="font-weight:bold;"><!--{$relevant.app_title}--></p>
                    </div>
                </div>
            </div>
            <!--{/relevant}-->


                   </div>
    </div>

</div>
<div class="line" style="height: 45px"></div>
       <!-- inner -->

        <!--footer-->
     <div class="padding-small-top padding-small-bottom padding-big-left padding-big-right elementwidth bg-white" style="position:fixed;bottom:0;z-index: 1;">
    <a href="<!--{link m='download' app_id=$app.app_id}-->" class="button bg-sub button-block text-center">下载</a>
</div> 

<script>
    var height= $(window).height();
    $('#search').click(function(){
        $('#dialog').removeClass('hidden');
        $('#dialog').height(height);
    });
    $('#close').click(function(){
        $('#dialog').addClass('hidden');
    });
</script>
<script type="text/javascript">
    //banner
    var swiper = new Swiper('.swiper-container', {
        loop:true,
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
</script>
<script>
    $('#collapse').click(function(){
        if($(this).text()=='+展开全部'){
            $('#content').css('height', 'auto');
            $(this).html('-收起部分');
        }else if($(this).text()=='-收起部分'){
            $('#content').height(70);
            $(this).html('+展开全部');
        }
    });
</script>
</body>
</html>