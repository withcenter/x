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
			<li class='menu-home'><a href='<?=ms::url_site(etc::domain())?>'>홈</a></li>
			<li class='menu-about'><a href='<?=$menu_info[1]['url']?>'><?=$menu_info[1]['bo_subject']?></a></li>
			<? if ( $menu_info[2]['url'] ) {?>
				<li class='menu-faqs'><a href='<?=$menu_info[2]['url']?>'><?=$menu_info[2]['bo_subject']?></a></li>
			<? }?> 
			<? if ( $menu_info[3]['url'] ) {?>
				<li class='menu-contact'><a href='<?=$menu_info[3]['url']?>'><?=$menu_info[3]['bo_subject']?></a></li>
			<? }?>
			
			<?if( ms::admin() ) { ?><li class='menu-admin'><a href='<?=ms::url_config()?>'>사이트관리</a></li><?}?>
        </ul>	
    </div>
</div>
<div id="wrapper">
    <div id="aside">
		<?php include('left.php');?>
		<span class='back-to-top'><img src='<?=x::url_theme()?>/img/upicon.png'>상단으로</span>
	</div>
    <div id="container">
		<?if ( (preg_match('/^config/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

		
		<?php
			if ( write_page() ) {
				$ids = ms::forum();
				di ( $ids );
				$str = "<div class='forum-write-title'>글을 쓰려는 게시판을 선택해 주세요.</div>";
				foreach ( $ids as $id ) {
					
					$row = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table = '$id'");
					$str .=  " <span class='forum-select' bo_table='$id' bo_subject='$row[bo_subject]'>$row[bo_subject]</span> ";
					
				}
		?>
			<style>
				.forum-select {
					cursor: pointer;
				}
			</style>
			<script>
				$(function(){
					$('#container_title').after( "<?=$str?>" );
					$(".forum-select").click(function(){
						$(".forum-select").css("background-color", "#555555");
						$(this).css("background-color", "#5d81ae");
						var bo_table = $(this).attr('bo_table');
						var bo_subject = $(this).attr('bo_subject');
						$("form[name='fwrite'] [name='bo_table']").val( bo_table );
						$("#container_title").text( bo_subject + " 글쓰기");
					});
				});
			</script>
		<?
			}
		?>
		
		
		