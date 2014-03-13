<?/*
	<ul>
		<li><a href='<?=x::theme_url()?>'>최근 글</a></li>
		<?
			for ( $i = 1; $i <= MS_MAX_FORUM; $i++ ) {
				if ( ms::meta('menu_'.$i) ) {
					$row = db::row( "SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
					if ( ! $menu = $row['bo_subject'] ) $menu = '제목없음';
		?>
					<li><a href='<?=g::url_forum(ms::meta('menu_'.$i))?>'><?=$menu?></a></li>
		<?
				}
			}
		?>
		
		<li class='all-menu'><a href='javascript:close_menu();'>전체 메뉴 닫기</a></li>
		
	</ul>
*/?>

<ul>
	<li class='menu_item'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon1.png'/>		
			<span class='label'>Menu</span>
		</a>
	</li>
	<li class='menu_item'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon2.png'/>		
			<span class='label'>Menu</span>
		</a>
	</li>
	<li class='menu_item write'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon3.png'/>		
			<span class='label'>Menu</span>
		</a>
	</li>
	<li class='menu_item images'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon4.png'/>		
			<span class='label'>Menu</span>
		</a>
	</li>
	<li class='menu_item message'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon5.png'/>
			<span class='label'>Menu</span>			
		</a>
	</li>
	<li  class='menu_item log-in-button'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon6.png'/>		
			<span class='label'>Menu</span>
		</a>
		<?/*
		<div class='pop-up-login'>
			<?=outlogin('x-mobile-1');?>
		</div>
		*/?>
	</li>
	<li class='less-padding menu_item'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon7.png'/>		
			<span class='label'>Menu</span>
		</a>
	</li>
</ul>