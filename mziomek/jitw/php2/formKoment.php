<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
    <?php include 'menu.php'; ?>
	<form action="koment.php" method="POST" enctype="multipart/form-data">
        Komentarz<br>
        Komentowany Wpis:<br>
        
        <select name="post">
            <?php 
            if ($path = opendir('.')) {
                while (false !== ($entry = readdir($path))) {
                    if ($entry != "." && $entry != ".." && is_dir($entry)){
                        if ($subPath = opendir($entry)) {
                            while (false !== ($subEntry = readdir($subPath))) {
                                $onlyName = strtok($subEntry, '.'); 
                                if (!is_dir($subEntry) && 
                                    strlen($onlyName) == 16){
                                    echo "<option>" . "$onlyName" . "</option>";
                                }
                            }
                        closedir($subPath);
                        }
                    }
                }
                closedir($path);
            }
            ?><br>
        
        </select><br><br>
        Imię/Nazwisko/Pseudonim:<br>
        <input type="text" name="name"><br><br>
        Rodzaj<br>
        <select name="comType">
            <option>Pozytywny</option>
            <option>Negatywny</option>
            <option>Neutralny</option>
        </select><br><br>
        Komentarz:<br>
        <textarea name="coment" rows="10" cols="30">Wpisz Twój komentarz</textarea><br><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Wyczyść" name="reset" />
	</form>
</body>
</html>