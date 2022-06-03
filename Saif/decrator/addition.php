<?php
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
}
else
{
    include_once("../Interface.php");
}
abstract class Add implements decorator {
    public decorator $Obj;
	function __construct(decorator $Obj) {
        $this->Obj = $Obj;
	}
}
?>