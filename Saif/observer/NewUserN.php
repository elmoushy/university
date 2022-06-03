<?php

include_once("../Interface.php");

class NewUserN extends observer
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
        //testing
        $this->FileObj->store_dataFile("New User Came: ".$mes);
    }
}

?>