<?php
$ad = $_POST['ad'];
$kullaniciadi = $_POST['kullaniciadi'];
$hakkimda= 1;
$sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT, ['cost' => 11]);

include("db_settings.php");

$sql1= $conn->query("SELECT votepoints FROM uye WHERE kullaniciadi= '$kullaniciadi'");
$exist1 = $sql1->num_rows;


if($sql1 && $exist1>0)
{
session_start();
$_SESSION['utaken'] = "The pen name ". $kullaniciadi ." is taken" ;
header("Location: http://matchup.fr/register.php");

}

else{

if(empty($ad)){
echo("<center><b>Ad&#305;n&#305;z&#305; Yazmad&#305;n&#305;z. Lütfen Geri Dönüp Doldurunuz.</b></center>");
}elseif(empty($kullaniciadi)){
echo("<center><b>Kullan&#305;c&#305; ad&#305; vermedinizi; Yazmad&#305;n&#305;z. Lütfen Geri Dönüp Doldurunuz.</b></center>");
}elseif(empty($sifre)){
echo("<center><b>Sifreniz eksik. Lütfen Geri Dönüp Doldurunuz.</b></center>");
}
else{

$sql = $conn->query("insert into uye (ad, kullaniciadi, sifre, votepoints) values ('$ad', '$kullaniciadi', '$sifre', '$hakkimda')");

}
if (isset ($sql)){
echo "You were succesfully registered.";

header("Location: http://matchup.fr/login.php");
exit;
}
else {
echo $sifre;
echo "We couldn't register you. Please tweet to @samilkarahisar, or email at beta@nessir.com";
}
}
?>