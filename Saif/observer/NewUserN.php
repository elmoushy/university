<?php

include_once("../Interface.php");

class NewUserN extends observer
{
    function update()
    {
        //testing
        $this->FileObj->Store("New User Came");
    }
}

?>