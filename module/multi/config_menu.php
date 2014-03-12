<form action='?' method='post' class='config_menu'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">
	<div class='config config-menu'>
		<div class='config-main-title'>
			<div class='inner'>
				<span class='config-title-info'><img src='<?=x::url().'/module/'.$module.'/img/direction.png'?>'> 메뉴 선택</span>
				<span class='config-title-notice'>
					<span class='user-google-guide-button inner-title' page = 'google_doc_menu' document_name = 'https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub#h.5bu4gi87qhep'>[show]</span>
				</span>
				<div style='clear: both'></div>
			</div>
		</div>
	
		<div class='config-wrapper'>
			<div class='hidden-google-doc google_doc_menu'>	
			</div>
			<div class='config-title'>
				<span class='config-title-info'>
					<span class='menu-num'>메뉴 번호</span>
					<span class='menu-select-name'><?=ln("Forum ID", "게시판 아이디")?></span>
					MENU NAME
				</span>
			</div>
			<div class='config-container'>
			<?
				for ( $i=1; $i<=10; $i++ ) {
					echo forum_select( $i );
				}
			?>
			</div>
		<input type='submit' class='per-config-submit' style='margin-top: 10px'>
		<div style='clear:both'></div>
		</div>
	</div>

</form>
		<?
			
			
		function forum_select($i)
		{
			ob_start();
		?>
		<div class="forum <? if ($i==10) echo 'last-forum'?>" >
		<span class='caption'><?=$i?></span>
		<span class='text'>
		<?
			if ( x::multisite() ) {
				$cfgs = ms::forums();
				if ( ! empty( $cfgs ) ) {
		?>
		<select name='select_bo_table'>
			<option value=''>Select Forum ID</option>
			<? foreach ( $cfgs as $c ) { ?>
				<option value="<?=$c['bo_table']?>"><?=$c['bo_subject']?></option>
			<? } ?>
		</select>
		<script>
		$(function(){
			$("[name='select_bo_table']").change(function(){
				$(this).parent().find(".bo_table").val($(this).val());
			});
		});
		</script>
		<?
				}
			}
		?>

		<input type='text' class='bo_table' name='menu<?=$i?>bo_table' value="<?=x::meta("menu{$i}bo_table")?>" placeholder=" Input bo_table ex) qna">
		<input type='text' class='menu_name' name='menu<?=$i?>name' value="<?=x::meta("menu{$i}name")?>" placeholder=" Menu Name">


		</span>
		</div>
		<?
			return ob_get_clean();
		}
		?>


