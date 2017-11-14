<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 资讯列表  </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">

        <div class="mt10 clearfix">
            <div class="l">
                <a class="but2" href="<?php echo build_url('Gather', 'content'); ?>">添加采集规则</a>
            </div>
            <div class="r r-box">
            </div>
        </div>

        <div class="mt10 clearfix">
            <table class="tb mt10" border="1" bordercolor="#cee1ee">
                <thead>
                <tr class="tr-title">
                    <th width="3">ID</th>
                    <th width="6%">采集名称</th>
                    <th width="6%">栏目分类</th>
                    <th width="15%">采集网站域名</th>
                    <th width="10%">文章列表标签</th>
                    <th width="10%">文章链接标签</th>
                    <th width="10%">文章标题标签</th>
                    <th width="15%">内容标签</th>
                    <th width="10%">更新时间</th>
                    <th width="15%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $value) : ?>
                        <tr>
                            <td><?php echo $value['gather_id']; ?></td>
                            <td><a href="<?php echo build_url('Gather', 'content', array('gather_id' => $value['gather_id'])); ?>"><?php echo $value['gather_name']; ?></a></td>
                            <td><?php echo isset($cates[$value['cate_id']]) ? $cates[$value['cate_id']] : $value['cate_id']; ?></td>
                            <td><?php echo $value['gather_site']; ?></td>
                           
                            <td><?php echo $value['gather_list_sign']; ?></td>
                            <td><?php echo $value['gather_list_link']; ?></td>
                            <td><?php echo $value['gather_title_sign']; ?></td>
                            <td><?php echo $value['gather_content_sign']; ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$value['gather_time']); ?></td>
                            <td>
                                <a class="but2 btn-s-4" href="<?php echo build_url('Gather', 'doGather', array('gather_id' => $value['gather_id'])); ?>">启动</a>
                                <a class="but2 but2s" href="<?php echo build_url('Gather', 'content', array('gather_id' => $value['gather_id'])); ?>">编辑</a>
                                <a class="but2 but2s" href="javascript:void(0);" onclick="gather_del(<?php echo $value['gather_id']; ?>)">删除</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <div class="pagebar clearfix">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function gather_del(gather_id){
        show_msg("确认删除？", true, function(){
            $.post(build_url('Gather', 'delete'), {"gather_id": gather_id}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
</script>

<?php $this->load->view('/footer.php'); ?>
