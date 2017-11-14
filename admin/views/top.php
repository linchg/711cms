<!-- 顶部开始 -->
<div class="header-wrapper">
    <div class="header">
        <div class="logo">
            <a href="<?php echo build_url('frame'); ?>" class="cms"></a>
        </div>
        <div class="l version"></div>
        <div class="top-nav">
            <b class="user">欢迎您, <?php echo $_username; ?></b>
            <span>|</span>
            <a href="<?php echo $_site['site_path']; ?>" target="_blank">网站首页</a>
            <span>|</span>
            <a href="https://www.711cms.com" target="_blank"><span>711CMS官网</span></a>
            <span>|</span>
            <a href="<?php echo build_url('Admin', 'content', array('uid' => $_uid)); ?>">修改密码</a>
            <span>|</span>
            <a href="<?php echo build_url('Index', 'logout'); ?>">注销</a>
        </div>
    </div>
</div>
<!-- 顶部结束 -->
<div class="container">
