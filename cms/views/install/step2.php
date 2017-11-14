<?php include_once('header.php');?>

<div class="warp-content"> <!-- 主体内容 开始 -->
    <div class="info">
        <div class="bor">
            <table border="0" cellspacing="1" cellpadding="4" class="list" name="table1" id="table1" align="center" >
                <thead>
                <tr>
                    <th width="160">检查项目</th>
                    <th width="200">当前环境</th>
                    <th width="160">711CMS建议</th>
                    <th>功能影响</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>操作系统</th>
                    <td><?php echo php_uname();?></td>
                    <td>Windows_NT/Linux/Freebsd</td>
                    <td><span class="green">√</span></td>
                </tr>
                <tr>
                    <th>WEB 服务器</th>
                    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                    <td>Apache/Nginx/IIS</td>
                    <td><span class="green">√</span></td>
                </tr>
                <tr>
                    <th>PHP 版本</th>
                    <td>PHP <?php echo phpversion();?></td>
                    <td>PHP 5.2.4 及以上</td>
                    <td>
                        <?php if (version_compare(PHP_VERSION, '5.2.4', '>=')) : ?>
                            <span class="green" >√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;无法安装</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>MYSQL 扩展</th>
                    <td>
                        <?php if ($PHP_MYSQL) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <span class="red">×</span>
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if ($PHP_MYSQL) : ?>
                            <span class="green" >√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;无法安装</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>ICONV/MB_STRING 扩展</th>
                    <td>
                        <?php if (extension_loaded('iconv') || extension_loaded('mbstring')) : ?>
                            √
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if (extension_loaded('iconv') || extension_loaded('mbstring')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;字符集转换效率低</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>JSON扩展</th>
                    <td>
                        <?php if ($PHP_JSON) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×</strong>
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if ($PHP_JSON) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不只持json,<a href="http://pecl.php.net/package/json" target="_blank">安装 PECL扩展</a></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>CURL 扩展</th>
                    <td>
                        <?php if (extension_loaded('curl')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if (extension_loaded('curl')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不支持curl,<a href="http://pecl.php.net/package/curl" target="_blank">安装 CURL扩展</a></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>ZIP 扩展</th>
                    <td>
                        <?php if (extension_loaded('zip')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if (extension_loaded('zip')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不支持zip,<a href="http://pecl.php.net/package/zip" target="_blank">安装 zip扩展</a></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>chmod 函数</th>
                    <td>
                        <?php if ($CHMOD) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if ($CHMOD) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;chmod函数被禁用，请修改php.ini中的disable_functions，把chmod函数从列表中删除。</a></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>scandir 函数</th>
                    <td>
                        <?php if ($SCANDIR) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>必须开启</td>
                    <td>
                        <?php if ($SCANDIR) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;scandir函数被禁用，请修改php.ini中的disable_functions，把scandir函数从列表中删除。</a></strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>GD 扩展</th>
                    <td>
                        <?php if ($PHP_GD) : ?>
                            <span class="green">√</span> （支持 <?php echo $PHP_GD;?>）
                        <?php else : ?>
                            <strong class="red">×</strong>
                        <?php endif; ?>
                    </td>
                    <td>建议开启</td>
                    <td>
                        <?php if ($PHP_GD) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不支持缩略图和水印</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>ZLIB 扩展</th>
                    <td>
                        <?php if (extension_loaded('zlib')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>建议开启</td>
                    <td>
                        <?php if (extension_loaded('zlib')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不支持Gzip功能</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>FTP 扩展</th>
                    <td>
                        <?php if (extension_loaded('ftp')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            ×
                        <?php endif; ?>
                    </td>
                    <td>建议开启</td>
                    <td>
                        <?php if (extension_loaded('ftp')) : ?>
                            <span class="green">√</span>
                        <?php elseif (ISUNIX) : ?>
                            <strong class="red">×&nbsp;不支持FTP形式文件传送</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>allow_url_fopen</th>
                    <td>
                        <?php if (ini_get('allow_url_fopen')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×</strong>
                        <?php endif; ?>
                    </td>
                    <td>建议打开</td>
                    <td>
                        <?php if (ini_get('allow_url_fopen')) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不支持保存远程图片</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>DNS解析</th>
                    <td>
                        <?php if ($PHP_DNS) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×</strong>
                        <?php endif; ?>
                    </td>
                    <td>建议设置正确</td>
                    <td>
                        <?php if ($PHP_DNS) : ?>
                            <span class="green">√</span>
                        <?php else : ?>
                            <strong class="red">×&nbsp;不支持采集和保存远程图片</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <?php if ($is_right) : ?>
            <a href="/install.php?c=install&m=step3" class="install-btn">下一步</a>
        <?php else : ?>
            <a onClick="alert('当前配置不满足711cms安装需求，无法继续安装！');" class="install-btn">检测不通过</a>
        <?php endif; ?>
        <a href="javascript:history.go(-1);"  class="install-btn">上一步</a>
    </div>
</div> <!-- 主体内容 结束 -->

<?php include_once('footer.php');?>
