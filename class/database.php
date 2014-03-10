<?php
class db extends database { }
class database {

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
		dlog("QUERY: $q");
		return sql_query( $q, $error );
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
		return sql_fetch( $q );
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
		while ( $row = sql_fetch_array($result) ) {
			$rows[] = $row;
		}
		return $rows;
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
