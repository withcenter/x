<?php
	$limit = 'site_create_limit_per_member';
	$theme = 'site_create_theme_default';
	
	$theme_value = config( $theme );
	
?>
<link rel='stylesheet' type='text/css' href='<?=x::url()?>/module/<?=$module?>/site.css' />

<div class='admin-site-config'>
<form action='?'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">

<div>
<span class='caption'>회원 1명 당 사이트 개설 수</span>
<input type='text' name='<?=$limit?>' value="<?=config( $limit )?>" placeholder='숫자로 입력해 주세요' >
</div>
<div>
<span class='caption'>사이트 개설 시 테마 지정</span>
<select name='<?=$theme?>'>
	<option value=''><?=ln("Let user select", "사용자가 선택하기")?></option>
	<?php
		foreach ( file::getDirs( X_DIR_THEME ) as $dir ) {
			$path = X_DIR_THEME . "/$dir/config.xml";
			if ( ! file_exists( $path ) ) continue;
			$theme_config = load_config( $path );
			if ( ! $theme_config ) continue;
			
			$name = $theme_config['name'][L];
			if ( empty($name) ) continue;
			
			$view = explode(',', $theme_config['view']);
			if ( ! in_array( 'pc', $view ) ) continue;
			
			if ( $theme_value == $dir ) $sel = "selected=1";
			else $sel = '';
			echo "<option value='$dir' $sel>$name</option>";
		}
	?>
</select>
</div>

<div>
	<span class='caption'>사이트 개설 시 테마 선택</span>
	<input type='radio' name='site_create_form_theme' value='show' <? if ( config('site_create_form_theme') == 'show' ) echo "checked=1"; ?>> 나타내기
	<input type='radio' name='site_create_form_theme' value='hide' <? if ( config('site_create_form_theme') == 'hide' ) echo "checked=1"; ?>> 감추기
</div>


<input type='submit'>
<div style='clear:right;'></div>

</form>
</div>
