<div class='profile-photo'>
	<?if( ms::meta('profile_img') ) {?>
		<img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('profile_img')?>"><br>
	<?}	else {?>
		<img src='<?=x::url_theme()?>/img/blank_profile.png'?>
	<?}?>
	<p><?=ms::meta('profile_text1')?></p>
</div>
<div class='profile-photo-bottom'><p>~</p></div>

<div class='login-form'>
<?php /** login for testing purposes*/ 
	if (!login()) echo "<h2>Login FORM</h2>"; echo outlogin('basic');?>
</div>

<div class='categories'>
	<h2>Categories</h2>
	<ul>
	<? 
		$menu_1 = ms::meta('menu_1');
		if ( empty($menu_1) ) $menu_1 = ms::board_id(etc::domain()).'_1';
		for ( $i = 1; $i <= 10; $i++ ) { 
		$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		$menu."_".$i = ms::meta('menu_'.$i);
		if ( $menu."_".$i ) {
			?><li><a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_'.$i)?>'><?=$option['bo_subject']?></a></li>
		<?}}?>
	</ul>	
</div>

<div class='latest-posts'>
<?
/**Sample Latest Post, this only fetches 5 latest post from $extra['menu_1'] */?>
	<h2>Latest Posts</h2>
	<ul>
		<? 
		/*
		if( empty( ms::meta('menu_1') ) ) ms::meta('menu_1') = ms::board_id(etc::domain()).'_1';
		$option = db::rows("SELECT * FROM $g5[write_prefix]".ms::meta('menu_1')." ORDER BY wr_num");
		for ( $i = 0; $i <= 4; $i++) { 
			if( $option[$i]['wr_subject'] ) {?>
				<li>
					<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=ms::meta('menu_1')?>&wr_id=<?=$option[$i]['wr_id']?>'>
						<span class='subject'><?=$option[$i]['wr_subject']?></span><br><?=mb_substr($option[$i]['wr_content'],0,50)?>
					</a>
				</li>
		<?}}?>
		*/?>
	</ul>		
</div>

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

<div class='navigator'>
	<table width='100%'>
		<tr>
			<td><a href='#'><span class='prevnav'><img src='<?=x::url_theme()?>/img/previcon.png'>PREV</span></a></td>
			<td align='right'><a href='#'><span class='nextnav'>NEXT<img src='<?=x::url_theme()?>/img/nexticon.png'></span></a></td>
		</tr>
	</table>
</div>
