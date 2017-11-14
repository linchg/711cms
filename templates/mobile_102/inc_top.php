<!--nav-->
<div class=" text-center nav-color elementwidth text-big padding-left padding-right" style="height: 40px">
    <div class="line">
        <div class="xl2 xs2 xm2 xb2 padding-small-top">
            <a href="/"><span class="icon-home text-white text-large"></span></a>
        </div>
        <div class="xl8 xs8 xm8 xb8 padding-small-top">
            <a href="/"><img src="<!--{$setting.wap_logo}-->" style="width:80px;height:31px;"></a>
        </div>
        <div class="xl2 xs2 xm2 xb2 padding-small-top">
            <a href="javascript:void(0)" id="search"><span class="icon-search text-white" style="font-size: 20px"></span></a>
        </div>
    </div>
</div>
<div class="hidden" id="dialog" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#FFFFFF;z-index:10;display:block;overflow-x:hidden;overflow-y:auto;">
    <div class="text-center elementwidth text-big padding-left padding-right bg-sub" style="height: 40px">
        <form id="search-form"   class="form-inline">
            <div class="line">
                <div class="xl2 xs2 xm2 xb2 margin-small-top">
                    <span class="icon-angle-left text-large text-white" id="close"></span>
                </div>
                <div class="xl8 xs8 xm8 xb8 margin-small-top">
                    <input type="text" class="input" value=""  data-url="/index.php?c=index&m=search" id="search-input" data-rewrite="<!--{$setting.is_site_rewrite}-->" onkeydown="if(event.keyCode == 13) search_app()" name="keyword" placeholder="精品应用、海量搜索"  style="height: 30px">
                </div>
                <div class="xl2 xs2 xm2 xb2 margin-small-top">
                    <button type="button" id="search-btn" onclick="search_app()" class="button button-small bg"><span class="icon-search text-sub"></span></button>
                </div>
            </div>
        </form>
    </div>
    <div class="form-group">
        <div class="field">
            <div class="line">
                <p class="text-left">大家都在搜</p>
            </div>
            <ul class="list-inline height text-big">


                <!--{keyword row=4}-->
                <li style=" height:40px"><a  href="<!--{link m='search' keywords=$keyword.q}-->"><!--{$keyword.q}--><!--<span class="text-green icon-arrow-up"></span>--></a></li>
                <!--{/keyword}-->
            </ul>
        </div>
    </div>
</div>
<!--banner-->