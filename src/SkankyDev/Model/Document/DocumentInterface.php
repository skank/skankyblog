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

namespace SkankyDev\Model\Document;

interface DocumentInterface{
	public function setValidateMessage(string $field, string $message);
	public function getValidateMessage(string $field);
}