<?php
error_reporting (E_ERROR | E_PARSE);
session_start();
include_once("functions.php");
//session_destroy();
if(!isset($_SESSION["id"]))
{
    echo(" <script> location.replace('index.html'); </script>"); 
}
if($_GET["Logout"] == "true")
{
  session_destroy();
  echo(" <script> location.replace('index.html'); </script>"); 
}
$UTM=-1;
$FileObj=new filemanager();
$FileObj->spsetname("user/user");
$FileObj->setSeparator("~");
$records = $FileObj->AllContents();
for($i=0;$i<count($records);$i++)
{
    $ar = explode("~",$records[$i]);
    if($ar[0] == $_SESSION["id"])
    {
        $UTM=$ar[1];
        break;
    }
}
$FileObj=new filemanager();
$FileObj->spsetname("usertypemenu/usertypemenu");
$FileObj->setSeparator("~");
$records = $FileObj->AllContents();
for($i=0;$i<count($records);$i++)
{
    $ar = explode("~",$records[$i]);
    if($ar[0] == $UTM)
    {
        $UTM=$ar[2];
        break;
    }
}
$FileObj=new filemanager();
$FileObj->spsetname("menu/menu");
$FileObj->setSeparator("~");
$records = $FileObj->AllContents();
$order;
$product;
$user;
$usertype;
$usertypemenu;
$usermenu;
$name;
for($i=0;$i<count($records);$i++)
{
    $ar = explode("~",$records[$i]);
    if($ar[0] == $UTM)
    {
        $name = $ar[1];
        $order =$ar[2];
        $product =$ar[3];
        $user =$ar[4];
        $usertype =$ar[5];
        $usertypemenu =$ar[6];
        $usermenu =$ar[7];
        break;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education Meeting HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--
</head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational university website for <em>Helwan</em> University.</p>
            /////////////////////////////////////////////////////////////hna
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Header Area Start ***** -->
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <br/>
          <div class="login-form" align="center">
            <form action="" method="post">
                <div style="color:white">
                </div>
              <br/>
              <br/>
             <br/>
              <div class="content">
                <?php
                if($order!="null")
                {
                
                   echo("<h1><a href='/GitHub/Court-system/Saif/Register/RegisterH.php?order=".$order."'> Register </a></h1><br><br>");
                ?>
                <?php
                } if($product!="null") {
                  echo("<h1><a href='/GitHub/Court-system/Saif/courses/CourseH.php?product=".$product."'> Course </a></h1><br><br>");
                ?>
                <?php
                } if($user!="null"){
                   echo("<h1><a href='/GitHub/Court-system/Saif/user/User .php?user=".$user."'> User </a></h1><br><br>");
                ?>
                <?php
                } if($usertype!="null"){
                    echo("<h1><a href='/GitHub/Court-system/Saif/usertype/UsertypeH.php?usertype=".$usertype."'> UserType </a></h1><br><br>");
                ?>
                <?php
                } if($usertypemenu!="null"){
                  echo("<h1> <a href='/GitHub/Court-system/Saif/usertypemenu/UserTypeMenu.php?usertypemenu=".$usertypemenu."'> usertypemenu </a></h1><br><br>");
                ?>
                <?php
                } if($usermenu!="null"){
                    echo("<h1><a href='/GitHub/Court-system/Saif/menu/menuH.php?usermenu=".$usermenu."'> menu </a></h1><br>");
                ?>
                <?php
                } if($name=="admin"){
                    echo("<h1><a href='/GitHub/Court-system/Saif/decrator/dec.php'> decrator </a></h1><br>");
                ?>
                <?php
                } if($name=="admin"){
                    echo("<h1><a href='/GitHub/Court-system/Saif/stratge/stratge.html'> stratge </a></h1><br>");
                ?>
                <?php
                }
                ?>
              </div>
            <br/>
            <br/>
            </form>
            <div class="login-form" align="left">
            <h1 ><a href='/GitHub/Court-system/Saif/index.php?Logout=true'> ==>          Logout </a>
          </div>
?>
