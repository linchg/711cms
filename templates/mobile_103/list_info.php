<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta http-equiv="cache-control" content="no-cache" />
    <!--{if $last_cate_id}-->
    <!--{row name='info_category' id=$last_cate_id}-->
    <title><!--{$row.ctitle}--></title>
    <meta name="keywords" content="<!--{$row.ckey}-->" />
    <meta name="description" content="<!--{$row.cdesc}-->" />
    <!--{/row}-->
    <!--{else}-->
    <!--{row name='navicat' id=5}-->
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
       <!--{if !$last_cate_id}-->
       <li class="cur"><a href="<!--{link m='infos'}-->">综合</a> </li>
       <!--{else}-->
       <li><a href="<!--{link m='infos'}-->">综合</a> </li>
       <!--{/if}-->
       <!--{infonav}-->
       <li  <!--{if $last_cate_id == $infonav.cate_id}-->
       class="cur"
       <!--{else}-->
       <!--{/if}-->>
       <a href="<!--{link m='infos' last_cate_id=$infonav.cate_id}-->">
       <!--{$infonav.cname}-->
       </a></li>
       <!--{/infonav}-->

   </ul>
   <div id="bd">
      <div class="news-top-detail">
        <ul id="new_append" data-id="<!--{$last_cate_id}-->">
            <!--{infolist id=$last_cate_id page=$page per_page=10}-->
            <li>
                <h2><a href="<!--{link m='info' info_id=$infolist.info_id}-->">
                        <!--{$infolist.info_title}--></a></h2>

                <p><!--{$infolist.info_desc}--></p>

                <div class="">
                    <a href="<!--{link m='info' info_id=$infolist.info_id}-->"
                       class="read-more">[阅读全文]</a>
                    <span>发布时间：<!--{$infolist.info_update_time|date_format:"%Y-%m-%d"}--></span>
                </div>
            </li>
            <!--{/infolist}-->
        </ul>
          <div class="loadmore loadmore-normal" id="loadmore">
              <div class="load-status load-status-btn load-status-normal">
                  加载更多&gt;&gt;
              </div>
              <div class="load-status load-status-btn load-status-loading" style="display: none;">
                  <span>加载中</span>
              </div>
              <div class="load-status load-status-btn load-status-failed" style="display: none;">
                  加载失败
              </div>
              <div class="load-status load-status-btn load-status-reload" style="display: none;">
                  重新加载&gt;&gt;
              </div>
          </div>

      </div>
   </div>
       <!--{include file="inc_foot.php"}-->
</div>
       <script type="text/javascript">
           $(function(){
               var i = 2;
               var last_cate_id = $("#new_append").attr("data-id");
               $(".load-status-normal").click(function(){
                   $.ajax({
                       type: "POST",
                       url: "api.php?c=ajax&m=infos",
                       data: {'page': i++, 'last_cate_id': last_cate_id},
                       dataType: 'json',
                       success: function (msg) {
                           if (msg.status == '1') {
                               var html = '';
                               $.each(msg.list, function (k, v) {
                                   var time = v.info_update_time;
                                   newDate = new Date();
                                   newDate.setTime(time * 1000);

                                   html += "<li>";
                                   html += '<h2>';
                                   html += '<a href="' + v.info_url + '">' + v.info_title + '</a>';
                                   html += '</h2>';
                                   html += '<p>' + v.info_desc + '</p>';
                                   html += '<div class="">';
                                   html += '<a href="' + v.info_url + '" class="read-more">[阅读全文]</a>';
                                   html += '<span>发布时间：' + newDate.toJSON('YYYY-MM-DD').substr(0, 10); + '</span>';
                                   html += "</div>";
                                   html += "</li>";
                               });
                               $("#new_append").append(html);
                           }else{
                               $(".load-status-normal").css("display", "none");
                           }
                       }
                   });
               });
           });

       </script>


       </body>
</html>