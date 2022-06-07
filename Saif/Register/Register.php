<?php
error_reporting (E_ERROR | E_PARSE);
if(include_once("InID.php"))
{
    include_once("InID.php");
    include_once("functions.php");
    include_once("RegisterDetails/RegisterDetails.php");
    include_once "Interface.php";
}
else
{
    include_once("../InID.php");
    include_once("../functions.php");
    include_once("../RegisterDetails/RegisterDetails.php");
    include_once "../Interface.php";
}
class Register extends InID implements File
{
    private $StID;
    private $Date;
    private $totalHr = 0;
    private $totalPriceHr = 0; 
    private $RegisterDetails;
    private $FileObj;

    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("Register");
        $this->RegisterDetails = [];
    }

    function Store()
    {
        $this->ID = $this->FileObj->getId() + 1;
        $s = $this->FileObj->getSeparator();

        $record = $this->ID.$s.$this->StID.$s.$this->Date.$s.$this->totalHr.$s.$this->totalPriceHr;
        $this->FileObj->store_dataFile($record);
    }

    function Update()
    {
        $Rec = $this->FileObj->AllContents();
        for($i=0; $i< count($Rec) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$Rec[$i]);

            if($this->ID == $ar[0])
            {
                if($this->StID != "")
                {
                    $ar[1] = $this->StID;
                }

                if($this->Date != "")
                {
                    $ar[2] = $this->Date;
                }

                if($this->totalPriceHr != 0)
                {
                    $ar[4] = $this->totalPriceHr;
                }


                $nL ="";
                for($j=0;$j< count($ar); $j++)
                {
                    $nL.=$ar[$j];
                    if($j < count($ar) - 1)
                    {
                        $nL.=$this->FileObj->getSeparator();
                    }
                }
                $nL.="\r\n";

                $this->FileObj->update_dataFile($Rec[$i],$nL);
                break;
            }
        }
    }

    function updateTotalOfRegister($ID, $pos, $value, $t)
    {
        $Rec = $this->FileObj->AllContents();
        for($i=0; $i< count($Rec) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$Rec[$i]);

            if($ID == $ar[0])
            {
                $ar[$pos] = $value;

                $nL ="";
                for($j=0;$j< count($ar); $j++)
                {
                    $nL.=$ar[$j];
                    if($j < count($ar) - 1)
                    {
                        $nL.=$this->FileObj->getSeparator();
                    }
                }
                if($t == 1)
                {
                    $nL.="\r\n";
                }
                

                $this->FileObj->update_dataFile($Rec[$i],$nL);
                break;
            }
        }
    }

    function Remove()
    {
        $Rf = $this->FileObj->AllContents();
        for($i = 0; $i< count($Rf) - 1; $i++)
        {
            $ar1 = explode($this->FileObj->getSeparator(),$Rf[$i]);

            if($this->ID == $ar1[0])
            {
                $obj = new RegisterDetails();
                $aO = [];
                $aO = $obj->getAllRegisterDetails();

                for($j=0;$j<count($aO);$j++)
                {
                    if($this->ID == $aO[$j]->getRgID())
                    {
                        $aO[$j]->Remove();
                    }
                }

                $this->FileObj->remove_dataFile($Rf[$i]);
            }
        }
    }

    function Search()
    {
        $List=$this->FileObj->AllContents();

        for ($i=0; $i < count($List) - 1; $i++) { 
            $ar = explode($this->FileObj->getSeparator(),$List[$i]);
            if($this->ID!=0)
            {
                if($this->ID!=intval($ar[0]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->StID!=0)
            {
                if($this->StID!=intval($ar[1]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->Date!= "")
            {
                if($this->Date!= $ar[2])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->totalHr!=0)
            {
                if($this->totalHr!=intval($ar[3]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->totalPriceHr!=0)
            {
                if($this->totalPriceHr!=intval($ar[4]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        
        $DisplayedList = [];
        $Header = ["ID","StID","Date","totalHr","totalPriceHr"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List) - 1; $i++) { 
            $ar = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$ar);
        }
        return $DisplayedList;
    }

    function getAllRegister()
    {
        $allr = [];
        $records = $this->FileObj->AllContents();

        for($i=0; $i<count($records) - 1;$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            $allr[$i]=$this->getOneRegister($ar[0]);         
        }
        return $allr;
    }

    function getOneRegister($ID)
    {
        $rec = $this->FileObj->getLineByID($ID);
        if($rec != "")
        {
            $arr = explode($this->FileObj->getSeparator(),$rec);


            $r = new Register();
            $r->ID = $arr[0];
            $r->StID = $arr[1];
            $r->Date = $arr[2];
            $r->totalHr = $arr[3];
            $r->totalPriceHr = $arr[4];
    
            $obj = new RegisterDetails();
            $arr2 = [];
            $arr2 = $obj->getAllRegisterDetails();
    
            $j=0;
            for($i=0;$i<count($arr2);$i++)
            {
                if($arr2[$i]->GetRgID() == $r->ID)
                {
                    $r->RegisterDetails[$j] = $arr2[$i];
                    $j++;
                }
            }
    
            return $r;
        }else
        {
            return null;
        }
        
    }

    public function getStID()
    {
        if($this->StID > 0)
        {
            return $this->StID;
        }
        
    }

    public function setStID($StID)
    {
        if($StID > 0)
        {
            $this->StID = $StID;
        }        
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        if($this->Date != null)
        {
            return $this->Date;
        }
    }


    public function setDate($Date)
    {
        if($Date != null)
        {
            $this->Date = $Date;
        }
    }

    /**
     * Get the value of totalHr
     */ 
    public function getTotalHr()
    {
        if($this->totalHr >= 0)
        {
            return $this->totalHr;
        }
    }

 
    public function setTotalHr($totalHr)
    {
        if($totalHr >= 0)
        {
            $this->totalHr = $totalHr;
        }
        

        return $this;
    }

    /**
     * Get the value of totalPriceHr
     */ 
    public function getTotalPriceHr()
    {
        if($this->totalPriceHr >= 0)
        {
            return $this->totalPriceHr;
        }      
    }

  
    public function setTotalPriceHr($totalPriceHr)
    {
        if($totalPriceHr)
        {
            $this->totalPriceHr = $totalPriceHr;
        }    
    }

    /**
     * Get the value of RegisterDetails
     */ 
    public function getRegisterDetails()
    {
        if($this->RegisterDetails != null)
        {
            /*if($i == -1)
            {
               ;
            }else
            {
                return $this->RegisterDetails[$i];
            }*/
            return $this->RegisterDetails;
        }
    }

    
    public function setRegisterDetails($RegisterDetails)
    {
        if($RegisterDetails != null)
        {
            $this->RegisterDetails = $RegisterDetails;
        }
    }
}

/*$r = new Register();
//$r->setStID(6);
//$r->setDate("3/5/2022");
//$r->storeRegister();
//$r->updateRegister(1,1,3);

$rObjs = $r->getOneRegister(2);

for($i=0;$i<count($rObjs->getRegisterDetails());$i++)
{
    echo $rObjs->getRegisterDetails()[$i]->getCrsID()."</br>";
}

//echo $rObjs->

/*$rObjs = $r->getAllRegister();


echo "<table border=1>";
for($i=0;$i<count($rObjs);$i++)
{
    echo "<tr><td>".$rObjs[$i]->getID()."</td><td>".$rObjs[$i]->getStID()."</td><td>".$rObjs[$i]->GetDate()."</td><td>".$rObjs[$i]->GetTotalHr()."</td><td>".$rObjs[$i]->getTotalPriceHr()."</td></tr>";
}
echo "</table>"*/


?>