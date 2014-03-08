<?php
/**
 *	@short this class holds utility functions that are not depending on any system specific circumstance. meaning these can be used in any project.
 *
 */
class util {
	/** @short sorts by a field.
	 * @note it only works on assoc array like blow.
	 *
	 *
	 *
			 Array (
			[test7.work.org] => Array
				(
					[0] => 1
					[1] => 
					[2] => 1
					[3] => 1
				)
			[www.work.org] => Array
				(
					[0] => 2
					[1] => 
					[2] => 3
					[3] => 4
				)
			)
			
	 * @coe
		$visits = util::sort_by_field( $visits, 0, true );
		@endcode
		
	 */
	static function sort_by_field ($original, $field, $descending = false ) 
    {
		$sortArr = array(); 
        foreach ( $original as $key => $value ) {
            $sortArr[ $key ] = $value[ $field ]; 
        } 
        if ( $descending )  {
            arsort( $sortArr ); 
        } 
        else {
            asort( $sortArr ); 
        } 

        $resultArr = array(); 
        foreach ( $sortArr as $key => $value ) { 
            $resultArr[ $key ] = $original[ $key ]; 
        } 

        return $resultArr; 
    }
	
}
