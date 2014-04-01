<?
	for( $i=1; $i<=5; $i++) {
		x::meta("banner{$i}_subject", $in["banner{$i}_subject"]);
		x::meta("banner{$i}_content", $in["banner{$i}_content"]);	
		x::meta("banner{$i}_url", $in["banner{$i}_url"]);
	}
	
	x::meta("gallery_footer_tagline", $in["gallery_footer_tagline"]);
	x::meta("gallery_forum_left", $in["gallery_forum_left"] );
	x::meta("gallery_forum_right", $in["gallery_forum_left"] );
	x::meta("gallery_forum_list_1", $in["gallery_forum_list_1"] );	
	x::meta("gallery_forum_list_2", $in["gallery_forum_list_2"] );	