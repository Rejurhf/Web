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
    $semRes = sem_get( 1111, 1, 0666, 0);
    if (sem_acquire($semRes)) {
        if(!mkdir((string)$_POST['blogName'], 0777, true)){
            echo 'Taki folder juz istnieje<br>';
        }else{
            $pass = $_POST['passwd'];
            $plik = fopen($_POST['blogName']."/info.txt", "w");
            fputs($plik, $_POST['name']."\n");
            fputs($plik, md5($pass)."\n");
            fputs($plik, $_POST['dscrp']);
            fclose($plik);
        }
        sem_release($semRes);
    }
?>
</body>
</html>
