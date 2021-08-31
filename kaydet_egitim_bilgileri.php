<?php
include("form_egitim_bilgileri_gir.php");
include("conn.php");

// EĞİTİM BİLGİLERİ KAYIT ETME
$tckno=0+$_POST['tckno'];
$aldigi_egitim=0+$_POST['aldigi_egitim'];
$egitim_veren=0+$_POST['egitim_veren'];
$egitim_tarihi=$_POST['egitim_tarihi'];
$egitim_suresi=0+$_POST['egitim_suresi'];
$sinav_sonuc=$_POST['sinav_sonuc'];

// KAYIT İŞLEMİ
$kaydet=mysqli_query($conn,"INSERT INTO isg.egitim_bilgileri 
(kayit_no, tckno, aldigi_egitim, egitim_veren, egitim_tarihi, egitim_suresi, sinav_sonuc) 
VALUES 
(NULL, '$tckno', '$aldigi_egitim', '$egitim_veren', '$egitim_tarihi', '$egitim_suresi', '$sinav_sonuc')");


if($kaydet) echo "YORUMUNUZ KAYIT EDILDI";
if(!$kaydet) echo "HATA. YORUMUNUZ KAYIT EDILEMEDI";


?>