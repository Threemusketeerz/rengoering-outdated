<html>
<head>
<link type="text/css" rel="stylesheet" href="addedmollericss.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id="head">Tilf&oslashj M&oslashlleri reng&oslashring</h1>
<?php
if(isset($_POST["submit"])){
    $data_miss = array();   
    if(empty($_POST["bemækninger"])){
        $data_miss[] = "Bem&aeligrkning";
    }else{
        $bemærk = trim($_POST["bemækninger"]);
    }
    if(empty($_POST["inti"])){
        $data_miss[] = "Intialer";
    }else {
        $inti = trim($_POST["inti"]);
    }
    
    if(empty($data_miss)){
        require_once("../mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO møller (inti, bemækninger) VALUES (?,?)")){
            mysqli_stmt_bind_param($stmt, "ss", $inti,  $bemærk);
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
<form action="http://10.22.1.15/Molleri/addedmolleri.php" method="post">
<h2 id="over"><b>Skriv ind her</b></h2>
<p id="over"><b>Dato bliver inds&aeligt ved tilf&oslashjelse af reng&oslashring automatisk</b><br />
</p>
<p id="over"><b>Intialer:</b><br />
<input type="text" name="inti" size="30" value=""/>
</p>

<p id="over"><b>Bem&aeligrkninger: Max 200 tegn</b><br />
<input type="text" name="bemækninger" size="30" value=" "/>
</p>

<p>
<input id="btn" type="submit" name="submit" value="Indsend"/>
</p>
</form>

</body>
</html>