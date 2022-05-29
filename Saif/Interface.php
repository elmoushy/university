<?php
include_once("functions.php");

interface File{
    public function Store();
    public function Update();
    public function Remove();
    public function Search();
}
interface Pay{
    public function Pay(int $Amount);
} 
interface decorator {
    public function TotalCost(float $Cost);
}

abstract class observer
{
    private $subject;
    private $FileObj;



    public function __construct($subject)
    {
        $this->FileObj ->setFilenames("observer");
        
        $this->subject = $subject;

        $this->subject->attach($this);
    }

    public abstract function update(); 
}

class Subject
{
    private $Observer = [];
    
    public function attach($Observer)
    {
        array_push($this->Observer,$Observer);
    }

    public function notifyAllObserv()
    {
        foreach ($this->Observer as $Item )
        {
            $Item->update();
        }
    }

}

?>