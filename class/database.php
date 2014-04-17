<?php
class db extends database { }
class sql {
	static $option;
	static function option( $o )
	{
		self::$option = $o;
	}
	
	/**
	 *
	 * $v holds the expression and value.
	 * @note possilbe expression
		"=value"
		">value"
		">=value"
		"<value"
		"<=value"
		"<>value"
	 *  @warning DO NOT USE like below
	 *  
	 *  	`field_name`=>"<>''"
	 *  
	 *  				will interpret like below
	 *  
	 * 			 		`field_name`<> '''
	 *  
	 *  				===> sing quote cause error.
	 *  
	 *  	`field`=>'<>NULL'
	 *  				
	 *  				result => `field`<>'NULL'
	 *  
	 *  	so, if you need to compare with NULL or empty, use ANY expression.
	 *  	
	 *  
	 *  @note How to use (ANY) expression :
	 *  
		if it is array, then the first element will be used as the express and value.
		
		@code the code below will make SQL like "wr_option LIKE '%secret%'"
			$posts = g::posts(
				array(
					'wr_option'			=> array( "LIKE '%secret%'" ),
					'wr_hit'			=> array( "!= 1234" ),
					'wr_subject'		=> array( "IS NOT NULL" ),
				)
			);
		@endcode
		
		

		
		@note
			'wr_datetime'=> '>=' . g::datetime( time() - ONEDAY * 7),
			will be parsed as wr_datetime >= 'YYYYMMDD HH:ii:ss'
		@note
			'domain'				=> etc::domain(),
			will be parsed as domain='domain'
		@note
			'wr_is_comment'	=> 0,
			will be parsed as "wr_is_comment='0'"
		@code basic usage
					db::option( $o );
					if ( $o['domain'] ) $cond[] = db::cond('domain');
					if ( $o['bo_table'] ) $cond[] = db::cond('bo_table');
					if ( $o['wr_datetime'] ) $cond[] = db::cond('wr_datetime');
					if ( ! isset( $o['wr_is_comment']  ) ) $cond[] = "wr_is_comment=0";
					else $cond[] = db::cond('wr_is_comment');
					if ( $cond ) $where = "WHERE " . implode( ' AND ', $cond );
					else $where = null;
		@endcode
			
	 */
	static function cond( $k ) {
		$v = self::$option[ $k ];
		if ( is_array($v) ) {
			$str = "`$k` $v[0]";
		}
		else {
			if ( $v[0] == '<'  || $v[0] == '>' ) {
				if ( $v[1] == '=' || $v[1] == '>' ) {
					$exp = substr( $v, 0, 2 );
					$v = substr($v, 2);
				}
				else {
					$exp = $v[0];
					$v = substr($v, 1);
				}
			}
			else if ( ( $v[0] == '!' && $v[1] == '=' ) || ( $v[0] == '<' && $v[1] == '>' ) ) {
				$exp = substr( $v, 0, 2 );
				$v = substr($v, 2);
			}
			else $exp = '=';
			$str = "`$k`$exp'$v'";
		}
		return $str;
	}
	
	
	static function where( $o )
	{
		unset( $o['extra'], $o['select'], $o['limit'], $o['order by'], $o['table'] );
		
		db::option( $o );
		foreach ( $o as $k => $v ) {
			$cond[] = db::cond($k);
		}
		
		if ( $cond ) $where = "WHERE " . implode( ' AND ', $cond );
		else $where = null;
		
		return $where;
	}
	
	/**
		@code
			return db::rows( sql::query( $o ) );	
		@endcode
	 */
	static function query( $o )
	{
		$cond = array();
		if ( ! empty( $o['extra'] ) ) {
			$cond[] = $o['extra'];
		}
		if ( empty( $o['select'] ) ) $select = '*';
		else $select = $o['select'];
		
		if ( ! empty( $o['order by'] ) ) {
			$order_by = "ORDER BY {$o['order by']}";;
		}
		if ( empty( $o['limit'] ) ) $limit = "0,10";
		else $limit = $o['limit'];
		
		$table = $o['table'];
		
		$where = self::where( $o );		
		
		$q = "
			SELECT $select
			FROM $table
			$where
			$order_by
			LIMIT $limit
		";
		return $q;
	}
	
	static function query_count( $o )
	{
		$where = self::where ( $o );
		$q = "
			SELECT COUNT(*)
			FROM $o[table]
			$where
		";
		return $q;
	}
}
class database extends sql{

	/**
	 *  @brief returns the result set after query.
	 *		쿼리를 하고 결과 셋을 리턴한다.
	 *  
	 *  @param [in] $q SQL Query
	 *  @return result set
	 *  
	 *  @details It is just a alias of G5 'sql_query()'
	 */
	static function query( $q, $error=TRUE)
	{
		if ( function_exists( 'dlog' ) ) dlog("QUERY: $q");
		return self::sql_query( $q, $error );
	}
	
	
	/** @short it checks if G5 'sql_query()' exists. or else does same routine of it.
	 *
	 *
	 */
	static function sql_query($sql, $error=TRUE)
	{
		if ( function_exists( 'sql_query' ) ) return sql_query( $sql, $error );
		if ($error)
			$result = @mysql_query($sql) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : {$_SERVER['PHP_SELF']}");
		else
			$result = @mysql_query($sql);
		return $result;
	}


	/**
	 *  @brief 쿼리를 해서 1 개의 행을 리턴한다.
	 *  
	 *  @param [in] $q SQL Query
	 *  @return 연관 배열
	 *  
	 *  @details 연관 배열로 하나의 행을 리턴한다.
	 */
	static function row( $q )
	{
		return self::sql_fetch( $q );
	}
	
	
	/** @short it checks if G5 'sql_fetch()' exists. or else does same routine of it.
	 *
	 *
	 */
	static function sql_fetch($sql, $error=TRUE)
	{
		if ( function_exists( 'sql_fetch' ) ) return sql_fetch( $sql, $error );
		$result = self::sql_query($sql, $error);
		//$row = @sql_fetch_array($result) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER['PHP_SELF']");
		$row = self::sql_fetch_array($result);
		return $row;
	}

	
	/**
	 *  @brief 쿼리를 해서 1 개의 값을 리턴한다.
	 *  
	 *  @param [in] $q SQL Query
	 *  @return scalar 하나의 값이다.
	 *  
	 *  @details 하나의 값을 리턴하므로 쿼리를 할 때, 1개의 행에서 1개의 레코드를 선택 하도록 해야 한다.
	 *  따라서 가능하면 LIMIT 1 을 주거나 또는 1개의 행과 그 1개의 레코드만 선택하도록 조건절을 입력해야 한다.
	 */
	static function result( $q )
	{
		$res = self::query( $q );
		$row = mysql_fetch_array( $res );
		return $row[0];
	}
	
	/**
	 *  @brief 여러개의 레코드을 연관 배열로 리턴한다.
	 *  
	 *  @param [in] $q SQL Query
	 *  @return 연관 배열
	 *  
	 *  @details 쿼리를 통해서 여러개의 행을 리턴한다. 만약 결과 값이 아주 많이 있다면 (예: 1천개 이상) 직접 루프를 통해서 값을 찾아야 한다.
	 */
	static function rows( $q ) {
		$rows = array();
		$result = self::query( $q );
		while ( $row = self::sql_fetch_array($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	

	static function sql_fetch_array($result)
	{
		if ( function_exists( 'sql_fetch_array' ) ) return sql_fetch_array( $result );
		$row = @mysql_fetch_assoc($result);
		return $row;
	}


	
	
	
	
	
	/* @short Inserts a record into a table.
	 * 
	 * @note
			Do not use 'REPLACE INTO'
			
	 *
	 * @param string $table_name
			table name
	 * @param associative-array $values
			fields and its values.
	 * @return
			true on success,
			false on fail.
			
			This is the same as PDO_STATEMENT::execute
		@code
			$db->insert('config', array('code'=>'insert_test', 'data'=>'abc def', 'stamp'=>time()));
		@endcode
		
		
	 *
	 */
	static function insert($table_name, $kvs) {
		foreach($kvs as $key => $val) {
			$key_list[] = $key;
			$val_list[] = self::addquotes($val);
		}
		$keys = "`".implode("`,`",$key_list)."`";
		$vals = "'".implode("','",$val_list)."'";
		$q = "INSERT INTO `{$table_name}` ({$keys}) VALUES ({$vals})";
		return self::query( $q );
	}
	
	

	
	/**
	 *  @brief updates
	 *  
	 *  @param [in] $table the name of the table to be updated.
	 *  @param [in] $kvs the array of field & value
	 *  @param [in] $conds array of condition for WHERE statement.
	 *  @return result set
	 *  
	 *  @details Details
	 *  @code
	 *  db::update('test', array('id'=>'id1-updated', 'name'=>'name2'), array('id'=>'id1'));
	 *  @endcode
	 */
	static function update($table, $kvs, $conds)
	{
		foreach($kvs as $k => $v) {
			$v = self::addquotes($v);
			$sets[] = "`$k`='$v'";
		}
		$set = implode(", ", $sets);
		foreach($conds as $k => $v )
		{
			$arc[] = "`$k`='$v'";
		}
		$cond = implode(" AND ", $arc);
		$q = "UPDATE $table SET $set WHERE $cond";
		return self::query($q);
	}
	
	/**
	 *
	 * @code
			db::insert( 'x_site_config', array( 'domain'=>$domain, 'mb_id'=>$mb_id );
			return db::insert_id();
	 * @endcode
	 */
	static function insert_id()
	{
		return mysql_insert_id();
	}
	
	/**
	 *  @brief adds quotes into the SQL statement.
	 *  
	 *  @param [in] $data data
	 *  @return string
	 *  
	 *  @details adds quotes into the SQL statement.
	 *  @warning G5 does quoting by itself in common.php. Do not quote here again. It produces error.
	 */
	static function addquotes($data) {
		return $data;
		// return addslashes($data);
	}
	
	/** @short returns true if the table is exists.
	  *
	  */
	static function table_exist($table)
	{
		return db::result("SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = '".G5_MYSQL_DB."' AND table_name ='$table'");
	}
	
	/** @short returns true if the key of the table exists.
	 *
	 * @note use this function to check if a key is exists in that table.
	 *
	 */
	static function key_exist( $table, $key )
	{
		return db::row("SHOW INDEX FROM $table WHERE KEY_NAME = '$key'");
	}
	
}
