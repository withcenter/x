<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<div id="hd">
    <div id="hd_wrapper">
        <div id="logo">
			<a href="<?php echo G5_URL ?>"><?=ms::meta('title')?></a>
        </div>
        <ul id="tnb">
			<li><a href='<?=ms::url_site(etc::domain())?>'>Home</a></li>
			<li><a href=''>About</a></li>
			<li><a href=''>Support</a></li>
			<li><a href=''>Contact</a></li>
			<li><a href='<?=ms::url_config()?>'>Admin</a></li>
        </ul>	
    </div>
</div>
<div id="wrapper">
    <div id="aside">
        <?php echo outlogin('basic'); // 외부 로그인  ?>
        <?php echo poll('basic'); // 설문조사  ?>
	</div>
    <div id="container">
		<?if ( (preg_match('/^config/', $action)) || (preg_match('/^config_/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
