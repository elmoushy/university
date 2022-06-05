<?php

include_once("Register.php");

if(isset($_POST["Store"]))
{
    if($_POST["ID"] == null)
    {
        $Rg = new Register();
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->Store();
    } else {
        echo("Not adding");
    }
    echo(" <script> location.replace('../RegisterDetails/RegisterDetailsH.php?ID=".$Rg->getID()."'); </script>");
}
if(isset($_POST["Update"]))
{

    if($_POST["ID"] > 0)
    {
        $Rg = new Register();
        $Rg->setID($_POST["ID"]);
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->Update();
        echo(" <script> location.replace('../RegisterDetails/RegisterDetailsH.php?ID=".$Rg->getID()."'); </script>");
    }else
    {
        echo(" <script> location.replace('RegisterH.php?order=".$_POST["order"]."'); </script>");
    }


       
}
if(isset($_POST["Search"]))
{

    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    //$Rg->getTotalHr($_POST["TotalHr"]);
    //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
    $List = $Rg->Search();
    DisplayTable($List);
    echo "<br><a href='RegisterH.php?order=".$_POST["order"]."'>Return To Menu</a> ";
        
}
if(isset($_POST["Delete"]))
{ 

    if($_POST["ID"] > 0)
    {
        $Rg = new Register();
        $Rg->setID($_POST["ID"]);
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        $Rg->Remove();
    }
    echo(" <script> location.replace('RegisterH.php?order=".$_POST["order"]."'); </script>");

}
if(isset($_POST["Results"]))
{ 
    $Rg = new Register();
    $Rg->setID($_POST["ID"]);
    $Rg->setStID($_POST["StID"]);
    $Rg->setDate($_POST["Date"]);
    //$Rg->getTotalHr($_POST["TotalHr"]);
    //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
    echo(" <script> location.replace('../Print.php?ID=".$_POST["ID"]."'); </script>");
}
if(isset($_POST["services"]))
{ 
    if($_POST["ID"] > 0)
    {
        $Rg = new Register();
        $Rg->setID($_POST["ID"]);
        $Rg->setStID($_POST["StID"]);
        $Rg->setDate($_POST["Date"]);
        //$Rg->getTotalHr($_POST["TotalHr"]);
        //$Rg->getTotalPriceHr($_POST["TotalPriceHr"]);
        echo(" <script> location.replace('AddService.php?ID=".$_POST["ID"]."'); </script>");
    }else
    {
        echo(" <script> location.replace('RegisterH.php?order=".$_POST["order"]."'); </script>");
    }
    
}
?>