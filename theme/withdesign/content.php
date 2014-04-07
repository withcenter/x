<!--BANNERS-->
<?/*?>
<div class='services-banner'>
	<div class='banner-container'>
		<div class='banner'>
			<div class='banner-title'>
				서비스 패키지 1
			</div>
			<div class='banner-image' style='color: #ffffff; font-size: 17px'>
				CONTAINER
			</div>
		</div>
			<div class='view-banner' style='color: #ffffff; font-size: 17px'>
				view banner 
			</div>
	</div>
</div>
<?*/?>
<?
include 'gallery_banner.php';
?>
<!--INFORMATION-->
<div class='information-wrapper'>
	<div class='information'>
		<div class='information-image'><div class='inner'><img src="<?=x::theme_url('img/default_information.png')?>"/></div></div>
		<div class='information-details'>
			<div class='inner'>
				<div class='details'>
					Phasellus lacinia ante vel cursus sce lerisque.
					Nam acertal eros vel diam pul vinar placerat. Duis quis
					libero vul put ate purus ullamcorper feugiat. Et morbi vitae
					quam ullamcorper velit sodales tincidunt. Proin consequat
					leo et merid fermentum iaculis et merda mariti.
				</div>
				<div class='more'><a href='javascript: void(0)'>LEARN MORE ABOUT US </a> | <a href='javascript: void(0)'>SEE OUR WORKFLOW</a></div>
				<div style='clear: left'></div>
			</div>
		</div>
		<div style='clear: left'></div>
	</div>
</div>

<!--SERVICE PACKAGES-->
<div class='service-packages-wrapper' id='services'>
	<? include x::theme('service_package') ?>
</div>

<!--WORKFLOW-->
<div class='workflow-wrapper'>
	<? include x::theme('workflow') ?>
</div>

<!--TEMPLATE PREVIEW-->
<div class='template-preview-wrapper' id='portfolio'>
	<div class='template-preview'>
		<? include x::theme('template_preview') ?>
	</div>
</div>

<!--CONTACT US-->
<div class='contact-us-wrapper'  id='contact-us'>
	<? include x::theme('contact_us') ?>
</div>

<!--SUPPORT-->
<div class='support-wrapper' id='support'>
	<? include x::theme('support') ?>
</div>

<style>
	.services-banner {
		background: url("<?=x::theme_url('img/banner_background.png')?>") 100% 100%;
	}
</style>