<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <!--{if $cate_id}-->
    <!--{row name='app_category' id=$cate_id}-->
    <title><!--{$row.ctitle}--></title>
    <meta name="keywords" content="<!--{$row.ckey}-->" />
    <meta name="description" content="<!--{$row.cdesc}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=3}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->
    <!--{/if}-->

    <!--{include file="inc_head.php"}-->
</head>
<body>
<div id="doc">
<!--{include file="inc_top.php"}-->
   <!-- bd -->
   <ul class="cate" id="section_categorys"> 
    <li id="section_categorys_tab0" class="cur"><a href="#">热门</a> </li> 
    <li id="section_categorys_tab1"><a href="#">精品</a> </li> 
    <li id="section_categorys_tab2"><a href="#">排行榜</a> </li> 
    <li id="section_categorys_tab3"><a href="#">分类</a> </li> 
   </ul> 
   <div id="bd">

       <!--热门-->
<DIV class="soft_list" id="section_hot_soft" data-id="46">
        <ul  id="soft">
                 <!--{recommend id="46" row=10}-->
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
                      <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down"><span>下载</span></a>
                     </li>
                 <!--{/recommend}-->
        </ul>
       <div class="more mb50">
           <p><a href="#" class="list-W"><<加载更多</a></p>
       </div>
</DIV>


    <!--精品-->
    <DIV class="soft_list" id="section_hot_game" style="display: none;" data-id="48">
    <ul id="game">
     <!--{recommend id="48" row=10}-->
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
      </a> <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down"> <span>下载</span>
      </a>
     </li>
     <!--{/recommend}-->
    </ul>
    <div class="more mb50">
        <p><a href="#" class="list-S"><<加载更多</a></p>
    </div>
    </DIV>
       <!--排行-->
<div id="section_hot_rank" style="display: none;" class="soft_list" data-id="52">
    <ul id="rank">
     <!--{recommend id="52" row=10}-->
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
      </a> <a href="<!--{link m='app' app_id=$recommend.app_id}-->" class="down"> <span>下载</span>
      </a>
     </li>
     <!--{/recommend}-->
    </ul>
<div class="more mb50">
    <p><a href="#" class="list-K"><<加载更多</a></p>
</div>
</div>
       <!--分类-->
    <ul id="section_hot_category" style="display: none;"  class="soft_list2">
           <!--{appnav parent=2}-->
           <li> <a href="<!--{link m='categories' cate_id=$appnav.cate_id}-->">
                   <img src="<!--{$appnav.cate_logo}-->" class="photo" />
                   <div class="detail">
                       <h3><!--{$appnav.cname}--></h3>
                       <p><!--{applist id=$appnav.cate_id row=3}--><!--{$applist.app_title}-->&nbsp;<!--{/applist}--></p>
                   </div>
                   <div class="arr"></div>
               </a>
           </li>
           <!--{/appnav}-->
    </ul>
   </div>
    <!--{include file="inc_foot.php"}-->
</div>
 </body>
</html>