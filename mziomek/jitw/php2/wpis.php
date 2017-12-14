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
	$name = $_POST['name'];
	$passwd = md5($_POST['passwd']);
    $dscrp = $_POST['dscrp'];
    $uniq = "01";
    $date = $_POST['date'];
    $time = $_POST['time'];
    $dir = "";
    
    $semRes = sem_get( 1111, 1, 0666, 0);
    if (sem_acquire($semRes)) {
        $plik = fopen("count.txt", "r");
        $uniqL = (int)fgets($plik);
        $uniqL = $uniqL + 1;
        if($uniqL > 99){
            $uniqL = 0;
        }
        fclose($plik);
        file_put_contents("count.txt", $uniqL . "\n");
        sem_release($semRes);
    }else{
        echo "Nie działa<br>";
    }
    
    if($uniqL < 10){
        $uniq = "0" . $uniqL;
    }else{
        $uniq = $uniqL;
    }
    
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
                    fclose($file);
                    echo "Otwarto blog: $dir<br>";
                    break;
                }
                fclose($file);
            }
        }
        closedir($path);
    }
    if($dir != ""){
        $srvInf = getdate();
        $postN = substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2) . 
            substr($time, 0, 2) . substr($time, 3, 5) . $srvInf['seconds'] . $uniq;
        echo "<br>$postN";
        
        $semRes = sem_get( 1111, 1, 0666, 0);
        if (sem_acquire($semRes)) {
            $plik = fopen($dir . "/" . $postN . ".txt", "w");
            echo "<br>$dscrp";
            fputs($plik, $dscrp);
            fclose($plik);
            sem_release($semRes);
        }else{
            echo "Nie działa<br>";
        }
        
        $info = getdate();
        $fileN = $_FILES['plik1']['name'];
        $cont = substr($fileN, strpos($fileN, "."));
        $fileName = substr($postN, 0, 16) . "1" . $cont;  
        if(move_uploaded_file($_FILES['plik1']['tmp_name'], $dir . "/" . $fileName)){
            echo "<br>jest plik 1";
        }else{
            echo "<br>nie ma pliku 1";
        }
        
        $fileN = $_FILES['plik2']['name'];
        $cont = substr($fileN, strpos($fileN, "."));
        $fileName = substr($postN, 0, 16) . "2" . $cont;
        if(move_uploaded_file($_FILES['plik2']['tmp_name'], $dir . "/" . $fileName)){
            echo "<br>jest plik 2";
        }else{
            echo "<br>nie ma pliku 2";
        }
        
        $fileN = $_FILES['plik3']['name'];
        $cont = substr($fileN, strpos($fileN, "."));
        $fileName = substr($postN, 0, 16) . "3" . $cont;
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
