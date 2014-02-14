<?
if( !login() ){
	echo "log in first!";
	return;
}
?>

<h1>xmlrpc sample</h1>
<?php
	include("xml_sample/demo/xmlrpc.inc");
	//var_dump($g5);
	//var_dump($_POST);
	if( isset($_POST["select_board"]) && $_POST["select_board"]!="")
	{
		$struct = array(
		'title' => new xmlrpcval("abcd", "string"), 
		'description' => new xmlrpcval("efgh", "string") 
		);
		//var_dump($abcd);
	
		$mb_id = $_SESSION['ss_mb_id'];
		//$board_name = $_POST["select_board"];
		$board_name = "zzz";
		$category = $_POST["category"];
		$subject2 = $_POST["subject"];
		$content2 = $_POST["content"];
		$link1 = $_POST["link1"];
		/*****************************/
		$info = pathinfo($_FILES['upload1']['name']);		
		$ext = $info['extension']; // get the extension of the file
		$newimage = $_FILES['upload1']['name']; 

		$target = 'C:/work/gnu/x/xml_sample/tmp/'.$newimage;
		move_uploaded_file( $_FILES['upload1']['tmp_name'], $target);
		/*****************************/
		if( $newimage ){
		$image1 = $target;
		}
		else $image = null;

		$f=new xmlrpcmsg('InsertToSample',
			array(
			new xmlrpcval($mb_id, "string"), 
			new xmlrpcval($board_name, "string"), 
			new xmlrpcval($category, "string"), 
			new xmlrpcval($subject2, "string"), 
			new xmlrpcval($content2, "string"),
			new xmlrpcval($image1, "string"),
			new xmlrpcval($link1, "string"),
			new xmlrpcval($struct, "struct"))
			);

		$c=new xmlrpc_client("http://gnuboard.org/x/xml_sample/server_write.php");

		$r=$c->send($f);
		if($r->faultCode())
		{
			echo "ERROR!";
		}
		else
		{			
			$v=$r->value();			
			$return_value = $v->scalarval();
			if( intval($return_value) ) {
				$post_link = G5_BBS_URL."/board.php?bo_table=$board_name&wr_id=$return_value";
				echo "SUCCESSFULLY inserted wr_id: ".$return_value."<br>";
			}
			else{
				echo $return_value."<br><br>";
				//var_dump($return_value);
			}
			if ( $_FILES['upload1']['name'] ){
				unlink($target);
			}
			$post_again = x::url();		
		}
	}
	else
	{
		$board_name = "";
		$category = "";
		$name = "";

$q4 = "SELECT bo_table, bo_subject from ".$g5['board_table'];
$options = db::rows($q4);
?>
<form id='someform' enctype='multipart/form-data' method="POST">
<table>
<td>ID:</td><td><?=$_SESSION['ss_mb_id']?></td>
<tr valign='top'><td>BOARD:</td>
<td>
<select name='select_board'>
	<?foreach ($options as $option){?>
	<option value="<?=$option['bo_table']?>"><?=cut_str($option['bo_subject'],10,"...")?></option>	
	<?}?>
</select>
</td>
</tr>
<tr valign='top'><td>CATEGORY:</td><td><input name="category"></td></tr>
<tr valign='top'><td>SUBJECT:</td><td><input name="subject"></td></tr>
<tr valign='top'><td>CONTENT:</td>
<td>
<textarea style='resize: none;width:200px; height:100px;' name="content"></textarea>
</td>
</tr>
<tr valign='top'><td>IMAGE1:</td><td><input type="file" name="upload1" ></td></tr>
<tr valign='top'><td>LINK1:</td><td><input name="link1"></td></tr>
</table>
<input type="submit" value="Submit" name="submit"></form>

<?
}
if( $post_link ){
?>
<div><a href = '<?=$post_link?>'>Link to your post</a></div>
<?
}
if ( $post_again ){
?>
<div><a href = '<?=$post_again?>'>Post Again</a></div>
<?}?>