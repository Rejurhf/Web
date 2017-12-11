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
    $srvInf = getdate();
    $num = -1;
    $mon = $srvInf['mon'];
    if($mon < 10)
        $mon = "0" . $srvInf['mon'];
    $mday = $srvInf['mday'];
    if($mday < 10)
        $mday = "0" . $srvInf['mday'];
    $hours = $srvInf['hours'];
    if($hours < 10)
        $hours = "0" . $srvInf['hours'];
    $mnt = $srvInf['minutes'];
    if($mnt < 10)
        $mnt = "0" . $srvInf['minutes'];
    $sec = $srvInf['seconds'];
    if($sec < 10)
        $sec = "0" . $srvInf['seconds'];
    $year = $srvInf['year'];
    
    $dir = $year . $mon . $mday . $hours . $mnt . $sec . "01";
    $date = $year . "-" . $mon . "-" . $mday . "," . 
        $hours . ":" . $mnt . ":" . $sec;
    
	if(!mkdir($dir, 0777, true)){
		echo 'Taki folder juz istnieje<br>';
	}else{
        if ($path = opendir($dir)) {
        while (false !== ($entry = readdir($path))){
            if ($entry != "." && $entry != ".." && !is_dir($entry)){
                if($entry > $num)
                    $num = $entry;
                echo "<br>$entry";
            }
        }
        closedir($path);
        }
        
        $num += 1;
        $plik = fopen($dir . "/" . $num . ".txt", "w");
        fputs($plik, $_POST['comType'] . "\n");
        fputs($plik, $date . "\n");
        fputs($plik, $_POST['name'] . "\n");
        fputs($plik, $_POST['coment']);
        fclose($plik);
    }
        
?>
</body>
</html>
