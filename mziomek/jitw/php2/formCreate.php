<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
    <?php include 'menu.php'; ?>
	<form action="nowy.php" method="POST">
        Tworzenie<br>
        Nazwa bloga:<br>
        <input type="text" name="blogName"><br>
        Nazwa użytkownika:<br>
        <input type="text" name="name"><br>
        Hasło:<br>
        <input type="password" name="passwd"><br>
        Opis:<br>
        <textarea name="dscrp" rows="10" cols="30">Opisz tutaj</textarea><br>   
        <input type="submit" value="Wyślij">
        <input type="reset" value="Wyczyść" name="reset" />
	</form>
</body>
</html>
