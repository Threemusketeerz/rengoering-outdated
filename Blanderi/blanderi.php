<html>
<head>
<link type="text/css" rel="stylesheet" href="blandericss.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id="head">Tilf&oslashj Blanderi</h1>
<?php
if(isset($_POST["submit"])){
    $data_miss = array();   
    if(empty($_POST["bemærkninger"])){
        $data_miss[] = "Bemærkning";
    }else{
        $bemærk = trim($_POST["bemærkninger"]);
    }if(empty($_POST["inti"])){
        $data_miss[] = "Intialer";
    }else {
        $inti = trim($_POST["inti"]);
    }if(empty($_POST["udtapper"])){
        $data_miss[] = "Udtapper";
    }else {
        $udtap = trim($_POST["udtapper"]);
    }if(empty($_POST["knuser"])){
        $data_miss[] = "Knuser";
    }else {
        $knuser = trim($_POST["knuser"]);
    }if(empty($_POST["blanderi"])){
        $data_miss[] = "Blanderi";
    }else{
        $blanderi = trim($_POST["blanderi"]);
    }
    
    if(empty($data_miss)){
        require_once("../mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO før (inti,  bemærkninger, udtapper, knuser, blanderi) VALUES (?,?,?,?,?)")){
            mysqli_stmt_bind_param($stmt, "sssss", $inti, $bemærk, $udtap, $knuser, $blanderi);
            mysqli_stmt_execute($stmt);
        }
        
        
        else{
            echo "error" . mysqli_error($dbc);
        }
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Reng&oslashring tilf&oslashjet';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }else {
            echo "Error";
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
<form action="http://10.22.1.15/Blanderi/blanderi.php" method="post">
<h2 id="over"><b>Skriv ind her</b></h2>
<p id="over"><b>Dato bliver inds&aeligt ved tilf&oslashjelse af reng&oslashring automatisk</b><br />

</p>
<p id="over"><b>Intialer:</b><br />
<input type="text" name="inti" size="30" value=""/>
</p>
<p id="over"><b>Udtapper:</b><br />
<input type="text" name="udtapper" size="30" value="Ingen"/>
</p>
<p id="over"><b>Knuser:</b><br />
<input type="text" name="knuser" size="30" value="Ingen"/>
</p>
<p id="over"><b>Blanderi:</b><br />
<input type="text" name="blanderi" size="30" value="Ingen"/>
</p>
<p id="over"><b>Bem&aeligrkninger:</b><br />
<input type="text" name="bemærkninger" size="30" value=" "/>
</p>

<p>
<input id="btn" type="submit" name="submit" value="Indsend"/>
</p>
</form>

</body>
</html>