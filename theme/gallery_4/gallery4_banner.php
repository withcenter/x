<div class='banner_container'>
	<div class = 'inner'>
		<img class = 'banner_arrow left' src='<?=x::theme_url('img/banner_left_arrow.png')?>'/>
		<img class = 'banner_arrow right' src='<?=x::theme_url('img/banner_right_arrow.png')?>'/>
		<div class='inner2'>
			<?for($i = 0; $i < 5; $i++ ){?>
				<img class='white_bg' banner_num ='<?=$i?>' style='left:<?=$i*100?>%' src='<?=x::theme_url('img/white_bg.png')?>'/>
			<?}
			/*
			THIS LATEST BANNER MUST ALWAYS HAVE 7 POSTS
			This banner should always have FAKE LAST BANNER as the first banner and FAKE FIRST BANNER as the last banner
			You can set the number of tables and what tables you want to use using $banner_table array.
			*/
			$banner_table = array( 1 , 2 , 3 );			
			?>			
			
			<div class='banner' banner_num = 'fake'>
				<?=latest('x-create-latest-banner', bo_table($banner_table[count($banner_table)-1]), 7, 10)?>
			</div>
			
			<?for( $i = 1; $i <= count($banner_table); $i++ ){?>			
				<div class='banner' banner_num = '<?=$i?>'>
					<?=latest('x-create-latest-banner', bo_table($banner_table[$i-1]), 7, 10)?>
				</div>
			<?}?>
			<div class='banner' banner_num = 'fake'>
				<?=latest('x-create-latest-banner', bo_table(($banner_table[0])), 7, 10)?>
			</div>			
		</div>
	</div>
</div>
<div class='tablet_control'>
	<?/*for($z = 1; $z <= 2; $z++ ){?>
		<span class='bullet' banner_num ='<?=$z?>'>O</span>
	<?}*/?>
</div>