<div class='profile-photo'>
	<?if( ms::meta('blog_profile_photo') ) {?>
		<img src="<?=ms::url_site(etc::domain()).'/'.ms::meta('img_url').ms::meta('blog_profile_photo')?>"><br>
	<?}	else {?>
		<img src='<?=x::url_theme()?>/img/blank_profile.png'?>
	<?}?>
	<p><?=ms::meta('blog_profile_message')?></p>
</div>
<div class='profile-photo-bottom'><p>~</p></div>

<div class='post-forum'>
	<h2>Write</h2>
	<? 
		if( !login() ) echo "<p>You must login first to be able to post to this blog</p>";
		else {
		if( isset( $in['write_post']) ) { 
			header("Location: " . g::url()  ."/bbs/write.php?bo_table=" . $in['write_post']);
		}
	?>
	<form method="POST" name='post_write'>
	<?
		$qb = "bo_table LIKE '" . ms::board_id( etc::domain() ) . "%'";	
		$rows = db::rows( "SELECT bo_table, bo_subject FROM $g5[board_table] WHERE $qb");
	?>
		<select name='write_post'>
		<?
			echo "<option value=''>Click here to see forum list</option>";
			foreach ( $rows as $row ) {
				echo "<option value='$row[bo_table]'>$row[bo_subject]</option>";
			}
		?>
		</select>
	</form>
	
	<script>
		$("select[name='write_post']").change(function(){
			$("form[name='post_write']").submit();
		});
	</script>
	<?}?>
</div>

<div class='login-form'>
<?php 
	if (!login()) echo "<h2>Login FORM</h2>"; echo outlogin('basic');?>
</div>

<div class='categories'>
	<h2>Categories</h2>
	<ul>
	<? 
		$menu_1 = ms::meta('menu_1');
		if ( empty($menu_1) ) $menu_1 = ms::meta('menu_1', ms::board_id(etc::domain()).'_1');
		for ( $i = 1; $i <= 10; $i++ ) { 
		$option = db::row("SELECT bo_subject FROM $g5[board_table] WHERE bo_table='".ms::meta('menu_'.$i)."'");
		${'menu_'.$i} = ms::meta('menu_'.$i);
		if ( ${'menu_'.$i} ) {
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
		if( empty( $menu_1 ) ) $menu_1 = ms::meta('menu_1', ms::board_id(etc::domain()).'_1');
		$option = db::rows("SELECT * FROM $g5[write_prefix]".$menu_1." ORDER BY wr_num");
		for ( $i = 0; $i <= 4; $i++) { 
			if( $option[$i]['wr_subject'] ) {?>
				<li>
					<a href='<?=g::url()?>/bbs/board.php?bo_table=<?=$menu_1?>&wr_id=<?=$option[$i]['wr_id']?>'>
						<span class='subject'><?=$option[$i]['wr_subject']?></span><br><?=mb_substr($option[$i]['wr_content'],0,50)?>
					</a>
				</li>
		<?}}?>
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
