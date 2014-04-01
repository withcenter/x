<link rel="stylesheet" href="<?=module("$module.css")?>">
<?include 'menu_theme.php'?>
<?php
	$themes = get_themes();
	$dirs = array();
	foreach ( $themes as $th ) {
		$dirs[] = "dirs[]=$th[dir]";
	}
	$var = implode('&', $dirs);


	$cwd = getcwd();
        $host = $_SERVER['HTTP_HOST'];
        $dir = "$cwd";

        $var = $var . "&dir=".urlencode($dir)."&host=".urlencode($host);
?>
<script>
// <iframe src="<?=URL_EXTENDED?>/x/?module=update&action=ajax_main_server_theme_list&theme=n&<?=$var?>" ></iframe>


var url = "<?=URL_THEME_UPDATE_SERVER?>/x/index.php";
var data = "module=update&action=ajax_main_server_theme_list&theme=n&<?=$var?>";
ajax_cross_domain_call( {
	type: 'POST',
	url: url,
	data: data,
	callback: 'callback_ajax_load'
} );
trace( url );
function callback_ajax_load( re )
{
	var themes = re;
	
	$('.loader').slideUp('fast');
	
	for (var  i = 0; i < themes.length; i ++ ) {
		if ( themes[i].installed == 'yes' ) {
			install = "<?=ln("Already Installed. UN-INSTALL", "이미 설치됨 .삭제하기")?>";
			url = "?module=update&action=uninstall&type=theme&name=" + themes[i].pname;
		}
		else {
			install = "<?=ln("INSTALL", "설치하기")?>";
			url = "?module=update&action=install&source_link=" + themes[i].source_link;
		}
		install = "<div class='install'><a href='"+url+"'><b>" + install + "</b></a></div>";
		$('.list').append(
			"<div class='theme'><img src='"+themes[i].url_preview+"'><div class='name'>"+themes[i].name+"</div><div class='short'>" + themes[i].short + "</div>"+install+"</div>"
		);
	}
}

</script>
<div class='list'>

	<div class='loader'>
		<img src="<?=x::url()?>/img/loader12.gif">
		<?=ln("Please, wait while theme information is downloaded from github.com",
			"githubm.com 으로 부터 테마 정보를 다운로드 중입니다.")?>
	</div>
	
</div>

 