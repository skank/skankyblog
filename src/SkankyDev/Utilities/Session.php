<?php 
/**
 * Copyright (c) 2015 SCHENCK Simon
 * 
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @copyright     Copyright (c) SCHENCK Simon
 *
 */
namespace SkankyDev\Utilities;

use SkankyDev\Utilities\Traits\ArrayPathable;
/**
 * Static class for get and set variable in session
 */
class Session
{
	use ArrayPathable;
	
	private static $_instance = null;

	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new Cookie();  
		}
		return self::$_instance;
	}

	/**
	 * get value in session path
	 * @param  string $path the path to the data separated by dot
	 * @return mixed        the value
	 */
	static function get($path = ''){
		return self::arrayGet($path,$_SESSION);
	}

	/**
	 * set value in session path
	 * @param string  $path     the path to the data separated by dot
	 * @param mixed   $value    the value
	 * @return  void
	 */
	static function set($path,$value){
		return self::arraySet($path,$value,$_SESSION);
	}

	/**
	 * delete value in session path
	 * @param  string  $path     the path to the data separated by dot
	 * @return void
	 */
	static function delete($path = ''){
		return self::arrayDelete($path,$_SESSION);
	}

	/**
	 * stat session
	 */
	static function start(){
		session_start();
	}
	/**
	 * destroy session
	 */
	static function destroy(){
		session_destroy();
	}
}