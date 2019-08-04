<?php
// **************************this code is to be put in everyfile*****************

if (!@include_once("../includes/autoload.inc.php")) {
    include_once("./includes/autoload.inc.php");
};
//code...
if (!@autoload_files(MODULES_FILES)) {
    autoload_files(MODULES_FILES_INNER);
};
//--------------------------------------------------------------------------------------

include_once("includes/database.inc.php");
$main = new main();
$db = new db();
// $db->delete_db("transport");
echo $db->error;


?>

