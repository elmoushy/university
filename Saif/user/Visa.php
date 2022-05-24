<?php 
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
}
else
{
    include_once("../Interface.php");
}
class visa implements Pay{
    public function Pay(int $Amount) {
        echo "Pay with vise";
    }
}
?>