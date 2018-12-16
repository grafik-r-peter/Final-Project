<?php 

class Database {
    public $conn;

    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $db_name="alumni_project";

    function __construct(){
        $this->open_db_conn();
    }

    public function open_db_conn(){
        $this->conn=mysqli_connect($this->servername, $this->username, $this->password, $this->db_name);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // echo "Connected successfully \n";
    }

    public function query($sql){
        $result=mysqli_query($this->conn,$sql);

        if(!$result){
            // echo "query failed";
        }

        return $result;
    }
}

$db=new Database();


 ?>