<?
	include 'x/etc/install/lib.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>X Installation</title>
<link rel="stylesheet" href="install/install.css">
<link rel="stylesheet" href="x/etc/install/style.css">
</head>
<body>
<?include 'x/etc/install/top.php'?>
<h1 id='page-title'>
	<?=ln("GNUBoard5", "그누보드5")?> e<span>X</span>tended <?=ln("Installation", "설치")?>
</h1>
<div class="ins_inner">
    <p>
		<?=ln("This will install 'X' - GNUBoard5 Extended by www.eXtended.kr", "GNUBoard5 Extended - 'X' 설치를 시작합니다.")?>
		<?/*Cannot find config file*/?>
	</p>
	<?/*
    <ul>
        <li><strong><?php echo G5_DATA_DIR.'/'.G5_DBCONFIG_FILE ?></strong></li>
    </ul>
	*/?>
	<p>&nbsp;</p>
    <p>
		<?=ln("Click 'CONTINUE' button to install X", "'X'를 설치하시려면 '설치하기' 버튼을 클릭하세요.")?>
	</p>
    <div class="inner_btn">
        <a href="<?php echo G5_URL; ?>/install/"><?=ln("CONTINUE", "설치하기")?></a>
    </div>
</div>
<?include 'x/etc/install/bottom.php'?>
</body>
</html>
<?php exit; ?>
