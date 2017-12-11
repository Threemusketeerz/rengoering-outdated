<html>
<head>
<link type="text/css" rel="stylesheet" href="getposepakcss.css">
<meta charset = "utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="more.js"></script>
</head>
<body>
<div class="wrapper">
<div class=boxses>
<h1 align="center" id="head">Rengørings Skema for Sparkodan-Rum</h1>
<p id="instruk">Hold musen over for at se instruktion for </p>
<b id="instruk">Sparkodan-Rum: </b><a href="http://bdkls/showpage.php?pageid=3672"><button id="btn">Hold over</button></a><div id="box"><iframe src ="http://bdkls/showpage.php?pageid=3672"width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<div class="søgte">
<form align="right" method="post" action="http://10.22.1.15/Sparkodanrum/getsparkodan.php">
<p id="søgtP">Søg i databse<br /></p>
<input id="søgt" type="text" name="text">

<input id="søgtS" type="submit" name="search" value="Søg Her">

</form>
</div>
<?php
require_once("../mysqli_connect.php");
if(isset($_POST["search"])){ //Fortæller scripted når du trykker
    if(isset($_POST["text"])){//Henter hvad du har skrevet i search box'en
        
        $text = $_POST["text"];
        $text = strtoupper($text);//Trimmer texten her
        $text = strip_tags($text);
        $text = trim($text);//Til her
        $query2 ="SELECT * FROM sparkodan WHERE 
        dato LIKE '%".$text."%' ORDER BY spa_id DESC LIMIT 10" ;
        $result1 = mysqli_query($dbc, $query2);//Fortæller scriptet den skal hente information fra database
        if ($result1){
            echo '<h1 align="center" id="headS">Søge resultat</h1>';
            echo '<div class="søge"><table  align="center" cellspacing="5" cellpadding ="8">
            
                <tr><td id="over" align="left"><b>ID</b></td>
                <td id="over2" align="left"><b>Intialer</b></td>
                <td id="over" align="left"><b>Produkt</b></td>
                <td id="over2" align="left"><b>Batch-Nummer</b></td>
                <td id="over" align="left"><b>Dato</b></td>
                <td id="over2" align="left"><b>Bemærkninger</b></td></tr>';
            while($row1 = mysqli_fetch_array($result1)){ //og her viser jeg information på skærmen
                echo '<tr><td align="left" class="grey">'.
                
                $row1["spa_id"] . '</td><td align="left" class="grey">' .
                $row1["navn"] . '</td><td align="left"id="grey2" >' .
                $rows["produk"] . '</td><td align="left"id="grey" >' .
                $row1["batch"] . '</td><td align="left"id="grey2" >' .
                $row1["dato"] . '</td><td align="left" class="diverse">'.
                $row1["bemærkning"]  . '</td><td align="left" >' ;
                echo '</tr>';
            }
            echo '</table><br /></div>';
        }
            else {
            echo "Sorry no name found";
        }
    
    }
    }
$sql = "SELECT * FROM sparkodan ORDER BY spa_id DESC";
$result = $dbc->query($sql) or die($dbc->error);

if($result->num_rows > 0){
    
    echo '<div class="søge"><table id="myTable"  align="center" cellspacing="5" cellpadding ="8">
            
        <tr><td id="over" align="left"><b>ID</b></td>
        <td id="over2" align="left"><b>Intialer</b></td>
        <td id="over" align="left"><b>produkt</b></td>
        <td id="over2" align="left"><b>Batch-Nummer</b></td>
        <td id="over" align="left"><b>Dato</b></td>
        <td id="over2" align="left"><b>Bemærkninger</b></td></tr>';
    while($rows = $result->fetch_assoc()){
       echo '<tr><td align="left" id="grey2">'.
        $rows["spa_id"] . '</td><td align="left" id="grey">' .
        $rows["navn"] . '</td><td align="left"id="grey2" >' .
        $rows["produk"] . '</td><td align="left"id="grey" >' .
        $rows["batch"] . '</td><td align="left"id="grey2" >' .
                
        $rows["dato"] . '</td><td align="left" id="grey">'.
        $rows["bemærkning"]  . '</td><td align="left" >' ;
        echo '</tr>';
    }
    echo '</table>';
    
    }
    else {
        echo "Could not reach database";
        echo mysqli_error($dbc);
    }
    mysqli_close($dbc);
?>
<div id="showBtn">
<button id="show">Vis 10 Mere</button>
</div> 
</body>
</html>