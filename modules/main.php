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
    public function arr_to_str($_arr, $_fmt){
        $string = "";
        $pre = $_fmt[0];
        $post = $_fmt[1];
        foreach ($_arr as $arr) {
            $string =$string. $pre. $arr .$post;
        }
        return $string;
    }
    public function timestamp(){
        $i = date('i'); //minutes
        $s = date('s'); //seconds
        $h = date('H'); //hours 24
        $a = date('a'); //am or pm
        $d = date('d'); //day
        $m = date('m'); //month
        $y = date('Y'); //year


        $format = mktime($h , $i, $s, $m, $d, $y);
        $stamp = date("Y-m-d H:i:s", $format);
        return $stamp;
    }

}
?>