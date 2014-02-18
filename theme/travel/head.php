<?php
/* 메뉴 정보  - 메뉴는 총 3개만 가져온다. */
	$menu_info = array();
	for ( $i = 1; $i <= 3; $i++ ) {
		if ( $menu_item = ms::meta('menu_'.$i) ) { 
			
			$menu_info[$i]['url'] = stripslashes(ms::url_site(etc::domain()))."/bbs/board.php?bo_table=$menu_item";
			$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table ='$menu_item'");
			$menu_info[$i]['bo_subject'] = $row['bo_subject'];
		}
	}
?>
<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<script type='text/javascript' src='<?=x::url_theme()?>/js/theme.js'></script>
<div id="hd">
    <div id="hd_wrapper">
        <div id="logo">
			<a href="<?php echo G5_URL ?>">
				<?=ms::meta('title');?>
			</a>
        </div>
        <ul id="tnb">
			<li><a href='<?=ms::url_site(etc::domain())?>'>홈</a></li>
			<? if ( $menu_info[1]['url'] ) {?>
				<li><a href='<?=$menu_info[1]['url']?>'><?=$menu_info[1]['bo_subject']?></a></li>
			<? }?>
			<? if ( $menu_info[2]['url'] ) {?>
				<li><a href='<?=$menu_info[2]['url']?>'><?=$menu_info[2]['bo_subject']?></a></li>
			<? }?> 
			<? if ( $menu_info[3]['url'] ) {?>
				<li><a href='<?=$menu_info[3]['url']?>'><?=$menu_info[3]['bo_subject']?></a></li>
			<? }?>
			
			<?if( ms::admin() ) { ?><li><a href='<?=ms::url_config()?>'>사이트관리</a></li><?}?>
        </ul>	
    </div>
	
</div>
<div id="wrapper">
    <div id="aside">
        <?php echo outlogin('x-outlogin-website.com'); // 외부 로그인  ?>
		<?php include('left.php');?>

	</div>
    <div id="container">
		<?if ( (preg_match('/^config/', $action)) || (preg_match('/^config_/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
