<div class='top-panel'>
	<div class='banner'>
		<?
			for ( $i = 1 ; $i <= 5 ; $i++ ) {
				echo "<div class='banner-image'>";
				echo "<img src='".ms::meta('img_url').ms::meta('travelbanner_'.$i)."'>";
				echo "<p class='banner-text'>".ms::meta('travelbanner_'.$i.'_text1')."</p>";
				echo "</div>";
			}
		?>
		<div class='banner-pagination'>
			pagination here
		</div>
	</div>
	
	<div class='forum-list'>
		<div class='discussion-forum'>
			<h2> Discussion Forum </h2>
		<div>
		<div class='qna'>
			<h2> Q&As </h2>
		</div>
		<div class='travel-forum'>
			<h2> Travel Stories </h2>
		</div>
	</div>
</div>
