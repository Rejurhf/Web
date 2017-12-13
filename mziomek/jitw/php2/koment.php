<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/plain; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
<?php
    include 'menu.php';
    $postN = $_POST['post'];
    $dir = "";
    
    $num = -1;
    $dir = $dir . "/" . $postN;
	if(!mkdir($dir, 0777, true)){
		echo 'Taki folder juz istnieje<br>';
        if ($path = opendir($dir)) {
        while (false !== ($entry = readdir($path))){
            if ($entry != "." && $entry != ".." && !is_dir($entry)){
                $num = $num + 1;
                echo "<br>$entry";
            }
        }   
        closedir($path);
        }
        
        $num += 1;
        $plik = fopen($dir . "/" . $num . ".txt", "w");
        $dateS = date('Y-m-d, H:i:s');
        fputs($plik, $_POST['comType'] . "\n");
        fputs($plik, $dateS . "\n");
        fputs($plik, $_POST['name'] . "\n");
        fputs($plik, $_POST['coment']);
        fclose($plik);
        echo "Komentarz został dodany";
	}else{
        if ($path = opendir($dir)) {
        while (false !== ($entry = readdir($path))){
            if ($entry != "." && $entry != ".." && !is_dir($entry)){
                $num = $num + 1;
                echo "<br>$entry";
            }
        }
        closedir($path);
        }
        
        $num += 1;
        $plik = fopen($dir . "/" . $num . ".txt", "w");
        $dateS = date('Y-m-d, H:i:s');
        fputs($plik, $_POST['comType'] . "\n");
        fputs($plik, $dateS . "\n");
        fputs($plik, $_POST['name'] . "\n");
        fputs($plik, $_POST['coment']);
        fclose($plik);
        echo "Komentarz został dodany";
    }
        
?>
</body>
</html>
