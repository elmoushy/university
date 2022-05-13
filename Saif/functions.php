<?php
class filemanager
{
    protected $Filenames;
    protected $Separator = "~";
    function check_login($id , $password)
    {
       $file= fopen($this->Filenames,"a+");

        while(!feof($file))
        {
            $line = fgets($file);
            $arr = explode($this->Separator,$line);
            if($id==$arr[0])
            {
                if($password==$arr[3])
                {
                    return 1;
                }
            }
        }
        return 0;
    }

    function store_dataFile($data)
    {
        $file=fopen($this->Filenames, "a+");
        fwrite($file,$data."\r\n");
        fclose($file);
    }
    function getids($ID)
    {
        $file=fopen($this->Filenames, "r+");
        while(!feof($file))
        {
            $line = fgets($file);
            $arr = explode($this->Separator,$line);
            if($ID==$arr[0])
            {
                return $line;
            }
        }
        return 0;
    }
    function update_pos($line,$pos, $value)
    {
        $array= explode($this->Separator,$line);
        $array[$pos]= $value;
        $l="";
        for($i=0;$i<count($array);$i++)
        {
            $l+=$array[$i];
        }
        return $l;
    }
    function remove_dataFile($Line)
    {
        $contents = file_get_contents($this->Filenames);
        $contents = str_replace($Line, '', $contents."\r\n");
        file_put_contents($this->Filenames, $contents);
    }
    function update_dataFile($OLine,$NLine)
    {
        echo $NLine;
        echo"<br>";
        echo $OLine;
        //exit;
        $contents = file_get_contents($this->Filenames);
        $contents = str_replace($OLine, $NLine, $contents);
        file_put_contents($this->Filenames, $contents);
    }
    function tableData()
    {
        $file = fopen($this->Filenames,"r+");
        while(!feof($file))
        {
            $line= fgets($file);
            echo "<tr>";
            $array= explode($this->Separator,$line);
            for($i=0;$i<count($array);$i++)
            {
                echo "<td>".$array[$i]."</td>";
            }
            echo "</tr>";
        }
        fclose($file);
    }

    public function getLineByID($ID)
    {
        $file = fopen("$this->Filenames","r+")or die("error");
        while(!feof($file))
        {
            $line = fgets($file);
            $arr = explode($this->Separator,$line);

            if($arr[0] == $ID)
            {
                return $line;
            }
        }
        return "";
    }

    function AllContents()
    {
        $file = fopen($this->Filenames,"r");

        $results = array();
        $i=0;
        while(!feof($file))
        {
            $line = fgets($file);
            $results[$i] = $line;
            $i++;
        }
        return $results;
    }
    function getId()
    {
        $file = fopen($this->Filenames, "r+")or die("Unable to open file!");
        $lastid=0;
        if ($file) {
             while (!feof($file)) {
                $line=fgets($file);
                $Arrayline=explode($this->Separator,$line);
                if($Arrayline[0]!="")
                {
                    $lastid=$Arrayline[0];
                }
       
             }
            fclose($file);
         }
         else{
             return 0;
         }
         return intval($lastid);
    }
    public function getFilenames()
    {
        if($this->Filenames!="")
        {
            return $this->Filenames;
        }
    }
    public function setFilenames($Filenames)
    {
        if($Filenames!="")
        {
            if(file_exists($Filenames."txt"))
            {
                $this->Filenames = $Filenames."txt";
            }else if(file_exists("../".$Filenames."/".$Filenames.".txt"))
            {
                $this->Filenames = "../".$Filenames."/".$Filenames.".txt";
            }else if(file_exists($Filenames."/".$Filenames.".txt"))
            {
                $this->Filenames = $Filenames."/".$Filenames.".txt";
            } 
            
            echo("/".$this->Filenames."/");
        }
        
        return $this;
    }
    public function getSeparator()
    {
        if($this->Separator!=null)
        {
            return $this->Separator;
            return $this;
        }
        
    }

    public function setSeparator($Separator)
    {
        if($Separator!=null)
        {
            $this->Separator = $Separator;
            return $this;
        }
    }
}

function DisplayTable($List)
{
    echo "<table border=1>";
    for ($i=0; $i < count($List); $i++) { 
        echo "<tr>";
        for ($j=0; $j < count($List[$i]); $j++) { 
            if($i == 0) {
                echo "<th>".$List[$i][$j]."</th>";
            }
            else {
                echo "<td>".$List[$i][$j]."</td>";
            }
        }
        echo "</tr>";
    }
    echo"</table>";
}
?>