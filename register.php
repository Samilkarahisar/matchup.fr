<?php
session_start();

if(isset($_SESSION['utaken'])){

$errormessage= $_SESSION['utaken'];
session_destroy();
}

include("db_settings.php");

$sql= $conn->query("SELECT * FROM uye");

$total = $sql->num_rows;

$left = 200 - $total;

?>

<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />

<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300' rel='stylesheet' type='text/css'>
<title>Matchup.fr | Inscription</title>

<style>

body{
background-color: #f1f1f1;

}

#merkez{
width:250px;
height:300px;
margin:auto;
}
input:focus {outline: none; }
span{
font-family: 'Roboto', sans-serif;
color:white;
 font-size:16px;
}
#forspan{
margin-bottom:20px;
}
#ermes{
font-family: 'Roboto', sans-serif;
color:red;
font-size:13px;
}
.textbox{
padding-left:25px;
border:none;
width: 230px;
height:50px;
font-size:15px;
}

#tcontain{
background: none;
margin-top:5px;
padding-left:8px;
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
  width:230px;
}

.myButton:hover {
  text-decoration: none;
}



#logo{
margin-top:100px;
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

#forlogin{
font-family: 'Roboto', sans-serif;
margin-bottom:20px;

}


</style>
</head>



<body>
<center>
<div id="logo">
<img src="logo1.png"/>
</div>

</center>

<div id="merkez">
<form action="register_done.php" method="post">

<div id="tcontain">

<input class="textbox" type="text" name="ad" id="ad" size="25" required placeholder="Nom Prénom" autocomplete="off">
<input class="textbox" type="text" name="kullaniciadi" id="kullaniciadi" size="25" required placeholder="Nom d'utilisateur" autocomplete="off">
<input class="textbox" type="password" name="sifre" id="sifre" size="25" required placeholder="Mot de passe" autocomplete="off">
<input class="myButton" type="submit" value="S'inscrire" name="B1">

</div>
<center>
<div  id="ermes">
<?php echo $errormessage;?> 
</div>

</center>



</form>
</div>




<center>




<div id="forlogin">
<center>
<span><a href="http://matchup.fr/login.php" CLASS="Button"> J'ai deja un compte. </a> </span>
</center>
</div>

</center>


</body>
</html>