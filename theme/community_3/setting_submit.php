<?php
/* need to change forum_no_number_bo_table to forum_no_... for compatibility when creating site */	
for ( $i=1; $i <=6; $i++ ) {
	$code = 'forum_no_'.$i;
	x::meta( $code, $in[ $code ] );
}

for ( $i=1; $i <= 5; $i ++ ) {
	x::meta("banner{$i}_text",$in["banner{$i}_text"]);
	x::meta("banner{$i}_url",$in["banner{$i}_url"]);
}


	ms::meta('tel',$in['tel']);