<?
/** @file admin_multi_site_configuration.php
	@page ms_config MultiSite Configuration
		사이트를 여러개 지정할 경우, 각 도메인 별로 설정을 한다.
	@section ms_domain 도메인
		@note 도메인을 입력하고 저장하면 해당 도메인에 대한 설정이 저장된다.
		<ul>
			<li>도메인 입력 예: 'abc' 또는 'abc.com'
			<li>도메인에 지정된 단어 또는 문자열이 매치가 되면 해당 설정을 사용한다.
			<li>이 때 비교 순서는 @ref ms_priority "도메인 비교 순서"에 따라서 비교를 한다.
		</ul>
	@section ms_priority 도메인 비교 순서
	@note priority 는 HTTP 입력에 지정된 도메인을 비교 할 때 우선 순위를 결정하는 값이다.
		<ul>
			<li>기본적으로 우선순위 값은 9 이다.
		</ul>
		
		@ref ms_domain "도메인 지정 방법"
*/

if ( empty($idx) ) {
}
else {
	$cfg = md::config($idx);
}
if ( empty($cfg['priority']) ) $cfg['priority'] = 9;

?>
<form action='?'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">
<input type='hidden' name='idx' value="<?=$cfg['idx']?>">
<table>
	<tr>
		<td>Domain</td>
		<td>
			<input type='text' name='domain' value="<?=$cfg['domain']?>">
			<input type='text' name='priority' value="<?=$cfg['priority']?>">
			
		</td>
	</tr>
	<tr>
		<td>Theme</td>
		<td>
			<?php
				$dirs = file::getDirs(X_DIR_THEME);
			?>
			<select name='theme'>
			<?php
				
				$option = array();
				foreach ( $dirs as $dir ) {
					$path = X_DIR_THEME . "/$dir/config.php";
					if ( file_exists($path) ) {
						$theme_config = array();
						include $path;
						if ( empty($theme_config['name']) ) continue;
						
						echo "<option value='$dir'";
						if ( $cfg['theme'] == $dir ) echo " selected='1'";
						echo ">$theme_config[name]</value>";
					}
					else {
						// echo "<div class='error'>ERROR: $dir has no theme configuration file(config.php)</div>";
					}
				}
			?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td>Title</td>
		<td>
			<input type='text' name='title' value="<?=$cfg['title']?>">
			
		</td>
	</tr>
	
	<tr>
		<td></td>
		<td>
			<input type='submit' value='UPDATE'>
			<a href="<?=md::url_list()?>">LIST</a>
		</td>
	</tr>
		
		
</table>
</form>
