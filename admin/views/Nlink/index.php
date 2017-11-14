<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">系统管理</a> » 正文内链</div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10 clearfix">
            <div class="l">
                <a href="<?php echo build_url('Nlink', 'content'); ?>" class="but2">添加正文内链</a>
            </div>
            <div class="r r-box">
                <form action="<?php echo build_url("Nlink"); ?>" method="get" id="nlinkSearch">
                    <div class="select-box l">
                        <div class="select-wrap">
                            <select id="search_type" name="search_type" class="search_type">
                                <option value="nlink_txt" <?php echo $search_type == "nlink_txt" ?  "selected" : ""; ?>>内链关键词</option>
                                <option value="nlink_url" <?php echo $search_type == "nlink_url" ?  "selected" : ""; ?>>链接地址</option>
                            </select>
                        </div>
                    </div>
                    <div class="l">
                        <input type="text" id="hiddenText"  style="display:none" />
                        <input type="text" id="search_txt" name="search_txt" class="ipt seachIpt" value="<?php echo $search_txt ? $search_txt : ''; ?>" onKeyDown="if(event.keyCode==13) nlink_search();"/>
                        <a href="javascript:void(0);" class="but2 mr0" onclick="nlink_search();">查 询</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- 列表开始 -->
        <div>
            <form action="" name="form_order" method="post">
                <table class="tb mt10" border="1" bordercolor="#cee1ee">
                    <tr class="tr-title">
                        <th width="80"><a href="javascript:void(0);" onclick="check_all('.cklist');">全选/反选</a></th>
                        <th align='center' width="200" >内链关键词</th>
                        <th align='center'>链接地址</th>
                        <th width="120">操作</th>
                    </tr>
                    <?php if (is_array($list) && sizeof($list) > 0) : ?>
                        <?php foreach ($list as $value) : ?>
                            <tr>
                                <td><input type="checkbox" class="cklist" value="<?php echo $value['nlink_id']; ?>" /></td>
                                <td><a href="<?php echo build_url('Template', 'content', array('template' => $_site['template'])); ?>"><?php echo $value['nlink_txt']; ?></a></td>
                                <td><a href="<?php echo $value['nlink_url']; ?>" target="_blank"><?php echo $value['nlink_url']; ?><a></td>
                                <td>
                                    <a class="but2 but2s" href="<?php echo build_url('Nlink', 'content', array('nlink_id' => $value['nlink_id'])); ?>">修改</a>
                                    <a class="but2 but2s" href="javascript:;" onclick="nlink_del(<?php echo $value['nlink_id'] ?>)">删除</a>
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
        <!-- 列表结束 -->
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function nlink_del(nlink_id){
        show_msg("确认删除？", true, function(){
            $.post(build_url('Nlink', 'delete'), {"nlink_id": nlink_id}, function(result) {
                if(result.code != 0){
                    show_msg(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function nlink_search() {
        window.location = $('#nlinkSearch').attr('action') + '&' + $('#nlinkSearch').serialize();
    }
</script>

<?php $this->load->view('/footer.php'); ?>
