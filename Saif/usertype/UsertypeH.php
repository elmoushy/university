<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" >
    <title>Education Meeting HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="../assets/images/course-video.mp4" type="video/mp4" />
      </video>
      <div class="video-overlay header-text" style="object-fit: fill">
        <br/>
        <br/>
        <h1 style="color:rgb(233, 242, 240);"align="RIGHT"> <pre> Helwan University  </pre></h1>
        
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <div class="login-form" align="center">
            <form action="usertype.php" method="post">
                <div style="color:white">
                <h1>User type</h1>
                </div>

              <br/>
             <br/>
              <div class="content">
              <input type="hidden" name="usertype" value="<?php echo $_GET["usertype"]?>"> <br>
                <div class="input-field">
                  <input type="number" name="Id" placeholder="  Id "  style="opacity: 0.5; border-radius: 13px; height: 40px; width:400px">
                </div>
                <br/>
                <div class="input-field">
                  <input type="text" name="Name" placeholder="  Name" style="opacity: 0.5; border-radius: 13px; height: 40px; width:400px">
                </div>
                <br/>
              </div>

              <?php if($_GET["usertype"] == "add" || $_GET["usertype"] == "all") echo "<input type='submit' value='Store' name = 'Store'>"?>
              <?php if($_GET["usertype"] == "all") echo "<input type='submit' value='Update' name = 'Update'>"?>
              <input type="submit" value="Search"  name = "Search">
              <?php if($_GET["usertype"] == "all") echo "<input type='submit' value='Delete' name = 'Delete'>"?>
              </div>
            </form>
            <div class="login-form" align="left">
            <h1 ><a href='/GitHub/Court-system/Saif/index.php?Logout=true'> ==>          Logout </a>
          </div>