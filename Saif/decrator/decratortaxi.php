<?php
if(include_once("addition.php"))
{
    include_once("addition.php"); 
}
else
{
    include_once("../addition.php");
}
Class taxi extends add
{
    public function TotalCost()
    {
        return $this->Obj->TotalCost() + $this->Cost;
    }
}
?>