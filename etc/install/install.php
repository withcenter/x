<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GNUBoardX Installation</title>
<link rel="stylesheet" href="install/install.css">
</head>
<body>

<div id="ins_bar">
    <span id="bar_img">GNUBOARD5</span>
    <span id="bar_txt">Message</span>
</div>
<h1>GNUBoard Installation</h1>
<div class="ins_inner">
    <p>Cannot find config file</p>
    <ul>
        <li><strong><?php echo G5_DATA_DIR.'/'.G5_DBCONFIG_FILE ?></strong></li>
    </ul>
    <p>Click "GNUBoard INSTALL" button to install GNUBoard</p>
    <div class="inner_btn">
        <a href="<?php echo G5_URL; ?>/install/">GNUBoard INSTALL</a>
    </div>
</div>
<div id="ins_ft">
    <strong>GNUBOARD5</strong>
    <p>GPL! OPEN SOURCE GNUBOARD</p>
</div>

</body>
</html>
<?php exit; ?>
