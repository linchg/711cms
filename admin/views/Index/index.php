<?php $this->load->view('/header.php'); ?>

<div class="gx-login">
    <h1 class="gx-login-title"><img src="<?php echo static_url('/images/login-title.png'); ?>"></h1>
    <h2 class="gx-title-text">711CMS应用市场管理后台 欢迎您登录</h2>
    <p class="gx-small-text">PC 移动 手机原生助手 为您提供更多的推广方式</p>
    <div class="gx-login-box">
        <form method="post" id="loginForm" action="<?php echo build_url('Index', 'login'); ?>">
            <ul>
                <li>
                    <p class="email-icon"></p>
                    <input type="text" tabindex="1" id="uname" name="uname" class="input-text" onKeyDown="if(event.keyCode==13) admin_login();" placeholder="账号" />
                </li>
                <li>
                    <p class="clock-icon"></p>
                    <input type="password" tabindex="2" id="upass" name="upass" class="input-text" onKeyDown="if(event.keyCode==13) admin_login();" placeholder="密码" />
                </li>
                <?php if ($_site['site_safe_code']) : ?>
                    <li>
                        <p class="aq-icon"></p>
                        <input type="text" id="safecode" name="safecode" tabindex="3" class="input-text" placeholder="安全码" />
                    </li>
                <?php endif;?>
                <li>
                    <input type="text" tabindex="4" id="code" name="code" class="input-text" onKeyDown="if(event.keyCode==13) admin_login();" placeholder="验证码"/>
                <span class="verification-pic">
                    <img src="<?php echo build_url('Index', 'getCode'); ?>" style="border: 0"; class="checkCode" id="checkCode" onClick="changeCode()" />
                </span>
                </li>
            </ul>
            <a class="gx-login-btn" onClick="admin_login();">登入</a>
        </form>
    </div>
</div>

<script>
    function changeCode() {
        $('#checkCode').attr('src', "<?php echo build_url('Index', 'getCode'); ?>" + '&r=' + Math.random());
    }
    function admin_login() {
        $.post($('#loginForm').attr('action'), $('#loginForm').serialize(), function(result){
            if (result.code == 0) {
                window.location = '<?php echo build_url("frame"); ?>';
            } else {
                show_msg(result.msg);
            }
        }, 'json');
    }
</script>

<?php $this->load->view('/footer.php'); ?>
