<?php include_once('header.php');?>

<div class="warp-content"> <!-- 主体内容 开始 -->
    <div class="finish-info">
        <p class="line-t-10"></p>
        <?php if ($is_right != 1) : ?>
            <div class="finish">
                <br />
                <br />
                <br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	安装711CMS 失败
                <br />
                <br />
                <br />
                <a>向开发团队获取帮助</a>
                <br />
                <br />
                <br />
            </div>
        <?php else : ?>
            <div class="finish">
                <br />
                <div class="pay-box" style="text-align:center">
                    <br />
                	<strong style="text-indent:0 ">恭喜您已经成功安装 711CMS <?php echo VERSION_711CMS; ?> !</strong>
                    <br />
                    <br />
                    <br />
                    <img src="/static/install/images/pay.gif" style="margin:0 0 10px;"/>
                    <p style="text-align:center;text-indent: 0">如果711cms对您有帮助，<span style="color:#ea6000">就用支付宝扫描二维码打赏小的吧</span>，让我们快速的成长!</p>
                </div>
                <br />
                <br />
                <a href="/<?php echo $admin_file; ?>" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理首页</a>&nbsp;&nbsp;
                <a href="/" target="_blank">网站首页</a>
                <br />
                <br />
                <br />
                <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;建议重命名根目录下的&nbsp;&nbsp;install.php&nbsp; 文件</a>
                <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;建议重命名根目录下的&nbsp;&nbsp;admin.php&nbsp; 文件</a>
            </div>
        <?php endif; ?>
    </div>
</div> <!-- 主体内容 结束 -->

<?php include_once('header.php');?>
