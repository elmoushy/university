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
            <form action="menu.php" method="post">
                <div style="color:white">
                <h1>menu</h1>
                </div>

              <br/>
             <br/>
             <input type="number" name="ID" placeholder="Id"> <br>
             <br>
             <select name="username" placeholder="Name">
                    <?php 
                        include_once "../functions.php";
                        $File = new filemanager();
                        $File->setFilenames("usertype");
                        $List = $File->AllContents();
                        for ($i=0; $i < count($List)  - 1; $i++) { 
                            $Array = explode("~",$List[$i]);
                            $Name = $Array[1];
                            echo "<option value='$Name'>$Name</option>";
                        }
                    ?>
                </select>
             <br>
             <br>
              <select name="order_menu" style="opacity: 0.5; border-radius: 25px;">
                 <option value="">order</option>
                 <option value="add">add</option>
                 <option value="all">all</option>
                 <option value="null">null</option>
                 <option value="search">search</option>
             </select>
              <select name="product_menu" style="opacity: 0.5; border-radius: 25px;">
                 <option value="">product</option>
                 <option value="add">add</option>
                 <option value="all">all</option>
                 <option value="null">null</option>
                 <option value="search">search</option>
             </select>
              <select name="user_menu" style="opacity: 0.5; border-radius: 25px;">
                 <option value="">user</option>
                 <option value="add">add</option>
                 <option value="all">all</option>
                 <option value="null">null</option>
                 <option value="search">search</option>
             </select>
              <select name="userType_menu" style="opacity: 0.5; border-radius: 25px;">
                 <option value="">userType</option>
                 <option value="add">add</option>
                 <option value="all">all</option>
                 <option value="null">null</option>
                 <option value="search">search</option>
             </select>
              <select name="userTypeMenu_menu" style="opacity: 0.5; border-radius: 25px;">
                 <option value="">userTypeMenu</option>
                 <option value="add">add</option>
                 <option value="all">all</option>
                 <option value="null">null</option>
                 <option value="search">search</option>
             </select>
              <select name="userMenu_menu" style="opacity: 0.5; border-radius: 25px;">
                 <option value="">userMenu</option>
                 <option value="add">add</option>
                 <option value="all">all</option>
                 <option value="null">null</option>
                 <option value="search">search</option>
             </select>
             <select name="decorator" style="opacity: 0.5; border-radius: 25px;">
              <option value="">Decorator</option>
              <option value="add">add</option>
              <option value="all">all</option>
              <option value="null">null</option>
              <option value="search">search</option>
             </select>
             <select name="stratge" style="opacity: 0.5; border-radius: 25px;">
              <option value="">stratge</option>
              <option value="add">add</option>
              <option value="all">all</option>
              <option value="null">null</option>
              <option value="search">search</option>
             </select>
             <br/>
             <br/>
             <br/>
             <input type="hidden" name="usermenu" value="<?php echo $_GET["usermenu"]?>">
             <?php if($_GET["usermenu"] == "add" || $_GET["usermenu"] == "all") echo "<input type='submit' value='Store' name = 'Store'>"?>
             <?php if($_GET["usermenu"] == "all") echo "<input type='submit' value='Update' name = 'Update'>"?>
             <input type="submit" value="Search"  name = "Search">
             <?php if($_GET["usermenu"] == "all") echo "<input type='submit' value='Delete' name = 'Delete'>"?>
            </form>
            <div class="login-form" align="left">
            <h1 ><a href='/GitHub/Court-system/Saif/index.php?Logout=true'> ==>          Logout </a>
          </div>