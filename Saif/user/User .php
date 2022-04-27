<form action="user.php" method="POST">
    <div class="form-row">
        Student Id <input type="number" name="ID" > <br>
        <div class="col-md-6">
            <div class="control-group">
                <input type="text" placeholder="Name" name="username" class="form-control"  data-validation-required-message="Please enter your name" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="control-group">
                <input  class="form-control" type="text" placeholder="phone_number" name="phone_number" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="control-group">
                <input  type="date" placeholder="date of birth" name="date_of_birth"  />
            </div>
        </div>
        <br>
         <select name="faculity" style="opacity: 0.5; border-radius: 25px;">
            <option value="0">Non</option>
            <?php 
                include_once "../functions.php";
                $File = new filemanager();
                $File->setFilenames("../Course/courses.txt");
                $List = $File->AllContents();
                for ($i=0; $i < count($List)  - 1; $i++) { 
                    $Array = explode("~",$List[$i]);
                    $Id = $Array[0];
                    $Name = $Array[1];
                    echo "<option value='$Id'>$Name</option>";
                }
            ?>
          </select>
        <br>
        <br>
       <select name="userid_type"  style="opacity: 0.5; border-radius: 25px;">
        <option value="0">Non</option>
        <?php 
            include_once "../functions.php";
                $File = new filemanager();
                $File->setFilenames("../usertype/usertype.txt");
                $List = $File->AllContents();
                for ($i=0; $i < count($List)  - 1; $i++) { 
                    $Array = explode("~",$List[$i]);
                    $Id = $Array[0];
                    $Name = $Array[1];
                    echo "<option value='$Id'>$Name</option>";
                }
            ?>
          </select>
          <br>
        <br>
        <input type="submit" value="Store" name = "Store">
        <input type="submit" value="Update" name = "Update">
        <input type="submit" value="Search"  name = "Search">
        <input type="submit" value="Delete" name = "Delete">
    </div>
</form>