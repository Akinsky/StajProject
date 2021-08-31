<!-- Türkçe karakterler için ayar yapıldı -->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />

<?php
// PERSONEL EGİTİM BİLGİLERİ GİRİŞ İŞLEMLERİ
include("sayi_gir.php");
include("conn.php");
 echo"
 <html>
 <head></head>
 <body>
 <form name='form1' action='kaydet_egitim_bilgileri.php' method='post'>
 <table align='center' style='font-family:Tahoma;'>
 <tr>
 <td align='center' ><img src='images/egitim.jpg' alt='Egitim Bilgileri' width='60' heihgt='60' /><td>
 <td colspan='2' bgcolor='yellow' style='border:1px solid black;' ><h2 style='color:navy;' align='center'>Çalışan Eğitim Bilgileri Girişi</h2></td>
 </tr>

<tr>
<td>TC Kimlik No</td>
<td width='15'>:</td>
<td>
 ";
$sor=mysqli_query($conn,'SELECT * FROM sicil_bilgileri');
echo"
<select name='tckno'>
";
while($liste=mysqli_fetch_array($sor)){
$tckno=$liste['tckno'];
$adi=$liste['adi'];
$soyadi=$liste['soyadi'];
echo"
   <option value=$tckno>$tckno $adi $soyadi</option>
";
}
echo"
</select>
</tr>
 
<tr>
<td>Aldığı Eğitim</td>
<td width='15'>:</td>
<td>
 ";
$sor=mysqli_query($conn,'SELECT * FROM egitim_konulari');
echo"
<select name='aldigi_egitim'>
";
while($liste=mysqli_fetch_array($sor)){
$aldigi_egitim=$liste['egitim_no'];
$egitim_konu=$liste['egitim_konu'];
echo"
   <option value=$aldigi_egitim>$aldigi_egitim $egitim_konu</option>
";
}
echo"
</select>
</tr>
 
 <tr>
<td>Eğitim Veren</td>
<td width='15'>:</td>
<td>
 ";
$sor=mysqli_query($conn,'SELECT * FROM egitim_veren');
echo"
<select name='egitim_veren'>
";
while($liste=mysqli_fetch_array($sor)){
$egitim_veren=$liste['egitici_no'];
$egitici_adi_soyadi=$liste['egitici_adi_soyadi'];
echo"
   <option value=$egitim_veren>$egitim_veren $egitici_adi_soyadi</option>
";
}
echo"
</select>
</tr>
 
<tr>
<td>Eğitim Tarihi</td>
<td width='20' >:</td>
<td><input type='date' value='' required='required' ='20' size='20' name='egitim_tarihi'></td>
</tr>

<tr>
<td>Eğitim Süresi</td>
<td width='15' >:</td>
<td><input type='text' value='' required='required' maxlength='3' size='3' name='egitim_suresi' onKeyPress='return numbersonly(this, event)'>Dakika</td>
</tr>
<tr>
<td>Sınav Sonucu</td>
<td width='15' >:</td>
<td><input type='radio' name='sinav_sonuc' value='GECTI' checked> Geçti
    <input type='radio' name='sinav_sonuc' value='KALDI'> Kaldı
</td>
</tr>


<tr>

<td><input name='form1' type='submit' value='Formu Gonder'></td>
<td width='15'></td>
</form>
<form name='form2' action='index.php' method='post'>

<td><input name='form2' type='submit' value='Ana Menü'></td>
</tr>


</table>
</form>
</body>
</html>
";
?>
