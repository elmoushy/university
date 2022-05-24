<?php
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

?>