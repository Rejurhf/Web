<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Blog</title>
</head>
<body>
    <?php include 'menu.php'; ?>
	<form action="blog.php" method="GET">
        Wpisz nazwę bloga:<br>
        <input type="text" name="name"><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Wyczyść" name="reset" />
	</form>
</body>
</html>
