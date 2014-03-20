<?php



for ( $i=1; $i <= 5; $i ++ ) {
	x::meta("banner{$i}_text",$in["banner{$i}_text"]);
	x::meta("banner{$i}_url",$in["banner{$i}_url"]);
}


	meta_set('tel',$in['tel']);