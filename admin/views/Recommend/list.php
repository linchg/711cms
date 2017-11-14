<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>


<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">当前位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a>&nbsp;&nbsp;»&nbsp;&nbsp;推荐位应用列表</div>
    <!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10 clearfix">
            <div class="l">
                <a href="javascript:void(0);" onclick="javascript:history.go(-1)" class="but2">返回</a>
                <a href="javascript:void(0);" class="but2" onClick="cancel_recommended_all()">取消选中</a>
            </div>
        </div>
        
        <div class="mt10">
            <table class="tb" border="1" bordercolor="#cee1ee">
                <thead>
                <tr class="tr-title">
                    <th width="5%"><a href="javascript:void(0);" onclick="check_all('.cklist');">全选/反选</a></th>
                    <th width="5%">ID</th>
                    <th width="25%" class="alignleft"><p class="ml10">应用名称</p></th>
                    <th width="5%">应用分类</th>
                    <th width="6%">所属分类</th>
                    <th width="8%">下载量</th>
                    <th width="8%">评分</th>
                    <th width="10%">更新时间</th>
                    <th width="16%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $kapp => $vapp) : ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $vapp['app_id'] ?>" class="cklist"/></td>
                            <td><?php echo $vapp['app_id']; ?></td>
                            <td class="alignleft">
                                <a href="<?php if ($vapp['app_type'] != 2) : ?><?php echo build_url('App', 'content', array('app_id' => $vapp['app_id'])); ?><?php endif; ?>">
                                    <?php echo !empty($vapp['app_logo']) ? '<img class="ml10" src="' . $vapp['app_logo'] . '" width="30" height="30">&nbsp;&nbsp;' : ''; ?>
                                    <?php echo $vapp['app_title']; ?>
                                </a>
                            </td>
                            <td><?php echo isset($parents[1][$vapp['last_cate_id']]) ? '软件' : '游戏'; ?></td>
                            <td><?php echo isset($cates[$vapp['last_cate_id']]) ? $cates[$vapp['last_cate_id']] : $vapp['last_cate_id']; ?></td>
                            <td><?php echo $vapp['app_down']; ?></td>
                            <td><?php echo $vapp['app_grade']; ?></td>
                            <td><?php echo date('Y-m-d', $vapp['app_update_time']); ?></td>
                            <td>                           
                                <a class="but2 but2s" href="javascript:void(0);" class="btn2" onClick="cancel_recommended(<?php echo $vapp['app_id']; ?>)">取消推荐</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <input type="hidden" id="area_id" value="<?php echo $area_id;?>">
        </div>

    </div>
    <!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
        
//取消推荐
function cancel_recommended(app_id) {
    $.post(build_url('Recommend', 'cancel_recommended'), {"app_id": app_id,'area_id':$("#area_id").val()}, function (result) {
        if (result.code != 0) {
            show_msg(result.msg, false);
        } else {
            location.reload();
        }
    }, 'json');          
}

//取消推荐选中应用     
function cancel_recommended_all() {
    var size = $('.cklist:checked').size();
    if (size < 1) {
        show_msg('请先选择要取消推荐的应用');
        return false;
    }
    show_msg("您确定要取消推荐这些应用吗？", true, function () {
        $('.cklist:checked').each(function (index) {
            var o = $(this);
            var count = index + 1;
            $(document).queue('ajaxRequest', function () {
                $.post(build_url('Recommend', 'cancel_recommended'), {"app_id": o.val(),'area_id':$("#area_id").val()}, function (result) {
                    if (result.code != 0) {
                        $(document).clearQueue('ajaxRequest');
                        show_msg(result.msg, false, function () {
                            location.reload();
                        });
                        return false;
                    } else {
                        show_msg("正在取消推荐第" + count + "个应用，请稍等...", false, false, false);
                    }
                    $(document).dequeue('ajaxRequest');
                    if (count == size) {
                        location.reload();
                    }
                }, 'json');

            });
        });
        $(document).dequeue('ajaxRequest');
    });
}      
</script>

<?php $this->load->view('/footer.php'); ?>
