<?php

$usernamee= $_REQUEST['username'] . "(Organisateur):";


include("db_settings.php");
if(isset($_POST['new_time'])){

$check=$conn->query("SELECT * FROM matchups");
$old_id= mysqli_num_rows($check);
$id=$old_id + 1;
$timee=$_POST['new_time'];
$ville=$_POST['new_ville'];
$datee=$_POST['new_date'];
$lieu=$_POST['new_lieu'];
$sport=$_POST['new_sport'];
$com=$_POST['new_com'];

$table_name = $id . "_chat";

$sql2="CREATE TABLE $table_name(
id SMALLINT NOT NULL,
username CHAR(100) NOT NULL,
commentaire TEXT
)";

$conn->query($sql2);


$sql= $conn->query("INSERT INTO matchups (id,heure,datee,ville,lieu,sport) values('$id','$timee','$datee','$ville','$lieu','$sport') ");

$sql3 = $conn->query("INSERT INTO $table_name (id,username,commentaire) values('0','$usernamee','$com')");


if($sql){

header("Location: http://matchup.fr/success.php");

}
else{

header("Location:http://matchup.fr/error.php");	

}

}

?>

<html>
  
<head><meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<title>Organiser votre matchup</title>

<style>
.header{
background:#FAFAFA;
top:0;
width:100%;
position:fixed;
}
#merkez{
width:300px;
height:300px;
margin:auto;
}
#tcontain{

    margin-top:40px;
padding-left:8px;
border: solid #F2F2F2 1px;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.myButton {
    -moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
    -webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
    box-shadow:inset 0px 1px 0px 0px #54a3f7;
    background-color:#007dc1;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    border-radius:3px;
    border:1px solid #124d77;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:13px;
    font-weight:bold;
    padding:11px 20px;
    text-decoration:none;
    text-shadow:0px 1px 0px #154682;
}
.myButton:hover {
    background-color:#0061a7;
}
.myButton:active {
    position:relative;
    top:1px;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
   
}

body{
background-color:#f2f2f2;
}
#logo{
margin:auto;
 height: auto; 
    width: auto; 
    max-width: 78x; 
    max-height: 21px;
}
img{
max-width:100%;
max-height:100%;
}
.header{
margin-top:30px;
background:#FAFAFA;
top:0;
width:100%;
position:fixed;
}
html, body, #map_canvas { margin: 0; padding: 0; height: 100% }

</style>




</head>
  
<body>
<div class="header">
<div id="container">
<center>
<div id="logo">
<a href="http://matchup.fr">
<img src="logo.png"/>
 </a>
</div>

</center>


<center>


<div id="merkez">
<center>


<form action="new.php" method="post">

<div id="tcontain">

<input class="textbox" type="text" name="new_time" size="90" required placeholder="ex: 10:30" autocomplete="off">

<input class="textbox" type="text" name="new_date" size="90" required placeholder="ex: 10/09/2030 pour 10 septembre 2030" autocomplete="off">

<input class="textbox" type="text" name="new_ville" size="90" required placeholder="Ville" autocomplete="off">

<input class="textbox" type="text" name="new_lieu" size="300" required placeholder="L'adresse du terrain ou le matchup se déroulera?" autocomplete="off">

<input class="textbox" type="text" name="new_sport" size="90" required placeholder="Sport" autocomplete="off">

<input class="textbox" type="text" name="new_com" size="500" required placeholder="Commentaire" autocomplete="off">

<input class="myButton" type="submit" value="Organisé">

</div>
</form>
</center>
</div>
</center>

</div>
 
</div>
</body>
</html>