<?php 
include_once "../functions.php";
?>
<form action="User Type Menu.php" method="post">
    Id <input type="number" name="Id"><br>
    Type Name <select name="TypeId">
        <option value=0>Non</option>
        <?php 
            $File = new filemanager();
            $File->setFilenames("../usertype/usertype.txt");
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
    Menu Name <select name = "MenuId">
        <option value=0>Non</option>
        <?php 
            $File = new filemanager();
            $File->setFilenames("../menu/menu.txt");
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
    <input type="submit" value="Add" name="Add">
    <input type="submit" value="Update" name="Update">
    <input type="submit" value="Search" name="Search">
    <input type="submit" value="Delete" name="Delete">
</form>