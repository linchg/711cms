<!DOCTYPE HTML>
<html>
<head>
    <!--网页标题-->
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <!--{include file="inc_head.php"}-->
</head>

<body>
<div class="container">
<!--head-->
<header class="head">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!--{ad id=32 }-->
            <div class="swiper-slide">
                <a href="<!--{$ad.link}-->"><img src="<!--{$ad.image}-->" alt="<!--{$ad.alt}-->"  class="img-responsive"></a>
            </div>
            <!--{/ad}-->
        </div>
        <div class="swiper-pagination"></div>
    </div>
       <div>
          <p>
              <a href="/" class="logo"><img src="<!--{$setting.wap_logo}-->" ></a>
          </p>
          <p class="search-bg">
              <input type="text" id="search-input" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
              <a href="javascript:;" id="search-btn"><img src="<!--{$tpl_path}-->images/search.png"></a>
          </p>
       </div>
</header>
    
<div class="gray-head-bg">
    <header class="gray-head">
     <div>
          <p>
              <a href="/" class="logo">
                  <a href="/" class="logo"><img src="<!--{$setting.wap_logo}-->" ></a>
              </a>
          </p>
         <p class="search-bg">
             <input type="text" id="search-type" value="请输入搜索内容" onFocus="if(value=='请输入搜索内容'){value='';this.style.color='#333'}" onBlur="if(value==''){value='请输入搜索内容'}" class="search i-search"  data-rewrite="<!--{$setting.is_site_rewrite}-->">
             <a href="javascript:;" id="btn"><img src="<!--{$tpl_path}-->images/search.png"></a>
         </p>
       </div>
    </header>
</div>
    
<!--nav-->
    <nav>
        <div class="nav">
            <!--{navicat row=2 start=3}-->
            <dl>
                <dt>
                    <a href="<!--{link m=$navicat.navicat_m last_cate_id=2}-->" >
                        <!--{if $navicat.navicat_id==5}-->
                        <img src="<!--{$tpl_path}-->images/nav-pic2.png">
                        <!--{elseif $navicat.navicat_id==4}-->
                        <img src="<!--{$tpl_path}-->images/nav-pic1.png">
                        <!--{/if}-->
                    </a>
                </dt>
                <dd><a href="<!--{link m=$navicat.navicat_m}-->"><!--{$navicat.navicat_name}--></a></dd>
            </dl>
            <!--{/navicat}-->
            <dl>
                <dt>
                    <a href="<!--{link m='ranks' id=68}-->">
                        <img src="<!--{$tpl_path}-->images/nav-pic3.png">
                    </a>
                </dt>
                <dd><a href="<!--{link m='ranks' id=68}-->">排行榜</a></dd>
            </dl>
            <dl>
                <dt>
                    <a href="<!--{link m='recommends' id=67}-->">
                        <img src="<!--{$tpl_path}-->images/nav-pic4.png">
                    </a>
                </dt>
                <dd><a href="<!--{link m='recommends' id=67}-->">精品推荐</a></dd>
            </dl>
        </div>
    </nav>
   <!--grayline-->  
   <div class="grayline"></div>
<!--title-->
    <div class="title-gre">
        <h2 class="fs30">软件热门<a href="<!--{link m='softs' id=45}-->" class="fr fs20 col-1fc9af">更多>></a></h2>
    </div>  
<!--content-->

<!--{recommend id=45 row=15}-->
  <div class="game">
      <div class="game-pic">
           <div class="fl"><a href="<!--{link m='app' app_id=$recommend.app_id}-->"><img src="<!--{$recommend.app_logo}-->" style="width:72px;"/></a></div>

          <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
              <ul>
                  <li class="fs14 col-333 g-title"><!--{$recommend.app_title}--></li>
                  <li class="fs12 col-999"><!--{countdown down=$recommend.app_down}-->次下载<span class="m-none"> | <!--{round($recommend.history_size/1024/1024,2)}-->M</span></li>
                  <li class="fs12 col-666"><span class="btn-s col-999"><!--{$recommend.cname}--></span></li>
              </ul>
          </a>

          <p class="fs14 fr load"><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
      </div>
   </div>
<!--{/recommend}-->
   <!--whiteline-->
   <div class="white-line"></div>
   <!--title-->
    <div class="title2 title-gre">
        <h2 class="fs30">游戏热门<a href="<!--{link m='games' id=46}-->" class="fr fs20 col-ff5d31">更多>></a></h2>
    </div>
<!--content-->

    <!--{recommend id=46 row=15}-->
    <div class="game">
        <div class="game-pic">
            <div class="fl">
                <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
                    <img src="<!--{$recommend.app_logo}-->" style="width:72px;"/>
                </a>
            </div>
            <a href="<!--{link m='app' app_id=$recommend.app_id}-->">
            <ul>
                <li class="fs14 col-333 g-title"><!--{$recommend.app_title}--></li>
                <li class="fs12 col-999"><!--{countdown down=$recommend.app_down}-->次下载<span class="m-none"> | <!--{round($recommend.history_size/1024/1024,2)}-->M</span></li>
                <li class="fs12 col-666"><span class="btn-s col-999"><!--{$recommend.cname}--></span></li>
            </ul>
            </a>
            <p class="fs14 fr load "><a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="col-4FB0E4 btn-a">立即下载</a></p>
        </div>
    </div>
    <!--{/recommend}-->

   <!--whiteline-->
   <div class="white-line h50"></div>
  <!--foot-->
      <!--{include file="inc_foot.php"}-->
</div>
<script>
  $(function(e) {
    $(window).scroll(function(){
        if( $(this).scrollTop()>10){
            $('.gray-head-bg').fadeIn('slow');
            $('.nav').css('margin-top','150px');
            $('.head').css('display','none');
        }else{
            $('.gray-head-bg').fadeOut('fast');
            $('.head').fadeIn('fast');
            $('.nav').css('margin-top','0px');
    }
    });
  $('.gray-head-bg').fadeOut(-10000);
});
</script>
<script type="text/javascript">
    //banner
    var swiper = new Swiper('.swiper-container', {
        loop:true,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        autoplay : 3000,
        autoplayDisableOnInteraction : false
    });
</script>
</body>
</html>
