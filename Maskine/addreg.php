<html>
<head>
<title>Tilføj rengøring</title>
</head>
<body>
<form action="http://localhost:8888/Maskine/regadded.php" method="post">
<p><b>Skriv ind her</b></p>
<p>Batch nummer:<br />
<input type="text" name="batch" size="30" value=" "/>
</p>
<p>Tør rengøring:<br />
<input type="text" name="tør_reg" size="30" value="Nej"/>
</p>
<p>Vask rengøring:<br />
<input type="text" name="kontrol" size="30" value="Nej"/>
</p>
<p>Intialer:<br />
<input type="text" name="inti" value=" " size="30"/>
<p>
<p>Bemærkninger:<br />
<input type="text" name="diverse" size="30" value=" "/>
</p>
<p>

<input type="submit" name="submit" value="Tilføj"/>
</p>
</form>
</body>
</html>