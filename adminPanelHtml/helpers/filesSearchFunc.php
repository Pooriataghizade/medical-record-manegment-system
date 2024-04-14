<?php
switch($mouth)
{
  case "اسفند";
  $f = "12";
  break;
  case "فروردین";
  $f="1";
  break;
  case "اردیبهشت";
  $f = "2";
  break;
}




function convert_persian_to_english($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $output = str_replace($persian, $english, $string);
    return $output;
}

?>