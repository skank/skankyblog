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

namespace SkankyDev\View\Helper;

use SkankyDev\View\Helper\MasterHelper;
use SkankyDev\View\Helper\HtmlHelper;
use SkankyDev\Utilities\Session;

/**
* 
*/
class FlashMessagesHelper extends MasterHelper {

	use HtmlHelper;

	private $default = [
		'tags' => ['div','span'],
		'attr' => ['class'=>'success']
	];

	private $messages;

	public function __construct(){
		$this->messages = Session::get('FlashMessage');
	}
	/**
	 * display flash message;
	 * @return string the html;
	 */
	public function display(){
		$retour = '';
		if(!empty($this->messages)){
			foreach ($this->messages as $message) {
				$tag = $this->default['tags'][1];
				if(isset($message['attr']['class'])){
					$message['attr']['class'] .= ' flash-message';
				}else{
					$message['attr']['class'] = 'flash-message';
				}
				$retour .= $this->surround($message['messages'],$tag,$message['attr']);
			}
			$retour = $this->surround($retour,$this->default['tags'][0]);
			unset($this->messages);
		}
		Session::delete('FlashMessage');
		return $retour;
	}

}