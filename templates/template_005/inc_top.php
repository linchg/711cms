<div class="header">
    <div class="col_header clearfix">
        <div class="headerLogo"><a href="/" target="_self" title="安卓手机软件"><img src="<!--{$setting.site_logo}-->"
                                                                               width="235" height="65"
                                                                               alt="<!--{$setting.site_name}-->"
                                                                               title="<!--{$setting.site_name}-->"></a>
        </div>
        <div class="headerSearch search_box" id="search_box">
            <input id="search-input" data-rewrite="<!--{$setting.is_site_rewrite}-->" type="text" class="searchInput" data-url="/index.php?c=index&m=search"
                   onkeydown="if(event.keyCode == 13) search_app()">
            <span class="searchBtn serch_btn" onclick="search_app()" id="search-btn">搜索</span>
        </div>
        <p class="headerHotWords">
            <!--{keyword row=3}-->
            <a href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--></a>
            <!--{/keyword}-->
        </p>
    </div>
</div>
