<?php
include_once("Admissions.php");
include_once("functions.php");
$count=0;
$text="user.txt";
id_calculate($count,$text);
$object =new Admissions();
$count+=1;
$object->$setid($count);




?>