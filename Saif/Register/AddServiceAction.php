<?php
include_once("../decrator/basic expenses.php");
include_once("../function.php");
include_once("Register.php");
include_once("../decrator/decratordessert caramel.php");
include_once("../decrator/decratorSchool bus.php");


if(isset($_POST["Serves"]))
{
    $File = new filemanager();
    $File->setFilenames("decrator");
    $File->setSeparator("~");
    $s=$File->getSeparator();
    $List = $File->AllContents();
    $l="";
    $line ="0";
    $way = new Order();
    for ($i=0; $i < count($List)  - 1; $i++)
    { 
        $Array = explode("~",$List[$i]);
        
        if($Array[0]==$_POST["$Array[1]"])
        {

            $way2=$Array[1];
            $w=explode(" ",$way2);
            $line.=$File->getSeparator();
            for ($i=0; $i < count($w);$i++)
            {
                $line.=$w[$i];
                $l.=$w[$i];
            }
            $line.=$File->getSeparator();
            //$way = new Order();
            //$way=$l;
            $way =new $l($way);
            $way->setCost($Array[2]);
        } 
    }

    $reg = new Register();
    $ref = $reg->getOneRegister($_POST["rgID"]);
    $ref->setTotalPriceHr($ref->getTotalPriceHr() + $way->TotalCost());
    $ref->Update();
}

?>