<html>
<head>
<link type="text/css" rel="stylesheet" href="getmollericss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="more.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id="head" align="center" >Reng&oslashring M&oslashlleri</h1>
<p id="instruk">Hold musen over for at se instruktion</p>
<b id="instrukP">M&oslashlleri: </b><a href="http://bdkls/showpage.php?pageid=3536"><button id="btn">Hold over</button></a><div class="box"><iframe src ="http://bdkls/showpage.php?pageid=3536" width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<div class="søgte">
<form align="right" method="post" action="http://10.22.1.15/Blanderi/getblanderi.php">
<p id="søgtP">S&oslashg i databse<br /></p>
<input id="søgt" type="text" name="text">

<input id="søgtS" type="submit" name="search" value="Søg Her" onClick="window.location.reload(http://10.22.1.15/Maskine/getreg.php)">

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
            $query2 ="SELECT * FROM møller  WHERE dato LIKE '%".$text."%' ORDER BY møller_id DESC LIMIT 10" ;
            $result1 = mysqli_query($dbc, $query2);//Fortæller scriptet den skal hente information fra database
            if ($result1){
                echo '<table align="center" cellspacing="5" cellpadding ="8">

                <tr><td align="left" id="over2"><b>ID</b></td>
                <td align="left" id="over"><b>Intialer</b></td>
                
                <td align="left" id="over"><b>Dato</b></td>
                <td align="left" id="over2"><b>Bem&aeligrkninger</b></td></tr>';
                while($row = mysqli_fetch_array($result1)){
                     echo '<tr><td align="left"  id="color">'.
                    $row["møller_id"] . '</td><td align="left" id="color2" >' .
                    $row["inti"] . '</td><td align="left" id="color">' .
                    
                    $row["dato"] . '</td><td align="left" id="color">'.
                    $row["bemækninger"]  . '</td>' ;
                    echo '</tr>';
                }
                echo '</table>';
            }else {
                echo "error";
            }
        }
    }
$sql = "SELECT  * FROM møller ORDER BY møller_id DESC";
$results = $dbc->query($sql);

if($results->num_rows > 0){
     echo '<table align="center" id="myTable" cellspacing="5" cellpadding ="8">

        <tr><td align="left" id="over2"><b>ID</b></td>
        <td align="left" id="over"><b>Intialer</b></td>
        <td align="left" id="over2"><b>Dato</b></td>
        <td align="left" id="over"><b>Bem&aeligrkninger</b></td></tr>';
    while($row = $results->fetch_assoc()){
      echo '<tr><td align="left" id="color" >'.
            $row["møller_id"] . '</td><td align="left" id="color2" >' .
            $row["inti"] . '</td><td align="left" id="color">' .
            
            $row["dato"] . '</td><td align="left" id="color2">'.
            $row["bemækninger"]  . '</td>' ;
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