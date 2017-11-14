<div class="header">
    <div class="inner">
        <div class="drawer" id="j-nav-btn"></div>
        <span class="logo-wp">
            <a class="pngFix logo" href="/" title="<!--{$setting.site_name}-->">
                <img width="150" height="40" src="<!--{$setting.site_logo}-->" alt="<!--{$setting.site_name}-->" />
            </a>
        </span>
        <div class="search-form clearfix" id="search-form" >
            <input class="key-ipt" value="" placeholder="输入应用或游戏关键词" data-rewrite="<!--{$setting.is_site_rewrite}-->" id="search-input" onkeydown="if(event.keyCode == 13) search_app()" />
            <input type="button" value="搜索" class="submit" id="search-btn" onclick="search_app()"/>
        </div>
        <div class="" style="position: absolute;left: 680px;top:25px;font-size:12px;overflow: hidden">
            热门关键字：
            <!--{keyword row=3}-->
            <a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--></a>
            <!--{/keyword}-->
        </div>
    </div>
</div>
<script>
    function search_app() {
        var s = $('#search-input').val();
        if(s != '') {
            var url = '';
            var rewrite = $('#search-input').attr('data-rewrite');
            if(rewrite){
                url = '/search/'+encodeURIComponent(s)+'.html';
            }else{
                url = '/?c=index&m=search&keywords='+encodeURIComponent(s);
            }
            window.location = url;
        }
    }
</script>
