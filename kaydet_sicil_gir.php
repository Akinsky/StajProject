<!-- Türkçe karakterler için ayar yapıldı //-->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />

<?php
ob_start();
include("form_sicil_gir.php");
include("conn.php");

$tckno=0+$_POST['tckno'];
$sicil_no=0+$_POST['sicil_no'];
$cinsiyet=$_POST['cinsiyet'];
$adi=$_POST['adi'];
$soyadi=$_POST['soyadi'];
$d_tarihi=$_POST['d_tarihi'];
$d_yeri=$_POST['d_yeri'];
$mezuniyet_durumu=$_POST['mezuniyet_durumu'];
$mobil_tel=$_POST['mobil_tel'];
$adres=$_POST['adres'];
$ilce_il=$_POST['ilce_il'];
$medeni_hali=$_POST['medeni_hali'];
$askerlik_durumu=$_POST['askerlik_durumu'];

// ANA MENU YÖNLENDİRME
if (isset($_POST['ana_menu'])) header("Location:index.php");
// SİÇİL İŞLEMLERİ YÖNLENDİRME
if (isset($_POST['sicil_islem'])) header("Location:sicil_islem_sec.php");
// YENİ KAYIT İŞLEMİ
if (isset($_POST['kaydet'])){
// KAYIT İŞLEMİNDEN ÖNCE AYNI TC KİMLİK NOLU KAYIT VARMI KONTROLU
    $kontrol=mysqli_query($conn,"SELECT * FROM sicil_bilgileri WHERE tckno='$tckno'");
	if(mysqli_fetch_assoc($kontrol)){ header("refresh:3;url=sicil_islem_sec.php");
    die("TC Kimlik No: $tckno olan bir kayıt var...");}

// TARİH BİLGİSİNİ DÜZENLEME
	$d_1=substr($d_tarihi,8,2);
    $d_2=substr($d_tarihi,5,2);
    $d_3=substr($d_tarihi,0,4);
    $d_tarihi_=$d_1.'.'.$d_2.'.'.$d_3;

// KAYDETME İŞLEMİ 	
	$kaydet=mysqli_query($conn,"INSERT INTO isg.sicil_bilgileri 
	(tckno, sicil_no, cinsiyet, adi, soyadi, d_tarihi, d_yeri, mezuniyet_durumu, mobil_tel, adres, ilce_il, medeni_hali, askerlik_durumu) 
	VALUES 
	('$tckno', '$sicil_no', '$cinsiyet', '$adi', '$soyadi', '$d_tarihi_', '$d_yeri', '$mezuniyet_durumu', '$mobil_tel', '$adres', '$ilce_il', '$medeni_hali', '$askerlik_durumu')");
    header("refresh:2;url=sicil_islem_sec.php");
    die('Bilgiler kayıt edildi...');}

// KAYIT DUZELTME İŞLEMİ	
if (isset($_POST['duzelt'])){
	$duzelt=mysqli_query($conn,"UPDATE sicil_bilgileri SET 
    tckno='$tckno',
	sicil_no='$sicil_no',
	cinsiyet='$cinsiyet',
	adi='$adi',
	soyadi='$soyadi',
	d_tarihi='$d_tarihi',
	d_yeri='$d_yeri',
	mezuniyet_durumu='$mezuniyet_durumu',
	mobil_tel='$mobil_tel',
	adres='$adres',
	ilce_il='$ilce_il',
	medeni_hali='$medeni_hali',
	askerlik_durumu='$askerlik_durumu' 
	WHERE tckno='$tckno'");
    header("refresh:2;url=sicil_islem_sec.php");
    die('Bilgiler düzeltildi...');}


?>