<?php
if(include_once("addition.php"))
{
    include_once("addition.php"); 
}
else
{
    include_once("../addition.php");
}
Class liberary extends add
{
    public function TotalCost()
    {
        return $this->Obj->TotalCost() + $this->Cost;
    }
}
?>