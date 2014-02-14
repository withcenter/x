<?php
include("../../common.php");
include("../etc/class.php");
include("demo/xmlrpc.inc");
include("demo/xmlrpcs.inc");
include("demo/xmlrpc_wrappers.inc");

function DoInsert($data)
{
	global $g5;	
	$mb_id = $data->getParam(0);
	$board = $data->getParam(1);
	$category = $data->getParam(2);
	$subject = $data->getParam(3);
	$content = $data->getParam(4);
	$image1 = $data->getParam(5);
	$link1 = $data->getParam(6);
	//$sample_array = $data->getParam(7);
	//$sample_array = $data->getParam(7)->structmem("title")->scalarval();

	$mb_id = $mb_id->scalarval();
	$board = $board->scalarval();
	$category = $category->scalarval();
	$subject = $subject->scalarval();
	$content = $content->scalarval();
	$image1 = $image1->scalarval();
	$link1 = $link1->scalarval();
	//$sample_array = $sample_array->scalartyp();
	//$sample_array = $sample_array->serialize();
	//$sample_array = $sample_array->arraymem(0)->structmem('title');	
	//$sample_array = $sample_array->scalarval();		
	//$sample_array = $sample_array->structmem("title");
	//$sample_array = $sample_array->scalarval();
	//return new xmlrpcresp(new xmlrpcval($sample_array));
	
	$q = "SELECT mb_name, mb_email FROM ".$g5['member_table']." WHERE mb_id = '".$mb_id."'";
	$user_field = db::row($q);
	if( !$user_field ){
		return new xmlrpcresp(new xmlrpcval("INVALID USER!"));
	}
	
	$q2 = "SELECT * FROM ".$g5['board_table']." WHERE bo_table = '".$board."'";
	$board_table = db::row($q2);
	if( !$board_table ){
		return new xmlrpcresp(new xmlrpcval("INVALID Board name!"));
	}
	
	if( !$category ){
		return new xmlrpcresp(new xmlrpcval("INPUT CATEGORY!"));
	}
	
	if( !$subject ){
		return new xmlrpcresp(new xmlrpcval("INPUT SUBJECT!"));
	}
	
	$all_infos = array(
					'mb_id'			=> "$mb_id",
					'mb_name'		=> "$user_field[mb_name]",
					'mb_email'		=> "$user_field[mb_email]",
					'ca_name'		=> "$category",
					'bo_table'		=> "$board",
					'wr_subject'	=> "$subject",
					'wr_content'	=> "$content",
					'wr_link1'		=> "$link1",
					//'wr_link2'		=> "http://google.com",
					//'wr_homepage'	=> "http://jaehosong.com",					
					//'file_2'		=> "C:\\tmp\\def.gif",
					//'file_3'		=> "C:\\tmp\\ghi.jpg",
					//'html'			=> 'html2',
					);
	
	if( $image1 ){
		$all_infos['file_1'] = "$image1";		
	}

		if (mysqli_connect_errno())
		  {
			return new xmlrpcresp(new xmlrpcval("FAILED!"));
		  }
		 else {
			//mysqli_query($con,"INSERT INTO sample (sampletext, samplenum, samplestring) VALUES ('".$output."',".$output2.",'".$output3."')");
			//mysqli_close($con);			
			$wr_id = g::write($all_infos);	
		 }	
		return new xmlrpcresp(new xmlrpcval($wr_id));						
}

$a=array(
	"InsertToSample" => array(
		"function" => "DoInsert",
	));


$s=new xmlrpc_server($a, false);
$s->setdebug(3);
$s->service();
?>
