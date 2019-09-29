<?php
class product
{
    public $conn;
    public $name;
    public $description;
    public $price;
    public $category_id;

    public function __construct($connection)
    {
        $this->conn=$connection;


    }


    public function add_products()
    {
        $date  = date("Y-m-d H:i:s");

        $query = "INSERT INTO products (name,description,price,category_id,created) values ('$this->name','$this->description','$this->price',$this->category_id,'$date')";

        $statment = $this->conn->prepare($query);
        $statment->execute();
        $check = $statment->fetchAll(PDO::FETCH_ASSOC);

        return $check;


    }


    public function get_products()
    {


        $query = "SELECT products.id,products.name,products.description,products.price,categories.name as 'category_name' FROM products,categories WHERE products.category_id = categories.id";
         $statment = $this->conn->prepare($query);
        $statment->execute();

        $data = $statment->fetchAll(PDO::FETCH_ASSOC);
        return $data;


    }

}



?>