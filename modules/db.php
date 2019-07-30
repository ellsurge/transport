<?php
include_once("./includes/autoload.inc.php");
autoload_files(MODULES_FILES);

class db extends main {
    // list of methods (variables)
    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_name;
    protected $conn;
    protected $query;
    

    public $error;

    function __autoload(){

       
    }
    public function __construct()
    {
        // this is for the assignment of the values to the class
        $this->db_host = DB_HOST;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASSWORD;
        $this->db_name = DB_NAME;
        $this->db_connect();
    }
    
    public function db_connect(){
        // creates a database connection and stores it in a variable called conn
        $this->conn = mysqli_connect($this->db_host, $this->db_user,$this->db_pass, $this->db_name);
        $this->error_check($this->conn) == false? mysqli_connect_error() : "";
        return $this->conn;
        
    }
    public function error($_arg){
        // this searches for errors nd returns them
        if($_arg == false){
            $this->error = mysqli_error($this->conn);
        }else{
            
        }
    }
    public function query_run($_query){
        // this pracrtically runs any querry nd variffies it to prevent errors nd stuff
        $query_prep = mysqli_prepare($this->conn, $_query);
        // die();
        $this->error($query_prep);
        $this->query = mysqli_execute($query_prep);
        $this->error($this->query);
        return $this->query;
    }
    public function create_db($_name){
        $this->query_run("CREATE DATABASE $_name");
    }
    public function delete_db($_name)
    {
        $this->query_run("DROP DATABASE $_name");
    }

}
?>