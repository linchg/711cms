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
                <a class="but2" href="<?php echo build_url('Info', 'content'); ?>">添加资讯</a>
                <a href="javascript:void(0);" class="but2" onClick="info_delete_all()">删除选中</a>
                <a href="javascript:void(0);" class="but2" onClick="delete_all()">删除全部</a>
            </div>
            <div class="r r-box">
                <form action="<?php echo build_url("Info"); ?>" method="get" id="infoSearch">
                    <div class="select-box l">
                        <div class="select-wrap">
                            <select id="cate_id" name="last_cate_id" class="search_type">
                                <option value="0">分类选择</option>
                                <?php if (is_array($category) && sizeof($category) > 0) : ?>
                                    <?php foreach ($category as $value) : ?>
                                        <option value="<?php echo $value['cate_id']; ?>" <?php echo $last_cate_id == $value['cate_id'] ? 'selected="selected"' : ''; ?>>
                                            <?php echo $value['cname']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="select-box l">
                        <div class="select-wrap">
                            <select id="search_type" name="search_type" class="search_type">
                                <option value="info_title" <?php echo $search_type == "info_title" ?  "selected" : ""; ?>>应用名称</option>
                                <option value="info_id" <?php echo $search_type == "info_id" ? "selected" : ""; ?>>应用id</option>
                            </select>
                        </div>
                    </div>
                    <div class="l">
                        <input type="text" id="hiddenText"  style="display:none" /> 
                        <input type="text" id="search_txt" name="search_txt" class="ipt seachIpt" value="<?php echo $search_txt ? $search_txt : ''; ?>" onKeyDown="if(event.keyCode==13) info_search();"/>
                        <a href="javascript:void(0);" class="but2 mr0" onclick="info_search();">查 询</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt10 clearfix">
            <table class="tb mt10" border="1" bordercolor="#cee1ee">
                <thead>
                <tr class="tr-title">
                    <th width="5%"><a href="javascript:void(0);" onClick="check_all('.cklist');">全选/反选</a></th>
                    <th width="5">排序</th>
                    <th width="5">ID</th>
                    <th class="alignleft" width="50%"><p class="ml15">标题</p></th>
                    <th width="8%">所属分类</th>
                    <th width="5%">浏览</th>
                    <th width="5%">评论</th>
                    <th width="11%">更新时间</th>
                    <th width="11%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $r) : ?>
                        <tr>
                            <td><input type="checkbox" class="cklist infoff" value="<?php echo $r['info_id']; ?>" /></td>
                            <td><?php echo $r['info_order']; ?></td>
                            <td><?php echo $r['info_id']; ?></td>
                            <td class="alignleft"><a href="<?php echo build_url('Info', 'content', array('info_id' => $r['info_id'])); ?>" class="ml15"><?php echo $r['info_title']; ?></a></td>
                            <td><?php echo isset($cates[$r['last_cate_id']]) ? $cates[$r['last_cate_id']] : $r['last_cate_id']; ?></td>
                            <td><?php echo $r['info_visitors']; ?></td>
                            <td><?php echo $r['info_comments']; ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$r['info_update_time']); ?></td>
                            <td>
                                <a class="but2 but2s" href="<?php echo build_url('Info', 'content', array('info_id' => $r['info_id'])); ?>">编辑</a>
                                <a class="but2 but2s" href="javascript:void(0);" onclick="info_del(<?php echo $r['info_id']; ?>)">删除</a>
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
    function info_del(info_id){
        show_msg("确认删除？", true, function(){
            $.post(build_url('Info', 'delete'), {"info_id": info_id}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function delete_all(){
        show_msg("确定要删除全部文章吗？", true, function(){
            $.post(build_url('Info', 'delete_all'), {}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function info_delete_all() {
        var size = $('.cklist:checked').size();
        if (size < 1) {
            show_msg('请先选择要删除的文章');
            return false;
        }
        show_msg("您确定要删除这些文章吗？", true, function(){
            $.ajaxSetup({async:false});
            $('.cklist:checked').each(function(index){
                var o = $(this);
                var count = index + 1;
                $.post(build_url('Info', 'delete'), {"info_id": o.val()}, function(result) {
                    show_msg("正在删除第"+ count +"篇文章，请稍等...", false, false, false);
                }, 'json');
                if (count == size) {
                    location.reload();
                }
            });
            $.ajaxSetup({async:true});
        });
    }
    function info_search() {
        window.location = $('#infoSearch').attr('action') + '&' + $('#infoSearch').serialize();
    }
</script>

<?php $this->load->view('/footer.php'); ?>
