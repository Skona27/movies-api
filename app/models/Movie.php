<?php 

class Movie extends Model {
    public function __construct() {
        parent::__construct();
    } 

    public function findAll() {
        $result = $this->db->query(
            'SELECT * FROM movies'
        )->results();

        echo json_encode($result);
    }

    public function findOne($id) {
        $result = Database::instance()->query(
            'SELECT * FROM movies WHERE id= :id', 
            ['id' => $id]
        )->first();

        echo json_encode($result);
    }

    public function create($movie) {
        $insert = Database::instance()->query(
            'INSERT INTO movies VALUES (:id, :title, :description, :year, :director, :language, :length, :rate)', [
            'id' => 0,
            'title' => $movie["title"],
            'description' => $movie["description"],
            'year' => $movie["year"],
            'director' => $movie["director"],
            'language' => $movie["language"],
            'length' => $movie["length"],
            'rate' => $movie["rate"]
        ]);
       
        if(!$insert->error()) {
            $result = Database::instance()->query(
                'SELECT * FROM movies WHERE title= :title',
                ['title' => $movie["title"]]
            )->first();

            echo json_encode($result);
        }
    }
}