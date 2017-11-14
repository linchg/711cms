</div>
<div class="po-item3" style="display: none;">
    <div class="pop-item-box3" style="width: 420px;">
        <div class="ly-tanchu3">
            <p><span class="ly-wrong"><img src="<?php echo static_url('/images/wrong.jpg'); ?>"/></span></p>

            <p class="bac-tishi">提示</p>

            <p class="tishi"><img src="<?php echo static_url('/images/tishi-blue.jpg'); ?>"> 亲，只有711CMS会员才能使用此功能！</p>

            <p class="btn-p"><a target="_blank" href="http://www.711cms.com/my/index.html" class="btn-a">马上开通</a></p>
        </div>
    </div>
    <div class="mask"></div>
</div>
<!-- pop-item -->
<div class="po-item2" style="display: none;">
    <div class="pop-item-box2" style="width: 420px;">
        <div><p><span class="ly-wrong"><img src="<?php echo static_url('/images/wrong.jpg'); ?>"/></span></p></div>
        <div class="ly-tanchu">
            <p class="ly-type">请选择入库类型：</p>
            <ul>
                <li class="fs16">入库类型：
                    <select style="font-family: Microsoft Yahei;font-size:12px;" onchange="category_select(this)">
                        <option class="ly-all" value="0">全部入库</option>
                        <option value="1">软件</option>
                        <option value="2">游戏</option>
                    </select>
                    <span class="ly-no"></span>
                </li>
                <li class="fs16" style="display:none" id="category">应用分类：
                    <select style="font-family: Microsoft Yahei;font-size:12px;" id="cate_id">   
                    </select>
                    <span class="ly-no"></span>
                </li>
                <li class="ly-number">入库数量：100个</span></li>
                <li><a href="javascript:void(0);" class="btn3 po-ok ly-btn">确认</a></li>
            </ul>
        </div>
    </div>
    <div class="mask"></div>
</div>

<!-- pop-item -->
<div class="po-item" style="display: none;">
    <div class="pop-item-box">
        <div class="pop-item-box-content">
            <p>
                <i class="po-loading" style="display:none"><img src="<?php echo static_url('/images/loading.gif'); ?>"/></i>
                <span class="ss"></span>
                <span class="ly-wrong"><img src="<?php echo static_url('/images/wrong.jpg'); ?>"/></span>
            </p>
        </div>

        <div class="l r-box" id="recommend" style="margin-left: 50px; display: none;">
            <div class="select-box l">
                <div class="select-wrap">
                    <select id="manager_id" name="parent_id" class="search_type" onchange="manager_select(this)">
                        <option value="0">推荐类型</option>
                        <option value="1">PC推荐</option>
                        <option value="2">手助推荐</option>
                        <option value="3">WAP推荐</option>
                        <option value="4">应用专题</option>
                        <option value="5">装机必备</option>
                    </select>
                </div>
            </div>
            <div class="select-box l">
                <div class="select-wrap">
                    <select id="recommend_id" name="commend_id"  class="search_type">
                        <option value="0">选择推荐位</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="pop-item-box-btn tc">
            <a class="btn3 po-ok" href="javascript:void(0);">确定</a>
            <a class="btn3 gray-s-3 po-cancel" style="display:none" href="javascript:void(0);"
               onclick="$('.po-item').hide()">取消</a>
        </div>
    </div>
    <div class="mask"></div>
</div>
<!-- pop-item -->
<!-- pop-item -->
<div class="po-item_advert" style="display: none;">
    <div class="pop-item-box">
        <div class="pop-item-box-content">
            <p>
                <i class="po-loading" style="display:none"><img src="<?php echo static_url('/images/loading.gif'); ?>"/></i>
                <span class="ss"></span>
                <span class="ly-wrong"><img src="<?php echo static_url('/images/wrong.jpg'); ?>"/></span>
            </p>
        </div>

        <div class="l r-box" id="navicat" style="margin-left: 50px; display: none;">
            <div class="select-box l">
                <div class="select-wrap">
                    <select id="navicat_id" name="navicat_id" class="search_type" onchange="advert_select(this)">
                        <option value="0">推荐导航</option>
                        <?php if(isset($navicat_name)):?>
                            <?php foreach($navicat_name as $k=>$v):?>
                                <option value="<?php echo $k;?>"><?php echo $v;?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
            </div>
            <div class="select-box l">
                <div class="select-wrap">
                    <select id="second_id" name="second_id" class="search_type" onchange="second_select(this)">
                        <option value="0">选择次级导航</option>
                    </select>
                </div>
            </div>

            <div class="select-box l lunbo" id="third_id_show">
                <div class="select-wrap">
                    <select id="third_id" name="third_id" class="search_type" onchange="third_select(this)">
                        <option value="0">选择标题</option>
                    </select>
                </div>
            </div>
            <div class="select-box l" style="display: none;" id="fourth_id_show">
                <div class="select-wrap">
                    <select id="fourth_id" name="fourth_id" class="search_type">
                        <option value="0">选择标题</option>
                    </select>
                </div>
            </div>
            <div class="select-box l lunbo">
               <input type="text" id="ad_position" class="select-wrap" name="ad_position" value="0"/>
            </div>
            <div class="select-box l lunbo">
                <div id="ad_position_val" style="line-height: 30px; color: #FF0000;">
                    输入广告所在应用的位置
                </div>
            </div>

        </div>

        <div class="pop-item-box-btn tc">
            <a class="btn3 po-ok" href="javascript:void(0);">确定</a>
            <a class="btn3 gray-s-3 po-cancel" style="display:none" href="javascript:void(0);"
               onclick="$('.po-item').hide()">取消</a>
        </div>
    </div>
    <div class="mask"></div>
</div>
<!-- pop-item -->

</body>
</html>
