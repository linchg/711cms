<!-- 友情链接 -->
<div class="ftop">
    <div class="box">
        <div class="ft_left">
            <div class="ft_tit">友情链接</div>
            <div class="ft_a">
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
        </div>
    </div>
</div>
<!-- 友情链接 -->
