<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/plain; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
	<?php
	function witaj($imie) {
		if($imie == 'Mateusz')
			return 'Cześć ' . $imie . '!';
		else
			return 'Go away!';	
	}
	
	echo witaj($_GET['id']);
	echo '<br>';
	$plik = fopen($_GET['id'].'.txt', 'r');
	
	$haslo = $_GET['ile'];
	$ile = strlen($haslo);
	while (!feof($plik)) {
  		$s = fgets($plik);
		if($ile == strlen($s)-1){
			echo $s;
		}
		echo '<br>';
	}
	fclose($plik);
?>
</body>
</html>
