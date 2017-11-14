<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <!--{row name='navicat' id=4}-->
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
     <a class="g-block go-back" href="javascript:history.back();" ></a> 
     <span class="sep"></span> 
     <h2 class="g-ellipsis title">装机必备</h2> 
     <a class="g-block go-home" href="/" id="link-go-home"></a>
    </div> 
   </header> 
   <!-- bd -->
   <ul class="cate" id="section_categorys">
       <!--{list name='necessary'}-->
    <li <!--{if (isset($necessary_type) && $necessary_type ==$list.necessary_type) || ($necessary_type ==0 && $list.special_sort_show==1)  }-->
       class="cur"<!--{/if}-->>
        <a
         href="<!--{link m='necessaries' necessary_type=$list.necessary_type}-->">
        <!--{$list.necessary_title}-->
        </a>
    </li>
       <!--{/list}-->
   </ul>
<div id="bd">

    <div id="section_hot_soft" class="soft_list"  data-id="<!--{$necessary_type}-->">
        <!--{list name='necessary' type=$necessary_type}-->
            <ul id="hot_soft">
           <!--{necessary id=$list.necessary_id row=10}-->
          <li> <a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="con">
            <img src="<!--{imageurl url =$necessary.app_logo}-->" class="photo" />
            <div class="info">
             <span class="size"><!--{round($necessary.history_size/1024/1024,2)}-->MB <br /><!--{countdown down=$necessary.app_down}-->次下载 </span>
            </div>
            <div class="detail">
             <h3><!--{$necessary.app_title}--></h3>
             <div class="stars_holder">
                 <div class="stars" <!--{countstar star=$necessary.app_recomment}-->></div>
             </div>
            </div> </a> <a href="<!--{link m='app' app_id=$necessary.app_id}-->" class="down"> <span>下载</span> </a>
          </li>
           <!--{/necessary}-->
           </ul>
        <!--{/list}-->
           <div class="more mb50">
               <p><a href="#" class="list-K"><<加载更多</a></p>
           </div>
    </div>
</div>
  <!--{include file="inc_foot.php"}-->
</div>
  <script type="text/javascript">
      $(function(){
          var i = 2;
          var necessary_type = $("#section_hot_soft").attr("data-id");
          $(".list-K").click(function(){
              $.ajax({
                  type: "POST",
                  url: "api.php?c=ajax&m=necessaries",
                  data: {'page': i++, 'necessary_type':necessary_type},
                  dataType: 'json',
                  success: function (msg) {
                      if (msg.status == '1') {
                          var html = '';
                          $.each(msg.list, function (k, v) {

                              html += '<li>';
                              html += '<a href="' + v.app_url + ' " class="con"><img src="'+ image_url(v.app_logo) +'" class="photo" width="54" height="54"/>';
                              html += '<div class="info">';
                              html += '<span class="size">'+ Math.round(v.history_size/1024/1024*100)/100 +' MB<br/>'+ num_down(v.app_down) +'次下载</span>';
                              html += '</div>';
                              html += '<div class="detail">';
                              html += '<h3>'+ v.app_title +'</h3>';
                              html += '<div class="stars_holder">';
                              html += '<div class="stars" '+ num_star(v.app_recomment) +'></div>';
                              html += '</div>';
                              html += '</div>';
                              html += '<a href="' + v.app_url + '" class="down"><span>下载</span></a>';
                              html += '</a>';

                          });
                          $("#hot_soft").append(html);
                      }else{
                          $(".list_K").html('天啦噜！你竟然看到底了！');
                      }
                  }
              });
          });

          function num_star(num){
              var numm = parseInt(num);
              switch (numm) {
                  case 1:
                      return 'style="width:20%"';
                      break;
                  case 2:
                      return 'style="width:40%"';
                      break;
                  case 3:
                      return 'style="width:60%"';
                      break;
                  case 4:
                      return 'style="width:80%"';
                      break;
                  case 5:
                      return 'style="width:100%"';
                      break;
                  default:
                      return 'style="width:100%"';
                      break;
              }
          }
          function num_down(num){
              var down_umm = parseInt(num);
              if(down_umm >= 100000000){
                  down_umm = Math.round(down_umm/100000000*100)/100 +'亿';
              }
              if(down_umm >= 10000 && down_umm < 100000000 ){
                  down_umm = Math.round(down_umm/10000*100)/100 +'万';
              }
              return down_umm;
          }

          function image_url(url) {

              if(url == '' || url == 'undefined' || url == 'http://cdn.171cms.net/'){
                  return '/templates/cates/no_picture.png';
              }
              return url;
          }
      });
  </script>
 </body>
</html>