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


namespace App\Model;

use SkankyDev\Model\NoSqlModel;
use SkankyDev\Database\MongoClient;

class MessageModel extends NoSqlModel {

	protected $behavior = [
		'Timed','Owner'
	];

	public function initValidator($validator){
		$validator->addRules(['message'],['notEmpty'],'ne doit pas etre vide');
	}

	public function install(){
		//debug($this);
		try {
			$client = MongoClient::getInstance();
			$option = [];
			$option['autoIndexId'] = true;
			$client->createCollection('message',$option);
			return 'MessageModel has been configured';			
		} catch (\MongoDB\Driver\Exception\RuntimeException $e) {
			return 'MessageModel: '.$e->getMessage();			
			
		}

	}
}
