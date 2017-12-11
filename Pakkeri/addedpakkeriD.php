<html>
<head>
    <link type="text/css" rel="stylesheet" href="addedpakkericss.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>
<?php
if(isset($_POST["submit"])){
    $data_miss = array();
    if(empty($_POST["paller"])){
        $data_miss[] = "L&oslashse paller";
    }else {
        $paller = trim($_POST["paller"]);
    }if(empty($_POST["palstic"])){
        $data_miss[] = "Papaffald + plastic";
    }else {
        $palstic = trim($_POST["palstic"]);
    }if(empty($_POST["snegl"])){
        $data_miss[] = "Snegle";
    }else {
        $snegl = trim($_POST["snegl"]);
    }if(empty($_POST["vand"])){
        $data_miss[] = "Vandrette overflader";
    }else {
        $vand = trim($_POST["vand"]);
    }if(empty($_POST["udpak"])){
        $data_miss[] = "Udpakningsenheden";
    }else{
        $udpak = trim($_POST["udpak"]);
    }if(empty($_POST["gulv"])){
        $data_miss[] = "Gulv st&oslashvsuges";
    }else {
        $gulv = trim($_POST["gulv"]);
    }if(empty($_POST["varer"])){
        $data_miss[] = "Pallevarer afd&aeligkkes";
    }else{
        $varer = trim($_POST["varer"]);
    }if(empty($_POST["spand"])){
        $data_miss[] = "Spand t&oslashmmes";
    }else {
        $spand = trim($_POST["spand"]);  
    }if(empty($_POST["splid"])){
        $data_miss[] = "Spild";
    }else {
        $spild = trim($_POST["splid"]);
    }if(empty($_POST["bigbag"])){
        $data_miss[] = "Bigags rulles sammen";
    }else {
        $bigbag = trim($_POST["bigbag"]);
    
    }if(empty($_POST["stable"])){
        $data_miss[] = "L&oslashse paller stables";
    }else {
        $stable = trim($_POST["stable"]);
    
    }if(empty($_POST["tømme"])){
        $data_miss[] = "T&oslashmmestativet st&oslashvsuges";
    }else {
        $tømme = trim($_POST["tømme"]);
    
    }if(empty($_POST["lager"])){
        $data_miss[] = "Lagervarer fjernes";
    }else {
        $lager = trim($_POST["lager"]);
    }if(empty($_POST["ugentlig"])){
        $data_miss[] = "Ugentlig";
    }else {
        $ugentlig = trim($_POST["ugentlig"]);
    }
    if(empty($_POST["måned"])){
        $data_miss[] = "Måndelig";
    }else {
        $måned = trim($_POST["måned"]);
    }
    if(empty($_POST["bemærk"])){
        $data_miss[] = "Bem&aeligrkning";
    }else{
        $bemærk = trim($_POST["bemærk"]);
    }
    
    if(empty($data_miss)){
        require_once("../mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO daglig (paller, palstic,
        snegl, vand, udpak, gulv, varer, spand,  bigbag, stable, tømme, lager, ugentlig, måned, splid, bemærk) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")){
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $paller, $palstic, $snegl, $vand, $udpak, $gulv,
            $varer, $spand,  $bigbag, $stable, $tømme, $lager, $ugentlig, $måned, $spild, $bemærk);
            mysqli_stmt_execute($stmt);
        }else{
            echo "error" . mysqli_error($dbc);
        }
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Reng&oslashring tilf&oslashjet';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }else {
            echo "Error".mysqli_error($dbc);
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
<form action="http://10.22.1.15/Pakkeri/addedpakkeriD.php" method="post">
<h1 id="over"><b>Pakkeri daglig reng&oslashrelse:</b></h1>
<p id="over"><b>Evt. l&oslashse paller fjernes: <br />
<input type ="text" name="paller" size="1" value=" "/>
</p>
<p id="over">Plastic- og papaffald l&aeliggges i respektive containere:<br />
<input type="text" name="palstic" size="1" value=" "/>
</p>
<p id="over">Snegle k&oslashres tomme, s&aring produkt ikke "pakker":<br />
<input type="text" name="snegl" size="1" value=" "/>
</p>
<p id="over">Vandrette overflader p&aring maskiner st&oslashvsuges/aft&oslashrres:<br />
<input type="text" name="vand" size="1" value=" "/>
</p>
<p id="over">Udpakningsenheden st&oslashvsuges ren for evt. spild:<br />
<input type="text" name="udpak" value=" " size="1"/>
</p>
<p id="over">Gulvet st&oslashvsuges for evt. spildt produkt:<br />
<input type="text" name="gulv" value=" " size="1"/>
</p>
<p id="over">Pallevarer, som henst&aringr, afd&aeligkkes eller fjernes *):<br />
<input type="text" name="varer" size="1" value=" "/>
</p>
<p id="para"> *) Pakkeri og forrum skal holdes rent og ordenligt, dvs. evt. spild støvsuges hurtigst muligt op. <br /> Varer og emballage må ikke henstå i flere dage. Ved evt. henstand afdækkes. </p> 
<h1 id="over">Hall A</h1>
<p id="over">Spand s&aring aspirationsanl&aeligg t&oslashmmes:<br />
<input type="text" name="spand" size="1" value=" "/>
</p>
<p id="over">Evt. spild p&aring gulvet under aspirationsanl&aeligg st&oslashvsuges:<br />
<input type="text" name="splid" size="1" value=" "/>
</p>
<h1 id="over">Forrum til pakkeri</h1>
<p id="over">Tomme bigbags rulles sammen og l&aeliggges i gitterpaller:<br />
<input type="text" name="bigbag" size="1" value=" "/>
</p>
<p id="over">L&oslashse paller stables:<br />
<input type="text" name="stable" size="1" value=" "/>
</p>
<p id="over">T&oslashmmestativet og gulvet under st&oslashvsuges for evt. spild:<br />
<input type="text" name="tømme" size="1" value=" "/>
</p>
<p id="over">Lagervarer fjernes - m&aring ikke henst&aring:<br />
<input type="text" name="lager" size="1" value=" "/>
</p>
<p id="over">Ugentlig Reng&oslashring:<br />
<input type="text" name="ugentlig" size="1" value="Nej"/>
</p>
<p id="over">M&aringndelig Reng&oslashring:<br />
<input type="text" name="måned" size="1" value="Nej"/>
</p>
<p id="over">Bem&aeligrkning</b><br />
<input type="text" name="bemærk" size="30" value=" "/>
</p>
<p>

<input id="btn" type="submit" name="submit" value="Indsend"/>
</p>
</form>
</body>
</html>