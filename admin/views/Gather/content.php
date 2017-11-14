<?php $this->load->view('/header.php'); ?>

<?php $this->load->view('/top.php'); ?>

<?php $this->load->view('/menu.php'); ?>

<!-- 右侧区域开始 -->
<div class="right_body"> 
    <!-- 当前位置开始 -->
    <div class="snav">您的位置：<a href="<?php echo build_url('Frame'); ?>">管理首页</a> » 文章正文  </div><!-- 当前位置结束 -->
    
    <!-- 右侧主体内容开始 -->
    <div class="mbody">

           <h2 style="padding:0 0 10px; font-size:16px; color:#333">文章正文</h2>

        <div class="mt10">
            <form action="<?php echo build_url('Gather', 'save', array('gather_id' => !empty($info['gather_id']) ? $info['gather_id'] : 0)); ?>" method="post" id="gatherForm">
                <table class="tb-2" border="1" bordercolor="#cee1ee">
                    <tr>
                        <td width="150" class="td-bg">采集名称：</td>
                        <td  colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_name" name="gather_name" value="<?php echo isset($info['gather_name']) ? $info['gather_name'] : ''; ?>" />
                            &nbsp;&nbsp;* 必填，采集的唯一标记名称
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">采集网站域名：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_site" name="gather_site"  value="<?php echo isset($info['gather_site']) ? $info['gather_site'] : ''; ?>" />
                            &nbsp;&nbsp;如：要采集网站的域名
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">栏目分类：</td>
                        <td colspan="3" class="alignleft">
                            <select id="cate_id" class="ml15" name="cate_id">
                                <?php foreach ($category as $c) : ?>
                                    <option value="<?php echo $c['cate_id']; ?>" <?php echo isset($info['cate_id']) && $info['cate_id'] == $c['cate_id'] ? 'selected="selected"' : ''; ?>>
                                        <?php echo $c['cname']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select> &nbsp;&nbsp;* 必填
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">页面编码：</td>
                        <td colspan="3" class="alignleft">
                            <select id="gather_charset" class="ml15" name="gather_charset">
                                <option value="UTF-8" <?php echo isset($info['gather_charset']) && $info['gather_charset'] == 'UTF-8' ? 'selected="selected"' : ''; ?>>UTF-8</option>
                                <option value="GB2312" <?php echo isset($info['gather_charset']) && $info['gather_charset'] == 'GB2312' ? 'selected="selected"' : ''; ?>>GB2312</option>
                                <option value="GBK" <?php echo isset($info['gather_charset']) && $info['gather_charset'] == 'GBK' ? 'selected="selected"' : ''; ?>>GBK</option>
                                <option value="BIG5" <?php echo isset($info['gather_charset']) && $info['gather_charset'] == 'BIG5' ? 'selected="selected"' : ''; ?>>BIG5</option>
                            </select> &nbsp;&nbsp;* 必填
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">图片本地化：</td>
                        <td colspan="3" class="alignleft">
                            <select id="gather_is_loccal" class="ml15" name="gather_is_local">
                                <option value="1" <?php echo isset($info['gather_is_local']) && $info['gather_is_local'] == 1 ? 'selected="selected"' : ''; ?>>是</option>
                                <option value="2" <?php echo isset($info['gather_is_local']) && $info['gather_is_local'] == 2 ? 'selected="selected"' : ''; ?>>否</option>
                            </select> &nbsp;&nbsp;* 必填
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">列表首页地址：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_index_url" name="gather_index_url" value="<?php echo isset($info['gather_index_url']) ? $info['gather_index_url'] : ''; ?>" />
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">采集列表地址：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_list_url" name="gather_list_url" value="<?php echo isset($info['gather_list_url']) ? $info['gather_list_url'] : ''; ?>" />
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">采集开始页码：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_page_start" name="gather_page_start" value="<?php echo isset($info['gather_page_start']) ? $info['gather_page_start'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="150" class="td-bg">采集结束页码：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_page_end" name="gather_page_end" value="<?php echo isset($info['gather_page_end']) ? $info['gather_page_end'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">文章列表标签：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_list_sign" name="gather_list_sign"  value="<?php echo isset($info['gather_list_sign']) ? $info['gather_list_sign'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">文章列表链接：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_list_link" name="gather_list_link"  value="<?php echo isset($info['gather_list_link']) ? $info['gather_list_link'] : ''; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">文章标题标签：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_title_sign" name="gather_title_sign" value="<?php echo isset($info['gather_title_sign']) ? $info['gather_title_sign'] : ''; ?>" />
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="td-bg">文章内容标签：</td>
                        <td colspan="3" class="alignleft">
                            <input type="text" class="ipt ml15" id="gather_content_sign" name="gather_content_sign" value="<?php echo isset($info['gather_content_sign']) ? $info['gather_content_sign'] : ''; ?>" />
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </form>
            <div class="mt15 tc">
                <a href="javascript:void(0);" class="but2" onclick="save_gather();">确 定</a>
            </div>
        </div>

    </div><!-- 右侧主体内容结束 -->

    <?php $this->load->view('/right.php'); ?>

</div><!-- 右侧区域结束 -->

<script>
    function save_gather()
    {
        $.post($('#gatherForm').attr('action'), $('#gatherForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("Gather"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
