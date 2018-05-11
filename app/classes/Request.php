<?php

/*
 * Request Class
 * Run callback function
 */

class Request {
	
	public static function method($type = 'GET') {
		// If request is what we want, return true
		if ($_SERVER['REQUEST_METHOD'] === $type) {
			return true;
		} 
		else return false;
	}

	public static function params($param) {
		if(isset($param) && !empty($param)) {
			return true;
		} 
		else return false;
	}
}