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
    $dir = "";
    
    echo "$name<br>$passwd<br>";
    
    if ($path = opendir('.')) {
        while (false !== ($entry = readdir($path))) {
            if ($entry != "." && $entry != ".." && is_dir($entry)){
                $file = fopen($entry . '/info.txt', 'r');
                $s = fgets($file);
                $sName = substr($s,0,strlen($s)-1);
                $s = fgets($file);
                $sPasswd = substr($s,0,strlen($s)-1);
                echo "<br>$sName<br>$sPasswd<br>";
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
    if($dir == ""){
        echo "$dir<br>";
        echo "Błędna nazwa użytkownika lub hasło<br>";
    }
?>
</body>
</html>
