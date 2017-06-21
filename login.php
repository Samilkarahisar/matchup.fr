<html>
  
<head><meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />

<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300' rel='stylesheet' type='text/css'>
<title>Yazar girişi.</title>

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

.textbox{
border: 0px;
padding-left:25px;
width: 230px;
height:50px;
font-size:15px;

background-color: white;
}

#tcontain{
padding-left:8px;
margin-top:3px;
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
</style>
</head>
  
<body>
<center>
<?php
if (!$hata =="") {
echo '<font face="verdana" size="2" color="#800000"><b>Giri&#351; S&#305;ras&#305;nda Hata Olu&#351;tu</b><br>';
echo '&#350;ifre veya Kullan&#305;c&#305; Ad&#305; Yanl&#305;&#351;. Tekrar Deneyin<br>';
}
?>
</center>

<center>
<div id="logo">
<img src="logo1.png"/>
</div>

</center>
<div id="merkez">
<form action="login_done.php" method="post">

<div id="tcontain">
<input class="textbox" type="text" name="kullaniciadi" size="25" required placeholder="Nom d'utilisateur" autocomplete="off">
<input class="textbox" type="password" name="sifre" size="25" required placeholder="Mot de passe" autocomplete="off">
<input class="myButton" type="submit" value="Se connecter">
</div>



</form>
</div>

</body>
  
</html>