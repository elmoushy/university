<?php
include_once("menuclass.php");
extract($_POST);
if(isset($_POST["Store"]))
{
    $obj=new menu();
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->setDecorator($decorator);
    $obj->setstratge($stratge);
    $obj->Store();
    echo(" <script> location.replace('menuH.php?usermenu=".$_POST["usermenu"]."'); </script>");
}
if(isset($_POST["Update"]))
{
    $obj=new menu();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->setDecorator($decorator);
    $obj->setstratge($stratge);
    $obj->Update();
    echo(" <script> location.replace('menuH.php?usermenu=".$_POST["usermenu"]."'); </script>");
}
if(isset($_POST["Search"]))
{
    $obj=new menu();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->setDecorator($decorator);
    $obj->setstratge($stratge);
    $obj = $obj->Search();
    DisplayTable($obj);
    echo "<br><a href='menuH.php?usermenu=".$_POST["usermenu"]."'>Return To Menu</a> ";
}
if(isset($_POST["Delete"]))
{
    $obj=new menu();
    $obj->setid($ID);
    $obj->setname($username);
    $obj->setOrder_m($order_menu);
    $obj->setProduct_m($product_menu);
    $obj->setUser_m($user_menu);
    $obj->setUser_type($userType_menu);
    $obj->setUser_type_menu($userTypeMenu_menu);
    $obj->setUser_menu($userMenu_menu);
    $obj->setDecorator($decorator);
    $obj->setstratge($stratge);
    $obj->Remove();
    echo(" <script> location.replace('menuH.php?usermenu=".$_POST["usermenu"]."'); </script>");
}
?>