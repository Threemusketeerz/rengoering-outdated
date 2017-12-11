<html>
<head>
<link  type="text/css" rel="stylesheet" href="addedposepakcss.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id="head">Tilf&oslashj posepakkeri reng&oslashring</h1>

<?php
if(isset($_POST["submit"])){
    $data_miss = array();
    if(empty($_POST["batch"])){
        $data_miss[] = "Batch";
    }else {
        $batch = trim($_POST["batch"]);
    }if(empty($_POST["tør"])){
        $data_miss[] = "T&oslashr rengøring";
    }else {
        $tør = trim($_POST["tør"]);
    }if(empty($_POST["vask"])){
        $data_miss[] = "Vask reng&oslashring";
    }else {
        $vask = trim($_POST["vask"]);
    }if(empty($_POST["inti"])){
        $data_miss[] = "Intialer";
    }else {
        $inti = trim($_POST["inti"]);
    }
    if(empty($_POST["diverse"])){
        $data_miss[] = "Bem&aeligrkning";
    }else{
        $diverse = trim($_POST["diverse"]);
    }
    if (empty($data_miss)){
        require_once("../mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO posepak (batch, tør, vask, inti, diverse)
        VALUES (?,?,?,?,?)")){
            mysqli_stmt_bind_param($stmt, "sssss", $batch, $tør, $vask, $diverse, $inti);
            mysqli_stmt_execute($stmt);
        }else {
            echo "Error". mysqli_error($dbc);
        }
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Reng&oslashring tilf&oslashjet';
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
<form action="http://10.22.1.15/PosePakkeri/addedposepak.php" method="post">
<p id ="box"><b>Skriv ind her</p>
<p id ="box">Batch nummer:<br />
<input type="text" name="batch" size="30" value=""/>
</p>
<p id ="box">T&oslashr reng&oslashring:<br />
<input type="text" name="tør" size="30" value=""/>
</p>
<p id ="box"><b>Vask reng&oslashring:<br />
<input type="text" name="vask" size="30" value=""/>
</p>
<p id ="box">Intialer:<br />
<input type="text" name="inti" value=" " size="30"/>
</p>

<p id ="box">Bem&aeligrkninger:<br /></b>
<input type="text" name="diverse" size="30" value=" "/>
</p>
<p >
<input id="btn" type="submit" name="submit" value="Indsend"/>
</p>
</form>
</body>
</html>