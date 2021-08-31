<!-- Türkçe karakterler için ayar yapıldı //-->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />
<?php
ob_start();

// EĞİTİCİ BİLGİLERİ KAYIT ETME
include("form_egitim_veren_gir.php");
include("conn.php");
$egitici_adi_soyadi=$_POST['egitici_adi_soyadi'];
$egitici_unvani=$_POST['egitici_unvani'];
$egitici_firma=$_POST['egitici_firma'];

$kaydet=mysqli_query($conn,"INSERT INTO isg.egitim_veren 
(egitici_no, egitici_adi_soyadi, egitici_unvani, egitici_firma) 
VALUES 
(NULL, '$egitici_adi_soyadi', '$egitici_unvani', '$egitici_firma')");

if($kaydet) echo "BILGILER KAYIT EDILDI";
if(!$kaydet) echo "BİLGİLER KAYIT EDİLMEDİ";
?>