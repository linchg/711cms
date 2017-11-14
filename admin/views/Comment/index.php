<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('frame'); ?>">管理首页</a> »</span> 评论管理</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div>
            <div class="mt10 clearfix">
                <div class="l">
                    <a class="but2" href="javascript:void(0);" onclick="C.form.batch_modify('comment.php?m=del','.ccomment');" >删除选中</a>
                    <a class="but2" href="javascript:void(0);" onclick="C.form.batch_modify('comment.php?m=edit&is_check=1','.ccomment');" />审核选中</a>
                    <a class="but2" href="javascript:void(0);"  onclick="C.form.batch_modify('comment.php?m=edit&is_check=0','.ccomment');" >屏蔽选中</a>
                </div>
                <div class="r r-box">
                    <div class="select-box l">
                        <div class="select-wrap">
                            <select id="search_type" class="search_type">
                                <option value="keys" <?php if(isset($page['get']['search_type'])&&$page['get']['search_type']=='keys'){echo 'selected';} ?>>关键字</option>
                            </select>
                        </div>
                    </div>
                    <div class="l">
                        <input type="text" id="search_txt" class="ipt seachIpt" value="<?php echo isset($page['get']['search_txt'])?$page['get']['search_txt']:''; ?>" onkeyup="if(event.keyCode==13){window.location='?&search_txt='+$('#search_txt').val()+'&search_type='+$('#search_type').val();}"  >&nbsp;
                        <a class="but2 mr0" href="javascript:void(0);" onclick="window.location='?&search_txt='+$('#search_txt').val()+'&search_type='+$('#search_type').val();" >查 询</a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <table class="tb-2 wd" border="1" bordercolor="#cee1ee">
                <form action="?m=save_order" name="form_order" method="post">
                    <tr class="tr-title">
                        <th width="6%"><a href="javascript:void(0);" onclick="C.form.check_all('.ccomment');">全选/反选</a></th>
                        <th width="6%">ID</th>
                        <th width="40%"  class="alignleft"><p class="ml10">评论内容</p></th>
                        <th width="6%">用户</th>
                        <th width="6%">评论类型</th>
                        <th width="9%">评论时间</th>
                        <th width="8%">IP地址</th>
                        <th width="5%">状态</th>
                        <th width="14%">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $value) : ?>
                            <tr>
                                <td><input type="checkbox" class="ccomment" value="<?php echo $value['comment_id']; ?>" /></td>
                                <td><?php echo $value['comment_id']; ?></td>
                                <td class="alignleft wd">
                                    <p class="ml10 wd"><?php echo $value['comment_content']; ?></p>
                                </td>
                                <td><?php echo $value['comment_uname']; ?></td>
                                <td><?php echo $value['comment_type'] == 1 ? '应用' : '文章'; ?></td>
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
            $.post("index.php?c=comment&m=delete", {"comment_id": comment_id}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function comment_update(comment_id, status) {
        $.post("index.php?c=comment&m=update", {"comment_id": comment_id, "status": status}, function(result) {
            if(result.code != 0){
                show_msg(result.msg);
            }else{
                location.reload();
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
