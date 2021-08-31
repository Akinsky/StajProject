<!-- Türkçe karakterler için ayar yapıldı -->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />

<?php
ob_start();

//EĞİTİM TAKİP KARTI

include("conn.php");
if (isset($_POST['ana_menu'])) header("Location:index.php");

// KARTI LISTELEME İŞLEMLERİ
if (isset($_POST['kart'])) {
 echo"
 <html>
 <head></head>
 <body>
 "; 
 	    $tckno=0+$_POST['tckno'];
	    $sor=mysqli_query($conn,"SELECT * FROM sicil_bilgileri WHERE tckno='$tckno'");
		while($liste=mysqli_fetch_array($sor)){
		$tckno=$liste['tckno'];
		$sicil_no=$liste['sicil_no'];
        $adi=$liste['adi'];
        $soyadi=$liste['soyadi'];
		$d_tarihi=$liste['d_tarihi'];
		$d_yeri=$liste['d_yeri'];
		$mezuniyet_durumu=$liste['mezuniyet_durumu'];
		$mobil_tel=$liste['mobil_tel'];
		$adres=$liste['adres'];
		$ilce_il=$liste['ilce_il'];
		$medeni_hali=$liste['medeni_hali'];
		$askerlik_durumu=$liste['askerlik_durumu'];
		$cinsiyet=$liste['cinsiyet'];
		if ($cinsiyet=='KADIN') $askerlik_durumu=NULL;
		}	
		echo"
		<table align='center' style='font-family:Tahoma;' width='640'>
		<tr>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		</tr>
		<tr><td colspan='8' bgcolor='black'></td></tr>
		<tr>
		<td colspan='2' align='left'><img src='images/samur.jpg' alt='SAMUR' width='120' heihgt='120'/></td>
		<td colspan='4' align='center' style='font-size: 25px; font-family:Tahoma;' >Personel Eğitim Takip Kartı</td>
		<td colspan='2' align='right'><img src='personel/$tckno.jpg' alt='$adi $soyadi' width='100' heihgt='120' /><td>
		</tr>
		<tr ><td colspan='8' bgcolor='black'></td></tr>
		</table>
		<table align='center' style='font-size: 12px; font-family:Tahoma;' width='640'>
		<tr>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		<td width='80'></td>
		</tr>
		<tr>
		<td bgcolor='yellow'>Adı</td>
		<td colspan='2'>: $adi</td>
		<td bgcolor='yellow'>TC Kimlik No</td>
		<td colspan='2'>: $tckno</td>
		<td bgcolor='yellow'>Doğum Tarihi</td>
		<td>: $d_tarihi</td>
		</tr>
		<tr>
		<td bgcolor='yellow'>Soyadı</td>
		<td colspan='2'>: $soyadi</td>
		<td bgcolor='yellow'>Sicil No</td>
		<td colspan='2'>: $sicil_no</td>
		<td bgcolor='yellow'>Doğum Yeri</td>
		<td>: $d_yeri</td>
		</tr>
		<tr><td colspan='8' bgcolor='black'></td></tr>
		<tr>
		<td bgcolor='yellow'>Öğr_Durumu</td>
		<td>: $mezuniyet_durumu</td>
		<td></td>
		<td bgcolor='yellow'>Medeni Hali</td>
		<td>: $medeni_hali</td>
		<td></td>
		<td bgcolor='yellow'>Askerlik</td>
		<td>: $askerlik_durumu</td>
		</tr>
		<tr><td colspan='8' bgcolor='black'></td></tr>
		<tr>
		<td bgcolor='yellow'>Adres</td>
		<td colspan='7'>: $adres</td>
		</tr>
		<tr>
		<td bgcolor='yellow'>İlçe - İl</td>
		<td colspan='7'>: $ilce_il</td>
		</tr>
		<tr>
		<td bgcolor='yellow'>Mobil Tel</td>
		<td colspan='7'>: $mobil_tel</td>
		</tr>
		<tr><td colspan='8' bgcolor='black'></td></tr>
		<tr>
		<td bgcolor=#A9F5F2 colspan='3'>Aldığı Eğitimler</td>
		<td bgcolor=#A9F5F2 colspan='2'>Eğitimi Veren</td>
		<td bgcolor=#A9F5F2>Süre (DK)</td>
		<td bgcolor=#A9F5F2>Eğitim Tarihi</td>
		<td bgcolor=#A9F5F2 align='center'>Sonuç</td>
		</tr>
		";
	//EĞİTİM KONUSUNU egitim_konulari TABLOSUNDAN ALMA İŞLEMİ	
		$sor=mysqli_query($conn,"SELECT * FROM egitim_bilgileri WHERE tckno='$tckno' ORDER BY egitim_tarihi");
		while($liste=mysqli_fetch_array($sor)){
		$aldigi_egitim=$liste['aldigi_egitim'];
		$aldigi_egitim_sor=mysqli_query($conn,"SELECT * FROM egitim_konulari WHERE egitim_no='$aldigi_egitim'");
		while($aldigi_egitim_liste=mysqli_fetch_array($aldigi_egitim_sor)){
		$egitim_konu=$aldigi_egitim_liste['egitim_konu'];
		echo"
		<tr style='font-size: 10px; font-family:Tahoma;'>
		<td colspan='2'>$egitim_konu</td>
		";
		}
	// EĞİTİCİ BİLGİLERİNİ egitim_veren TABLOSUNDAN ALMA İŞLEMLERİ	
        $egitim_veren=$liste['egitim_veren'];
		$egitim_veren_sor=mysqli_query($conn,"SELECT * FROM egitim_veren WHERE egitici_no='$egitim_veren'");
		while($egitim_veren_liste=mysqli_fetch_array($egitim_veren_sor)){
		$egitici_adi_soyadi=$egitim_veren_liste['egitici_adi_soyadi'];
		$egitici_unvani=$egitim_veren_liste['egitici_unvani'];
		$egitici_firma=$egitim_veren_liste['egitici_firma'];
		echo"
		<td colspan='3'>$egitici_adi_soyadi - $egitici_unvani - $egitici_firma</td>
		";
		}
        $egitim_tarihi=$liste['egitim_tarihi'];
		$d_1=substr($egitim_tarihi,8,2);
        $d_2=substr($egitim_tarihi,5,2);
        $d_3=substr($egitim_tarihi,0,4);
        $egitim_tarihi=$d_1.'.'.$d_2.'.'.$d_3;
		$egitim_suresi=$liste['egitim_suresi'];
		$sinav_sonuc=$liste['sinav_sonuc'];
		echo"
		<td align='center'>$egitim_suresi</td>
		<td>$egitim_tarihi</td>
		<td align='center'>$sinav_sonuc</td>
		</tr>
		";
		}

 echo"
<tr>
<td align='center' colspan='8' ><a href='http://localhost/yasal_form.php'>Eğitim Takip Kartı</a></td>
</tr>
</table>
";
}
?>
