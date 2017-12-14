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
    if ($path = opendir('.')) {
        while (false !== ($entry = readdir($path))) {
            if ($entry != "." && $entry != ".." && is_dir($entry)){
                if ($subPath = opendir($entry)) {
                    while (false !== ($subEntry = readdir($subPath))) {
                        $onlyName = strtok($subEntry, '.'); 
                        if (!is_dir($subEntry) && $onlyName == $postN){
                            $dir = $entry;
                            break;
                        }
                    }
                    closedir($subPath);
                }
            }
            if($dir != "")
                break;
        }
        closedir($path);
    }
    
    $num = -1;
    $dir = $dir . "/" . $postN;
    $semRes = sem_get( 1111, 1, 0666, 0);
    echo "<br>$dir";
    
    if (sem_acquire($semRes)) {
        if (!is_dir($dir, 0777, true)) {
            mkdir($dir);
        }
        if ($path = opendir($dir)) {
        while (false !== ($entry = readdir($path))){
            if ($entry != "." && $entry != ".." && !is_dir($entry)){
                $num = $num + 1;
            }
        }
        }

        $num = $num + 1;
        $plik = fopen($dir . "/" . $num . ".txt", "w");
        fputs($plik, $_POST['comType'] . "\n");
        fputs($plik, date('Y-m-d, H:i:s') . "\n");
        fputs($plik, $_POST['name'] . "\n");
        fputs($plik, $_POST['coment']);
        fclose($plik);
        sem_release($semRes);
        echo "<br>Komentarz został dodany<br>";
    }else{
        echo "Nie działa<br>";
    }
?>
</body>
</html>
