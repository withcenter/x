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
<div class='list'>
    <iframe src="http://extended.kr/x/?module=update&action=main_server_theme_list&theme=n&<?=$var?>"></iframe>
</div>

 