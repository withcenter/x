
	<?
	if ( x::site() ) {
		$cfgs = x::forums();
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
		$("[name='bo_table']").val($(this).val());
	});
});
</script>
<?
		}
	}
?>

<input type='text' name='bo_table' value="" placeholder=" 게시판 아이디 직접 입력">
<input type='text' name='subject' value="" placeholder=" 표시될 메뉴 이름">