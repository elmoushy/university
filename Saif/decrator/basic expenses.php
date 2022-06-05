<?php
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
}
else
{
    include_once("../Interface.php");
}
Class Order implements decorator
{
    public function TotalCost(){
        return 0;
    }
}
?>