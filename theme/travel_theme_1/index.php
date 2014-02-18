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
		<div style='padding: 1em'>
		<div class='discussion-forum'>
			<h2><img src='<?=x::url_theme()?>/img/discussion-icon.png'> Discussion Forum </h2>
			<ul>
				<li><a href='#'>POST TITLE 1 HERE<br><p>Brief Detail about the post here.</p></a></li>
				<li><a href='#'>POST TITLE 2 HERE<br><p>Brief Detail about the post here.</p></a></li>
			</ul>
		<div>
		<div class='qna'>
			<h2><img src='<?=x::url_theme()?>/img/qna.png'> Q&As </h2>
			<ul>
				<li><a href='#'>QUESTION 1 HERE<br><p>Brief Detail about the answer here.</p></a></li>
				<li><a href='#'>QIESTION 2 HERE<br><p>Brief Detail about the answer here.</p></a></li>
			</ul>
		</div>
		<div class='travel-forum'>
			<h2><img src='<?=x::url_theme()?>/img/travel.png'> Travel Stories </h2>
			<ul>
				<li><a href='#'>TRAVEL STORY 1 HERE<br><p>Brief Detail about the post here.</p></a></li>
				<li><a href='#'>TRAVEL STORY 2 HERE<br><p>Brief Detail about the post here.</p></a></li>
			</ul>
		</div>
		</div>
	</div>
</div>
