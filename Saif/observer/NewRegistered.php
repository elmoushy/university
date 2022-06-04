<?php
if(include_once("Interface.php"))
{
    include_once "Interface.php";
}
else
{
    include_once "../Interface.php";
}
class NewRegister extends observer
{
    function __construct($subject)
    {
        $this->FileObj = new filemanager();
            $this->FileObj ->setFilenames("observer");
            
            $this->subject = $subject;
    
            $this->subject->attach($this);
    }

    function update($mes)
    {
        $this->FileObj->store_dataFile("Register Added new");
    }

}

?>