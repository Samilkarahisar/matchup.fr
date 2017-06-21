<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<title>Les matchups de votre recherche</title>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>

</script>
<style>
body{
    background-color:#0012ff;
}
#logo{
margin:auto;
 height: auto; 
    width: auto; 
    max-width: 422x; 
    max-height: 122px;
   float:left;
   padding:7px;
}

#header{
width:1200px;
height:60px;
background-color: #0012ff;
}
#main{

    width:1200px;
    height:600px;
    background-color:white;
   
}
#photo{
    background-color:white;
    border-bottom: 1px solid #DFDFDF;
    background: url("abc.jpg") no-repeat;
    width: 1200px;
    height: 550px;
    background-size: cover;
}
#imgg{
background-size: cover;
}
#slogan{
    font-family:Arial;
    text-decoration-style: none;
    font-weight:bold;
    font-size:35px;
    color:black;
    text-align:left;
}
#credit{
background-color:#B4E2FF;
width:1000px;
height:150px;
border-bottom: 1px solid #DFDFDF;
border-right: 1px solid #DFDFDF;
border-left: 1px solid #DFDFDF;
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

        
#srch{
margin-top:30px;
margin-bottom:25px;
}
#none{
font-family:Arial;
    font-size:13px;
    font-weight:bold;
    padding:20px;
    color:white;
    float:right;
    text-decoration:none;
}
</style>
</head>
<body>
<center>
<div id="main">
<div id="header">
<div id="logo">
<img src="logo.png"/>
</div>

<?php 

if(isset($_REQUEST['username'])){
?>
<a id="none" href="http://matchup.fr/new.php"> Organiser un matchup</a>

<?php
}else{

?>
<a id="none" href="http://matchup.fr/register.php"> Inscription/Connection</a>
<?php  
}

?>
</div>

<div id="photo">
</div>

<span id="slogan">Trouvez les matchups près de chez vous:</span>
<div id="srch">
<form action="feed.php" method="post">

<select name="test">
    <option value="France"  selected="selected">France</option>
        <option value="Oyonnax">Oyonnax</option>
        <option value="Lyon">Lyon</option>
        
       
</select>


<input class="myButton" type="submit" value="TROUVEZ">

</form>

</div>

</div>
<?php /*
<div id="credit">
</div>
*/?>
</center>
</body>
</html> 