<?php

/**
 * Basset - A PHP browser sniffer
 * http://github.com/SirPepe/Basset
 *
 * Copyright (C) 2010 Peter Kröner
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Library General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Library General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

class Basset {

	/**
	 * @var string $ua User agent string
	 */
	public $ua = NULL;

	/**
	 * @var string $browser Browser type (e.g. "Firefox")
	 */
	public $browser = 'unknown';

	/**
	 * @var float $browserversion Browser version (e.g. "3.6")
	 */
	public $browserversion = 'unknown';

	/**
	 * @var string $type OS type (e.g. "Windows")
	 */
	public $os = 'unknown';

	/**
	 * @var float $typeversion OS version (e.g. "4.0")
	 */
	public $osversion = 'unknown';

	/**
	 * @var string $platform Browser platform (e.g. "Desktop")
	 */
	public $platform = 'unknown';


	/**
	 * __construct
	 * Class constructor. Sets the user agent var
	 * @return void
	 */
	public function __construct($ua = NULL){
		if(!$ua){
			$this->ua = $ua;
		}
		else{
			$this->ua = $_SERVER['HTTP_USER_AGENT'];
		}
	}


	/**
	 * parse
	 * Parses the user agent
	 * @return void
	 */
	public function parse(){
		if($this->ua){
			$this->getPlatform();
			$this->getOs();
			$this->getBrowser();
		}
	}


}

?>