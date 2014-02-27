			</div><!--content-->			
		
		</div><!--main-content-->
	</div><!--body-wrapper-->
	<div class='footer'>
		<div class='footer-menus'>
			<ul id="comm3_main_menu">			
				<?
					if( ms::admin() ) {
					$max_menus = 6;
				?>
						<li class="comm3_menu border-left" page = "admin-menu">
							<a href="<?=ms::url_config()?>">사이트 관리</a>
						</li>
				<?
					}
					else $max_menus = 7;
				?>
				
				<? for ( $i2 = 1; $i2 <= $max_menus; $i2++ ) { 
					if( $i2 == 1 && $max_menus == 7) $border_left = 'border-left';
					else $border_left = null;
				?>
				<? if ( ms::meta('menu_'.$i2) ) { 
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i2)."'");
					if ( !$menu = $row['bo_subject'] ) $menu = null;
				?>
					<li class="comm3_menu <?=$border_left?>" page = "<?=ms::meta('menu_'.$i2)?>"><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i2)?>'><?=$menu?></a></li>
				<?}
					if( $i2 == $max_menus ){?>
						<li class="comm3_menu <?=$border_left?>"><a href='#'></a></li>
					<?}
				}?>
				<li class="comm3_menu images"><a href='#'><img class='phone' src='<?=x::url_theme()?>/img/phone.png'/></a></li>
				<li class="comm3_menu images"><a href='#'><img class='arrow' src='<?=x::url_theme()?>/img/arrow-up.png'/></a></li>
			</ul>
		</div>
			<div class='copyright'>
				<div class='inner'>
					<div class='foot-logo'><img src='<?=x::url_theme()?>/img/footer-logo.png'/></div>
						<div class='text-info'>
						바이며, 천지는 사람은 목숨을 유소년에게서 되는 얼마나 위하여서. 것은 인간의 용기가 기쁘며, 듣는다. 뛰노는 바 <br>
						COPYRIGHT (C) 2014&nbsp;&nbsp;&nbsp;&nbsp;WITHCENTER.COM&nbsp;&nbsp;&nbsp;&nbsp;ALL RIGHT RESERVED
						</div>
				</div>
			</div>
		</div><!--footer-->
</div><!--layout-->