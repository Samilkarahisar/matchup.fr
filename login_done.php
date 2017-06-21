<?php
  
$kullaniciadi = $_POST['kullaniciadi'];
$sifre = $_POST['sifre'];
  
if ((!$kullaniciadi =="") and (!$sifre =="")) {
include("db_settings.php");

$sql = $conn->query("select * from uye where kullaniciadi='$kullaniciadi'");
$pw=$sql->fetch_assoc();

$hash=$pw['sifre'];

if(password_verify($_POST['sifre'],$hash)) {



setcookie(username, $kullaniciadi,time() + (86400 * 30));


header ("Location: http://matchup.fr/feed.php");

}

else{
echo 'Wrong password';
}


}

else {
header ("Location: login.php?hata=yes");
}
?>