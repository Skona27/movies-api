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

    public function delete($id) {
        $result = Database::instance()->query(
            'DELETE FROM movies WHERE id= :id', 
            ['id' => $id]
        );
    }
}