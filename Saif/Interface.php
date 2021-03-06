<?php
include_once("functions.php");
include_once("observer/NewUserN.php");
include_once("observer/NewRegistered.php");
error_reporting (E_ERROR | E_PARSE);
interface File{
    public function Store();
    public function Update();
    public function Remove();
    public function Search();
}
abstract class Pay{
    protected $FileObj;
    public abstract function Pay($l);
} 
interface decorator {
    //public function TotalCost(float $Cost);
    public function TotalCost();
}

abstract class observer
{
    private $subject;
    private $FileObj;

    public abstract function update($mes); 
}

class Subject
{
    private $Observer = [];
    
    public function attach($Observer)
    {
        array_push($this->Observer,$Observer);
    }

    public function notifyAllObserv($mes)
    {
        foreach ($this->Observer as $Item )
        {
            $Item->update($mes);
        }
    }

}

/*$sub = new Subject();
new NewUserN($sub);
new NewRegister($sub);

$sub->notifyAllObserv();
*/
?>