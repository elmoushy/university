<?php
include_once "../InID.php";
include_once "../functions.php";
include_once "../usertype/usertypeclass.php";
include_once "../menu/menuclass.php";
include_once "../Interface.php";
class UserTypeMenu extends InID implements File
{
    private int $TypeId;
    private int $MenuId;
    private filemanager $File;
    
    public function __construct($Id = null,$TypeId = null,$MenuId = null) {
        if($Id != null) $this->setId($Id);
        else $this->ID = 0;
        if($TypeId!=null) $this->setTypeId($TypeId);
        else $this->TypeId = 0;
        if($MenuId!=null) $this->setMenuId($MenuId);
        else $this->MenuId = 0;
        $this->File = new filemanager();
        $this->File->setFilenames("usertypemenu");
    }

    public function ToString()
    {
        $String = $this->ID."~".$this->TypeId."~".$this->MenuId;
        return $String;
    }
    public function FromStringToObject($Line)
    {
        $Array = explode("~",$Line);
        $this->setID(intval($Array[0]));
        $this->setTypeId(intval($Array[1]));
        $this->setMenuId(intval($Array[2]));
    }
    public function Store()
    {
        if($this->TypeId == 0) return 0;
        if($this->MenuId == 0) return 0;
        $this->ID = $this->File->getId() + 1;
        $this->File->store_dataFile($this->ToString());
    }
    public function Remove()
    {
        if($this->ID == 0) return 0;
        $this->FromStringToObject($this->File->getLineByID($this->ID));
        $this->File->remove_dataFile($this->ToString());
    }
    public function Update()
    {
        if($this->ID == 0) return 0;
        $Old = new UserTypeMenu();
        $Old->FromStringToObject($this->File->getLineByID($this->ID));
        if($this->TypeId == 0) $this->setTypeId($Old->getTypeId());
        if($this->MenuId == 0) $this->setMenuId($Old->getMenuId());
        $this->File->update_dataFile($Old->ToString(),$this->ToString());
    }
    public function Search()
    {
        $List = $this->File->AllContents();
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Now = new UserTypeMenu();
            $Now->FromStringToObject($List[$i]);
            if($this->ID != 0)
            {
                if($this->ID!=$Now->getID())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->TypeId != 0)
            {
                if($this->TypeId!=$Now->getTypeId())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
            if($this->MenuId != 0)
            {
                if($this->MenuId!=$Now->getMenuId())
                {
                    array_splice($List,$i,1);
                    $i--;
                }
            }
        }
        $DisplayedList = [];
        $x = ["ID","Type Name","Menu Name"];
        array_push($DisplayedList,$x);
        for ($i=0; $i < count($List) - 1; $i++) { 
            $Now = new UserTypeMenu();
            $Now->FromStringToObject($List[$i]);
            $FileObj = new filemanager();
            $FileObj->setFilenames("../usertype/usertype");
            $TypeName = explode("~",$FileObj->getLineByID($Now->getTypeId()))[1];
            $FileObj = new filemanager();
            $FileObj->setFilenames("../menu/menu");
            $MenuName = explode($FileObj->getSeparator(),$FileObj->getLineByID($Now->getMenuId()))[1];
            $Array = [$Now->getID(),$TypeName,$MenuName];
            array_push($DisplayedList,$Array);
        }
        return $DisplayedList;
    }
	/**
	 * 
	 * @return int
	 */
	function getTypeId(): int {
		return $this->TypeId;
	}
	
	/**
	 * 
	 * @param int $TypeId 
	 * @return UserTypeMenu
	 */
	function setTypeId(int $TypeId): self {
		$this->TypeId = $TypeId;
		return $this;
	}
	/**
	 * 
	 * @return int
	 */
	function getMenuId(): int {
		return $this->MenuId;
	}
	
	/**
	 * 
	 * @param int $MenuId 
	 * @return UserTypeMenu
	 */
	function setMenuId(int $MenuId): self {
		$this->MenuId = $MenuId;
		return $this;
	}
}