<div class="right-div">
    <div class="list-title clearfix">
        <!--{row name="info_category" id=2 }-->
        <h2 class="con"><span class="title-bg iconSprite"></span><!--{$row.cname }--></h2>
        <!--{/row}-->
    </div>
    <ul class="eva-list">
        <!--{infolist id=2 row=10}-->
        <li>
            <span class="num first"><!--{$infolist.info_id}--></span>

            <a href="<!--{link m='content_info' info_id=$infolist.info_id}-->"  class="eva-con" target="_blank">
                <!--{$infolist.info_title}-->
            </a>
        </li>
        <!--{/infolist}-->
    </ul>
</div>

<div class="right-div list-img">
            <!--{recommend id=31}-->
            <a href="<!--{link m='list_necessary'}-->" title="<!--{$recommend.area_title}-->" target="_blank">
                <img src="http://t007.171cms.com/uploads/images/e5b94c1d2638104fdd3b32c4e073608b.jpg" width="100" >
            </a>
            <!--{/recommend}-->
        </div>


        <div class="right-div">
            <div class="list-title clearfix">
                <h2 class="con"><span class="title-bg iconSprite"></span>
                    <!--{row name='recommend' id=40}--><!--{$row.area_title}--><!--{/row}-->
                </h2>
            </div>
            <ul class="recom-list">
                <!--{recommend id=40 row=4}-->
                <li class="right-ul-bd">
                    <div class="recom-detail">
                        <a class="recom-name" target="_blank" title="<!--{$recommend.app_title}-->" href="<!--{link m='content_app' app_id=$recommend.app_id}-->">
                            <!--{$recommend.app_title}-->
                        </a>
                        <div class="star-bg iconSprite">
                            <div class="stars iconSprite stars-<!--{$recommend.app_recomment}-->"></div>
                        </div>
                        <p class="recom-lx"><!--{$recommend.cname}--></p>
                    </div>
                    <a class="recom-img" target="_blank" title="<!--{$recommend.app_title}-->" href="<!--{link m='content_app' app_id=$recommend.app_id}-->">
                        <span class="li-img-out" style="font-style: italic;"></span>
                        <img class="game-img-2" src="<!--{$recommend.app_logo}-->" alt="<!--{$recommend.app_title}-->">
                    </a>
                </li>
                <!--{/recommend}-->
            </ul>
        </div>
