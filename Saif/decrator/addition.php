<?php
if(include_once("Interface.php"))
{
    include_once("Interface.php"); 
}
else
{
    include_once("../Interface.php");
}
abstract class Add implements decorator {
    public decorator $Obj;

    private $Cost;
	function __construct(decorator $Obj) {
        $this->Obj = $Obj;
	}


    public function getCost()
    {
        if($this->Cost > 0)
        {
            return $this->Cost;
        }
        
    }


    public function setCost($Cost)
    {
        if($this->Cost > 0)
        {
            $this->Cost = $Cost;
        }
        

        return $this;
    }
}
?>