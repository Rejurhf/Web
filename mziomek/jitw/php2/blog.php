<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/plain; charset=utf-8"/>
	<title>Blog</title>
</head>
<body>
<?php
    include 'menu.php';
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
        
        echo "<br><br>Opis:";
        echo "<br><br>Opis:";
        $file = fopen($name . '/info.txt', 'r');
        $s = fgets($file);
        $s = fgets($file);
        while (!feof($file)){
            $s = fgets($file);
            echo "<br>$s";
        }
        fclose($file);
        echo "<br>-----------------------";
        
        if ($path = opendir($name)) {
        while (false !== ($entry = readdir($path))) {
            $onlyN = strtok($entry, '.');
            if (!is_dir($entry) && strlen($onlyN) == 16 &&
               $entry != $onlyN){
                echo "<br>";
                $file = fopen($name . '/' . $entry, 'r');
                while (!feof($file)){
                    $s = fgets($file);
                    echo "<br>$s";
                }
                fclose($file);
                
                
                echo "<br> Załączniki:";
                if ($subPath = opendir($name)) {
                while (false !== ($subEntry = readdir($subPath))) {
                    if (!is_dir($subEntry) && substr($subEntry, 0, 16) == $onlyN && 
                        strlen(strtok($subEntry, '.')) != 16){
                        echo "<br><a href='" . $name . "/" . $subEntry . "'>$subEntry</a>";
                    }
                }
                closedir($subPath);
                }
                
                echo "<br><br> Komentarze:";
                $dir = $name . "/" . $onlyN;
                if ($subPath = opendir($dir)) {
                while (false !== ($subEntry = readdir($subPath))) {
                    if ($subEntry != "." && $subEntry != ".." && 
                        !is_dir($subEntry)){
                        $comPath = $name . '/' . $onlyN . '/' . $subEntry;
                        $file = fopen($comPath, 'r');
                        while (!feof($file)){
                            $s = fgets($file);
                            echo "<br>$s";
                        }
                        fclose($file);
                        echo "<br>";
                    }
                }
                closedir($subPath);
                }
                echo "<br>-----------------------";
            }
        }
        closedir($path);
        }
        
    }else{
        echo "Nie ma takiego bloga";
    }
?>
</body>
</html>
