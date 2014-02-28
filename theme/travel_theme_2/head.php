<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<!-- 상단 시작 { -->
<?php
	include 'top.php';
?>
<div class="travel_theme2_header">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="header_wrapper">
		<?php include 'logo_menu.php';?>
        <div class="logo">
			<? /*
            <a href="<?php echo G5_URL ?>">
			<?// if( $ms::meta('header_logo') ) { ?>
				<img src="<?=ms::url_site(etc::domain()).ms::meta('img_url').ms::meta('header_logo')?>" width=240 height=119>
			<?//} else {?>
				<img src='<?=x::url_theme()?>/img/logo.png'>
			<?//}?>
			</a>
			*/?>
        </div>
    </div>


</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->
<div class="layout"><div class='inner'>
    <div class="left">
		<div class='login-sidebar'>
			<?php echo outlogin('x-outlogin-travel-2'); // 외부 로그인  ?>
		</div> 
		<?php include x::theme('sidebar_left') ?>
    </div>
    <div class="container">
		<?if ( (preg_match('/^config/', $action)) || (preg_match('/^config_/', $action)) ) include ms::site_menu();?>
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
