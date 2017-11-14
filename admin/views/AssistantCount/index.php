<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<div class="right_body">

    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 手助统计</div><!-- 当前位置结束 -->
    
    <!-- 右侧主体内容开始 -->
    <div class="mbody ly-mbody">
        <div class="ly-thead">
            
            <!-- 清除浮动 -->
            <DIV><SPAN class="clear clearfix"></SPAN></DIV>
            <table border="1" class="ly-table">
                <tr>
                    <th>手助名称</th>
                    <th>应用总安装量</th>
                    <!--<th>应用总激活量</th>-->
                    <th>总用户量</th>
                    <th>操作</th>
                </tr>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $k =>$v) : ?>
                <tr>
                    <td><?php echo $v['s_name']; ?></td>
                    <td><?php echo $v['as_count']; ?></td>
                    <!--<td><?php echo $v['ac_count']; ?></td>-->
                    <td><?php echo $v['user_count']; ?></td>
                    <td>
                        <a href="<?php echo build_url('AssistantCount', 'month_count', array('id' => $v['s_id'])); ?>"><button>查看详情</button></a>
                    </td>
                </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td>汇总</td>
                    <td><?php echo $SetupCount; ?></td>
                    <!--<td><?php echo $ActiveCount; ?></td>-->
                    <td><?php echo $UserCount; ?></td>
                    <td></td>
                </tr>
            </table>
        </div>

    </div>

</div>

<?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<?php $this->load->view('/footer.php'); ?>
