
    <div class="nav nav-red" id="section_nav">
        <a href="/" class="logo"><img width="78" height="52" src="<!--{$setting.wap_logo}-->" alt="<!--{$setting.site_name}-->" /></a>
        <header class="nav-tabs nav-tabs-red">
            <ul>
                <!--{navicat row=4 start=0}-->
                <li  <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || strpos($navicat.navicat_url,$current_page) >0}-->class="cur"<!--{/if}-->>
                    <a href="<!--{link m=$navicat.navicat_m}-->">
                        <!--{$navicat.navicat_name}-->
                    </a>
                </li>
                <!--{/navicat}-->
            </ul>
        </header>
    </div>