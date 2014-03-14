<?/*?><ul>
	<li>
		<a href='javascript:open_menu();'>
			<div class='icon'><img src="<?=x::theme_url()?>/img/menu.png"></div>
			<div class='text'>메뉴</div>
		</a>
	</li>
	<li>
		<a href='#'>
			<div class='icon'><img src="<?=x::theme_url()?>/img/new.png"></div>
			<div class='text'>글쓰기</div>
		</a>
	</li>
	<li>
		<a href='#'>
			<div class='icon'><img src="<?=x::theme_url()?>/img/search.png"></div>
			<div class='text'>검색</div>
		</a>
	</li>
</ul>
<?*/?>
<ul>
	<li class='menu_item drop-down-button'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon0.png'/>		
			<span class='label'>More</span>
		</a>
	</li>
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
	<?
		//this code is from outlogin skins
		$sql = " select count(*) as cnt from {$g5['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_read_datetime = '0000-00-00 00:00:00' ";
        $row = sql_fetch($sql);
        $memo_not_read = $row['cnt'];		
	?>
	<li class='menu_item mobile_message_icon'>
		<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" >
			<?if( $memo_not_read ){?>
					<img src='<?=x::url_theme()?>/img/mobile_icon5-b.png'/>
			<?}
			else {
			?>
					<img src='<?=x::url_theme()?>/img/mobile_icon5.png'/>
			<?}?>
			<span class='label'>
				Messages				
			</span>			
		</a>		
	</li>
	<?
		if( $member['mb_id'] ) {
			$login_msg = "Logout";
		}
		else {
			$login_msg = "Login";			
		}
	?>
	<li class='menu_item log-in-button'>
		<a href='javascrip:void(0)'>
			<img src='<?=x::url_theme()?>/img/mobile_icon6.png'/>		
			<span class='label'>
				<?=$login_msg?>
			</span>
		</a>		
	</li>
</ul>