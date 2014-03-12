<?php

for ( $i=1; $i <=6; $i++ ) {
	if ( $in['forum_no_'.$i.'_bo_table'] ){
		x::meta('forum_no_'.$i.'_name', $in['forum_no_'.$i.'_bo_table']);
	}
	x::meta('forum_no_'.$i, $in['forum_no_'.$i] );
	
	if( $i == 6 ) break;
	x::meta("banner{$i}_text", $in["banner{$i}_text"]);
	x::meta("banner{$i}_url", $in["banner{$i}_url"]);
}	

for ( $i=1; $i<=3; $i++ ) {
	x::meta("travel_2floating_banner{$i}_url", $in["travel_2floating_banner{$i}_url"]);
}
	
	x::meta("travel_2left_banner_url", $in["travel_2left_banner_url"]);
	x::meta("travel_2right_banner_url", $in["travel_2right_banner_url"]);
	x::meta("travel_2bottom_banner_url", $in["travel_2bottom_banner_url"]);
	x::meta("travel_2footer_tagline", $in["travel_2footer_tagline"]);