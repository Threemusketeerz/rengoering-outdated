<html>
<head>
<link type="text/css" rel="stylesheet" href="getblandericss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="more.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id="head" align="center" >Reng&oslashring Blanderi</h1>
<p id="instruk">Hold musen over for at se instruktion</p>
<b id="instrukP">Blanderi: </b><a href="http://bdkls/showpage.php?pageid=3540"><button id="btn">Hold over</button></a><div class="box"><iframe src ="http://bdkls/showpage.php?pageid=3540" width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<div class="søgte">
<form align="right" method="post" action="http://10.22.1.15/Blanderi/getblanderi.php">
<p id="søgtP">S&oslashg i databse<br /></p>
<input id="søgt" type="text" name="text">

<input id="søgtS" type="submit" name="search" value="Søg Her" onClick="window.location.reload(http://10.22.1.15/blanderi/getblanderi.php)">

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
            $query2 ="SELECT * FROM før  WHERE dato LIKE '%".$text."%' ORDER BY før_id DESC LIMIT 10" ;
            $result1 = mysqli_query($dbc, $query2);//Fortæller scriptet den skal hente information fra database
            if ($result1){
            echo '<h1 align="center" id="headS">S&oslashge resultat</h1>';
            echo '<div class="søge"><table  align="center" cellspacing="5" cellpadding ="8">
            
                <tr><td id="over2" align="left"><b>ID</b></td>
                <td id="over" align="left"><b>Intialer</b></td>
                <td id="over2" align="left"><b>Blanderi</b></td>
                <td id="over" align="left"><b>Udtapper</b></td>
                <td id="over2" align="left"><b>Knuser</b></td>
                <td id="over" align="left"><b>Dato</b></td>
                <td id="over2" align="left"><b>Bem&aeligrkninger</b></td></tr>';
            while($rows = $result->fetch_assoc()){
            echo '<tr><td align="left" class="color">'.
                $rows["før_id"] . '</td><td align="left" id="color2">' .
                $rows["inti"] . '</td><td align="left" class="color">' .
                $rows["blanderi"] . '</td><td align="left" id="color2">' .
                $rows["udtapper"] . '</td><td align="left" class="color">' .
                $rows["knuser"] . '</td><td align="left" id="color2">' .
                $rows["dato"] . '</td><td align="left" class="color">'.
                $rows["bemærkninger"]  . '</td><td align="left" >' ;
                echo '</tr>';
            }
            echo '</table><br /></div>';
        }
            else {
            echo "Sorry no name found";
        }
    
    }
    }
$sql = "SELECT * FROM før ORDER BY før_id DESC";
$result = $dbc->query($sql) or die($dbc->error);

if($result->num_rows > 0){
    
    echo '<div class="søge"><table id="myTable"  align="center" cellspacing="5" cellpadding ="8">
            
        <tr><td id="over2" align="left"><b>ID</b></td>
        <td id="over" align="left"><b>Intialer</b></td>
        <td id="over2" align="left"><b>Blanderi</b></td>
        <td id="over" align="left"><b>Udtapper</b></td>
        <td id="over2" align="left"><b>Knuser</b></td>
        <td id="over" align="left"><b>Dato</b></td>
        <td id="over2" align="left"><b>Bem&aeligrkninger</b></td></tr>';
    while($rows = $result->fetch_assoc()){
       echo '<tr><td align="left" class="color">'.
        $rows["før_id"] . '</td><td align="left" id="color2">' .
        $rows["inti"] . '</td><td align="left" class="color">' .
        $rows["blanderi"] . '</td><td align="left" id="color2">' .
        $rows["udtapper"] . '</td><td align="left" class="color">' .
        $rows["knuser"] . '</td><td align="left" id="color2">' .
        $rows["dato"] . '</td><td align="left" class="color">'.
        $rows["bemærkninger"]  . '</td><td align="left" >' ;
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
<div class="showBtn">
<button id="show">Vis 10 Mere</button>
</div>
</body>
</html>