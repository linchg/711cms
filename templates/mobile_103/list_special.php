<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <!--{row name='navicat' id=6}-->
    <title><!--{$row.navicat_seotitle}--></title>
    <meta name="keywords" content="<!--{$row.navicat_seokey}-->" />
    <meta name="description" content="<!--{$row.navicat_seodesc}-->" />
    <!--{/row}-->

    <!--{include file="inc_head.php"}-->
</head>
 <body> 
  <div id="doc"> 
   <header id="hds"> 
    <div class="titlebar" id="section_titlebar"> 
     <a class="g-block go-back" href="javascript:history.back();"></a> 
     <span class="sep"></span> 
     <h2 class="g-ellipsis title">专题</h2> 
     <a class="g-block go-home" href="/" id="link-go-home"></a>
    </div> 
   </header> 
   <!-- bd --> 
   <div id="bd">
    <ul id="section_zhuanti" class="zhuanti zhuanti-index loadmore-placeholder" data-ratio="" data-margin="0">
        <!--{list name='special'}-->
        <!--{row name='special' id=$list.area_id}-->
         <li class="item" id="section_zhuanti_item0">
             <a class="g-block" href="<!--{link m='special' special_id=$row.area_id}-->">
               <div class="img-wrapper">
                <img src="<!--{$row.area_logo}-->" />
               </div>
                 <p class="title g-ellipsis"><!--{$row.area_title}--></p>
                 <p class="summary g-ellipsis"><!--{$row.area_html}--> </p>
             </a>
         </li>
        <!--{/row}-->
        <!--{/list}-->
    </ul>
    </div>
    <!--{include file="inc_foot.php"}-->
  </div>
 </body>
</html>