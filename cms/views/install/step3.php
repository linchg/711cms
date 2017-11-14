<?php include_once('header.php');?>

<div class="warp-content"> <!-- 主体内容 开始 -->
    <div class="info">
        <div class="bor">
            <table>
                <thead>
                <th>目录/文件</th>
                <th>系统要求</th>
                <th>现在状态</th>
                </thead>
                <tbody>
                <?php if(!empty($all)) : ?>
                    <?php foreach($all as $dir => $sub) : ?>
                        <tr align="center">
                            <th align="left" style="padding-left:18px;">
                                <?php echo $dir; ?>
                            </th>
                            <th align="center" style="width:180px;">
                                <strong >可写</strong>
                            </th>
                            <th align="center" style="width:180px;">
                                <?php if (isset($dir_errors[$dir])) : ?>
                                    <strong class="red">×&nbsp;<?php echo $dir_errors[$dir]; ?></strong>
                                <?php else : ?>
                                    <strong class="green">√&nbsp;可写</strong>
                                <?php endif; ?>
                            </th>
                        </tr>
                        <?php foreach ($sub as $d) : ?>
                            <tr align="center">
                                <th align="left" style="padding-left:18px;">
                                    <?php echo $dir.'/'.$d; ?>
                                </th>
                                <th align="center" style="width:180px;">
                                    <strong >可写</strong>
                                </th>
                                <th align="center" style="width:180px;">
                                    <?php if (isset($sub_errors[$dir][$d])) : ?>
                                        <strong class="red">×&nbsp;<?php echo $sub_errors[$dir][$d]; ?></strong>
                                    <?php else : ?>
                                        <strong class="green">√&nbsp;可写</strong>
                                    <?php endif; ?>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tbody>
                <?php if(!empty($file)) : ?>
                    <?php foreach($file as $key => $f) : ?>
                        <tr align="center">
                            <th align="left" style="padding-left:18px;">
                                <?php echo $f; ?>
                            </th>
                            <th align="center" style="width:180px;">
                                <strong >可写</strong>
                            </th>
                            <th align="center" style="width:180px;">
                                <?php if (isset($file_errors[$key])) : ?>
                                    <strong class="red">×&nbsp;<?php echo $file_errors[$key]; ?></strong>
                                <?php else : ?>
                                    <strong class="green">√&nbsp;可写</strong>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($is_right) : ?>
            <a href="/install.php?c=install&m=step4" class="install-btn">下一步</a>
        <?php else : ?>
            <a onClick="alert('当前配置不满足711cms安装需求，无法继续安装！');" class="install-btn">检测不通过</a>
        <?php endif; ?>
        <a href="javascript:history.go(-1);"  class="install-btn">上一步</a>

    </div>
</div> <!-- 主体内容 结束 -->

<?php include_once('footer.php');?>
