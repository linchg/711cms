<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <meta name="format-detection" content="telephone=no" />
 <meta http-equiv="cache-control" content="no-cache" />
 <!--{if $special.special_seotitle}-->
 <title><!--{$special.special_seotitle}--></title>
 <meta name="keywords" content="<!--{$special.special_seokey}-->" />
 <meta name="description" content="<!--{$special.special_seodesc}-->" />
 <!--{else}-->
 <title><!--{$setting.seo_title}--></title>
 <meta name="keywords" content="<!--{$setting.seo_keywords}-->" />
 <meta name="description" content="<!--{$setting.seo_description}-->" />
 <!--{/if}-->

 <!--{include file="inc_head.php"}-->
</head>
 <body> 
  <div id="doc"> 
   <header id="hds"> 
    <div class="titlebar" id="section_titlebar"> 
     <a class="g-block go-back" href="javascript:history.back();"></a> 
     <span class="sep"></span> 
     <h2 class="g-ellipsis title">
      <!--{row name='special' id=$special_id}-->
      <!--{$row.area_title}-->
      <!--{/row}-->
     </h2>
     <a class="g-block go-home" href="/" id="link-go-home"></a>
    </div> 
   </header> 
   <!-- bd --> 
   <div id="bd">
    <!--{row name='special' id=$special_id}-->
    <img src="<!--{$row.area_logo}-->" style="width:100%" />
    <!--{/row}-->
    <header id="section_topic_soft" class="g-title">
     软件
    </header> 
    <div class="soft_hot"> 
     <ul>
      <!--{special id=$special_id}-->
      <li> <a href="<!--{link m='app' app_id=$special.app_id}-->">
        <img src="<!--{imageurl url =$special.app_logo}-->" /> <p><!--{$special.app_title}--></p> </a>
       <a href="<!--{link m='app' app_id=$special.app_id}-->" class="down">下载</a>
      </li>
      <!--{/special}-->
     </ul> 
    </div>
    <!--{include file="inc_foot.php"}-->
 </body>
</html>