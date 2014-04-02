<?
	for( $i=1; $i<=5; $i++) {
		x::meta("banner{$i}_subject", $in["banner{$i}_subject"]);
		x::meta("banner{$i}_content", $in["banner{$i}_content"]);	
		x::meta("banner{$i}_url", $in["banner{$i}_url"]);
	}
	