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

	$site = site_get( $in['idx'] );
	
	
?>


<form action='?'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">
<input type='hidden' name='idx' value="<?=$in['idx']?>">
<table>
	<tr>
		<td>Domain</td>
		<td>
			<input type='text' name='domain' value="<?=$site['domain']?>">
			<?=ln("Example", "예제")?> : domain.com, abc.domain.com
		</td>
	</tr>
	
	<tr>
		<td>Forward</td>
		<td>
			<input type='text' name='forward' value="<?=meta_get( $site['domain'], 'forward' )?>">
			
			접속시 이동 할 다른 도메인 입력.
			
			<?=ln("See Document", "설명서 참고")?> : Domain Forward
			
		</td>
	</tr>
	<tr>
		<td>Member (Owner) ID</td>
		<td>
			<input type='text' name='mb_id' value="<?=$site['mb_id']?>">
		</td>
	</tr>
	
	
	<tr>
		<td>Site Title</td>
		<td>
			<input type='text' name='title' value="<?=meta_get($site['domain'], 'title')?>">
		</td>
	</tr>
	
	<tr>
		<td>Theme</td>
		<td>
		<?
		?>
			<select name='theme'>
				<?
					$theme = meta_get( $site['domain'], 'theme' );
					reset_theme();
					
					while ( next_theme() ) {
				?>
					<option value="<?=theme_dir()?>" <? if ( theme_dir() == $theme ) echo "selected=1"; ?>><?=theme_name()?></option>
				<?
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
			<input type='radio' name='status' value='open' <? if ( x::meta_get($site['domain'], 'status') != 'close' ) echo 'checked=1';?>> OPEN,
			<input type='radio' name='status' value='close' <? if ( x::meta_get($site['domain'], 'status') == 'close' ) echo 'checked=1';?>> CLOSE
		</td>
	</tr>
	
	<tr>
		<td>Recommand</td>
		<td>
			<select name='good'>
				<? for ( $i=0; $i < 10; $i ++ ) { ?>
					<option value="<?=$i?>" <? if ( $i == $site['good'] ) echo "selected=1"; ?>><?=$i?></option>
				<? } ?>
			</select>
		</td>
	</tr>
	
	
	
	<tr>
		<td></td>
		<td>
			<input type='submit' value='UPDATE'>
			<a href="?module=<?=$module?>&action=admin_site_list">LIST</a>
		</td>
	</tr>
		
		
</table>
</form>



@note you will have more options of setting in site admin panel.
