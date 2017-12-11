<html>
<head>
<link  type="text/css" rel="stylesheet" href="regaddedcss.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id="head">Tilf&oslashj maskine reng&oslashring</h1>

<?php
if(isset($_POST["submit"])){
    $data_miss = array();
    if(empty($_POST["maskine"])){
        $data_miss[] = "Maskine";
    }else {
        $maskine = trim($_POST["maskine"]);
    }if(empty($_POST["batch"])){
        $data_miss[] = "Batch";
    }else {
        $batch = trim($_POST["batch"]);
    }if(empty($_POST["tør_reg"])){
        $data_miss[] = "T&oslashr reng&oslashring";
    }else {
        $tør_reg = trim($_POST["tør_reg"]);
    }if(empty($_POST["kontrol"])){
        $data_miss[] = "Kontrol";
    }else {
        $kontrol = trim($_POST["kontrol"]);
    }if(empty($_POST["diverse"])){
        $data_miss[] = "Bem&aeligrkning";
    }else{
        $diverse = trim($_POST["diverse"]);
    }if(empty($_POST["forgå"])){
        $data_miss[] = "Forg&aringende produkt";
    }else {
        $forgå = trim($_POST["forgå"]);
    }if(empty($_POST["næste"])){
        $data_miss[] = "N&aeligste produkt";
    }else{
        $næste = trim($_POST["næste"]);
    }if(empty($_POST["instruk"])){
        $data_miss[] = "Instruktion";
    }else {
        $instruk = trim($_POST["instruk"]);
    }
    
    if(empty($data_miss)){
        require_once("../mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO efter (maskine, batch,
        tør_reg, kontrol, diverse, forgå, næste, instruk) VALUES (?,?,?,?,?,?,?,?)")){
            mysqli_stmt_bind_param($stmt, "ssssssss", $maskine, $batch, $tør_reg, $kontrol, $diverse, $forgå, $næste, $instruk);
            mysqli_stmt_execute($stmt);
        }else{
            echo "error" . mysqli_error($dbc);
        }
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Rengøring tilføjet';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }else {
            echo "Error";
            echo mysqli_error($dbc);
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
    }
    else {
        echo "Vigtig information mangler!<br />";
        foreach ($data_miss as $miss){
            echo "$miss <br />";
        }
    }
}

?>
<div class="formed">
<form action="http://10.22.1.15/Maskine/regadded.php" method="post">
<h2 id="box"><b>Skriv ind her</b></h2>
<b>
<p id="box">Maskine rengjort:<br />
<input  type ="text" name="maskine" size="30" value=" " />
</p>
<p id="box">Batch nummer:<br />
<input  type="text" name="batch" size="30" value=" "/>
</p>
<p id="box">T&oslashr reng&oslashring:<br />
<input  type="text" name="tør_reg" size="30" value=" "/>
</p>
<p id="box">V&aringd Reng&oslashring:<br />
<input  type="text" name="kontrol" size="30" value=" "/>
</p>
<p id="box">Forg&aringende produkt:<br />

<input  type="text" name="forgå" value=" " size="30"/>

</p>
<p id="box">N&aeligste produkt:<br />

<input  type="text" name="næste" size="30" value="Ingen"/>

</p>
<p id="box">Instruktion:<br />

<input  type="text" name="instruk" size="30" value=" "/>

</p>
<p id="box">Bem&aeligrkninger:<br />
<input type="text" name="diverse" size="30" value=" "/>
</p>
<p>

<input id="btn" type="submit" name="submit" ></input>
</b>
</p>

</form>
</div>

</body>
</html>