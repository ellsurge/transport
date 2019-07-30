<?php
// server variables

define('SERVER_NAME', $_SERVER['SERVER_NAME']);
// ......................

// DATABASE VALUE
define('DB_HOST', "localhost");
define('DB_NAME', "");
define('DB_USER', "root");
define('DB_PASSWORD', "");
// ...................


//AUTOLOAD FILES
define('MODULES_FILES', 
[
    "./modules/auth.php",
    "./modules/db.php",
    "./modules/main.php",
    "./modules/management.php",
    "./modules/util.php"
]);
// ....................


?>