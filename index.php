<?php
include('includes/autoload.inc.php');
autoload_files(MODULES_FILES);

$db = new db();

$q = $db->delete_db('davidooo');

?>
