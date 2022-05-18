<?php

class InID
{
    protected $ID=0;
    protected $name;

    
    public function getID()
    {
        if($this->ID > 0)
        {
            return $this->ID;
        }
    }

    
    public function setID($ID)
    {
        if($ID > 0)
        {
            $this->ID = $ID;
        }
    }
	/**
	 * 
	 * @return mixed
	 */
	function getName() {
		return $this->name;
	}
	
	/**
	 * 
	 * @param mixed $name 
	 * @return InID
	 */
	function setName($name): self {
		$this->name = $name;
		return $this;
	}
}

?>