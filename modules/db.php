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

    // utils------------------------------------------------

    public function num_row()
    {
        $num = mysqli_num_rows($this->query);
        return $num;
    }


    public function condition_fomat($_arr)
    {
        $string = "";
        // foreach ($_arr as $arr) {
        $string = "`$_arr[0]`" . " " . $_arr[2] . " '" . $_arr[1] . "'";

        return $string;
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
        // echo $_query;
        $query= mysqli_query($this->conn, $_query);
        // print_r($query);
        // die();
        $this->error($query);
        // $query = mysqli_execute($query_prep);
        $this->query = $query;
        // die($this->query);
        // $this->error($this->query);
        return $this->query;
    }


    // create -------------------------------------------

    public function create_db($_name){
        $result = $this->query_run("CREATE DATABASE $_name");
        return $result;
    }

    public function create_table($_name, $_values){
        $values = chop($this->arr_to_str($_values, ["", ", "]), ", ");
        $result = $this->query_run("CREATE TABLE IF NOT EXISTS $_name  ($values)");
        return $result;

    }

    // insert------------------------------------------------

    public function insert($_table, $_values, $_fields  = null ){
        if($_fields != null){
        $fields = chop($this->arr_to_str($_fields, ["`", "`, "]), ", ");
        }else{
            $fields = "";
        }
        $values = chop($this->arr_to_str($_values, ["'", "', "]), ", ");
        $result = $this->query_run("INSERT INTO $_table ($fields) VALUES($values) ");
        return $result;
    }

    // update------------------------------------------------

    public function update($_table, $_fields, $_condition = 1)
    {

        if($_condition != 1){
        $condition = $this->condition_fomat($_condition);
        }else{
            $condition = 1;
        }

        $fields= $this->condition_fomat($_fields);
        // $fields = $this->arr_to_str($_fields, ["`", "`, "]);        
        $result = $this->query_run("UPDATE $_table SET $fields WHERE $condition ");
        return $result;
    }
    // delete------------------------------------------------

    public function delete_db($_name)
    {
        $result = $this->query_run("DROP DATABASE $_name");
        return $result;
    }
    public function delete_table($_name){

        $result = $this->query_run("DROP TABLE $_name ");
        return $result;
    }
    public function delete_data($_table, $_condition = 1){

        if ($_condition != 1) {
            $condition = $this->condition_fomat($_condition);
        } else {
            $condition = 1;
        }
        $result = $this->query_run("DELETE FROM $_table WHERE $condition");
        return $result;
    }

    //selects----------------------------------------------------

    public function select($_table, $_fields = '*', $_condition = 1)
    {
        if ($_fields != '*') {
            $fields = chop($this->arr_to_str($_fields, ["`", "`, "]), ", ");
        } else {
            $fields = "*";
        }

        if ($_condition != 1) {
            $condition = $this->condition_fomat($_condition);
        } else {
            // echo "newsdsd";
            $condition = 1;
        }

        // $condition = $this->condition_fomat($_condition);
        $qr = $this->query_run("SELECT  $fields FROM $_table WHERE  $condition");
        // print_r($qr);
        // die($qr);
        $assoc = mysqli_fetch_all($qr, MYSQLI_ASSOC);
        // $array = mysqli_fetch_array($qr);
        return $assoc;
        // return $array;
    }
}
?>