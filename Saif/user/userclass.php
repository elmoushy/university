<?php 
error_reporting(E_ERROR | E_PARSE);
if(include_once("functions.php"))
{
    exit();
    include_once("functions.php");
    include_once("Interface.php"); 
    include_once("class_user.php");
}
else
{
    include_once("../class_user.php");
    include_once("../functions.php");
    include_once("../Interface.php");
}
class Admissions extends user
{
    protected $faculity_id=0;
    protected $userid_type=0;
    private filemanager $FileObj;
    private Pay $Pay;
    function __construct(){
        $this->FileObj=new filemanager();
        $this->FileObj->setFilenames("user");
        $this->FileObj->setSeparator("~");
    }
    public function search()
    {
        $List=$this->FileObj->AllContents();
        //id[0]~usertype_id[1]~name[2]~password[3]~phonenumber[4]~date[5]~faculity_id[6]~email[7]~
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
            if($this->id!=0)
            {
                if($this->id!=intval($Array[0]))
                {
                    
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->name!="")
            {
                if($this->name!=$Array[2])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->phone_number!="")
            {
                if($this->phone_number!=$Array[4])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->date_of_birthday!="")
            {
                if($this->date_of_birthday!=$Array[5])
                {
                   echo "4";
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            
            if($this->userid_type!=0)
            {
                if($this->userid_type!=$Array[1])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->faculity_id!=0)
            {
                if($this->faculity_id!=$Array[6])
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList = [];
        $Header = ["Id","usertype_id","Name","password","phonenumber","date","faculity_id","email"];
        array_push($DisplayedList,$Header);
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Array = explode($this->FileObj->getSeparator(),$List[$i]);
           array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
    public function Store()
    {
        //id[0]~usertype_id[1]~name[2]~password[3]~phonenumber[4]~date[5]~faculity_id[6]~email[7]~
        $s=$this->FileObj->getSeparator();
        $id=$this->FileObj->getId($s)+1;
        $email=$this->getName().$id."@hel.eg";
        $pass="hel".$this->getPhone_number();
        $this->setpassword($pass);
        $record=$id.$s.$this->getUserid_type().$s.$this->getName().$s.$this->getPassword().$s.$this->getPhone_number().$s.$this->getDate_of_birthday().$s.$this->getFaculity_id().$s.$email.$s;
        $this->FileObj->store_dataFile($record);
    }
    public function Trancaction()
    {
        if(isset($this->Pay)) $this->Pay->Pay(10);
    }
    public function update()
    {
        $records = $this->FileObj->AllContents();
        $pos = 0;
        for($i=0;$i<count($records) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
            if($this->id == $ar[0])
            {
                    $nl=""; 
                    if($this->name!="")
                    {
                        $ar[2]=$this->getName();
                        
                    }
                    if($this->phone_number!="")
                    {
                        $ar[4]=$this->getPhone_number();
                    }
                    if($this->faculity_id!=0)
                    {
                        $ar[6]=$this->getFaculity_id();
                    }
                    if($this->usertype_id!=0)
                    {
                        $ar[1]=$this->getUserid_type();
                    }
                    for($j=0; $j<count($ar)-1;$j++)
                    {
                        $nl.=$ar[$j];
                        $nl.=$this->FileObj->getSeparator();
                    } 
                    
                $this->FileObj->update_dataFile($records[$i],$nl);
                break;
            }
        }
    }
    public function remove()
    {
        $records = $this->FileObj->AllContents();
        for($i=0;$i<count($records) - 1;$i++)
        {
            $ar = explode($this->FileObj->getSeparator(),$records[$i]);
           if($this->id == $ar[0])
            {
               $this->FileObj->remove_dataFile($records[$i]);
               break;
            }
        }
    }
    public function getFaculity_id()
    {
        return $this->faculity_id;
    }
    public function setFaculity_id($faculity_id)
    {

        $this->faculity_id = $faculity_id;

        return $this;
    }
    

    public function getUserid_type()
    {
        if($this->userid_type!==null)
        {
            return $this->userid_type;
        }
    }

    public function setUserid_type($userid_type)
    {
        if($userid_type!=null)
        {
            $this->userid_type = $userid_type;

             return $this;
        }
        
    }
    public function setemail($email)
    {
        if($email!=null)
        {
            $this->email = $email;
             return $this;
        }
        
    }
    public function getemail()
    {
        if($this->email!==null)
        {
            return $this->userid_type;
        }
    }

    /**
     * Get the value of Pay
     */ 
    public function getPay()
    {
        if(isset($this->Pay))
        {
            return $this->Pay;
        }
        
    }

    /**
     * Set the value of Pay
     *
     * @return  self
     */ 
    public function setPay($Pay)
    {
        if($Pay!=null)
        {
            $this->Pay = $Pay;
            return $this;
        }
    }
}
?>