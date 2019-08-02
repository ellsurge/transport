<?php
include('includes/autoload.inc.php');
autoload_files(MODULES_FILES);

$main = new main();
$db = new db();
$time = $main->timestamp();
$tu = $db->delete_db('tscg');
// print_r($tu);
// $up = $db->num_row();
// echo $up->$qu;
// $q = $db->create_table("users", ("id INT(6) AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30), password VARCHAR(30)"));
echo $db->error;


?>

