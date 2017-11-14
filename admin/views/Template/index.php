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
            <div class="l" style="color:red;">添加新的模板时，请FTP手工上传模板目录到templates目录下，PC端模板目录名以template_开头，手机模板目录名以mobile_开头。</div>
            <div class="r" style="color:red;"></div>
        </div>
        <div class="">
            <table class="tb-2 mt10" border="1" bordercolor="#cee1ee" id="mbody" >
                <tr class="tr-title">
                    <th class="align_left">模板名称</th>
                    <th class="align_left">模板类型</th>
                    <th>修改时间</th>
                    <th width="140">操作</th>
                </tr>
                <?php if (is_array($templates) && sizeof($templates) > 0) : ?>
                    <?php foreach ($templates as $key => $value) : ?>
                        <tr>
                            <td class="align_left"><a href="<?php echo build_url('Template', 'content', array('template' => $value['name'])); ?>"><?php echo $value['name']; ?></a></td>
                            <td class="align_left">
                                <?php if (substr($value['name'], 0, 7) == 'mobile_') : ?>
                                    手机模板
                                <?php elseif (substr($value['name'], 0, 9) == 'template_') : ?>
                                    PC端模板
                                <?php else : ?>
                                    其它模板
                                <?php endif; ?>
                            </td>
                            <td><?php echo date('Y-m-d H:i:s', $value['date']); ?></td>
                            <td><a class="but2 but2s" href="<?php echo build_url('Template', 'content', array('template' => $value['name'])); ?>" >查看模板文件</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<?php $this->load->view('/footer.php'); ?>
