<?php include_once('header.php');?>

<div class="warp-content"> <!-- 主体内容 开始 -->
    <div class="info">
        <div class="bor">
            <p class="line-t-10"></p>
            <form id="installForm" name="installForm" action="/install.php?c=install&m=step4" method="post">
                <fieldset class="fld">
                    <legend>数据库信息</legend>
                    <table>
                        <tbody>
                        <tr>
                            <th width="200">数据库主机：</th>
                            <td><input type="text"  id="hostname" name="hostname" value="127.0.0.1" /></td>
                        </tr>
                        <tr>
                            <th width="200">数据库端口：</th>
                            <td><input type="text"  id="port" name="port" value="3306" /></td>
                        </tr>
                        <tr>
                            <th>数据库用户名：</th>
                            <td><input type="text" id="username" name='username'  value="" /></td>
                        </tr>
                        <tr>
                            <th>数据库密码：</th>
                            <td><input type="text" id="password" name="password" value="" /></td>
                        </tr>
                        <tr>
                            <th>数据库名称：</th>
                            <td><input type="text" id="database" name="database"  value=""/></td>
                        </tr>
                        <tr>
                            <th>数据库驱动：</th>
                            <td>
                                <select name="dbdriver" id="dbdriver">
                                    <option value="mysql">mysql</option>
                                    <option value="mysqli" selected="selected">mysqli</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>表前缀：</th>
                            <td><input type="text" id="dbprefix" name="dbprefix"  value="m_" /></td>
                        </tr>
                        <tr>
                            <th>数据库编码：</th>
                            <td><input type="text" id="dbcharset" name="char_set" value="utf8" readonly /></td>
                        </tr>
                        <tr>
                            <th>排序编码：</th>
                            <td><input type="text" id="dbcollat" name="dbcollat" value="utf8_general_ci" readonly /></td>
                        </tr>
                        <tr>
                            <th>数据库有效性：</th>
                            <td><a href="javascript:void(0);" onClick="check_database();" class="install-btn" style="float: left">检查</a><span id="message" style="padding-left:5px;"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </fieldset>
                <br />
                <fieldset class="fld">
                    <legend>管理员信息</legend>
                    <table>
                        <tbody>
                        <tr>
                            <th width="200">账号：</th>
                            <td><input type="text" id="admin_name" name="admin_name"  value="" /> * 建议改为其他名字</td>
                        </tr>
                        <tr>
                            <th>密码：</th>
                            <td><input type="password" id="admin_pass" value="" name="admin_pass" /> * 后台登录密码</td>
                        </tr>
                        <tr>
                            <th>安全码：</th>
                            <td>
                                <input type="text" id="safe_code" name="safe_code"  value="" />
                                <strong color=red>* 增加后台登录安全性，可留空</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </fieldset>
                <p class="line-t-10"></p>
                <input type="hidden" id="url" value="/install.php?c=install&m=check">
            </form>
        </div>

        <a id="start_install" href="javascript:void(0);" onClick="install();" class="install-btn">开始安装</a>
        <a id="doing_install" href="javascript:void(0);" class="install-btn" style="display: none">正在安装...请不要刷新页面.</a>
        <a href="javascript:history.go(-1);" class="install-btn">上一步</a>

    </div>
</div> <!-- 主体内容 结束 -->
<div id="error_message" style="display: none"></div>

<script>
function install() {
    $('#start_install').hide();
    $('#doing_install').show();
    $.ajax({
        type: "POST",
        url : $('#installForm').attr('action'),
        cache : false,
        data: $('#installForm').serialize(),
        dataType: "text",
        error: function (XMLHttpRequest, textStatus, errorThrow) {
            $('#error_message').html(XMLHttpRequest.responseText);
            alert($('#error_message #container p').text());
            $('#start_install').show();
            $('#doing_install').hide();
        },
        success:function (data, textStatus) {
            if (data != 'ok') {
                $('#error_message').html(data);
                alert($('#error_message #container').text());
                if (data.indexOf('install') > -1) {
                    window.location = '/install.php?c=install&m=success';
                }
            } else {
                window.location = '/install.php?c=install&m=success';
            }
            $('#start_install').show();
            $('#doing_install').hide();
        }
    });
}

//检查数据库
function check_database(){
    var hostname = $('#hostname').val();
    var port = $('#port').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var database = $('#database').val();
    var dbdriver = $('#dbdriver').val();
    var dbprefix = $('#dbprefix').val();
    
    if(hostname==''||port==""||username==""||database==""){
        $('#message').html("<span class='red'>参数错误</span>");
        return false;
    }
    $.ajax({
        type: "POST",
        url : "/install.php?c=install&m=checkDatabase",
        cache : false,
        data: {hostname:hostname,port:port,username:username,password:password,database:database,dbdriver:dbdriver,dbprefix:dbprefix},
        dataType: "text",
        error: function (XMLHttpRequest, textStatus, errorThrow) {
            $('#message').html(XMLHttpRequest.responseText);
        },
        success:function (data, textStatus) {
            if (data == 'ok') {
                $('#message').html("<span class='green'>"+database+" 数据库可用</span>");
            }else{
               $('#message').html("<span class='red'>"+data+"</span>");
            }     
        }
    });
}
</script>

<?php include_once('footer.php');?>
