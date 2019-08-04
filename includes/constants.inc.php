<?php
// server variables

// ......................

// DATABASE VALUE
define('DB_HOST', "localhost");
define('DB_NAME', "transport");
define('DB_USER', "root");
define('DB_PASSWORD', "");
// ...................


//AUTOLOAD FILES

define(
    'MODULES_FILES',
    [
        "./modules/auth.php",
        "./modules/db.php",
        "./modules/main.php",
        "./modules/management.php",
        "./modules/util.php"
    ]
);
define(
    'MODULES_FILES_INNER',
    [
        "../modules/auth.php",
        "../modules/db.php",
        "../modules/main.php",
        "../modules/management.php",
        "../modules/util.php"
    ]
);
// ....................


?>