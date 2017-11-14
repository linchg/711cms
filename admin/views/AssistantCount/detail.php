<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<div class="right_body">

    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 手助统计</div><!-- 当前位置结束 -->
    
    <!-- 右侧主体内容开始 -->
    <div class="mbody ly-mbody">
        <div class="ly-thead">
            <ul>
                <li>开始日期：<input type="text" id="start"  value="<?php echo isset($start) ? $start : date('Y-'.$month.'-01'); ?>" placeholder=""
                                onclick="laydate({istime:true, format: 'YYYY-MM-DD'})"></li>
                <li>结束日期：<input type="text" id="end"  value="<?php echo isset($end) ? $end : date('Y-'.($month+1).'-01'); ?>" placeholder=""
                                onclick="laydate({istime:true, format: 'YYYY-MM-DD'})"></li>
                              <input type="hidden" id="id" value="<?php echo $id;?>"/>
                <li class="li-btn">
                    <a href="javascript:void(0);" onclick="search_list()" ><button class="blue-btn">查询</button></a>
                </li>
            </ul>
            <!-- 清除浮动 -->
            <DIV><SPAN class="clear clearfix"></SPAN></DIV>
            <table border="1" class="ly-table">
                <tr>
                    <th>应用名称</th>
                    <th>应用安装量</th>
                    <th>应用激活量</th>
                </tr>
                <?php if (is_array($list) && sizeof($list) > 0) : ?>
                <!--
                    <?php foreach ($list as $k =>$v) : ?>
                <tr>
                    <td><?php if(isset($v['app_title'])) : ?><?php echo $v['app_title'];?><?php else : ?>?<?php endif; ?></td>
                    <td><?php if(isset($v['as_count'])) : ?><?php echo $v['as_count'];?><?php else : ?>0<?php endif; ?></td>
                    <td><?php if(isset($v['ac_count'])) : ?><?php echo $v['ac_count'];?><?php else : ?>0<?php endif; ?></td>
                </tr>
                    <?php endforeach; ?>-->
                    <?php for($i;$i<=$limit;$i++) : ?>
                <tr>
                    <td><?php if(isset($list[$i]['app_title'])) : ?><?php echo $list[$i]['app_title'];?><?php else : ?>?<?php endif; ?></td>
                    <td><?php if(isset($list[$i]['as_count'])) : ?><?php echo $list[$i]['as_count'];?><?php else : ?>0<?php endif; ?></td>
                    <td><?php if(isset($list[$i]['ac_count'])) : ?><?php echo $list[$i]['ac_count'];?><?php else : ?>0<?php endif; ?></td>
                </tr>
                    <?php endfor; ?>
                <?php endif; ?>         
            </table>
            <!--分页码-->
            <div class="pagebar clearfix" style="margin-left:320px;margin-top:20px">
                <ul class="pagination">
                    <li class="paginate_button active"><a href="javascript:void(0);" onclick="update_page(1)">首页</a></li>
                    <li class="paginate_button previous active"><a href="javascript:void(0);" onclick="update_page(<?php if($page>2) : ?><?php echo ($page-1);?><?php else : ?>1<?php endif; ?>)">上一页</a></li>
                    <li class="paginate_button next active"><a href="javascript:void(0);" onclick="update_page(<?php if($page>=$total) : ?><?php echo $total;?><?php else : ?><?php echo $page+1;?><?php endif; ?>)">下一页</a></li>
                    <li class="paginate_button active"><a href="javascript:void(0);" onclick="update_page(<?php echo $total;?>)">末页</a></li>
                </ul>        
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<?php $this->load->view('/footer.php'); ?>
<script>
function search_list(){
    window.location="<?php echo build_url("AssistantCount", "detail");?>" + '&start=' + $('#start').val() + '&end=' + $('#end').val()+ '&id=' + $('#id').val();
}
function update_page($page){
    window.location="<?php echo build_url("AssistantCount", "detail");?>" + '&start=' + $('#start').val() + '&end=' + $('#end').val()+ '&id=' + $('#id').val()+ '&page=' + $page;
}
</script>
