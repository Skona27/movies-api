<?php

/*
 * Home Controller
 */

class Home extends Controller {

	public function index() {
		if(Request::method('GET')) {
			$this->view('home/index');
		}
	}
}