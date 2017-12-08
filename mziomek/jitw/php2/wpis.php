<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/plain; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
<?php
	$name = $_POST['name'];
	$passwd = md5($_POST['passwd']);
    $dscrp = $_POST['dscrp'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dir = "";
    
    if ($path = opendir('.')) {
        while (false !== ($entry = readdir($path))) {
            if ($entry != "." && $entry != ".." && is_dir($entry)){
                $file = fopen($entry . '/info.txt', 'r');
                $s = fgets($file);
                $sName = substr($s,0,strlen($s)-1);
                $s = fgets($file);
                $sPasswd = substr($s,0,strlen($s)-1);
                if($sName == $name && $sPasswd == $passwd){
                    $dir = $entry;
                    fclose($plik);
                    echo "Otwarto blog: $dir<br>";
                    break;
                }
                fclose($plik);
            }
        }
        closedir($path);
    }
    if($dir != ""){
        $postN = substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2) . 
            substr($time, 0, 2) . substr($time, 3, 5) . "01";
        echo "<br>$postN";
        
        $plik = fopen($dir . "/" . $postN . ".txt", "w");
        echo "<br>$dscrp";
        fputs($plik, $dscrp);
        fclose($plik);
        
        $fileName = $_FILES['plik1']['name'];
        echo "<br>$fileName";
        if(move_uploaded_file($_FILES['plik1']['tmp_name'], $dir . "/" . $fileName)){
            echo "<br>jest plik 1";
        }else{
            echo "<br>nie ma pliku 1";
        }
        
        $fileName = $_FILES['plik2']['name'];
        echo "<br>$fileName";
        if(move_uploaded_file($_FILES['plik2']['tmp_name'], $dir . "/" . $fileName)){
            echo "<br>jest plik 2";
        }else{
            echo "<br>nie ma pliku 2";
        }
        
        $fileName = $_FILES['plik3']['name'];
        echo "<br>$fileName";
        if(move_uploaded_file($_FILES['plik3']['tmp_name'], $dir . "/" . $fileName)){
            echo "<br>jest plik 3";
        }else{
            echo "<br>nie ma pliku 3";
        }
    }else{
        echo "Błędna nazwa użytkownika lub hasło<br>";    
    }
?>
</body>
</html>
