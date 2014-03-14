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
	<? }?>
	
	<div class='small-title' style='float: left; margin-bottom: 0;'><a href='<?=g::url()?>?device=mobile'>모바일</a></div>
	<div style='clear:left;'></div>
</div>

<div class='login-form'>
<?php 
	echo outlogin('x-outlogin-blog');?>
</div>
<div class='left-company-banner'>
	<a href='http://www.philgo.com' target='_blank'><img src='<?=x::url_theme()?>/img/company_banner.png' /></a>
</div>
<div class='categories'>
	<div class='small-title'>메뉴</div>
	<ul>
	<? 
		$menu_1 = x::meta('menu_1');
		if ( empty($menu_1) ) $menu_1 = x::meta('menu_1', bo_table( 1 ) );
		for ( $i = 1; $i <= 10; $i++ ) { 
		$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".x::meta('menu_'.$i)."'");
		${'menu_'.$i} = meta('menu_'.$i);
		if ( ${'menu_'.$i} ) {
			?><li class='menu-name'><a style='font-size: 9pt;' href='<?=g::url()?>/bbs/board.php?bo_table=<?=x::meta('menu_'.$i)?>'><?=$option['bo_subject']?></a></li>
		<?}}?>
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

<div class='search'>
	<fieldset>
	<legend>사이트 내 전체검색</legend>
	<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
	<input type="hidden" name="sfl" value="wr_subject||wr_content">
	<input type="hidden" name="sop" value="and">
	<label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
	<input type="text" name="stx" placeholder='Search' id="sch_stx" maxlength="20">
	<input type="submit" id="sch_submit" value="" style="background: url(<?=x::url_theme()?>/img/searchicon.jpg)">
	</form>

	<script>
	function fsearchbox_submit(f)
	{
		if (f.stx.value.length < 2) {
			alert("검색어는 두글자 이상 입력하십시오.");
			f.stx.select();
			f.stx.focus();
			return false;
		}

		// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
		var cnt = 0;
		for (var i=0; i<f.stx.value.length; i++) {
			if (f.stx.value.charAt(i) == ' ')
				cnt++;
		}

		if (cnt > 1) {
			alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
			f.stx.select();
			f.stx.focus();
			return false;
		}

		return true;
	}
	</script>
</fieldset>
</div>

<!-- Temporarily hide this one until this one has real function
<div class='navigator'>
	<table width='100%'>
		<tr>
			<td><a href='#'><span class='prevnav'><img src='<?=x::url_theme()?>/img/previcon.png'>PREV</span></a></td>
			<td align='right'><a href='#'><span class='nextnav'>NEXT<img src='<?=x::url_theme()?>/img/nexticon.png'></span></a></td>
		</tr>
	</table>
</div>
-->
