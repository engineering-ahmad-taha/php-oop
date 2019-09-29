<?php

    class category
    {
        public $conn;

        public function __construct($connection)
        {
            $this->conn=$connection;

        }


        public function get_categories()
        {

            $query = "SELECT id,name FROM categories";
            $statment = $this->conn->prepare($query);
            $statment->execute();

            $data = $statment->fetchAll(PDO::FETCH_ASSOC);
            return $data;


        }

    }



?>