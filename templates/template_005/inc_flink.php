<!--友情链接 start-->
<div class="links_box">
    <div class="links_hd">
        <div class="links_tab">
            <a class="current" id="yqlj">友情链接</a>
        </div>
    </div>
    <div class="links_bd">
        <div class="links_fren" id="yqlj_mod" style="display: block;">
            <!--{friendlink type=2}-->
            <!--{if !$friendlink.flink_img}-->
            <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->"><!--{$friendlink.flink_name}--></a>
            <!--{else}-->
            <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
                <img width="20" height="20" src="<!--{$friendlink.flink_img}-->" />
                <!--{$friendlink.flink_name}-->
            </a>
            <!--{/if}-->
            <!--{/friendlink}-->
        </div>
    </div>
</div>
<!--友情链接 end-->
