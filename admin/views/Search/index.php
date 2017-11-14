<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body">
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 关键字管理  </div><!-- 当前位置结束 -->

    <!-- 右侧主体内容开始 -->
    <div class="mbody">
        <div class="mt10" style="height:92px;">
            <div class="l">
                <a class="but2" href="<?php echo build_url('Search', 'content'); ?>">添加关键字</a>
            </div>
            <div class="r">
                <form action="<?php echo build_url("Search"); ?>" method="get" id="keywordSearch">
                    <div class="l">

                    </div>
                    <div class="l">
                        搜索关键字：
                        <input type="text" id="hiddenText"  style="display:none" />
                        <input type="text" id="search_txt" name="search_txt" class="ipt seachIpt" value="<?php echo $search_txt ? $search_txt : ''; ?>" onKeyDown="if(event.keyCode==13) keyword_search();" />
                        <a href="javascript:void(0);" class="but2 mr0" onclick="keyword_search();">查 询</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt10">
            <table class="tb" border="1" bordercolor="#cee1ee">
                <tr class="tr-title">
                    <th width="5%"><a href="javascript:void(0);" onClick="check_all('.cklist');">全选/反选</a></th>
                    <th align='center' width="5%">排序</th>
                    <th align='center' width="5%">ID</th>
                    <th align='center' width="45%">关键字</th>
                    <th align="center" width="15%">搜索次数</th>
                    <th width="15%">操作</th>
                </tr>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $value) : ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="cklist infoff" value="<?php echo $value['q_id']; ?>" />
                            </td>
                            <td>
                                <?php echo $value['qorder']; ?>
                            </td>
                            <td><?php echo $value['q_id']; ?></td>
                            <td>
                                <a href="<?php echo build_url('Search', 'content', array('q_id' => $value['q_id'])); ?>">
                                    <?php echo $value['q']; ?>
                                </a>
                            </td>
                            <td><?php echo $value['qnum']; ?></td>
                            <td align="center" width="100">
                                <a class="but2 but2s" href="<?php echo build_url('Search', 'content', array('q_id' => $value['q_id'])); ?>">编辑</a>
                                <a class="but2 but2s" href="javascript:void(0);"  onClick="keyword_del(<?php echo $value['q_id']; ?>);" >删除</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <div class="pagebar clearfix">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function keyword_del(q_id){
        show_msg("确认要删除吗？", true, function(){
            $.post(build_url('Search', 'delete'), {"q_id": q_id}, function(result) {
                if(result.code != 0){
                    alert(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }
    function keyword_search() {
        window.location = $('#keywordSearch').attr('action') + '&' + $('#keywordSearch').serialize();
    }
</script>

<?php $this->load->view('/footer.php'); ?>
