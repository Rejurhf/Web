<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/plain; charset=utf-8"/>
	<title>Blog</title>
</head>
<body>
<?php
    $name = $_GET['name'];
	if($name == ""){
        echo "Wszystkie Blogi:";
        $url = 'http://' . $_SERVER['SERVER_NAME'] . 
            $_SERVER['REQUEST_URI'];
        if ($path = opendir('.')) {
        while (false !== ($entry = readdir($path))) {
            if ($entry != "." && $entry != ".." && is_dir($entry)){
                echo "<br><a href='".$url . $entry."'>$entry</a>";
            }
        }
        closedir($path);
        }   
        
        
    }else if(file_exists($name)){
        echo "Blog $name";
    
        $file = fopen($name . '/info.txt', 'r');
        $s = fgets($file);
        $s = fgets($file);
        while (!feof($file)){
            $s = fgets($file);
            echo "<br>$s";
        }
        fclose($file);
        
    }else{
        echo "Nie ma takiego bloga";
    }
?>
</body>
</html>
