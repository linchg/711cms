<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">系统管理</a> » 模板管理 </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10 clearfix">
            <div class="l" style="color:red;">模板文件名称定义：list_开头为分类列表模板；content_开头为内容页模板.请使用FTP修改模板文件内容.</div>
            <div class="r" style="color:red;"></div>
        </div>
        <div class="">
            <table class="tb-2 mt10" border="1" bordercolor="#cee1ee" id="mbody" >
                <tr class="tr-title">
                    <th class="align_left">文件名称</th>
                    <th class="align_left">文件类型</th>
                    <th>修改时间</th>
                </tr>
                <?php if (is_array($files) && sizeof($files) > 0) : ?>
                    <?php foreach ($files as $key => $value) : ?>
                        <tr>
                            <td class="align_left"><?php echo $value['name']; ?></td>
                            <td class="align_left">
                                <?php if (substr($value['name'], 0, 8) == 'content_') : ?>
                                    内容页面
                                <?php elseif (substr($value['name'], 0, 5) == 'list_') : ?>
                                    列表页面
                                <?php elseif (substr($value['name'], 0, 4) == 'inc_') : ?>
                                    通用页面
                                <?php elseif ($value['name'] == 'error.php') : ?>
                                    错误页面
                                <?php elseif ($value['name'] == 'last_update.php') : ?>
                                    更新页面
                                <?php elseif ($value['name'] == 'index.php') : ?>
                                    首页页面
                                <?php elseif ($value['name'] == 'search.php') : ?>
                                    搜索页面
                                <?php else : ?>
                                    其它页面
                                <?php endif; ?>
                            </td>
                            <td><?php echo date('Y-m-d H:i:s', $value['date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<?php $this->load->view('/footer.php'); ?>
