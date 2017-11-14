<div class="inner clearfix">
        <div class="mod-search clearfix">
            <a href="/" class="logo">
                <img  width="150" style="width:100%;" height="40" src="<!--{$setting.site_logo}-->" id="logo_pc" alt="<!--{$setting.site_name}-->">
            </a>
            <div class="form">
                <div class="input-search">
                    <div class="input-inner">
                        <div id="suggest-align">
                            <input type="text" class="ipt-text" data-url="/index.php?c=index&m=search"
                                   id="search-input" data-rewrite="<!--{$setting.is_site_rewrite}-->" suggestwidth="492px"
                                   placeholder="搜索手机资源，一键装进手机" autocomplete="off"
                                   onkeydown="if(event.keyCode == 13) search_app()">
                        </div>
                    </div>
                </div>
                <button class="btn-search" id="search-btn" onclick="search_app()">搜索</button>
            </div>
        </div>
</div>







