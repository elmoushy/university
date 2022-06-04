<?php 
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
}
else
{
    include_once("../Interface.php");
}
Class fundmental implements Pay{
    public function Pay() {
        echo "Pay with Fawry";
    }
}
?>