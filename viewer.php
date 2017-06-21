<?php
include("db_settings.php");
$uname= $_REQUEST['username'];
$id = $_GET['matchid'];

$sql = $conn->query("SELECT heure,datee,ville,lieu,sport  FROM matchups WHERE id='$id' ");
$data = $sql->fetch_assoc();

$chatname= $id . "_chat";

$sql1 = $conn->query("SELECT * FROM $chatname");


while($filenames = $sql1->fetch_assoc()){
    $new_array[$filenames['id']] = $filenames;
}

$countcomments = $sql1->num_rows;


if(isset($_POST['usermsg'])&& $_POST['usermsg']!=""){
$mess = $_POST['usermsg'];    
$newid = $countcomments + 1;
if($conn->query("INSERT INTO $chatname (id,username,commentaire) values ('$newid','$uname','$mess')")){

$backto = "http://matchup.fr/viewer.php?matchid=" . $id;
session_start();

$_SESSION['backhere']= $backto;
header("Location: http://matchup.fr/success_comment.php");
}

}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<title>Détails du matchup</title>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
<style>
body{background-color:#ECEBEB;
}
 
#main{
  margin: auto;
    width:auto;
    height:auto;
   background-color:#ECEBEB;
}

 #logo{
 height: 130px; 
    width: 40px;
   padding:12px;

}

#header{
width:1260px;
height:55px;
background-color: #0012ff;
}

#table{
height:auto;
width:auto;
background-color:white;
font-family: "Arial";
font-size:14px;
float:left;
}
#map{
    float:left;
    width:640px;
    height:630px;
}

#ppic{
    width:60px;
    height:60px;
}
#botpresentation{
width:600px;
height:60px;
background-color:white;
}
#botimage{
height:60px;
width:60px;
float:left;
padding-right:5px;
}
#botname{
font-family:Trebuchet MS;
font-size:13px;
padding-top:10px;
color:#0012ff;
text-decoration:none;

text-align:left;
}
#botcreator{
font-family:Trebuchet MS;
font-size:13px;
font-weight:bold;
text-align:left;
color:black;

}

#line{
    padding : 10px;
    width:600px;
    text-align:left;
}

#whatinfo{

    float:left;
    color:black;
    padding-right:130px;
    
}

#theinfo{
    color:black;
    text-align:left;
}


#usermsg{
height:40px;
width:500px;
font-family: 'Open Sans', sans-serif;
outline:none;
font-size:12px;
color:blackw;
border: none;
background-color:transparent;
}
#comms{
height:400px;
overflow-y:auto;

}

.myButton{
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0px;
 font-family: 'Trebuchet MS', sans-serif;
  color: #ffffff;
  font-size: 13px;
  background: #0011ff;
  padding: 13px 25px 13px 25px;
  text-decoration: none;
  border:none;
}

.myButton:hover {
  text-decoration: none;
}

#x{

  margin-left:30px;
}

        
</style>
</head>
<body>
<center>
<center>

<div id="x">
<div id="main">
<div id="header">
<div id="logo">
<img src="logo.png"/>
</div>
</div>

<div id="table">

<div id="line">
<center>
<div id="whatinfo">
<span> Heure: </span>
</div>
<div id="theinfo">
<?php echo $data['heure']; ?>
</div>
</center>
</div>

<div id="line">
<center>
<div id="whatinfo">
<span> Date: </span>
</div>
<div id="theinfo">
<?php echo $data['datee']; ?>
</div>
</center>
</div>

<div id="line">
<center>
<div id="whatinfo">
<span> Adresse: </span>
</div>
<div id="theinfo">
<?php echo $data['lieu']; ?>
</div>
</center>
</div>


<div id="line">
<center>
<div id="whatinfo">
<span> Sport: </span>
</div>
<div id="theinfo">
<?php echo $data['sport']; ?>
</div>
</center>
</div>




<div id="comms">
<?php
for($i=0; $i < 10; $i++){
if(isset($new_array[$i]['commentaire'])){
echo "<div id='botpresentation'> <div id='botimage'> <img id='ppic' src='person.png'/> </div><div id='botname'>" . $new_array[$i]['username'] . "</div><div id='botcreator'>" . $new_array[$i]['commentaire'] . "</div> </div>";
}
}
?>
</div>




<div id="chatcon">
  <form name="message" action="" method="post">
  <center>
        <input name="usermsg" type="text" id="usermsg" class="chattextbox" required placeholder="Ecrivez votre commentaire ici." size="38" />
        </center>
        <center>
        <input name="submitmsg" type="submit" id="submitmsg" class="myButton" value="COMMENTEZ" />
    </center>
    </form>
</div>

</div> 

<div id="map">
<iframe width="640" height="630" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo  $data['lieu']; ?>&output=embed">
</iframe>
</div>
</div>
</div>
</center>
</center>
</body>
</html> 