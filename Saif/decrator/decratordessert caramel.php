<?php
if(include_once("addition.php"))
{
    include_once("addition.php"); 
}
else
{
    include_once("../addition.php");
}
Class dessertcaramel implements decorator
{
    public function TotalCost($Cost){
        return $this->Obj->TotalCost()+ $Cost;
    }
}
?>