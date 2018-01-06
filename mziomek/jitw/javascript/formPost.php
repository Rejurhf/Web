<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Post</title>
<script type="text/javascript">
<!--
function odliczaj(){
	var data = new Date();
	document.getElementById('data').value = data.getFullYear + '-' + ('0' + data.getMonth+1).slice(-2) + '-' + ('0' + data.getDay).slice(-2);
}
// -->
</script>
</head>
<body onload="odliczaj()">
	<form action="wpis.php" method="POST" enctype="multipart/form-data">
        Wpis<br>
        Nazwa użytkownika:<br>
        <input type="text" name="name"><br><br>
        Hasło:<br>
        <input type="password" name="passwd"><br><br>
        Wpis:<br>
        <textarea name="dscrp" rows="10" cols="30">Opisz tutaj</textarea><br><br>
        Data:<br>
        <input id="data" type="text" name="date" value=""><br><br>
        Godzina:<br>
        <input id="czas" type="text" name="time" value="00:00"><br><br>
        Załączniki:<br>
        <input type="file" name="plik1"><br>
        <input type="file" name="plik2"><br>
        <input type="file" name="plik3"><br><br>
        <input type="submit" value="Wyślij">
        <input type="reset" value="Wyczyść" name="reset" />
	</form>
</body>
</html>
