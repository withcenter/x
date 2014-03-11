<form action='?' method='post'>
<input type='hidden' name='module' value="<?=$module?>">
<input type='hidden' name='action' value="<?=$action?>_submit">

<?
	for ( $i=1; $i<=10; $i++ ) {
		echo forum_select( $i );
	}
?>
<input type='submit'>
</form>

<?
	
	
function forum_select($i)
{
	ob_start();
?>
<div class='forum'>
<span class='caption'>Menu No. <?=$i?> - <?=ln("Forum ID", "게시판 아이디")?></span><span class='sep'>:</span>
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
