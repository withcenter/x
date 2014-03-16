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
	<?=_ln("GNUBoard5", "그누보드5")?> e<span>X</span>tended <?=_ln("Installation", "설치")?>
</h1>
<div class="ins_inner">
    <p>
		<?=_ln("This will install 'X' - GNUBoard5 Extended by www.eXtended.kr", "GNUBoard5 Extended - 'X' 설치를 시작합니다.")?>
		<?/*Cannot find config file*/?>
	</p>
	<?/*
    <ul>
        <li><strong><?php echo G5_DATA_DIR.'/'.G5_DBCONFIG_FILE ?></strong></li>
    </ul>
	*/?>
	<p>&nbsp;</p>
    <p>
		<?=_ln("Click 'CONTINUE' button to install X", "'X'를 설치하시려면 '설치하기' 버튼을 클릭하세요.")?>
	</p>
	<p>&nbsp;</p>
    <p>
		<?=_ln("설치 화면을 <b>한국어</b>로 보시려면 오른쪽 상단의 <b>한국어</b> 버튼을 클릭하십시오.",
		"'Click '<b>English</b>' button on the top of right corner to see this page in English.")?>
	</p>
    <div class="inner_btn">
        <a href="<?php echo G5_URL; ?>/install/"><?=_ln("CONTINUE", "설치하기")?></a>
    </div>
</div>
<?include 'x/etc/install/install.inc2.php'?>
</body>
</html>
<?php exit; ?>
