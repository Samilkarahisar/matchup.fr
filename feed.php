 <?php
include("db_settings.php");


if(isset($_POST['test'])){
$lieu=$_POST['test'];
}
else{
$lieu='France';
}

if($lieu=="France"){
$sql1= $conn->query("SELECT id,heure,datee,ville,lieu,sport FROM matchups");
if($sql1){
    


}
}
else{
$sql1= $conn->query("SELECT * FROM matchups WHERE ville='$lieu' LIMIT 10");
}

while($filenames = $sql1->fetch_assoc()){
    $new_array[$filenames['id']] = $filenames;

    
}

?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<title>Les matchups de votre recherche</title>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>
<style>

body{
  background-color: white;
}

#main{
 
    margin:auto;
    width:860px;
    height:610px;
    padding:10px;
    background-color: transparent;
    border-radius: 10px;
    }
 
#logo{
margin:auto;
 height: auto; 
    width: auto; 
    max-width: 422x; 
    max-height: 122px;
}

.header{
margin-top:30px;
background-color: transparent;
}
 

#getinqueue{
margin-top:250px;
}

#feedtable  {
    border-collapse: collapse;
    border-style: 1px solid red;
    font-family:  'Roboto', sans-serif;
    font-size:14px;
    table-layout: auto;
    width: 100%;
    color:#0012ff;


}

#feedtable  td, #customers th {
    text-align: left;
}
#feedtable tr{
background-color: #F0F0F0;
 
}
#feedtable tr:nth-child(even){background-color: #F0F0F0;}

#feedtable tr:hover {background-color: #ddd;}

#feedtable  th {
    background-color: #4CAF50;
    color: white;
}
#feedtable  td{
    border-right: 1px white;
    border-left: 1px white;
}

#feed{
   
}
.imaged{
width:20px;
height:20px;
padding: 10px;
}

span{
font-family: 'Roboto', sans-serif;
color:black;
font-size:20px;
}
#forspan{
margin-bottom:3px;
font-family: 'Roboto', sans-serif;
color:red;
 text-decoration: underline;
 font-size:16px;
}

</style>
</head>
<body>

<center>

<div id="container">
 
<div id="main">
 
<div class="header">
<a href="http://matchup.fr">
<div id="logo">
<img src="logo1.png"/>
</div>
 </a>
 </div>

<span> Les prochains matchups à <?php echo $lieu;?> </span>
 
<br>
<div id="forspan">
<span><?php echo $qmes; ?></span>
</div>
<br>
<div id="feed">

   
   <?php

                        echo ' <table id="feedtable"> ';  
                  
                                     
      
    for ($x = 0; $x <= 10; $x++) {
           
                        $mheure = $new_array[$x]['heure'];  
                        $mdate = $new_array[$x]['datee']; 
                        $mville= $new_array[$x]['ville']; 
                       $mlieu= $new_array[$x]['lieu']; 
                       $msport= $new_array[$x]['sport']; 
                    
             if(isset($mheure,$mdate,$mville,$mlieu,$msport)){

                        echo    " <tr class='clickable-row' data-href='http://matchup.fr/viewer.php?matchid=$x'> "; 
                       
                        if($msport=="Basketball" || $msport=="Basket" ||$msport=="basketball" ||$msport=="basket"){
                        echo   "<td class='imaged'> <img class='imaged' src='bball.png' /></td>";
                        }
                        else {
                        echo   "<td class='imaged'> <img class='imaged' src='fball.png' /></td>";

                        }
    echo        "<td>" . "À ".$mville    .  "</td>" ; 
    echo        "<td>" . "Adresse: ".$mlieu    .  "</td>" ; 
                        
                        echo        "<td>" . "Heure: ".$mheure   .  "</td>" ; 
                             echo        "<td>" . "Date: " .$mdate    .  "</td>" ; 
                              
                               
                                         
                                           
                
                        echo   "</tr>" ; 
                 }        

                }
       echo    "</table>"; 
    ?>
  
  
</div>


<br>
 
 <div>
<form action="feed.php" method="post">

<select name="test">
    <option value="France"  selected="selected">France</option>
        <option value="Oyonnax">Oyonnax</option>
        <option value="Lyon">Lyon</option>
        
       
</select>


<input class="btn" type="submit" value="Voir les matchups">

</form>
</div>

 

 

</div>

</div>
</center>
</body>
</html> 