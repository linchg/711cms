<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

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
<div class="header">
    <h2><font style="max-width:68%" class="overcut">新闻列表</font></h2>
    <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>
<table width="0" border="0" cellspacing="0" cellpadding="0"  class="table3">
    <tr>
        <td style="height: 30px;">
            <a href="<!--{link m='infos'}-->" style="height: 30px;">
                <p>综合</p>
            </a>
        </td>
        <!--{infonav}-->
        <td style="height: 30px;">
            <a href="<!--{link m='infos' last_cate_id=$infonav.cate_id}-->" style="height: 30px;">
                <p><!--{$infonav.cname}--></p>
            </a>
        </td>
        <!--{/infonav}-->
    </tr>
</table>

<div class="allWanDiv">
    <ul class="allWan" id="new_append" data-id="<!--{$last_cate_id}-->">
        <!--{infolist id=$last_cate_id page=$page per_page=10}-->
        <li>
            <a href="<!--{link m='info' info_id=$infolist.info_id}-->" title="<!--{$infolist.info_title}-->"><!--{$infolist.info_title}--></a>
        </li>
        <!--{/infolist}-->
    </ul>
</div>
<hr class="line2">
<div class="more-div"><a href="javascript:;" id="infoMore">更多</a></div>
<!--footer-->

<!--{include file="inc_foot.php"}-->
<script>
    $(function(){
        var i = 2;
        var last_cate_id = $("#new_append").attr("data-id");
        $("#infoMore").click(function(){
            $.ajax({
                type: "POST",
                url: "/api.php?c=ajax&m=infos",
                data: {'page': i++, 'last_cate_id': last_cate_id},
                dataType: 'json',
                success: function (msg) {
                    if (msg.status == '1') {
                        var html = '';
                        $.each(msg.list, function (k, v) {
                            html += "<li>";
                            html += '<a href="'+ v.info_url + '">' + v.info_title + '</a>';
                            html += "</li>";
                        });
                        $("#new_append").append(html);
                    }else{
                        $("#infoMore").css("display", "none");
                    }
                }
            });
        });
    });
</script>

</body>
</html>