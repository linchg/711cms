<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 广告管理</div>
    <!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="mt10 clearfix">
            <div class="l">
                <a href="<?php echo build_url('Advert', 'content'); ?>" class="but2">添加广告</a>
            </div>
            <div class="r r-box">

            </div>
        </div>

        <div>
            <form action="" name="form_order" method="post">
                <table class="tb mt10" border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th width="5%">广告ID</th>
                        <th width="15%">广告标题</th>
                        <th width="10%">广告类型</th>
                        <th width="30%">广告备注</th>
                        <th width="15%">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $kn => $vn) : ?>
                            <tr>
                                <td><?php echo $vn['ad_id']; ?></td>
                                <td>
                                    <a href="<?php echo build_url('Advert', 'content', array('ad_id' => $vn['ad_id'])); ?>"><?php echo $vn['ad_title']; ?></a>
                                </td>
                                <td><?php echo isset($types[$vn['ad_type']]) ? $types[$vn['ad_type']] : $vn['ad_type']; ?></td>
                                <td><?php echo $vn['ad_remarks']; ?></td>
                                <td>
                                    <a class="but2 but2s"
                                       href="<?php echo build_url('Advert', 'content', array('ad_id' => $vn['ad_id'])); ?>">修改</a>
                                    <?php if ($vn['ad_id'] > 32): ?>
                                        <a class="but2 but2s" href="javascript:void(0);"
                                           onclick="advert_del(<?php echo $vn['ad_id']; ?>);">删除</a>
                                    <?php endif; ?>
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

    </div>
    <!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function advert_del(ad_id) {
        show_msg("如果删除，在用的广告就不会在网站上显示，确认删除？", true, function () {
            $.post(build_url('Advert', 'del'), {"ad_id": ad_id}, function (result) {
                if (result.code != 0) {
                    alert(result.msg);
                } else {
                    location.reload();
                }
            }, 'json');
        });
    }
</script>

<?php $this->load->view('/footer.php'); ?>
