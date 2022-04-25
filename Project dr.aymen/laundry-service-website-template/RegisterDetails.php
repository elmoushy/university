<?php

include_once("InID.php");
include_once("functions.php");
include_once("Courses.php");

class RegisterDetails extends InID
{
    private $rgID;
    private $Reg=null;
    private $CrsID;
    private $Crs;
    private $FileObj;

    function __construct()
    {
        $this->FileObj = new filemanager();
        $this->FileObj->setFilenames("RegisterDetails.txt");
        //$this->Crs = new Course();
        //$this->Reg = new Register();
    }

    public function storeRegisterDetails()
    {
        $this->ID = $this->FileObj->getId() + 1;

        $obj = new Register();
        $this->Reg = $obj->getOneRegister($this->rgID);

        if($this->Reg != null)
        {
            $s = $this->FileObj->getSeparator();

            $record = $this->ID.$s.$this->rgID.$s.$this->CrsID.$s.$this->Crs->getHour().$s.$this->Crs->getHourPrice();
            $this->FileObj->store_dataFile($record);

            //$this->Reg
        }
        
    }

    public function getRgID()
    {
        if($this->rgID)
        {
            return $this->rgID;
        }
    }

    public function setRgID($rgID)
    {
        if($rgID)
        {
            $this->rgID = $rgID;
        }
    }

    /**
     * Get the value of Crs
     */ 
    public function getCrs()
    {
        if($this->Crs != null)
        {
            return $this->Crs;
        }
    }

    /**
     * Set the value of Crs
     *
     * @return  self
     */ 
    public function setCrs($Crs)
    {
        if($Crs != null)
        {
            $this->Crs = $Crs;
        }
        

        return $this;
    }

    /**
     * Get the value of CrsID
     */ 
    public function getCrsID()
    {
        if($this->CrsID > 0)
        {
            return $this->CrsID;
        }
    }

    /**
     * Set the value of CrsID
     *
     * @return  self
     */ 
    public function setCrsID($CrsID)
    {
        if($CrsID > 0)
        {
            $this->CrsID = $CrsID;
            
            $Obj = new Course;
            $this->Crs = $Obj->getOneCourse($CrsID);
        }
    }
}

$rD = new RegisterDetails();
$rD->setRgID(2);

$rD->setCrsID(6);

$rD->storeRegisterDetails();

?>