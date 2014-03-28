[
<a href='?module=update&action=admin_theme_list&server_name=<?=$server_name?>'>
	<?=lang("THEME LIST", "테마 목록")?>
</a>
 |

<a href='?module=update&action=admin_theme_installed&server_name=<?=$server_name?>'><?=lang("INSTALLED THEME", "추가된 테마")?></a> |


<?=lang("THEME Updatable", "업데이트 가능한 테마")?>

 ]

<form action='?' method='GET' class='server_name_form'>
	<input type='hidden' name='module' value='<?=$module?>'>
	<input type='hidden' name='action' value='<?=$action?>'>
	input server name: <input type='text' name='server_name' value="<?=$server_name?>" placeholder="server name"/>
	<input type="submit">
</form>

<? if ( !$server_name ) jsAlert('input server name'); ?>
<br>

