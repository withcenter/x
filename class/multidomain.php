<?php
define('MD_CONFIG', "x_multidomain_config");
class md extends multidomain {}
class multidomain {

	/**
	 *  @brief returns domain configuration
	 *  
	 *  @param [in] $idx 
	 *  	if it is numeric, then it returns a record of a domain.
	 *  	if it is not, it returns a record of a domain which first matches based on the priority ( with the input domain ).
	 *  	if it is empty, it returns all the records of domain info ( from configuration table )
	 *  @return mixed
	 *  
	 *  @details 
	 *  @code
	 *  	$site = multisite_config(etc::domain_name());
	 *  @endcode
	 *  @warning if you want to give a default record that matches all the domain, just put "." in domain with priority of 0.
	 *  @see https://docs.google.com/a/withcenter.com/document/d/1hLnjVW9iXdVtZLZUm3RIWFUim9DFX8XhV5STo6wPkBs/edit#heading=h.jz5yn0cooc3s
	 */
	function config($idx=null)
	{
		if ( empty($idx) ) {
			$row = db::rows("SELECT * FROM ".MD_CONFIG." ORDER BY priority DESC");
		}
		else {
			if ( is_numeric($idx) ) {
				$row = db::row("SELECT * FROM ".MD_CONFIG." WHERE idx=$idx");
			}
			else {
				/** @short 현재 도메인의 설정을 찾는다.
				 *  @warning This may take a while if there are thousands of multi domain(or multisite) registered.
				 *  @todo cache this code.
				 */
				$rows = db::rows("SELECT * FROM ".MD_CONFIG." ORDER BY priority DESC");
				
				/** @note theme 을 찾아서 $theme 에 저장한다. */
				$theme = null;
				foreach ( $rows as $row ) {
					if ( strpos($idx, $row['domain']) !== false ) {
						$theme = $row;
						break;
					}
				}
				$row = $theme;
			}
		}
		if ( empty($row) ) return array('theme'=>'default');
		return $row;
	}
	
	/**
	 *  @brief updates domain configuration
	 *  
	 *  @return empty
	 *  
	 *  @param global $theme
	 *  @param global $priority
	 *  @param global $domain
	 *  
	 *  @details use this function when super user updates the domain setting
	 *  It can be used to add a domain programtically.
	 *  @code
	 *  	global $idx, $domain, $priority, $theme;
	
			$domain		= '.com';
			$priority	= 0;
			$theme		= 'default';
			$idx		= 0;
			md::config_update();
			
			$domain		= '.net';
			$idx		= 0;
			md::config_update();
			
			$domain		= '.org';
			$idx		= 0;
			md::config_update();
			
			$domain		= '.kr';
			$idx		= 0;
			md::config_update();
	 *  @endcode
	 */
	function config_update( )
	{
		global $idx, $domain, $priority, $theme;
		
		$up = array();
		$up['domain'] = $domain;
		$up['theme'] = $theme;
		$up['priority'] = $priority;
		
		
		/** if $idx is not set, it checks if the domain exists.
			 *  if exists, then it updates based on domain.
			 *  or insert.
			 */
		if ( empty($idx) ) {
			$idx = db::result("SELECT idx FROM ".MD_CONFIG." WHERE domain='$domain'");
			if ( $idx ) {
				dlog( $idx );
				db::update(MD_CONFIG, $up, array('idx'=>$idx));
				return $idx;
			}
			else {
				db::insert(MD_CONFIG, $up);
				return db::insert_id();
			}
		}
		/** If $idx is set, then it can update domain itself */
		else {
			db::update(MD_CONFIG, $up, array('idx'=>$idx));
			return $idx;
		}
	}
	
	/**
	 *  @brief returns a record of a domain
	 *  
	 *  @param [in] $domain domain
	 *  @return array a record.
	 *  
	 *  @details use this function to check if a domain configuraiton is already exist or not.
	 * Do not use this function to get the configuration
	 */
	static function get( $domain )
	{
		return db::row( 'SELECT * FROM ' . MD_CONFIG . " WHERE domain='$domain'" );
	}
	
	
	static function config_delete( $idx )
	{
		db::query("DELETE FROM ".MD_CONFIG." WHERE idx=$idx");
	}
	static function url_list()
	{
		return "?module=multidomain&action=admin_list";
	}
	static function url_config($idx)
	{
		return "?module=multidomain&action=admin_update&idx=$idx";
	}
	static function url_delete($idx)
	{
		return "?module=multidomain&action=admin_delete_submit&idx=$idx";
	}
	static function url_add()
	{
		return "?module=multidomain&action=admin_update";
	}
	
	
} // eo class
