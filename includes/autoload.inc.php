<?php
require_once('constants.inc.php');
function autoload_files($_files)
{
    foreach ($_files as $file) {

        if (file_exists($file) ) {
            require_once ($file);
        }
    }

}
?>