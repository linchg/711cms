<div class="header">
    <div class="logo">
        <a href="/"><img src="<!--{$setting.site_logo}-->" width="150" height="50"></a>
    </div>
    <div class="sear_box">
        <div class="hot_word">
            <!--{keyword row=2}-->
            <a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--></a>
            <!--{/keyword}-->                                  
        </div>
        <div class="search" id="search-form" >
            <input class="txt_search" type="text"  value="" placeholder="输入应用或游戏关键词" data-url="/index.php?c=index&m=search" data-rewrite="<!--{$setting.is_site_rewrite}-->" id="search-input" onkeydown="if(event.keyCode == 13) search_app()" />
            <input class="btn_search" type="button" value="搜索"  id="search-btn" onclick="search_app()"/>
        </div>
    </div>
</div>

<script>
    function build_url_js(c, m, arg, d, rewrite) {
        var c = c.toLowerCase();
        var url = {};
        var build = '';
        var query = '';
        if (rewrite == 1) {
            var keywords = arg.keywords;
            return "/search/?keywords=" + encodeURI(keywords);
        }
        if (d != undefined) {
            $.extend(url, {"d": d});
        }
        if (c != undefined) {
            $.extend(url, {"c": c});
        }
        if (m != undefined) {
            $.extend(url, {"m": m});
        }
        if (typeof arg == 'object') {
            $.extend(url, arg);
        }
        query = $.param(url);
        if (query.length > 0) {
            query = '?' + query;
        }
        build = "/index.php" + query;
        return build;
    }
    function search_app() {
        if ($('#search-input').val() != '') {
            window.location = build_url_js('index','search',{'keywords': $('#search-input').val()},undefined,rewrite = $('#search-input').attr('data-rewrite'));
           // window.location = $('#search-input').attr('data-url') + "&keywords=" + $('#search-input').val();
        }
    }
</script>
