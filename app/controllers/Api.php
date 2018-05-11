<?php

/*
 * API Controller
 */

class Api extends Controller {

    public function __construct() {
        $this->model = $this->model("Movie");
    }

    public function index() {
		Redirect::to("/");
    }
    
    public function movies($id = "") {
        if(Request::method("GET")) {
            if(Request::params($id)) $this->model->findOne($id);
            else $this->model->findAll();     
        }

        if(Request::method("DELETE")) {
            if(Request::params($id)) {
                $this->model->delete($id); 
                Redirect::to("/api/movies");   
            }      
        }
    }
}