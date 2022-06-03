<?php
if(include_once("InID.php"))
{
    include_once("InID.php");
    include_once("functions.php");
    include_once "Interface.php";
}
else
{
    include_once("../InID.php");
    include_once("../functions.php");
    include_once "../Interface.php";
}
class dec extends InID implements File
{
    protected $price=0;
    private $FileObj;
    
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("decrator");
        $this->FileObj->setSeparator("~");
    }
    public function Store()
    {
        $s=$this->FileObj->getSeparator();
        $id=$this->FileObj->getId()+1;
        $record=$id.$s.$this->getName().$s.$this->getPrice().$s;
        $this->FileObj->store_dataFile($record);
    }
    public function Update()
    {
        $records = $this->FileObj->AllContents();
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
                    $nl="";
                    if($this->name!="")
                    {
                        $ar[1]=$this->getName();
                    }
                    if($this->price!=-1)
                    {
                        $ar[2]=$this->getPrice();
                    }
                    for($j=0; $j<count($ar)-1;$j++)
                    {
                        $nl.=$ar[$j];
                        $nl.=$this->FileObj->getSeparator();
                    } 
                    $nl.="\r\n";
               $this->FileObj->update_dataFile($records[$i],$nl);
                break;
            }
        }
    }
    public function Remove()
    {
        $records = $this->FileObj->AllContents();
        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
               $this->FileObj->remove_dataFile($records[$i]);
               break;
            }
        }
    }

    public function Search()
    {
        // Id~Name~Price
        $List=$this->FileObj->AllContents();
        for ($i=0; $i < count($List); $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
            if($this->ID!=0)
            {
                if($this->ID!=intval($Array[0]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->name!="")
            {
                if($this->name!=$Array[1])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->price!=0)
            {
                if($this->price!=intval($Array[2]))
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList = [];
        $Header = ["Id","Name","price"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List); $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }


    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        if($price > 0)
        {
            $this->price = $price;
        }
       

        return $this;
    }
}
?>