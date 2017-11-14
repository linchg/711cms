<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<div class="right_body">
    <div class="snav">当前位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a>&nbsp;&nbsp;»&nbsp;&nbsp;应用统计</div>
    <!-- 右侧主体内容开始 -->
    <div class="mbody ly-mbody">
        <div class="ly-thead">
            <ul>
                <li>
                    开始：
                    <input type="text" id="start" onclick="laydate({istime:false, format: 'YYYYMMDD'})" name="start"
                           value="<?php echo isset($start) ? $start: ''; ?>"/>
                </li>
                <li>
                    结束：
                    <input type="text" id="stop" onclick="laydate({istime:false, format: 'YYYYMMDD'})" name="stop"
                           value="<?php echo isset($stop) ? $stop: ''; ?>"/>
                </li>
                <li>
                    应用：
                    <select  name="app_id" id="app_id" >
                        <option value="0">应用选择</option>
                        <?php if (is_array($apps) && sizeof($apps) > 0) : ?>
                            <?php foreach ($apps as $value) : ?>
                                <option value="<?php echo $value['app_id']; ?>" <?php echo $app_id == $value['app_id'] ? 'selected="selected"' : ''; ?>><?php echo $value['app_title']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </li>

                <li class="li-btn">
                    <a href="javascript:void(0);" onclick="search_list()">
                        <button class="blue-btn">查询</button>
                    </a>
                </li>
            </ul>
            <!-- 清除浮动 -->
            <div><span class="clear clearfix"></span></div>
            <table border="1" class="ly-table">
                <tr>
                    <th>日期</th>
                    <th>应用</th>
                    <th>pc浏览</th>
                    <th>mobile浏览</th>
                    <th>pc下载</th>
                    <th>mobile下载</th>
                    <th>安装</th>
                </tr>
                <?php if (is_array($list) && sizeof($list) > 0): ?>
                    <?php foreach($list as $l): ?>
                        <tr>
                            <td><?php echo $l['date']; ?></td>
                            <td><?php echo $l['app_title']; ?></td>
                            <td><?php echo $l['pcview_count']; ?></td>
                            <td><?php echo $l['mobileview_count']; ?></td>
                            <td><?php echo $l['pcdown_count']; ?></td>
                            <td><?php echo $l['mobiledown_count']; ?></td>
                            <td><?php echo $l['install_count']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <div class="pagebar clearfix">
                <div class="ly-page">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <div class="page-go">
                    <?php if ($count / $limit > 1) : ?>
                        <input class="page-num" type="text" id ="page" value="">
                        <a href="javascript:void(0);" onClick="page()" style="background:#0965B8;color:#fff">GO</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function search_list() {
        window.location = "<?php echo build_url("counter");?>" + '&start=' + $('#start').val()+ '&stop=' + $('#stop').val()+'&app_id='+$('#app_id').val();
    }
    function page(){
        var page = $('#page').val();
        if(page>0){
            <?php
            $url = build_url('Counter', 'main');
            if(!empty($start)) $url .= "&start=".$start;
            if(!empty($stop)) $url .= "&stop=".$stop;
            if(!empty($app_id)) $url .= "&app_id=".$app_id;
            ?>
            window.location = "<?php echo $url.'&page='; ?>"+page;
        }
    }
</script>

<?php $this->load->view('/footer.php'); ?>
