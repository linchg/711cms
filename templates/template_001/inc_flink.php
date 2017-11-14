<!-- f-link -->
<div class="f-link">
    <span>友情链接：</span>
    <!--{friendlink type=2}-->
    <!--{if !$friendlink.flink_img}-->
    <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->"><!--{$friendlink.flink_name}--></a>
    <!--{else}-->
    <a href="<!--{$friendlink.flink_url}-->" target="_blank" title="<!--{$friendlink.flink_name}-->">
        <img style="display: inline-block; position: relative; top:3px;" width="20" height="20" src="<!--{$friendlink.flink_img}-->" />
        <!--{$friendlink.flink_name}-->
    </a>
    <!--{/if}-->
    <!--{/friendlink}-->
</div>
<!-- f-link -->