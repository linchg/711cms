<div class="text-center bg-white elementwidth foot-title padding-small-top border-top border-gray" style="position:fixed;bottom:0;z-index: 11;" id="foot">
    <!--{navicat row=4 start=0}-->
    <div class="xl3 xs3 xm3 xb3">
        <a href="<!--{link m=$navicat.navicat_m}-->">
            <div <!--{if ($navicat.nav_sort_show == 1 && empty($current_page)) || (strpos($navicat.navicat_url,$current_page) > 0 && substr($navicat.navicat_url,0,4) != 'http')}-->
            class="icon-color"
            <!--{/if}--> >
                <i class="nav-icon nav-<!--{$navicat.nav_sort_show}-->"></i>
                <p class="height-little margin-small-bottom text-small">
                    <!--{$navicat.navicat_name}-->
                    <span></span>
                </p>
            </div>

        </a>
    </div>
    <!--{/navicat}-->
</div>