
<?php
define("VERSION","0.1.0");
class fileReader{
public $file;
public $openRead;
public $fileLength;
public $reader;
public function getFile($fileToRead){
$this->file = $fileToRead;
return $this;
}

public function setFile(){
if(!$this->openRead = fopen($this->file,'r+')):
    echo "not able to open the requested file";
    exit();
else:
    return $this;
endif;
}
public function showFile(){
$this->fileLength = filesize($this->file);
$this->reader = fread($this->openRead,$this->fileLength);
$read = explode("\n",$this->reader);
//$html = explode("<html>",$this->reader);
//var_dump($html);
$TotalLines = count($read);
foreach($read as $num => $value):
          $num += 1;
       echo " ".$value;
endforeach;
?>
<?php
}
}
?>
<?php
$file = new fileReader();
$file->getFile("test_sockets.php")->setFile()->showFile();
?>


