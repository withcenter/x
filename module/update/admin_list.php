<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu.php'?>
<?php
	
	$dirs = file::getDirs( x::dir() . "/$type");
	$qs = array();
	foreach ( $dirs as $dir ) {
		$qs[] = "dirs[]=$dir";
	}
	$var = implode('&', $qs);
	
	$cwd = getcwd();
    $host = $_SERVER['HTTP_HOST'];
	$dir = "$cwd";

	$var = "type=$type&dir=".urlencode($dir)."&host=".urlencode($host) . "&" . $var;
		
?>
<script>

var url = "<?=URL_THEME_UPDATE_SERVER?>/x/index.php";
var data = "module=update&action=ajax_main_server_list_submit&<?=$var?>";
ajax_cross_domain_call( {
	type: 'POST',
	url: url,
	data: data,
	callback: 'callback_ajax_load'
} );
//trace( url );
function callback_ajax_load( data )
{

	if ( typeof data.code != 'undefined' && data.code != 0 ) {
		alert( data.message );
		return;
	}

	$('.loader').slideUp('fast');
	
	for (var  i = 0; i < data.length; i ++ ) {
		if ( data[i].installed == 'yes' ) {
			install = "<?=ln("Already Installed. UN-INSTALL", "이미 설치됨 .삭제하기")?>";
			url = "?module=update&action=admin_uninstall&type=<?=$type?>&name=" + data[i].name;
		}
		else {
			install = "<?=ln("INSTALL", "설치하기")?>";
			url = "?module=update&action=admin_install&type=<?=$type?>&source_link=" + data[i].source_link;
		}
		install = "<div class='install'><a href='"+url+"'><b>" + install + "</b></a></div>";
		$('.list').append(
			"<div class='item'><div class='inner'><img src='"+data[i].url_preview+"'><div class='name'>"+data[i].name+"</div><div class='short'>" + data[i].short + "</div>"+install+"</div></div>"
		);
	}
}

</script>
<div class='list'>

	<div class='loader'>
		<img src="<?=x::url()?>/img/loader12.gif">
		<?=ln("Please, wait while $type information is downloaded from github.com",
			"githubm.com 으로 부터 $type 정보를 다운로드 중입니다.")?>
	</div>
	
	
</div>
<div style="clear:both;"></div>



 