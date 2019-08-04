<?php
// database.php
//this file is ment to create the database structure and execute it as well as planed
if (!@include_once("../includes/autoload.inc.php")) {
    include_once("./includes/autoload.inc.php");
};
//code...
if (!@autoload_files(MODULES_FILES)) {
    autoload_files(MODULES_FILES_INNER);
};
//********************************************************************* */


$main = new main();
$db = new db();
//create a database
$db->create_db("transport");
echo $db->error . "<br>";

//create tables-----------------------------------
$db = new db();

//COMPANY TABLE
$db->create_table("company", 
[
    "company_id VARCHAR(32) NOT NULL UNIQUE ",
    "name VARCHAR(32) NOT NULL",
    "location VARCHAR(32) NOT NULL",
    "phone VARCHAR(32) ",
    "email VARCHAR(64)",
    "password VARCHAR(32) NOT NULL",
    "PRIMARY KEY (company_id)"
]);
echo $db->error . "<br>";
//USERS TABLE
$db->create_table(
    "users",
    [
        "ip_address VARCHAR(16) NOT NULL",
        "name VARCHAR(32)  NOT NULL",
        "location VARCHAR(32) NOT NULL",
        "phone VARCHAR(32)"
    ]
);
echo $db->error . "<br>";

//USERS_LOGS TABLE
$db->create_table(
    "user_log",
    [
        "ip_address VARCHAR(16) NOT NULL",
        "company VARCHAR(32)  NOT NULL",
        "name VARCHAR(32)  NOT NULL",
        "location VARCHAR(32) NOT NULL",
        "destination VARCHAR(32) NOT NULL",
        "phone VARCHAR(32)"
    ]
);
echo $db->error . "<br>";
//PROBLEMS TABLE
$db->create_table("problems", 
[
    "ip_address VARCHAR(16) NOT NULL",
    "name VARCHAR(32)",
    "problem VARCHAR(100) NOT NULL"
]);
echo $db->error . "<br>";
//ADMIN TABLE
$db->create_table(
    "admin",
    [
        "admin_id VARCHAR(16) NOT NULL",
        "password VARCHAR(32)"
    ]
);
echo $db->error . "<br>";
//admin_login_log TABLE
$db->create_table(
    "a_l_l",
    [
        "id INT NOT NULL AUTO_INCREMENT",
        "ip_address VARCHAR(16) NOT NULL",
        "PRIMARY KEY (id)"
    ]
);
echo $db->error . "<br>";

//VEHICLES TABLE
$db->create_table(
    "vehicles",
    [
        "company_id VARCHAR(32) NOT NULL UNIQUE ",
        "price INT",
        "seat_number INT NOT NULL",
        "seat_taken INT NOT NULL",
        "vehicle_number VARCHAR(16) NOT NULL",
        "destination VARCHAR(32) NOT NULL",
        "location VARCHAR(32) NOT NULL ",
        "vehicle_status VARCHAR(16) NOT NULL",
        "comapany VARCHAR(64) NOT NULL"
    ]
);
echo $db->error . "<br>";

//RECIPTS TABLE
$db->create_table(
    "recipts",
    [
        "price INT NOT NULL",
        "seat_number INT NOT NULL",
        "name VARCHAR(16) NOT NULL",
        "vehicle_name VARCHAR(16) NOT NULL",
        "destination VARCHAR(32) NOT NULL",
        "departure VARCHAR(32) NOT NULL ",
        "comapany_name VARCHAR(64) NOT NULL",
        "code VARCHAR(64) NOT NULL UNIQUE"
    ]
);
echo $db->error."<br>";

?>