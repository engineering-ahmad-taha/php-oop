<?php
class db_connection
{
    public $dsn = 'mysql:host=localhost;dbname=myapplication';

    public $username = 'root';
    public $password = '';
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->username, $this->password);

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}

?>






