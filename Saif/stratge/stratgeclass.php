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
class stratge extends InID implements File
{
    private $FileObj;
    private $File;
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("stratge");
        $this->FileObj->setSeparator("~");
        $this->File = new filemanager();
        $this->File->setFilenames("addstratgeform");
        $this->File->setSeparator("~");
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
            $ar = explode($this->File->getSeparator(),$records[$i]);
            if($i== 9)
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
                $line="Class"." ".$line_str." "."implements Pay";
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
    public function Store()
    {
        $s=$this->FileObj->getSeparator();
        $id=$this->FileObj->getId()+1;
        $record=$id.$s.$this->getName().$s."include_once("."'"."stratge"."/".$this->getName().".php"."'".")".$s;
        $this->FileObj->store_dataFile($record);
        $this->interphp();
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
                        unlink('decrator'.$ar[1].'.php');
                        $ar[1]=$this->getName();
                        $this->interphp();
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
    public function Trancaction()
    {
        if(isset($this->Pay)) $this->Pay->Pay(10);
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
               $this->FileObj->remove_dataFile($records[$i]);
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

}
?>