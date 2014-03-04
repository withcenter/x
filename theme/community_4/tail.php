
			</div><!--content-->			
		
		</div><!--main-content-->
	</div><!--body-wrapper-->
	<div style='clear:both'></div>
	
<div class='footer'>
	
	
<ul id="footer-menu">		
	
	<?		
		if( ms::admin() ) {
			$max_menus = 6;			
		}
		else $max_menus = 7;		
	?>
	
	<? for ( $i = 1; $i <= $total_menus; $i++ ) {
		if( !ms::admin() ){
			if( $i == $total_menus)$last_menu = 'last-menu';
			else $last_menu = null;
		}
	?>
	<? if ( ms::meta('menu_'.$i) ) { 
		$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		if ( !$menu = $row['bo_subject'] ) $menu = null;
	?>
		<li class="footer_menu_item <?=$last_menu?>" page = "<?=ms::meta('menu_'.$i)?>"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$menu?></a></li>
	<?}}?>

	<?
		if ( ms::admin() ) {
	?>
	
			<li class="footer_menu_item" page = "admin-menu">
				<a href="<?=ms::url_config()?>">사이트 관리</a>
			</li>
	<? } ?>
	
	<div style='clear:both;'></div>
</ul>
	
			<div class='copyright'>
				<div class='inner'>					
						<div class='text-info'>						
							<? 
								if ( $footer_text = ms::meta('footer_text') ) echo $footer_text; 
								else echo "어드민 페이지에서 하단 문구를 입력해 주세요";
							?>
						</div>
				</div>
			</div>
		</div><!--footer-->
</div><!--layout-->

<!--[if IE 7]>
	<style>
		ul#footer-menu li{	
			width:100px;
			overflow:hidden;
			white-space:nowrap;			
			float:left;
		}
		ul#footer-menu{					
			margin-bottom:5px;
		}
	</style>
<![endif]-->