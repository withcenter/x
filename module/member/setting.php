<?
	



?>
<div><?php echo _L('Member Setting');?></div>
<div><?php echo _L('Choose Your Language');?></div>
<?php echo _L('Your Current Language')?> : <?=etc::user_language()?>
<div>
	<form name='setting' action='?'>
		
		<input type='hidden' name='module' value='member'>
		<input type='hidden' name='action' value='setting_submit'>
		
		
		<select name='user_language'>
			<option value=''><?=_l('Please choose your language')?></option>
			<option value='en'>English</option>
			<option value='ko'>Korean</option>
		</select>
	</form>
</div>


<script>
$(function(){
	$("[name='setting'] [name='user_language']").change(function(){
		$("[name='setting']").submit();
	});
	<? if ( etc::user_language() ) { ?>
	$("[name='setting'] [name='user_language']").val( '<?=etc::user_language()?>' );
	<? } ?>
});
</script>