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
        <br>
        <br>
        <br>
        <br>
        <br>
          <br/>
          <br/>
          <br/>
          <div class="login-form" align="center">
          <form action="User Type Menu.php" method="POST">
                <div style="color:white">
                <?php 
                include_once "../functions.php";
                ?>
                <form action="User Type Menu.php" method="post">
                    Id <input type="number" name="Id"><br>
                    <br>
                    Type Name <select name="TypeId">
                        <option value=0>Non</option>
                        <?php 
                            $File = new filemanager();
                            $File->spsetname("../usertype/usertype");
                            $List = $File->AllContents();
                            for ($i=0; $i < count($List); $i++) { 
                                $Array = explode("~",$List[$i]);
                                $Id = $Array[0];
                                $Name = $Array[1];
                                echo "<option value='$Id'>$Name</option>";
                            }
                        ?>
                    </select>
                    <br>
                    <br>
                    Menu Name <select name = "MenuId">
                        <option value=0>Non</option>
                        <?php 
                            $File = new filemanager();
                            $File->spsetname("../menu/menu");
                            $List = $File->AllContents();
                            for ($i=0; $i < count($List); $i++) { 
                                $Array = explode("~",$List[$i]);
                                $Id = $Array[0];
                                $Name = $Array[1];
                                echo "<option value='$Id'>$Name</option>";
                            }
                        ?>
                    </select>
                    <br>
                    <input type="hidden" name="usertypemenu" value="<?php echo $_GET["usertypemenu"]?>">
                    <?php if($_GET["usertypemenu"] == "add" || $_GET["usertypemenu"] == "all") echo "<input type='submit' value='Add' name = 'Add'>"?>
                    <?php if($_GET["usertypemenu"] == "all") echo "<input type='submit' value='Update' name = 'Update'>"?>
                    <input type="submit" value="Search"  name = "Search">
                    <?php if($_GET["usertypemenu"] == "all") echo "<input type='submit' value='Delete' name = 'Delete'>"?>
                </form>
                <div class="login-form" align="left">
            <h1 ><a href='/GitHub/Court-system/Saif/index.php?Logout=true'> ==>          Logout </a>
          </div>
</form>