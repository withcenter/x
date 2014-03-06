<?php
	
for ( $i=1; $i <=6; $i++ ) {
	if ( $in['forum_no_'.$i.'_bo_table'] ) ms::meta('forum_no_'.$i, $in['forum_no_'.$i.'_bo_table']);
	else ms::meta('forum_no_'.$i, $in['forum_no_'.$i] );
}	

	
	ms::meta('com3banner_1_text1',$in['com3banner_1_text1']);
	ms::meta('com3banner_2_text1',$in['com3banner_2_text1']);
	ms::meta('com3banner_3_text1',$in['com3banner_3_text1']);
	ms::meta('com3banner_4_text1',$in['com3banner_4_text1']);
	ms::meta('com3banner_5_text1',$in['com3banner_5_text1']);
	ms::meta('com3banner_1_text2',$in['com3banner_1_text2']);
	ms::meta('com3banner_2_text2',$in['com3banner_2_text2']);
	ms::meta('com3banner_3_text2',$in['com3banner_3_text2']);
	ms::meta('com3banner_4_text2',$in['com3banner_4_text2']);
	ms::meta('com3banner_5_text2',$in['com3banner_5_text2']);
	ms::meta('com3contact_num',$in['com3contact_num']);