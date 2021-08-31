<?php

//Veritabanına Bağlanma

include("conn.php");


// EGITIM KONULARI tablosunu olusturma

$a=mysqli_query($conn, "CREATE TABLE IF NOT EXISTS egitim_konulari
(egitim_no int(3) NOT NULL auto_increment,
egitim_konu varchar(70) COLLATE utf8_turkish_ci,
PRIMARY KEY (egitim_no))");

// EGITIM VEREN tablosunu olusturma

$a=mysqli_query($conn, "CREATE TABLE IF NOT EXISTS egitim_veren
(egitici_no int(3) NOT NULL auto_increment,
egitici_adi_soyadi varchar(30) COLLATE utf8_turkish_ci,
egitici_unvani varchar(20) COLLATE utf8_turkish_ci,
egitici_firma varchar(30) COLLATE utf8_turkish_ci,
PRIMARY KEY (egitici_no))");

// MEZUNIYET durumlarını içerecek tabloyu olusturma

$a=mysqli_query($conn, "CREATE TABLE IF NOT EXISTS mezuniyet
(mezuniyet_no int(1) NOT NULL auto_increment,
mezuniyet_durumu varchar(20) COLLATE utf8_turkish_ci,
PRIMARY KEY (mezuniyet_no))");

$varmi = mysqli_query($conn,"SELECT * FROM mezuniyet where mezuniyet_durumu='ILKOKUL'");

if(mysqli_num_rows($varmi)){ 

} else 
{
$kaydet=mysqli_query($conn,"INSERT INTO mezuniyet (mezuniyet_no, mezuniyet_durumu) VALUES (NULL, 'ILKOKUL')");
$kaydet=mysqli_query($conn,"INSERT INTO mezuniyet (mezuniyet_no, mezuniyet_durumu) VALUES (NULL, 'ILKOGRETIM')");
$kaydet=mysqli_query($conn,"INSERT INTO mezuniyet (mezuniyet_no, mezuniyet_durumu) VALUES (NULL, 'ORTAOGRETIM')");
$kaydet=mysqli_query($conn,"INSERT INTO mezuniyet (mezuniyet_no, mezuniyet_durumu) VALUES (NULL, 'LISE')");
$kaydet=mysqli_query($conn,"INSERT INTO mezuniyet (mezuniyet_no, mezuniyet_durumu) VALUES (NULL, 'MYO')");
$kaydet=mysqli_query($conn,"INSERT INTO mezuniyet (mezuniyet_no, mezuniyet_durumu) VALUES (NULL, 'UNIVERSITE')");
}
// SICIL BILGILERI ni içerecek tabloyu olusturma

$a=mysqli_query($conn, "CREATE TABLE IF NOT EXISTS sicil_bilgileri
(tckno 	bigint(11) NULL,
sicil_no int(6) NOT NULL,
cinsiyet varchar(5) COLLATE utf8_turkish_ci,
adi varchar(20) COLLATE utf8_turkish_ci,
soyadi varchar(20) COLLATE utf8_turkish_ci,
d_tarihi varchar(10) COLLATE utf8_turkish_ci,
d_yeri varchar(20) COLLATE utf8_turkish_ci,
mezuniyet_durumu varchar(20) COLLATE utf8_turkish_ci,
mobil_tel varchar(15) COLLATE utf8_turkish_ci,
adres varchar(50) COLLATE utf8_turkish_ci,
ilce_il varchar(40) COLLATE utf8_turkish_ci,
medeni_hali varchar(5) COLLATE utf8_turkish_ci,
askerlik_durumu varchar(10) COLLATE utf8_turkish_ci,
PRIMARY KEY (tckno))");

// EGITIM BILGILERI ni içerecek tabloyu olusturma

$a=mysqli_query($conn, "CREATE TABLE IF NOT EXISTS egitim_bilgileri
(kayit_no int(11) NOT NULL auto_increment,
tckno bigint(11) NOT NULL,
aldigi_egitim int(3) NOT NULL,
egitim_veren int(3) NOT NULL,
egitim_tarihi varchar(20) COLLATE utf8_turkish_ci,
egitim_suresi int(3) COLLATE utf8_turkish_ci,
sinav_sonuc varchar(5) COLLATE utf8_turkish_ci,
PRIMARY KEY (kayit_no))");
?>