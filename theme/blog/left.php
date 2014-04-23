<div class='profile-photo'>
	<?if( file_exists(x::path_file('profile_photo')) ) {?>
		<img src="<?=x::url_file('profile_photo')?>"><br>
	<?}	else {?>
		<img src='<?=x::url_theme()?>/img/blank_profile.png'?>
	<?}?>
	<div class='profile-message'><?=x::meta('profile_message')?></div>
</div>
<div class='profile-photo-bottom'></div>

<div class='post-forum'>
	<?php
		$ids = x::forum_ids();
		
	?>
	<? if ( admin() ) {?>
		<div class='small-title' style='float: left; margin-bottom: 0; margin-right: 10px;'><a href='<?=g::url_write( $ids[0] )?>'>글쓰기</a></div>
		<div class='small-title' style='float: left; margin-bottom: 0; margin-right: 10px;'><a href='<?=url_site_config()?>'>관리</a></div>
	<?}?>
	<div class='small-title' style='float: left; margin-bottom: 0;'><a href='<?=g::url()?>?device=mobile'>모바일</a></div>
	<div style='clear:left;'></div>
</div>

<div class='login-form'>
<?php
	include widget(
		array(
			'code'		=> 'login-blog',
			'name'		=> 'login-blog',
			'git'		=> 'https://github.com/x-widget/login-blog',
		)
	);
?>
</div>
<div class='left-company-banner'>
	<a href='http://www.philgo.com' target='_blank'><img src='<?=x::url_theme()?>/img/company_banner.png' /></a>
</div>
<div class='categories'>
	<div class='small-title'>메뉴</div>
	<ul>
	<? 
		$sidemenus = x::menu_links();
		foreach ( $sidemenus as $sm ) {?>
			<li class='menu-name'><?=$sm?></li>
		<? }?>
	</ul>	
</div>

<?php
if( empty( $menu_1 ) ) $menu_1 = bo_table(1);
/**Sample Latest Post, this only fetches 5 latest post from $extra['menu_1'] */?>
<? 	if ( g::forum_exist( $g5['write_prefix'].$menu_1) ) {  ?>
<div class='latest-posts'>
	<div class='small-title3'>최신 등록글</div>
		<ul>
			<?
			$option = db::rows("SELECT * FROM $g5[write_prefix]".$menu_1." ORDER BY wr_num");
			for ( $i = 0; $i <= 4; $i++) { 
				if( $option[$i]['wr_subject'] ) {?>
					<li>
						<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$menu_1?>&wr_id=<?=$option[$i]['wr_id']?>'>
							<div class='subject'><?=$option[$i]['wr_subject']?></div>
							<div><?=cut_str(strip_tags($option[$i]['wr_content']), 50)?></div>
						</a>
					</li>
			<?}}?>
		</ul>
	</div>
<? }?>

<div class='stats'>
	<?=visit('x-visit-blog')?>
</div>


<div class='search'>
	<fieldset>
		<form name="fsearchbox" method="get" action="<?=x::url()?>">
		<input type='hidden' name='module' value='post' />
		<input type='hidden' name='action' value='search' />
		<input type='hidden' name='search_subject' value=1 />
		<input type='hidden' name='search_content' value=1 />
		<input type="text" name="key" placeholder='Search' maxlength="20">
		<input type="submit" id="sch_submit" value="" style="background: url(<?=x::url_theme()?>/img/searchicon.jpg)">
	</form>
	</fieldset>
</div>

