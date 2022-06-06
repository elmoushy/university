<?php
include_once('../decrator/decratorbus.php');
include_once('../decrator/decratorswimming pool.php');
include_once('../decrator/decratorliberary.php');
include_once('../decrator/decratorMusic club.php');
include_once('../decrator/decratorTravel to maldiv.php');


include_once("../decrator/basic expenses.php");
include_once("../function.php");
include_once("Register.php");

if(isset($_POST["Serves"]))
{
    $File = new filemanager();
    $File->setFilenames("decrator");
    $File->setSeparator("~");
    $s=$File->getSeparator();
    $List = $File->AllContents();
    $line ="0";
    $way = new Order();
    $lclass=[];
    $lcost =[];


    for ($i=0; $i < count($List) - 1; $i++)
    { 
        echo $List[$i]."<br>";
        $Array = explode("~",$List[$i]);
        foreach($_POST["Deco"] as $dID)
        {
            
            if($Array[0]==$dID)
            {
                $way2=$Array[1];
                $w=explode(" ",$way2);
                $line.=$File->getSeparator();
                $l="";
                for ($j=0; $j < count($w);$j++)
                {
                    $line.=$w[$j];
                    $l.=$w[$j];
                }
                $line.=$File->getSeparator();
                //$way = new Order();
                //$way=$l;

                array_push($lclass,$l);
                array_push($lcost,$Array[2]);

                //$way =new $l($way);
                
                //$way->setCost($Array[2]);
                //echo $way->getCost()."and </br>";

                break;
            } 
        }
        
    }

    $Addfile = new filemanager();
    $Addfile->setFilenames("decrateteadded");
    $Addfile->setSeparator("~");
    $s = $Addfile->getSeparator();

    for($i=0;$i<count($lclass);$i++)
    {
        $way =new $lclass[$i]($way);
        $way->setCost($lcost[$i]);

        $LId = $Addfile->getId() +1;

        $nL = $LId.$s.$_POST["rgID"].$s.$lclass[$i].$s.$lcost[$i];

        $Addfile->store_dataFile($nL);
    }

    $reg = new Register();
    $ref = $reg->getOneRegister($_POST["rgID"]);
    $ref->setTotalPriceHr($ref->getTotalPriceHr() + $way->TotalCost());
    $ref->Update();

}

?>