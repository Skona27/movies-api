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

        if(Request::method("POST")) {
            if(Input::exists()) {
                $movie = [
                    'title' => Input::get("title"),
                    'description' => Input::get("description"),
                    'year' => Input::get("year"),
                    'director' => Input::get("director"),
                    'language' => Input::get("language"),
                    'length' => Input::get("length"),
                    'rate' => Input::get("rate")
                ];
                $this->model->create($movie);
            }           
        }
    }
}