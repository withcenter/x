<?php
// https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.5bptpncn3pxa
define ('DEBUG_METAWEBLOG', 1);
dlog('etc/metaweblog.php begins');
$data		= &$HTTP_RAW_POST_DATA;
$xml			= new SimpleXMLElement($data);
$input		= mw_parse_xml_input($xml);

dlog("method: $input[method]");
dlog($input);

if ( DEBUG_METAWEBLOG ) {
	file::write( g::dir() . '/data/metaweblog_' . $input['method'], $data );
}






/** @short 사용자 정보 읽기 */
$user = g::member( $input['id'] );


/** @short 사용자 아이디 비밀번호 체크 */
if ( g::password($input['password']) != $user["mb_password"] ) response_faultCode(-1, "Password does not match. UserID : $user[mb_id]");

/* @short 메쏘드 처리 */
if ( $input['method'] == "blogger.getUsersBlogs" ) response_getUsersBlog();
else if( $input['method'] == "metaWeblog.getRecentPosts" ) response_getRecentPosts();
else if( $input['method'] == "metaWeblog.newPost" ) response_newPost();
else if ( $input['method'] == "metaWeblog.editPost" ) response_editPost();
else if ( $input['method'] == "metaWeblog.newMediaObject" ) response_newMediaObject();
else if ( $input['method'] == "metaWeblog.getPost" ) response_getPost();

else if ( $input['method'] == "metaWeblog.getCategories" ) response_getCategories();
else {
	response_faultCode(-99, "You have sent a method that I don't understand - $input[method]");
}




function mw_parse_xml_input($xml)
{
	$input = array();
	
	/** 메소드 추출 */
	$method	= (string) $xml->methodName;
	$input['method'] = $method;
	
	/** @short 사용자 인증 */
	if ( $method == "blogger.getUsersBlogs" ) {
		$input['key'] = (string) $xml->params->param[0]->value->string;
		$input['id'] = (string) $xml->params->param[1]->value->string;
		$input['password'] = (string) $xml->params->param[2]->value->string;
	}
	/** @short 새글 쓰기와 Media */
	else if ( $method == "metaWeblog.newPost" || $method == "metaWeblog.newMediaObject" || $method == "metaWeblog.getCategories" ) {
		$input['blog_id'] = (string) $xml->params->param[0]->value->string;
		$input['id'] = (string) $xml->params->param[1]->value->string;
		$input['password'] = (string) $xml->params->param[2]->value->string;
	}
	/** @short 글 수정과 글 읽기 */
	else if ( $method == "metaWeblog.editPost" || $method == "metaWeblog.getPost") {
	
		/** @bug fix
			@note ScribeFire 에서는 int 로 넘어오고 Windows Live Writer 에서는 string 으로 넘어 온다.
			*/
		$input['blogno'] = (string) $xml->params->param[0]->value->int;
		if ( empty($input['blogno']) ) $input['blogno'] = (string) $xml->params->param[0]->value->string;
		
		$input['id'] = (string) $xml->params->param[1]->value->string;
		$input['password'] = (string) $xml->params->param[2]->value->string;
	}
	/** @short 최근 글 목록 */
	else if ( $method == "metaWeblog.getRecentPosts" ) {
		$input['blog_id'] = (string)  $xml->params->param[0]->value->string;
		$input['id'] = (string) $xml->params->param[1]->value->string;
		$input['password'] = (string)  $xml->params->param[2]->value->string;
		$input['numrows'] = (int) $xml->params->param[3]->value->int;
	}
	return $input;
}




function response_faultCode($code, $msg)
{

$ret=<<<EOH

<?xml version="1.0"?>
<methodResponse>
   <fault>
      <value>
         <struct>
            <member>
               <name>faultCode</name>
               <value><int>$code</int></value>
               </member>
            <member>
               <name>faultString</name>
               <value><string>$msg</string></value>
               </member>
            </struct>
         </value>
      </fault>
   </methodResponse>

EOH;

	echo $ret;
	dlog($ret);
	
  exit;
}





function response_getUsersBlog()
{
	global $input;
	$domain = etc::domain();
	$g_url = g::url();
	
$ret = null;
$ret .= <<<EOH
<?xml version="1.0" encoding="utf-8"?>
<methodResponse>
  <params>
    <param>
      <value>
        <array>
EOH;

	$rows = g::board_config( array('order by' => 'bo_subject ASC') );
	
  foreach ( $rows as $row ) {
    $url = urlencode("$g_url/bbs/board.php?bo_table=$row[bo_table]");
    $title = htmlspecialchars($row["bo_subject"]) . " ( $domain : $row[bo_table] : $input[id] )";
    $ret .=<<<EOH

          <data>
            <value>
              <struct>
                <member>
                  <name>url</name>
                  <value>$url</value>
                </member>
                <member>
                  <name>blogid</name>
                  <value>$row[bo_table]</value>
                </member>
                <member>
                  <name>blogName</name>
                  <value>$title</value>
                </member>
              </struct>
            </value>
          </data>

EOH;
  }


$ret .= <<<EOH
        </array>
      </value>
    </param>
  </params>
</methodResponse>
EOH;

	echo $ret;
	dlog($ret);
	
}



/** @short returns suedo category.
 * @note this will not support category
 *
 */
function response_getCategories()
{

echo <<<EOH
<?xml version="1.0" encoding="utf-8"?>
<methodResponse> 
<params>
<param>
<value>
<array>
<data>
<value>
<struct>
<member>
<name>description</name><value>We do not use Caregory</value>
</member>
<member>
<name>title</name><value>Categories Are Not Supported</value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>description</name><value>There is no Category</value>
</member>
<member>
<name>title</name><value>No Category</value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>description</name><value>No Category 1</value>
</member>
<member>
<name>title</name><value>No Category 1</value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>description</name><value>No Category 2</value>
</member>
<member>
<name>title</name><value>No Category 2</value>
</member>
</struct>
</value>
<value>
<struct>
<member>
<name>description</name><value>No Category 3</value>
</member>
<member>
<name>title</name><value>No Category 3</value>
</member>
</struct>
</value>
</data>
</array>
</value>
</param>
</params>
</methodResponse>
EOH;
}












/** @short posts a new post
 * @todo check member permission
 * @warning GNUBOARD cannot detect a post by wr_id alone. and there seems no way to make it in INT format.
 * so, it returns string in bo_table and wr_id combanation.
 *
 *
 */
function response_newPost()
{
	global $user, $input, $xml;
	
	
  
	$title = $xml->params->param[3]->value->struct->member[0]->value->string;
	$description = $xml->params->param[3]->value->struct->member[1]->value->string;
	$publish = $xml->params->param[4]->value->boolean;
	
	
	
	$p = array();
	$p['bo_table']		= $input['blog_id'];
	$p['mb_id']			= $user['mb_id'];
	$p['mb_name']	= $user['mb_name'];
	$p['mb_email']	= $user['mb_email'];
	
	
	$p['wr_subject'] = $title;
	$p['wr_content'] = $description;
	$p['html']			= 'html2';
	
	$wr_id = g::write( $p );
	
	
	/** update file information */
	metaweblog_update_file_information( $input['blog_id'], $wr_id );
	
	
  $ret = <<<EOH
<?xml version="1.0" encoding="utf-8"?>
<methodResponse>
<params>
<param>
<value>
<i4>{$p['bo_table']}:$wr_id</i4>
</value>
</param>
</params>
</methodResponse>
EOH;

	echo $ret;
	dlog($ret);
	
}


function response_editPost()
{
	global $user, $xml, $input;
	$title = $xml->params->param[3]->value->struct->member[0]->value->string;
	$description = $xml->params->param[3]->value->struct->member[1]->value->string;
	$publish = $xml->params->param[4]->value->boolean;
	if ( empty($input['blogno']) ) return response_faultCode(-103, "Blog No. is missing... (No blogno)");
	
	
	list ( $blog_id, $wr_id ) = explode(':', $input['blogno']);
	
	$p = g::post( $blog_id, $wr_id );
	
	//debug_log($p);
	if ( $p['mb_id'] != $user['mb_id'] ) response_faultCode(-102, "Post No.: $blog_id : $wr_id - is not your post.");
	
	$o = array();
	$o['bo_table']		= $blog_id;
	$o['wr_id']			= $p['wr_id'];
	$o['wr_subject'] = $title;
	$o['wr_content'] = $description;
	
	
	g::update( $o );
	
	
	metaweblog_update_file_information( $blog_id, $wr_id );
	
	
	
	
	
	echo <<<EOH
<?xml version="1.0" encoding="utf-8"?>
<methodResponse>
<params>
<param>
<value>
<i4>1</i4>
</value>
</param>
</params>
</methodResponse>
EOH;
  
}

function metaweblog_update_file_information( $bo_table, $wr_id )
{
	global $user;
	$board_file_table = g::board_file_table();
	$bf_no	= db::result("SELECT max(bf_no) FROM $board_file_table WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}'");
	$rows	= db::rows("SELECT * FROM $board_file_table WHERE bo_table = '$bo_table' AND wr_id = 0 AND bf_content='$user[mb_id]'");
	foreach ( $rows as $row ) {
		$bf_no ++;
		db::update( $board_file_table, array( 'wr_id' => $wr_id, 'bf_no'=>$bf_no, 'bf_content'=>'metaweblogapi' ), array( 'bo_table' => $bo_table, 'wr_id'=>0, 'bf_no'=>$row['bf_no'], 'bf_content' => $user['mb_id'] ) );
	}
	g::board_file_update_count( $bo_table, $wr_id );
}




/** @short 파일 첨
 *
 * @note GNUBoard 에서는 API Writer 로 부터 들어오는 썸네일은 실제 게시글 읽기에서 표시되는 부분이다.
* 즉, 원본 이미지는 따로 첨부되고 화면에 보이는 썸네일을 클릭했을 때, 원본 이미지가 보여지는 것이다.
 *
 *
 */
function response_newMediaObject()
{
	global $xml, $user, $input;
	
	$filename = $xml->params->param[3]->value->struct->member[0]->value->string;
	$type = $xml->params->param[3]->value->struct->member[1]->value->string;
	$bits = $xml->params->param[3]->value->struct->member[2]->value->base64;


	
	$raw_data = base64_decode($bits);
	
	//
	$pi = pathinfo($filename);
	$path = tempnam(sys_get_temp_dir(), 'blogapi');
	dlog("temp path: $path");
	if ( ! $handle = fopen($path, 'w') ) return dlog("Cannot open file ($path) for raw data saving...");
    if (fwrite($handle, $raw_data) === FALSE) return dlog("Cannot write to file ($path)");
	fclose($handle);
	dlog("File uploaded from API Writer OK : $path");
	
	
	/** 
	 * 글번호가 0 이다. 이렇게 되면 파일을 등록해도 글과 연결되지 않는다. 이 때, bf_content 에 사용자 아이디를 추가하여, 글을 쓸 때, 연결을 시켜준다.
	 * 
	 * 참고 : MetaWeblog API 에서 첨부 파일 관리가 쉽지 않다. 이미 등록된 파일 수정/삭제를 하는 api 가 따로 없으므로 정히 원한다면, editPost() 에서 기존 첨부 파일을 모두 삭제 할 수 있다.
	 */
	$o = array();
	$o['bo_table']			= $input['blog_id'];
	$o['wr_id']				= 0;
	$o['path']				= $path;
	$o['bf_content']		= $input['id'];
	$o['filename']			= $pi['basename'];
	$url = g::write_file( $o );
	
	
	dlog("newMediaObject() end : url=$url");

echo<<<EOH
<?xml version="1.0"?>
<methodResponse>
  <params>
    <param>
      <value>
        <struct>
          <member>
            <name>url</name>
            <value>$url</value>
          </member>
        </struct>
      </value>
    </param>
  </params>
</methodResponse>
EOH;
}






function response_getRecentPosts()
{
	global $user, $input;
	
  
	echo <<<EOH
<?xml version="1.0" encoding="utf-8"?>
<methodResponse> 
<params>
<param>
<value>
<array>
EOH;



	$rows = g::posts( array('bo_table'=>$input['blog_id'], 'mb_id'=>$user['mb_id']) );
	
	
	
	
	foreach ( $rows as $row ) {
		$dt = $row['wr_datetime'];
		$dt = str_replace('-', '', $dt);
		$dt = str_replace(' ', 'T', $dt);
		$subject = htmlspecialchars( $row['wr_subject'] );
		$content = htmlspecialchars( substr( strip_tags($row['wr_content']) , 0, 255) );
		$url = urlencode(g::post_url( $input['blog_id'], $row['wr_id'] ) );
		echo "
			<data>
				<value>
					<struct>
						<member>
							<name>dateCreated</name>
							<value>
								<dateTime.iso8601>$dt</dateTime.iso8601>
							</value>
						</member>
						<member>
							<name>description</name>
							<value>$content</value>
						</member>
						<member>
							<name>link</name>
							<value>$url</value>
						</member>
						<member>
							<name>postid</name>
							<value>
							<i4>$input[blog_id]:$row[wr_id]</i4>
							</value>
						</member>
						<member>
							<name>title</name>
							<value>$subject</value>
						</member>
					</struct>
				</value>
			</data>
		";
	}
	
	
echo <<<EOH
</array>
</value>
</param>
</params>
</methodResponse>
EOH;

}





function response_getPost()
{
	global $user,  $input;
	
	
	list ( $blog_id, $wr_id ) = explode(':', $input['blogno']);
	
	$p = g::post( $blog_id, $wr_id );
	if ( $p['mb_id'] != $user['mb_id'] ) response_faultCode(-102, "Post No.: $blog_id : $wr_id - is not your post.");
	
	$dt = $p['wr_datetime'];
	$dt = str_replace('-', '', $dt);
	$dt = str_replace(' ', 'T', $dt);
	
	$category = 'none';
	
	
	$title = htmlspecialchars($p["wr_subject"]);
	$content = htmlspecialchars($p["wr_content"]);
	$link = urlencode(g::post_url( $blog_id, $wr_id ));
	$postid = "$blog_id:$wr_id";
  
echo <<<EOH
<?xml version="1.0" encoding="utf-8"?>
<methodResponse> 
<params>
<param>
<value>
<struct>
<member>
<name>categories</name>
<value>
<array>
<data>
<value>$category</value>
</data>
</array>
</value>
</member>
<member>
<name>dateCreated</name>
<value>
<dateTime.iso8601>$dt</dateTime.iso8601>
</value>
</member>
<member>
<name>description</name>
<value>$content</value>
</member>
<member>
<name>link</name>
<value>$link</value>
</member>
<member>
<name>postid</name>
<value>
<string>$postid</string>
</value>
</member>
<member>
<name>title</name>
<value>$title</value>
</member>
<member>
<name>publish</name>
<value>
<boolean>1</boolean>
</value>
</member>
</struct>
</value>
</param>
</params>
</methodResponse>

EOH;

	
}


