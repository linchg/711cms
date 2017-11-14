<div id="j-head-menu" class="menu-list pc-main-menu">
    <ul class="parent-menu">
        <!--{navicat }-->
        <li class=<!--{if ($navicat.navicat_m == $current_page)}-->"nav-item2"<!--{else}-->"nav-item"<!--{/if}-->>
            <!--{if $navicat.navicat_blank == 1}-->
            <a class="first-link" href="<!--{link m=$navicat.navicat_m}-->" target="_blank">
                <span><!--{$navicat.navicat_name}--></span>
            </a>
            <!--{else}-->
            <a class="first-link" href="<!--{link m=$navicat.navicat_m}-->">
                <span><!--{$navicat.navicat_name}--></span>
            </a>
            <!--{/if}-->
        </li>
        <!--{/navicat}-->
    </ul>
</div>
<div class="mask" id="j-mask"></div>
