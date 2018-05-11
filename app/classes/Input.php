<?php

/*
 * Input Class
 * Get input data send by user
 * Sanitize input data
 */

class Input {

	public static function exists($type = "POST") {
		switch($type) {
			case "POST":
				return (!empty($_POST)) ? true : false;
				break;
			case "GET":
				return (!empty($_GET)) ? true : false;
				break;
			case "FILES":
				return (!empty($_FILES)) ? true : false;
				break;
			default:
				return false;
				break;
		}
	}

	public static function get($item) {
		if(isset($_POST[$item])) {
			return self::sanitize($_POST[$item]);
		}	

		else if(isset($_GET[$item])) {
			return self::sanitize($_GET[$item]);
		}
		else if(isset($_FILES[$item])) {
			return $_FILES[$item];
		}
		
		else return '';
	}

	private static function sanitize($string) {
		return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}
}