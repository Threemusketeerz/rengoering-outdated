<html>
<head>
<link  type="text/css" rel="stylesheet" href="addedposepakcss.css">
<meta charset = "utf-8">

</head>
<body>
<h1 id="head">Tilføj Sparkodanrum rengøring</h1>

<?php
if(isset($_POST["submit"])){
    $data_miss = array();
    
    if(empty($_POST["navn"])){
        $data_miss[] = "Intialer";
    }
    else {
        $navn = trim($_POST["navn"]);
    }
     if(empty($_POST["produk"])){
        $data_miss[] = "Produkt";
    }
    else {
        $produk = trim($_POST["produk"]);
    }
    if(empty($_POST["bemærkning"])){
        $data_miss[] = "Bemærkning";
    }
    else{
        $diverse = trim($_POST["bemærkning"]);
    }
    if(empty($_POST["batch"])){
        $data_miss[] = "Batch Nummer";
    }
    else{
        $batch = trim($_POST["batch"]);
    }
    if (empty($data_miss)){
        require_once("../mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO sparkodan (navn, produk, batch, bemærkning)
        VALUES (?,?,?,?)")){
            mysqli_stmt_bind_param($stmt, "ssss",   $navn, $produk, $batch, $diverse);
            mysqli_stmt_execute($stmt);
        }else {
            echo "Error". mysqli_error($dbc);
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
<form action="http://10.22.1.15/Sparkodanrum/addedsparkodan.php" method="post">
<p id ="box"><b>Skriv ind her</p>
<p id ="box">Intialer:<br />
<input type="text" name="navn" value=" " size="30"/>
</p>
<p id ="box">Produkt:<br />
<input type="text" name="produk" value=" " size="30"/>
</p>
<p id ="box">Batch-nummer:<br />
<input type="text" name="batch" value=" " size="30"/>
</p>
<p id ="box">Bemærkninger:<br /></b>
<input type="text" name="bemærkning" size="30" value=" "/>
</p>
<p >
<input id="btn" type="submit" name="submit" value="Tilføj"/>
</p>
</form>
</body>
</html>