

    <div class="headercon">
        <div class="layout clearfix">
            <div class="logo"><a href="/"><img  src="<!--{$setting.site_logo}-->" style="width:235px;height:65px;"></a></div>
            <div class="search">
                    <input class="search_input" value="" placeholder="精品应用，海量搜索！" data-rewrite="<!--{$setting.is_site_rewrite}-->" data-url="/index.php?c=index&m=search" id="search-input" onkeydown="if(event.keyCode == 13) search_app()" />
                    <input type="submit" id="search-button" class="search_button" style="cursor:pointer;" value="搜索" onclick="search_app()">

                <div class="hotkey">热门搜索：
                    <!--{keyword row=3}-->
                    <a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--></a>
                    <!--{/keyword}-->
                </div>
            </div>
            <ul class="bnav">
            </ul>
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