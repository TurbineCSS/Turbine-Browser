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
	public $browser_version = 'unknown';

	/**
	 * @var string $platform OS type (e.g. "Windows")
	 */
	public $platform = 'unknown';

	/**
	 * @var float $platformversion OS version (e.g. "4.0")
	 */
	public $platform_version = 'unknown';

	/**
	 * @var string $platformtype Browser platform type (e.g. "Desktop")
	 */
	public $platform_type = 'unknown';


	/**
	 * __construct
	 * Class constructor. Sets the user agent var
	 * @return void
	 */
	public function __construct($ua = NULL){
		if($ua !== NULL){
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
			$this->get_platform();
			// $this->get_browser();
		}
	}


	/**
	 * get_platform
	 * Tries to get the platform (os plus version number) from the ua string
	 * @return void
	 */
	public function get_platform(){
		// Windows
		if(preg_match('/windows/i', $this->ua)){
			$this->platform = 'windows';
			// Windows mobile or desktop?
			if(preg_match('/Windows CE/i',$this->ua)){
				$this->platform_type = 'mobile';
				// $this->platform_version = $this->get_windows_mobile_version();
			}
			else{
				$this->platform_type = 'desktop';
				// $this->platform_version = $this->get_windows_desktop_version();
			}
		}
		// Mac
		elseif(preg_match('/mac/i', $this->ua)){
			$this->platform = 'mac';
			// Mobile or desktop?
			if(preg_match('/(iphone|ipod|mobile)/i', $this->ua)){
				// The iPad should count as "desktop"
				if(preg_match('/ipad/i', $this->ua)){
					$this->platform_type = 'desktop';
				}
				else{
					$this->platform_type = 'mobile';
				}
			}
			else{
				$this->platform_type = 'desktop';
			}
		}
		// Linux
		elseif(preg_match('/linux/i', $this->ua)){
			$this->platform = 'linux';
			// Mobile linux or desktop?
			if(preg_match('/linux arm/i', $this->ua)){
				$this->platform_type = 'mobile';
			}
			else{
				$this->platform_type = 'desktop';
			}
		}
		// Unix
		elseif(preg_match('/(freebsd|openbsd|solaris|sunos)/i', $this->ua)){
			$this->platform = 'unix';
			$this->platform_type = 'desktop';
		}
		// Mobile
		else{

		}
	}


}

?>