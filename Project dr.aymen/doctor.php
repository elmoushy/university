<?php
include_once("class_user.php");
include_once("functions.php");

class doctor extends user 
{
    public function dropCourse($CrsId,$StdId)
    {
        $fileObj = new filemanager();
        $fileObj->setFilenames("Register.txt");
        $fileObj->setSeparator("~");
        $f1 = fopen($fileObj->getFilenames(),"r+") or die("error");
        while(!feof($f1))
        {
            $line = fgets($f1);
            $ar1 = explode($fileObj->getSeparator(),$line);

            if($ar1[1] == $StdId)
            {
                $fileObj2 = new filemanager();
                $fileObj2->setFilenames("RegisterDetails.txt");
                $fileObj2->setSeparator("~");
                $f2 = fopen($fileObj2->getFilenames(),"r+");
                while(!feof($f2))
                {
                    $line2=fgets($f2);
                    $ar2 = explode($fileObj2->getSeparator(),$line2);

                    if($ar2[1] == $ar1[0] && $ar2[2] == $CrsId)
                    {
                        $ar1[3]-=$ar2[3];
                        $ar1[4]-=$ar2[4];
                        
                        //function delete line in file manager from fileObj2 for RegisterDetails!!
                        $fileObj2->remove_dataFile($line2);

                        $nL="";
                        for($i=0;$i<count($ar1);$i++)
                        {
                            $nL.=$ar1[$i];
                            if($i<count($ar1)-1)
                            {
                                $nL.=$fileObj->getSeparator();
                            }
                        }

                        //function update line in file manager from fileObj for RegisterDetails!!
                        $fileObj->update_dataFile($line,$nL);
                        break;
                    }
                }
                break;
            }
        }
    }
}

$d = new doctor();
$d->dropCourse(5,2);
?>