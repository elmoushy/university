<?php 
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
    include_once("functions.php");
}
else
{
    include_once("../Interface.php");
    include_once("../functions.php");
}
Class Vodafone extends Pay{
    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj ->spsetname("orderspayway");
        $this->FileObj->setSeparator("~");
    }
    public function Pay($l) {
        $line=$this->FileObj->getId().$this->FileObj->getSeparator().$l;
        $this->FileObj->store_dataFile($line);
    }
}
?>