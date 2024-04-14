<?php
function statusF($status){
    if($status == "0")
    {
        echo "بررسی نشده";
    }
    elseif($status == "1"){
        echo "بدون ایراد و ارسال به بایگانی";
    }
    elseif($status == "2"){
        echo "پرونده نقص دار میباشد و تحویل منشی بخش";
    }elseif($status == "3"){
        echo "پرونده فاقد اوراق اصلی میباشد و صمدی آن هارا برای رفع نقص خواهد برد";
    }elseif($status == "4"){
        echo "سورت نشده";
    }
}

?>