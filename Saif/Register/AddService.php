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
          <div class="login-form" align="center" style="color:rgb(233, 242, 240)">
            <form action="Course.php" method="post">
                <div style="color:white">
                <h1>Additional Services</h1>
                </div>
           <selectstyle="color:rgb(233, 242, 240); >
             <option style="color:rgb(233, 242, 240); value="0"></option>
                    <?php 
                        include_once "../functions.php";
                        $File = new filemanager();
                        $File->spsetname("../decrator/decrator");
                        $List = $File->AllContents();
                        for ($i=0; $i < count($List)  - 1; $i++) { 
                            $Array = explode("~",$List[$i]);
                            $Id = $Array[0];
                            $Name = $Array[1];
                            echo "$Name <input type='checkbox' name='$Name' value='$Id'> <br>";
                        }
                    ?>
            </select>
            <br>
                <input type="submit" value="Subscribe" name = "Store">
            </form>
          </div>