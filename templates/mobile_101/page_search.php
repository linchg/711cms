<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="data-spm" content="1"/>
    <meta http-equiv="Cache-Control" content="max-age=3600"/>
    <title><!--{$setting.seo_title}--></title>
    <meta name="keywords" content="<!--{$setting.seo_keywords}-->"/>
    <meta name="description" content="<!--{$setting.seo_description}-->"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--{include file="inc_head.php"}-->
</head>
<body>
<div class="header">
    <h2><font style="max-width:68%" class="overcut">搜索</font></h2>
    <a class="back icon-ic_back1-01" href="javascript:history.back();"></a>
</div>
<div class="searchDiv bgGray">
    <table class="search" border="0" cellspacing="0" cellpadding="0">
        <form id="search-form" action="<!--{link m='search'}-->">
            <tr>
                <td class="input">
                    <input type="text" value="乱斗西游" id="search-input" name="keyword"/>
                    <span class="delTxt icon-ic_dele-01"></span>
                </td>
                <td class="sear-btn">
                    <span class="icon-ic_search-01"></span>
                    <input type="button" value="" id="search-btn"/>
                </td>
            </tr>
        </form>
    </table>
</div>
<div class="quan">
    <!--{keyword row=6}-->
    <a  href="<!--{link m='search' keywords=$keyword.q }-->" class="q<!--{$show_num++}--> circle"><!--{$keyword.q}--></a>
    <!--{/keyword}-->
</div>
<!--{include file="inc_foot.php"}-->

</body>
</html>