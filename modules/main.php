<?php
class main{
    function __autoload(){
    
    }
    public function error_check($_arg)
    {
        if ($_arg == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>