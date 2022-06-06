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
    private $File;
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("decrator");
        $this->FileObj->setSeparator("~");
        $this->File = new filemanager();
        $this->File->setFilenames("addclassform");
        $this->File->setSeparator("~");
        $this->F = new filemanager();
        $this->F->spsetname("../dacoratelogarizm");
        $this->F->setSeparator("~");
    }
    public function interphp()
    {
        $records = $this->File->AllContents();
        $newRecords = array();
        $s=$this->File->getSeparator();
        $Nameofclass=$this->getName();
        $line_str="";
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($i==9)
            {
                $str=explode(" ",$this->getName());
                for($j=0;$j< count($str);$j++)
                {
                    if($str[$j]=="~"||$str[$j]=="!"||$str[$j]=="@"||$str[$j]=="#"||$str[$j]=="$"||$str[$j]=="%")
                    {
                        $line_str.="_";
                    }
                    else
                    {
                        $line_str.=$str[$j];
                    }
                }
                $line=$ar[0].$line_str.$ar[2];
                $newRecords[$i]=$line;
                $this->File->new_php_file("decrator","$Nameofclass",$newRecords[$i]);
            }
            else
            {
                $newRecords[$i]=$records[$i];
                $this->File->new_php_file("decrator","$Nameofclass",$newRecords[$i]);
            }
        }
    }
    public function addphp()
    {
        
        $records = $this->FileObj->AllContents();
        $line="<?php"."\r\n";
        $this->FileObj->new_php_file("../","Register/AddServiceAction",$line);
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->File->getSeparator(),$records[$i]);
            $line=$ar[3]."\r\n";
            $this->FileObj->new_php_file("../","Register/AddServiceAction",$line);
        }
        $records = $this->F->AllContents();
        $this->F->new_php_file("../","Register/AddServiceAction",$line);
        for($i=0;$i<count($records);$i++)
        {
            $line=$records[$i];
            $this->FileObj->new_php_file("../","Register/AddServiceAction",$line);
        }
    }
    public function Store()
    {
        $gg=0;
        $records = $this->FileObj->AllContents();
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($ar[1] == $this->getName())
            {
                $gg=1;
                break;
            }
        }
        if($gg==0)
        {
            $s=$this->FileObj->getSeparator();
            $id=$this->FileObj->getId()+1;
            $record=$id.$s.$this->getName().$s.$this->getPrice().$s."include_once("."'"."../"."decrator"."/"."decrator".$this->getName().".php"."'".")".";".$s;
            $this->FileObj->store_dataFile($record);
            $this->interphp();
            unlink("../Register/AddServiceAction.php");
            $this->addphp();
        }
    }
    public function Update()
    {
        $gg=0;
        $records = $this->FileObj->AllContents();
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($ar[1] == $this->getName()&&$ar[0]!=$this->getID())
            {
                $gg=1;
                break;
            }
        }
        if($gg == 0)
        {
            $records = $this->FileObj->AllContents();
            $s=$this->FileObj->getSeparator();
            for($i=0;$i<count($records);$i++)
            {
                $ar = explode($this->FileObj->getSeparator(),$records[$i]);
                if($this->ID == $ar[0])
                {
                        $nl="";
                        if($this->name!="")
                        {
                            unlink('decrator'.$ar[1].'.php');
                            unlink("../Register/AddServiceAction.php");
                            $ar[1]=$this->getName();
                            $ar[3]="include_once("."'"."../"."decrator"."/"."decrator".$this->getName().".php"."'".")".";".$s;
                            $this->interphp();
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
                        $this->addphp();
                        break;
                }
            }
        }
        
    }
    public function Remove()
    {
        $pos="";
        $records = $this->FileObj->AllContents();
        for($i=0; $i<count($records);$i++)
        {
            $ar=explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->ID == $ar[0])
            {
               $pos=$ar[1];
               $this->FileObj->remove_dataFile($records[$i]."\r\n");
               break;
            }
        }
        unlink('decrator'.$pos.'.php');
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
            array_splice($Array,3,1);
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