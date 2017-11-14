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
                <a class="but2" href="<?php echo build_url('Import'); ?>">查看全部</a>
            </div>
            <div class="l r-box" style="margin-left: 8px;">
                <div class="l" style="font-size: 14px; line-height: 36px;" >一键入库：</div>
                <div class="select-box l">
                    <div class="select-wrap">
                        <select id="cate_id_add" name="last_cate_id_add" class="search_type">
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
                <div class="l">
                    <a href="javascript:void(0);" onClick="import_add_all()" class="but2">确定</a>
                </div>
            </div>
            <div class="r r-box">
                <form action="<?php echo build_url("Import"); ?>" method="get" id="importSearch">
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
                        <input type="text" id="search_txt" name="search_txt" class="ipt seachIpt" value="<?php echo $search_txt ? $search_txt : ''; ?>" onKeyDown="if(event.keyCode==13) import_search();"/>
                        <a href="javascript:void(0);" class="but2 mr0" onclick="import_search();">查 询</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt10 clearfix">
            <table class="tb mt10" border="1" bordercolor="#cee1ee">
                <thead>
                <tr class="tr-title">
                    <th width="3%"><a href="javascript:void(0);" onClick="check_all('.cklist');">全选/反选</a></th>
                    <th width="3%">ID</th>
                    <th width="24%">标题</th>
                    <th width="5%">栏目分类</th>
                    <th width="9%">采集规则</th>
                    <th width="10%">采集网站</th>
                    <th width="5%">原文地址</th>
                    <th width="10%">更新时间</th>
                    <th width="10%">采集时间</th>
                    <th width="18%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                    <?php foreach ($list as $r) : ?>
                        <tr>
                            <td><input type="checkbox" class="cklist infoff" value="<?php echo $r['info_id']; ?>" data-title="<?php echo $r['info_title']; ?>" /></td>
                            <td><?php echo $r['info_id']; ?></td>
                            <td class="alignleft"><a href="<?php echo build_url('Import', 'content', array('info_id' => $r['info_id'])); ?>" class="ml15"><?php echo $r['info_title']; ?></a></td>
                            <td><?php echo isset($cates[$r['last_cate_id']]) ? $cates[$r['last_cate_id']]               : $r['last_cate_id']; ?></td>
                            <td><?php echo isset($gather[$r['gather_id']])   ? $gather[$r['gather_id']]['gather_name']  : ''; ?></td>
                            <td><?php echo isset($gather[$r['gather_id']])   ? $gather[$r['gather_id']]['gather_site']  : ''; ?></td>
                            <td><a href="<?php echo $r['gather_url']; ?>" target="_blank">查看</a></td>
                            <td><?php echo date('Y-m-d H:i:s',$r['info_update_time']); ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$r['create_time']); ?></td>
                            <td>
                                <a class="but2 btn-s-4" href="javascript:;" onclick="import_info(<?php echo $r['info_id']; ?>)">一键入库</a>
                                <a class="but2 but2s" href="<?php echo build_url('Import', 'content', array('info_id' => $r['info_id'])); ?>">编辑</a>
                                <a class="but2 but2s" href="javascript:;" onclick="import_del(<?php echo $r['info_id']; ?>)">删除</a>
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
    function import_add_all() {
        var last_cate_id = $("#cate_id_add").val();
        if (last_cate_id == 0) {
            show_msg('请选择资讯分类!');
            return false;
        }
        var size = $('.cklist:checked').size();
        if(size < 1 ){
            $('.cklist').attr('checked', 'checked');
            var size = $('.cklist:checked').size();
        }
        if (size < 1) {
            show_msg('本页没有要入库的资讯。');
            return false;
        }
        show_msg("您确认要入库本页所有选中的资讯吗？这可能需要一些时间。", true, function(){
            $('.cklist:checked').each(function(index){
                var o = $(this);
                var count = index + 1;
                $(document).queue('ajaxRequest', function() {
                    $.post(build_url('Import', 'import_info2'), {"info_id": o.val(),"info_title": o.attr('data-title'),"last_cate_id":$("#cate_id_add").val()}, function(result) {
                        if(result.code != 0){
                            $(document).clearQueue('ajaxRequest');
                            show_msg(result.msg, false, function(){
                                location.reload();
                            });
                            return false;
                        }else{
                            show_msg("正在入库第"+ count +"个资讯，请稍等...", false, false, false);
                        }
                        $(document).dequeue('ajaxRequest');

                        if (count == size) {
                            location.reload();
                        }
                    }, 'json');

                });
            });
            $(document).dequeue('ajaxRequest');
        });
    }

    function import_del(info_id) {
        show_msg("确认删除？", true, function(){
            $.post(build_url('Import', 'import_del'), {"info_id": info_id}, function(result) {
                if(result.code != 0){
                    alert(result.msg);
                }else{
                    location.reload();
                }
            }, 'json');
        });
    }

    function import_info(info_id) {
        $.post(build_url('Import', 'import_info'), {"info_id": info_id}, function(result) {
            if(result.code != 0){
                alert(result.msg);
            }else{
                alert(result.msg);
                location.reload();
            }
        }, 'json');

    }
    function import_search() {
        window.location = $('#importSearch').attr('action') + '&' + $('#importSearch').serialize();
    }
</script>

<?php $this->load->view('/footer.php'); ?>
