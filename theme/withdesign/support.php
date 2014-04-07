<?
	$category_1 = array( 
					array( 'item' => 'Nullam gravida nibh nec dui.', 'date' => 'January 10, 2014' ),
					array( 'item' => 'Phasellus lacinia ante vel cursus.', 'date' => 'January 9, 2014' ),				
					array( 'item' => 'Nullam gravida nibh nec dui.', 'date' => 'January 8, 2014' ),
					array( 'item' => 'Phasellus lacinia ante vel cursus.', 'date' => 'January 7, 2014' ),		
					array( 'item' => 'Nullam gravida nibh nec dui.', 'date' => 'January 6, 2014' ),	
					array( 'item' => 'Phasellus lacinia ante vel cursus.', 'date' => 'January 5, 2014' ),	
					array( 'item' => 'Nullam gravida nibh nec dui.', 'date' => 'January 4, 2014' ),		
					array( 'item' => 'Phasellus lacinia ante vel cursus.', 'date' => 'January 3, 2014' ),		
					array( 'item' => 'Nullam gravida nibh nec dui.', 'date' => 'January 2, 2014' ),
					array( 'item' => 'Phasellus lacinia ante vel cursus.', 'date' => 'January 1, 2014' ),							
				);
	$category_2 = array ( 
					'In pretium sapien eget vulputate varius.',
					'Proin vitae tortor quis sem eleifend tincidunt.',
					'Duis blandit metus eget metus commodo, et imperdiet.',
					'Mauris molestie quam eu lobortis lacinia.',
					'Vivamus nec sapien sit amet quam semper sagittis.',
					'Ut consequat dui vitae odio euismod, non lobortis tempor.',
					'Nulla vel mi sit amet sem luctus suscipit.',
					'Quisque tempus purus et eleifend condimentum.',
					'Aenean sed tellus sollicitudin, tincidunt mauris nec, ultricies.',
					'Nullam gravida nibh nec dui congue, ac semper ullamcorper.',
					);
	$category_3 = array ( 
					'In pretium sapien eget vulputate varius.',
					'Proin vitae tortor quis sem eleifend tincidunt.',
					'Duis blandit metus eget metus commodo, et imperdiet.',
					'Mauris molestie quam eu lobortis lacinia.',
					'Vivamus nec sapien sit amet quam semper sagittis.',
					'Ut consequat dui vitae odio euismod, non lobortis tempor.',
					'Nulla vel mi sit amet sem luctus suscipit.',
					'Quisque tempus purus et eleifend condimentum.',
					'Aenean sed tellus sollicitudin, tincidunt mauris nec, ultricies.',
					'Nullam gravida nibh nec dui congue, ac semper ullamcorper.',
					);
	$i = 0;
?>

<div class='support'>
	<span class='main-title'>Support</span>
	<div class='support-details'>
		<div class='support-category category1'>
			<div class='inner'>
				<div class='title'><div class='inner'>Service Order List</div></div>
				<div class='support-details'>
					<ul>
					<? foreach ( $category_1 as $category ) {
						if ( $i % 2 == 1 ) {
							$list_class = "class= 'odd'";
						} else $list_class = '';
					?>	
						<li <?=$list_class?>>
							<div class='list-style'><?=$i+1?></div>
							<div class='list-data'><?=$category['item']?><br><?=$category['date']?></div>
							<div style='clear: left'></div>
						</li>
					<? 
						$i++;
					} ?>
					</ul>
				</div>
			</div>
		</div>
		<div class='support-category category2'>
			<div class='inner'>
				<div class='title'><div class='inner'>FAQs</div></div>	
				<div class='support-details'>
					<ul>
					<? foreach ( $category_2 as $category ) {
						if ( $i % 2 == 1 ) {
							$list_class = "class= 'odd'";
						} else $list_class = '';
					?>	
						<li <?=$list_class?>>
							<div class='list-style'><img src="<?=x::theme_url('img/support_bullets.png')?>"/></div>
							<div class='list-data'><?=$category?></div>
							<div style='clear: left'></div>
						</li>
					<? 
						$i++;
					} ?>
					</ul>
				</div>
			</div>
		</div>
		<div class='support-category category3'>
			<div class='inner'>
				<div class='title'><div class='inner'>QnA</div></div>	
				<div class='support-details'>
					<ul>
					<? foreach ( $category_3 as $category ) {
						if ( $i % 2 == 1 ) {
							$list_class = "class= 'odd'";
						} else $list_class = '';
					?>	
						<li <?=$list_class?>>
							<div class='list-style'><img src="<?=x::theme_url('img/support_bullets.png')?>"/></div>
							<div class='list-data'><?=$category?></div>
							<div style='clear: left'></div>
						</li>
					<? 
						$i++;
					} ?>
					</ul>
				</div>				
			</div>
		</div>
		<div style='clear: left'></div>
	</div>
</div>