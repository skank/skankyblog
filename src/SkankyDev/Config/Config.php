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

namespace SkankyDev\Config;


use SkankyDev\Utilities\Traits\ArrayPathable;

/**
 * app Config 
 */
class Config {

	use ArrayPathable;

	static $conf;
	
	static function viewDir(){
		$name = self::getCurentNamespace();
		return APP_FOLDER.DS."src".DS.$name.DS.'Template'.DS.'view';
	}
	static function layoutDir(){
		$name = self::getCurentNamespace();
		return APP_FOLDER.DS."src".DS.$name.DS.'Template'.DS.'layout';
	}
	static function elementDir(){
		$name = self::getCurentNamespace();
		return APP_FOLDER.DS."src".DS.$name.DS.'Template'.DS.'element';
	}
	static function mailDir(){
		$name = self::getCurentNamespace();
		return APP_FOLDER.DS."src".DS.$name.DS.'Template'.DS.'mail';
	}
	static function controllerDir(){
		$name = self::getCurentNamespace();
		return APP_FOLDER.DS."src".DS.$name.DS.'Controller';
	}
	static function collectionDir(){
		$name = self::getCurentNamespace();
		return APP_FOLDER.DS."src".DS.$name.DS.'Model'.DS.'Collection';
	}
	static function getDbConf($dbSelec = 'default'){
		return self::arrayGet('db.'.$dbSelec,self::$conf);
	}

	static function getRoutes(){
		return self::arrayGet('routes',self::$conf);
	}
	static function getModuleList(){
		return self::arrayGet('Module',self::$conf);
	}

	static function getDefaultNamespace(){
		return self::arrayGet('default.namespace',self::$conf);
	}
	static function getDefaultAction(){
		return self::arrayGet('default.action',self::$conf);
	}

	static function getAccessDenied(){
		return self::arrayGet('Auth.accessDenied',self::$conf);
	}
	static function getVersion(){
		return self::arrayGet('skankydev.version',self::$conf);
	}

	static function getHelper(){
		return self::arrayGet('class.helper',self::$conf);
	}
	static function getBehavior(){
		return self::arrayGet('class.behavior',self::$conf);
	}
	static function getTools(){
		return self::arrayGet('class.tools',self::$conf);
	}
	static function getListener(){
		return self::arrayGet('class.listener',self::$conf);
	}
	static function getListenerList(){
		return self::arrayGet('listener',self::$conf);
	}

	static function get($path){
		return self::arrayGet($path,self::$conf);
	}

	static function getCurentNamespace(){
		$name = self::get('skankydev.curentNamespace');
		if(!$name){
			$name = self::getDefaultNamespace();
		}
		return $name;
	}

	static function setCurentNamespace($name){
		return self::set('skankydev.curentNamespace',$name);
	}

	static function set($path,$value){
		return self::arraySet($path,$value,self::$conf);
	}

	static function getDebug(){
		return self::arrayGet('debug',self::$conf);
	}

	static function initConf($basePath = ''){

		if(empty(self::$conf)){
			if(empty($basePath)){
				$basePath = APP_FOLDER;
			}
			$mConf = require $basePath.DS.'config'.DS.'master.config.php';
			$tmpConf = [];
			$conf = array_replace_recursive($tmpConf,$mConf);
			foreach ($mConf['Module'] as $key) {
				$tmpConf = require $basePath.DS.'src'.DS.$key.DS.'Config'.DS.'config.php';
				$conf = array_replace_recursive($conf,$tmpConf);
			}
			$dConf = require $basePath.DS.'src'.DS.'SkankyDev'.DS.'Config'.DS.'default.config.php';
			self::$conf = array_replace_recursive($dConf,$conf);
		}
		
		return self::$conf;
	}

}
