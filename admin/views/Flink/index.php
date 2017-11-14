<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">SEO管理</a> » 友情链接</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10 clearfix">
            <div class="l">
                <a href="<?php echo build_url('Flink', 'content'); ?>" class="but2">添加友情链接</a>
            </div>
            <div class="r r-box">

            </div>
        </div>
        <!-- 列表开始 -->
        <div>
            <form action="" name="form_order" method="post">
                <table class="tb mt10" border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th width="80"><a href="javascript:void(0);" onclick="check_all('.cklist');">全选/反选</a></th>
                        <th align='center'>友链ID</th>
                        <th align='center'>排序</th>
                        <th align='center' width="200" >友链名称</th>
                        <th align='center' width="200" >友链图片</th>
                        <th align='center'>链接地址</th>
                        <th align='center'>友链类型</th>
                        <th align='center'>添加时间</th>
                        <th width="120">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $value) : ?>
                            <tr>
                                <td><input type="checkbox" class="cklist" value="<?php echo $value['flink_id']; ?>" /></td>
                                <td><?php echo $value['flink_id']; ?></td>
                                <td><?php echo $value['flink_order']; ?></td>
                                <td>
                                    <a href="<?php echo build_url('Flink', 'content', array('flink_id' => $value['flink_id'])); ?>">
                                        <?php echo $value['flink_name']; ?>
                                    </a>
                                </td>
                                <td><?php echo !empty($value['flink_img']) ? '<img width="25" height="25" src="'.$value['flink_img'].'" />' : '-'; ?></td>
                                <td><a href="<?php echo $value['flink_url']; ?>" target="_blank"><?php echo $value['flink_url']; ?><a></td>
                                <td><?php echo $value['flink_type'] == 1 ? '首页' : '其它页面'; ?></td>
                                <td><?php echo date('Y-m-d', $value['flink_time']); ?></td>
                                <td>
                                    <a class="but2 but2s" href="<?php echo build_url('Flink', 'content', array('flink_id' => $value['flink_id'])); ?>">修改</a>
                                    <a class="but2 but2s" href="javascript:;" onclick="flink_del(<?php echo $value['flink_id'] ?>)">删除</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </form>

            <div class="pagebar clearfix">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
        <!-- 列表结束 -->
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function flink_del(flink_id){
        show_msg("确认删除？", true, function(){
            $.post(build_url('Flink', 'delete'), {"flink_id": flink_id}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function flink_search() {
        window.location = $('#flinkSearch').attr('action') + '&' + $('#flinkSearch').serialize();
    }
</script>

<?php $this->load->view('/footer.php'); ?>
