
            <?php
            function witchUnit($unit){

                if($unit == "8")
                {echo "SICU1";}
                elseif($unit == "9")
                {echo "SICU2";}
                elseif($unit == "10")
                {echo "MICU";}
                elseif($unit == "11")
                {echo "CCU";} 
                elseif($unit == "12")
                {echo "VIP";}
                elseif($unit == "13")
                {echo "DayCare";}
                else{
                    echo $unit;
                    }
            }
            
            ?>