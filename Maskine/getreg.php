<html>
<head>
<link type="text/css" rel="stylesheet" href="getregcss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="more.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<div class="wrapper">
<div class=boxses>
<h1 align="center" id="head">Reng&oslashrings Skema for maskiner</h1>
<p id="instruk">Hold musen over for at se instruktion for </p>
<b id="instruk">Fluid bed: </b><a href="http://bdkls/showpage.php?pageid=3528"><button id="btn">Hold over</button></a><div id="box"><iframe src ="http://bdkls/showpage.php?pageid=3528"width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<b id="instruk">Filter mat: </b><a href="http://bdkls/showpage.php?pageid=3524"><button id="btn">Hold over</button></a><div id="box"><iframe src ="http://bdkls/showpage.php?pageid=3524" width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<b id="instruk">V&aringdprodukter: </b><a href="http://bdkls/showpage.php?pageid=3636"><button id="btn">Hold over</button></a><div id="box"><iframe src ="http://bdkls/showpage.php?pageid=3636" width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<div class="søgte">
<form align="right" method="post" action="http://10.22.1.15/Maskine/getreg.php">
<p id="søgtP">S&oslashg i databse<br /></p>
<input id="søgt" type="text" name="text">

<input id="søgtS" type="submit" name="search" value="Søg Her">

</form>
</div>
</div><!--Her ender boxses-->
<div class="change">

<form align="center" method="post" action="http://10.22.1.15/Maskine/getreg.php">
<p align="center" id="næsti"><b>Skriv n&aeligste produkt ind:</b></p>
<p id=næst>N&aeligste Produkt:<br />
<input id=næst type="text" name="produkt" size="30" />
</p>
<p id=næst>ID p&aring kolonne:<br />
<input id=næst type="number" name="id" size="10" />
</p>
<input id=skift type="submit" name="submit" onClick="window.location.reload()"/>
</form>

</div><!--Her ender change-->


<?php
require_once("../mysqli_connect.php");
if(isset($_POST["search"])){ //Fortæller scripted når du trykker
    if(isset($_POST["text"])){//Henter hvad du har skrevet i search box'en
        
        $text = $_POST["text"];
        $text = strtoupper($text);//Trimmer texten her
        $text = strip_tags($text);
        $text = trim($text);//Til her
        $query2 ="SELECT * FROM efter WHERE maskine LIKE '%".$text."%' 
        OR batch LIKE '%".$text."%' OR dato LIKE '%".$text."%' ORDER BY reg_id DESC LIMIT 10" ;
        $result1 = mysqli_query($dbc, $query2);//Fortæller scriptet den skal hente information fra database
        if ($result1){
            echo '<h1 align="center" id="headS">S&oslashge resultat</h1>';
            echo '<div class="søge"><table  align="center" cellspacing="5" cellpadding ="8">
            
                <tr><td id="over" align="left"><b>ID</b></td>
                <td id="over2" align="left"><b>Maskine</b></td>
                <td id="over" align="left"><b>Batch NR.</b></td>
                <td id="over2" align="left"><b>T&oslashr reng&oslashring</b></td>
                <td id="over" align="left"><b>V&aringd Reng&oslashring</b></td>
                <td id="over2" align="left"><b>Foreg&aringende produkt</b></td>
                <td id="over" align="left"><b>N&aeligste produkt</b></td>
                <td id="over2" align="left"><b>Instruktion</b></td>
                <td id="over" align="left"><b>Dato</b></td>
                <td id="over2" align="left"><b>Bem&aeligrkninger</b></td></tr>';
            while($row1 = mysqli_fetch_array($result1)){ //og her viser jeg information på skærmen
                echo '<tr><td align="left" class ="grey2">'.
                $row1["reg_id"] . '</td><td align="left" class ="grey">' .
                $row1["maskine"] . '</td><td align="left" class="grey2">' .
                $row1["batch"] . '</td><td align="left" class="grey">' .
                $row1["tør_reg"] . '</td><td align="left" class="grey2">' .
                $row1["kontrol"] . '</td><td align="left" class="grey">' .
                $row1["forgå"] . '</td><td align="left" class="grey2">' .
                $row1["næste"] . '</td><td align="left" class="grey">' .
                $row1["instruk"] . '</td><td align="left" class="grey2">' .
                $row1["dato"] . '</td><td align="left" class="diverse">'.
                $row1["diverse"]  . '</td><td align="left">' ;
                echo '</tr>';
            }
            echo '</table><br /></div>';
                
        
        }else {
            echo "Sorry no name found";
        }
    
    }
    }

// For serilization of json data to .json
$response = array()
$posts = array()
// end of variables used for this purpose

$sql = "SELECT * FROM efter ORDER BY reg_id DESC";
$result = $dbc->query($sql) or die($dbc->error);

if($result->num_rows > 0){
    echo '<table align="center" id="myTable" cellspacing="5" cellpadding ="8">

    <tr><td id="over" align="left"><b>ID</b></td>
    <td id="over2" align="left"><b>Maskine</b></td>
    <td id="over" align="left"><b>Batch NR.</b></td>
    <td id="over2" align="left"><b>T&oslashr reng&oslashring</b></td>
    <td id="over" align="left"><b>V&aringd reng&oslashring</b></td>
    <td id="over2" align="left"><b>Foreg&aringende produkt</b></td>
    <td id="over" align="left"><b>N&aeligste produkt</b></td>
    <td id="over2" align="left"><b>Instruktion</b></td>
    <td id="over" align="left"><b>Dato</b></td>
    <td id="over2" align="left"><b>Bem&aeligrkninger</b></td></tr>';
    while($rows = $result->fetch_assoc()){
       echo '<tr><td align="left" class ="grey2">'.
       $rows["reg_id"] . '</td><td align="left" class ="grey">' .
       $rows["maskine"] . '</td><td align="left" class="grey2">' .
       $rows["batch"] . '</td><td align="left" class="grey">' .
       $rows["tør_reg"] . '</td><td align="left" class="grey2">' .
       $rows["kontrol"] . '</td><td align="left" class="grey">' .
       $rows["forgå"] . '</td><td align="left" class="grey2">' .
       $rows["næste"] . '</td><td align="left" class="grey">' .
       $rows["instruk"] . '</td><td align="left" class="grey2">' .
       $rows["dato"] . '</td><td align="left" class="diverse">'.
       $rows["diverse"]  . '</td><td align="left">' ;
	   array_push($response, $rows);
       echo '</tr>';
    }
    echo '</table>';
    
    }
    else {
        echo "Could not reach database";
        echo mysqli_error($dbc);
    }
    if(isset($_POST["submit"])){ //Update til næste produkt
        $produkt = $_POST["produkt"];
        $id = $_POST["id"];
        $query1 = "UPDATE efter SET næste = '$produkt' WHERE reg_id = '$id'";
        if(mysqli_query($dbc, $query1)){
            echo "Updated";
        }else {
            echo "failed";
        }
    }
    $myPath = "scripts/";
    $myFile = $myPath."results.json";
    $fp = fopen($myFile, 'w');
    chmod ("results.json", 0777);
    fwrite($fp, json_encode($response));

    fclose($fp);
    
mysqli_close($dbc);
?>


</div><!--Her ender warpper-->
<div id="showBtn">
<button id="show">Vis 10 Mere</button>
</div> 

</body>
</html>
