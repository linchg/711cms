<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 推荐位管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10 clearfix">
            <div class="l">
                <a href="<?php echo build_url('Recommend', 'content'); ?>" class="but2">添加推荐</a>
            </div>
            <div  class="l r-box" style="margin-left: 5px;">
                <div class="select-box l">
                    <div class="select-wrap">
                        <select id="manager_id" name="parent_id" class="search_type">
                            <option value="0">推荐类型</option>
                            <option value="1" <?php echo $type == 1? 'selected = "selected"': ''; ?>>网站推荐</option>
                            <option value="2" <?php echo $type == 2? 'selected = "selected"': ''; ?>>手助推荐</option>
                            <option value="3" <?php echo $type == 3? 'selected = "selected"': ''; ?>>WAP推荐</option>
                        </select>
                    </div>
                </div>
                <a href="javascript:void(0);" class="but2 mr0" id="search_apply" onclick="recommend_search();">查 询</a>
            </div>
        </div>
        <div>
            <form action="" name="form_order" method="post">
                <table class="tb mt10" border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th width="5%">ID</th>
                        <th width="10%">标题</th>
                        <th width="10%">类型</th>
                        <th width="20%">备注</th>
                        <th width="5%">应用数量</th>
                        <th width="10%">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $kn => $vn) : ?>
                            <tr>
                                <td><?php echo $vn['area_id']; ?></td>
                                <td><a href="<?php echo build_url('Recommend', 'content', array('area_id' => $vn['area_id'])); ?>"><?php echo $vn['area_title']; ?></a></td>
                                <td>
                                    <?php if($vn['area_type'] == 1):?>
                                        <?php echo '网站推荐位'; ?>
                                    <?php elseif($vn['area_type'] == 2):?>
                                        <?php echo '手助推荐位'; ?>
                                    <?php else:?>
                                        <?php echo 'wap推荐位'; ?>
                                    <?php endif;?>
                                </td>
                                <td><?php echo $vn['area_remarks']; ?></td>
                                <td>
                                    <?php if ($vn['operate_type'] == 2) : ?>
                                        自动获取
                                    <?php else:?>
                                        <?php echo $vn['num']; ?>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <a class="but2 but2s" href="<?php echo build_url('Recommend', 'content', array('area_id' => $vn['area_id'])); ?>">修改</a>
                                    <?php if ($vn['area_id'] > 69) : ?>
                                        <a class="but2 but2s" href="javascript:;" onclick="recommend_del(<?php echo $vn['area_id']; ?>)">删除</a>
                                    <?php endif; ?>
                                    
                                    <?php if ($vn['operate_type'] == 1) : ?>
                                        <a class="but2 but2s" href="<?php echo build_url('Recommend', 'recommended_app_list', array('area_id' => $vn['area_id'])); ?>">应用</a>  
                                    <?php else:?>
                                        <a class="btn2 but2s" style="background:#D8D8D8;color:#666" href="javascript:;">应用</a>  
                                    <?php endif;?>
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
    function recommend_del(area_id){
        show_msg("确认删除当前推荐位吗？", true, function(){
            $.post(build_url('Recommend', 'delete'), {"area_id": area_id}, function(result) {
                if(result.code != 0){
                    alert(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function recommend_search(){
        window.location = "<?php echo build_url("Recommend", "main");?>" + '&type=' + $('#manager_id').val()

    }
</script>

<?php $this->load->view('/footer.php'); ?>
