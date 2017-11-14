<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> »</span> 评论管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div>
            <div class="mt10 clearfix">
                <div class="l">
                    <a class="but2" href="javascript:void(0);" onclick="comment_delete_all()" >删除选中</a>
                    <a class="but2" href="javascript:void(0);" onclick="comment_update_all(1)" />审核选中</a>
                    <a class="but2" href="javascript:void(0);" onclick="comment_update_all(2)" >屏蔽选中</a>
                </div>
                <div class="r r-box">

                </div>
            </div>
        </div>

        <div>
            <table class="tb-2 wd" border="1" bordercolor="#cee1ee">
                <form action="?m=save_order" name="form_order" method="post">
                    <tr class="tr-title">
                        <th width="6%"><a href="javascript:void(0);" onclick="check_all('.cklist');">全选/反选</a></th>
                        <th width="3%">ID</th>
                        <th width="6%">应用ID</th>
                        <th width="40%"  class="alignleft"><p class="ml10">评论内容</p></th>
                        <th width="6%">用户</th>
                        <th width="9%">评论时间</th>
                        <th width="8%">IP地址</th>
                        <th width="5%">状态</th>
                        <th width="14%">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $value) : ?>
                            <tr>
                                <td><input type="checkbox" class="cklist" value="<?php echo $value['comment_id']; ?>" /></td>
                                <td><?php echo $value['comment_id']; ?></td>
                                <td><?php echo $value['info_app_id']; ?></td>
                                <td class="alignleft wd">
                                    <p class="ml10 wd"><?php echo $value['comment_content']; ?></p>
                                </td>
                                <td><?php echo $value['comment_uname']; ?></td>
                                <td><?php echo date('Y-m-d H:i:s', $value['comment_date']); ?></td>
                                <td><?php echo $value['comment_ip']; ?></td>
                                <td><?php echo isset($status[$value['comment_check']]) ? $status[$value['comment_check']] : $value['comment_check']; ?></td>
                                <td>
                                    <?php if($value['comment_check'] == 1) : ?>
                                        <a class="but2 but2s" href="javascript:void(0);" onclick="comment_update(<?php echo $value['comment_id'];?>, 2);">屏蔽</a>
                                    <?php else : ?>
                                        <a class="but2 btn-s-4" href="javascript:void(0);" onclick="comment_update(<?php echo $value['comment_id'];?>, 1);">通过</a>
                                    <?php endif; ?>
                                    <a class="but2 but2s" href="javascript:void(0);" onclick="comment_del(<?php echo $value['comment_id']; ?>);">删除</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                </form>
            </table>
            <div class="pagebar">
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function comment_del(comment_id){
        show_msg("确认删除？", true, function(){
            $.post(build_url('AppComment', 'delete'), {"comment_id": comment_id}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
   function comment_delete_all() {
        var size = $('.cklist:checked').size();
        if (size < 1) {
            show_msg('请选择要删除的评论');
            return false;
        }
        show_msg("您确定要删除这些评论吗？", true, function(){
            $.ajaxSetup({async:false});
            $('.cklist:checked').each(function(index){
                var o = $(this);
                var count = index + 1;
                $.post(build_url('AppComment', 'delete'), {"comment_id": o.val()}, function(result) {
                    show_msg("正在删除第"+ count +"条评论，请稍等...", false, false, false);
                }, 'json');
                if (count == size) {
                    location.reload();
                }
            });
            $.ajaxSetup({async:true});
        });
    }
    function comment_update(comment_id, status) {
        $.post(build_url('AppComment', 'update'), {"comment_id": comment_id, "status": status}, function(result) {
            if(result.code != 0){
                show_msg(result.msg);
            }else{
                location.reload();
            }
        }, 'json');
    }
    function comment_update_all(status){
        var size = $('.cklist:checked').size();
        if (size < 1&&status==1) {
            show_msg('请选择要审核的评论');
            return false;
        }
        if (size < 1&&status==2) {
            show_msg('请选择要屏蔽的评论');
            return false;
        }
        show_msg("您确定要更改这些评论的当前状态吗？", true, function(){
            $.ajaxSetup({async:false});
            $('.cklist:checked').each(function(index){
                var o = $(this);
                var count = index + 1;
                $.post(build_url('AppComment', 'update'), {"comment_id": o.val(),"status": status}, function(result) {
                    show_msg("正在更改第"+ count +"条评论，请稍等...", false, false, false);
                }, 'json');
                if (count == size) {
                    location.reload();
                }
            });
            $.ajaxSetup({async:true});
        });
    }
</script>

<?php $this->load->view('/footer.php'); ?>
