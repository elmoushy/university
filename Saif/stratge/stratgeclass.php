<?php
error_reporting (E_ERROR | E_PARSE);
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
    protected $pay;
    public function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("stratge");
        $this->FileObj->setSeparator("~");
        $this->File = new filemanager();
        $this->File->setFilenames("addstratgeform");
        $this->File->setSeparator("~");
        $this->F = new filemanager();
        $this->F->spsetname("../stratgelogrizm");
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
            $ar = explode($this->File->getSeparator(),$records[$i]);
            if($i== 11)
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
                $line="Class"." ".$line_str." "."extends Pay";
                $newRecords[$i]=$line;
                $this->File->new_php_file("","$Nameofclass",$newRecords[$i]);
            }
            else
            {
                $newRecords[$i]=$records[$i];
                $this->File->new_php_file("","$Nameofclass",$newRecords[$i]);
            }
        }
    }
    public function addphp()
    {
        $records = $this->FileObj->AllContents();
        $line="<?php"."\r\n";
        $this->FileObj->new_php_file("../","stratgeprint",$line);
        for($i=0;$i<count($records);$i++)
        {
            $ar = explode($this->File->getSeparator(),$records[$i]);
            $line=$ar[2];
            $this->FileObj->new_php_file("../","stratgeprint",$line."\r\n");
        }
        $records = $this->F->AllContents();
        $this->F->new_php_file("../","stratgeprint",$line);
        for($i=0;$i<count($records);$i++)
        {
            $line=$records[$i];
            $this->FileObj->new_php_file("../","stratgeprint",$line);
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
            $record=$id.$s.$this->getName().$s."include_once("."'"."stratge"."/".$this->getName().".php"."'".")".";".$s;
            $this->FileObj->store_dataFile($record);
            $this->interphp();
            unlink("../"."stratgeprint.php");
            $this->addphp();
        }
    }
    public function Update()
    {
        
    }
    public function Trancaction($string)
    {
        if(isset($this->pay)) $this->pay->Pay($string);
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
                unlink($pos.'.php');
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
        }
        $DisplayedList = [];
        $Header = ["Id","Name"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List); $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
            array_splice($Array,2,1);
           array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }

    /**
     * Get the value of pay
     */ 
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * Set the value of pay
     *
     * @return  self
     */ 
    public function setPay($pay)
    {
        $this->pay = $pay;
        return $this;
    }
}
?>