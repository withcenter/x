<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<script type='text/javascript' src='<?=x::url_theme()?>/js/theme.js'></script>
<div id="hd">
    <div id="hd_wrapper">
        <div id="logo">
			<a href="<?php echo G5_URL ?>">
				<?=ms::meta('title');?>
			</a>
        </div>
        <ul id="tnb">
			<li class='menu-home'><a href='<?=ms::url_site(etc::domain())?>'>Home</a></li>
			<li class='menu-about'><a href=''>About</a></li>
			<li class='menu-faqs'><a href=''>FAQs</a></li>
			<li class='menu-contact'><a href=''>Contact</a></li>
			<?if( ms::admin() ) { ?><li class='menu-admin'><a href='<?=ms::url_config()?>'>Admin</a></li><?}?>
        </ul>	
    </div>
	
</div>
<div id="wrapper">
    <div id="aside">
		<?php include('left.php');?>
        <?php echo poll('basic'); // 설문조사  ?>
		<span class='back-to-top'><img src='<?=x::url_theme()?>/img/upicon.png'>BACK TO TOP</span>
	</div>
    <div id="container">
		<?if ( (preg_match('/^config/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
