<?php

include_once("../Interface.php");

class NewRegister extends observer
{

    function update()
    {
        $this->FileObj->Store("Register Added new");
    }

}

?>