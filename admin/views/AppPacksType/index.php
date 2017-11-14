<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 礼包类别</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10 clearfix">
            <div class="l">
                <a href="<?php echo build_url('AppPacksType', 'content'); ?>" class="but2">添加礼包类别</a>
            </div>
            <div class="r r-box">
            </div>
        </div>
        <div>
            <form action="" name="form_order" method="post">
                <table class="tb mt10" border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th width="5%">ID</th>
                        <th width="15%">名称</th>
                       <!-- <th width="35%">ID列表</th>-->
                        <th width="20%">排序</th>
                        <th width="15%">备注</th>
                        <th width="15%">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $kn => $vn) : ?>
                            <tr>
                                <td><?php echo $vn['id']; ?></td>
                                <td><a href="<?php echo build_url('AppPacksType', 'content', array('id' => $vn['id'])); ?>"><?php echo $vn['name']; ?></a></td>
                                <!--<td><?php /*echo isset($vn['t_ids']) ? $vn['t_ids'] : $vn['t_ids'] ; */?></td>-->
                                <td><?php echo isset($vn['t_order']) ? $vn['t_order'] : $vn['t_order'] ; ?></td>
                                <td style="word-break: break-all;"><?php echo $vn['t_remarks']; ?></td>
                                <td>
                                    <a class="but2 but2s" href="<?php echo build_url('AppPacksType', 'content', array('id' => $vn['id'])); ?>">修改</a>
                                    <a class="but2 but2s" href="javascript:;" onclick="type_del(<?php echo $vn['id']; ?>)">删除</a>
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

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function type_del(id){
        show_msg("相关被调用的页面将会不再显示，确认删除吗？", true, function(){
            $.post('<?php echo build_url('AppPacksType', 'del');?>', {"id": id}, function(result) {
                if(result.code != 0){
                    alert(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
</script>

<?php $this->load->view('/footer.php'); ?>
