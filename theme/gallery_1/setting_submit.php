<?php
for ( $i=1; $i <= 5; $i ++ ) {
	x::meta("banner{$i}_subject",$in["banner{$i}_subject"]);
	x::meta("banner{$i}_content",$in["banner{$i}_content"]);
	x::meta("banner{$i}_url",$in["banner{$i}_url"]);
}


	meta_set('tel',$in['tel']);
	meta_set('gallery_1_forum_middle', $in['gallery_1_forum_middle']);
	meta_set('gallery_1_forum_bottom', $in['gallery_1_forum_bottom']);
	meta_set('gallery_1_middle_posts_no', $in['gallery_1_middle_posts_no']);
	meta_set('gallery_1_bottom_posts_no', $in['gallery_1_bottom_posts_no']);