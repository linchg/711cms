<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body"> 
    <!-- 当前位置开始 -->
   <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 分类列表</div><!-- 当前位置结束 -->
    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="main mhead clearfix">
            <div class="mt10" style="height:28px; margin-bottom:10px;">
                <div class="l">
                    <a href="<?php echo build_url('InfoCategory', 'content'); ?>" class="but2">添加分类</a>
                </div>
            </div>
        </div>
        <div class="mt10 clearfix">
            <form action="?m=save_corder" name="form_corder" method="post">
                <table class="tb tbs" id='list' border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th align='center' width="10%">排序</th>
                        <th align='center' width="10%">分类ID</th>
                        <th align='center' width="10%">分类类型</th>
                        <th align='center' width="30%">分类名称</th>
                        <th align='center' width="10%">字母别名</th>
                        <th align='center' width="10%">是否显示</th>
                        <th width="20">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $value) : ?>
                            <tr>
                                <td><?php echo $value['corder']; ?></td>
                                <td><?php echo $value['cate_id']; ?></td>
                                <td><?php echo isset($types[$value['parent_id']]) ? $types[$value['parent_id']] : $value['parent']; ?></td>
                                <td><a href="<?php echo build_url('InfoCategory', 'content', array('cate_id' => $value['cate_id'])); ?>"><?php echo $value['cname']; ?></a></td>
                                <td><?php echo $value['cname_py']; ?></td>
                                <td><?php echo $value['cat_show'] == 1 ? '显示' : '不显示'; ?></td>
                                <td>
                                    <a class="but2 but2s" href="<?php echo build_url('InfoCategory', 'content', array('cate_id' => $value['cate_id'])); ?>" class="btn2">修改</a>
                                    <a class="but2 but2s" href="javascript:void(0);" onclick="category_del(<?php echo $value['cate_id']; ?>)" class="btn2">删除</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </form>
        </div>
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function category_del(cate_id){
        show_msg("只有分类下面没有应用才能被删除，确认吗？", true, function(){
            $.post(build_url('InfoCategory', 'delete'), {"cate_id": cate_id}, function(result) {
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
