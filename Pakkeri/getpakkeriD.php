<html>
<head>
<link type="text/css" rel="stylesheet" href="getpakkericss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="more.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<h1 id=head align="center">Reng&oslashring for Pakkeri</h1>

<p id="instruk">Hold musen over for at se instruktion</p>
<b id="instrukP">Pakkeri: </b><a href="http://bdkls/showpage.php?pageid=3564"><button id="btn">Hold over</button></a><div class="box"><iframe src ="http://bdkls/showpage.php?pageid=3564" width="100%" height="1000px" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<div class="søgte">
<form align="right" method="post" action="http://10.22.1.15/Pakkeri/getpakkeriD.php">
<p id="søgtP">S&oslashg i databse<br /></p>
<input id="søgt" type="text" name="text">

<input id="søgtS" type="submit" name="search" value="Søg Her" onClick="window.location.reload(http://localhost:8888/Maskine/getreg.php)">

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
            $query2 ="SELECT * FROM daglig WHERE dato LIKE '%".$text."%' ORDER BY dato DESC LIMIT 10" ;
            $result1 = mysqli_query($dbc, $query2);//Fortæller scriptet den skal hente information fra database
            if ($result1){
                echo '<div class="tables"><table align="center" cellspacing="5" cellpdding="8">
                <tr><td align="left" id="word"><b>Dato: YYYY-MM-D</b></td>
                <td align="left" id="word2"><b>L&oslashse paller</b></td>
                <td align="left" id="word"><b>Affald</b></td>
                <td align="left" id="word2"><b>Snegle</b></td>
                <td align="left" id="word"><b>Overflader</b></td>
                <td align="left" id="word2"><b>Udpakningsenhed</b></td>
                <td align="left" id="word"><b>Gulv</b></td>
                <td align="left" id="word2"><b>Pallevarer</b></td>
                <td align="left" id="word"><b>Aspirationsanl&aeligg</b></td>
                <td align="left" id="word2"><b>Spild</b></td>
                <td align="left" id="word"><b>Bigbags</b></td>
                <td align="left" id="word2" ><b>Paller stables</b></td>
                <td align="left" id="word"><b>T&oslashmmestativet</b></td>
                <td align="left" id="word2"><b>Lagervarer</b></td>
                <td align="left" id="word"><b>Ugentlig</b></td>
                <td align="left" id="word2"><b>M&aringnedlig</b></td>
                <td align="left" id="word"><b>Bem&aeligrning</b></td>
                </tr><div>';
                while($row = mysqli_fetch_array($result1)){
                     echo '<tr><td align="center" id="color2" >'.
                    $row["dato"].'</td><td align="center" id="color">'.
                    $row["paller"].'</td><td align="center" id="color2">'.
                    $row["palstic"].'</td><td align="center" id="color">'.
                    $row["snegl"].'</td><td align="center" id="color2">'.
                    $row["vand"].'</td><td align="center" id="color">'.
                    $row["udpak"].'</td><td align="center" id="color2">'.
                    $row["gulv"].'</td><td align="center" id="color">'.
                    $row["varer"].'</td><td align="center" id="color2">'.
                    $row["spand"].'</td><td align="center" id="color">'.
                    $row["splid"].'</td><td align="center" id="color">'.
                    $row["bigbag"].'</td><td align="center" id="color2">'.
                    $row["stable"].'</td><td align="center" id="color">'.
                    $row["tømme"].'</td><td align="center" id="color2">'.
                    $row["lager"].'</td><td align="center" id="color">'.
                    $row["ugentlig"].'</td><td align="center" id="color2">'.
                    $row["måned"].'</td><td align="center" id="color">'.
                    $row["bemærk"].'</td>';
                    echo '</tr>';
            }
            echo "</table>";
            }else {
                echo "error". mysqli_error($dbc);
            }
        }
    }
    
    
    $sql = "SELECT * FROM daglig ORDER BY dato DESC";
    $result = $dbc->query($sql);

    if($result->num_rows > 0){
        echo '<div class="tables"><table align="center" id="myTable" cellspacing="5" cellpdding="8">
        <tr><td align="left" id="word"><b>Dato: YYYY-MM-D</b></td>
        <td align="left" id="word2"><b>L&oslashse paller</b></td>
        <td align="left" id="word"><b>Affald</b></td>
        <td align="left" id="word2"><b>Snegle</b></td>
        <td align="left" id="word"><b>Overflader</b></td>
        <td align="left" id="word2"><b>Udpakningsenhed</b></td>
        <td align="left" id="word"><b>Gulv</b></td>
        <td align="left" id="word2"><b>Pallevarer</b></td>
        <td align="left" id="word"><b>Aspirationsanl&aeligg</b></td>
        <td align="left" id="word2"><b>Spild</b></td>
        <td align="left" id="word"><b>Bigbags</b></td>
        <td align="left" id="word2" ><b>Paller stables</b></td>
        <td align="left" id="word"><b>T&oslashmmestativet</b></td>
        <td align="left" id="word2"><b>Lagervarer</b></td>
        <td align="left" id="word"><b>Ugentlig</b></td>
        <td align="left" id="word2"><b>M&aringnedlig</b></td>
        <td align="left" id="word"><b>Bem&aeligrkning</b></td>
         </tr><div>';
        while ($row = $result->fetch_assoc()){
            echo '<tr><td align="center" id="color2" >'.
            $row["dato"].'</td><td align="center" id="color">'.
            $row["paller"].'</td><td align="center" id="color2">'.
            $row["palstic"].'</td><td align="center" id="color">'.
            $row["snegl"].'</td><td align="center" id="color2">'.
            $row["vand"].'</td><td align="center" id="color">'.
            $row["udpak"].'</td><td align="center" id="color2">'.
            $row["gulv"].'</td><td align="center" id="color">'.
            $row["varer"].'</td><td align="center" id="color2">'.
            $row["spand"].'</td><td align="center" id="color">'.
            $row["splid"].'</td><td align="center" id="color2">'.
            $row["bigbag"].'</td><td align="center" id="color">'.
            $row["stable"].'</td><td align="center" id="color2">'.
            $row["tømme"].'</td><td align="center" id="color">'.
            $row["lager"].'</td><td align="center" id="color2">'.
            $row["ugentlig"].'</td><td align="center" id="color">'.
            $row["måned"].'</td><td align="center" id="color2">'.
            $row["bemærk"].'</td>';
            echo '</tr>';
        }
        echo "</table>";
        

    }else{
        echo "Could not reach Database";
        echo mysqli_error($dbc);
    }
mysqli_close($dbc);



?>
<div id="showBtn">
<button id="show">Vis 10 Mere</button>
</div> 
</body>
</html>