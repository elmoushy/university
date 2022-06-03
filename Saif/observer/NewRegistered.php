<?php

include_once("../Interface.php");

class NewRegister extends observer
{
    function __construct($subject)
    {
        $this->FileObj = new filemanager();
            $this->FileObj ->setFilenames("observer");
            
            $this->subject = $subject;
    
            $this->subject->attach($this);
    }

    function update()
    {
        $this->FileObj->store_dataFile("Register Added new");
    }

}

?>