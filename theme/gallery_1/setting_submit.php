<?php



for ( $i=1; $i <= 5; $i ++ ) {
	x::meta("banner{$i}_text",$in["banner{$i}_text"]);
	x::meta("banner{$i}_url",$in["banner{$i}_url"]);
}


	meta_set('tel',$in['tel']);
	meta_set('gallery_1_forum_middle', $in['gallery_1_forum_middle']);
	meta_set('gallery_1_forum_bottom', $in['gallery_1_forum_bottom']);