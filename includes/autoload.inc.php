<?php
include_once('constants.inc.php');
function autoload_files($_files)
{
    foreach ($_files as $file) {
        // echo $file;
        // file_exists($file);
        if (file_exists($file) ) {
            require_once $file;
        }
    }
}
?>