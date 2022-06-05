<?php
if(include_once("addition.php"))
{
    include_once("addition.php"); 
}
else
{
    include_once("../addition.php");
}
Class toktok extends add
{
    public function TotalCost()
    {
        //echo $this->Cost."</br>";
        return $this->Obj->TotalCost() + $this->Cost;
    }
}
?>