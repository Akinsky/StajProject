<!-- Türkçe karakterler için ayar yapıldı //-->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />
<?php
ob_start();

// EĞİTİM KONULARI KAYIT ETME
include("form_egitim_konulari_gir.php");
include("conn.php");

$egitim_konu=$_POST['egitim_konu'];

$kaydet=mysqli_query($conn,"INSERT INTO isg.egitim_konulari 
(egitim_no, egitim_konu) 
VALUES (NULL, '$egitim_konu')");

if($kaydet) echo "BILGILER KAYIT EDILDI";
if(!$kaydet) echo "BİLGİLER KAYIT EDİLMEDİ";
header ("Location:form_egitim_konulari_gir.php");
?>