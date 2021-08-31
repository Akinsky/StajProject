<!-- Türkçe Karakterler için ayar -->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />
<!-- Sicil Girme Işlemi Başlıyor -->
<?php
ob_start();
include("sayi_gir.php");
include("conn.php");
if (isset($_POST['ana_menu'])) header('Location:index.php');

// YENI KAYIT İŞLEMLERİ
if (isset($_POST['yeni'])) {
echo"
<html>
 <head></head>
 <body>
  <form name='yeni_kayit' action='kaydet_sicil_gir.php' method='post'>
   <table align='center' style='font-family:Tahoma;'>
   <tr>
    <td align='center'><img src='images/calisan.jpg' alt='Sicil Bilgileri' width='70' heihgt='70' /><td>
    <td colspan='2' bgcolor='yellow' style='border:1px solid black;'><h2 style='color:navy;' align='center'>Çalışan Sicil Bilgileri Girişi</h2></td>
   </tr>
   <tr>
    <td>TC Kimlik No</td>
    <td width='15'>:</td>
    <td><input type='text' value='' required='required' maxlength='11' size='11' name='tckno' onKeyPress='return numbersonly(this, event)'></td>
   </tr>
   <tr>
    <td>Kurum Sicil No</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='5' size='5' name='sicil_no' onKeyPress='return numbersonly(this, event)'></td>
   </tr>
   <tr>
    <td>Adı</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='20' size='20' name='adi'></td>
   </tr>
   <tr>
    <td>Soyadı</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='20' size='20' name='soyadi'></td>
   </tr>
   <tr>
    <td>Cinsiyet</td>
    <td width='15' >:</td>
    <td><input type='radio' name='cinsiyet' value='KADIN'> Kadın
       <input type='radio' name='cinsiyet' value='ERKEK' checked> Erkek
    </td> 
   </tr>
   <tr>
    <td>Doğum Tarihi</td>
    <td width='20' >:</td>
    <td><input type='date' value='' required='required' maxlength='20' size='20' name='d_tarihi'></td>
   </tr>
   <tr>
    <td>Doğum Yeri</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='20' size='20' name='d_yeri'></td>
   </tr>
   <tr>
    <td>Mezuniyet</td>
    <td width='15' >:</td>
    <td>
";
     $sor=mysqli_query($conn,'SELECT * FROM mezuniyet');
echo"
     <select name='mezuniyet_durumu'>
";
      while($liste=mysqli_fetch_array($sor)){
      $mezuniyet_durumu=$liste['mezuniyet_durumu'];
echo"
      <option value=$mezuniyet_durumu>$mezuniyet_durumu</option>
";
}
echo"
     </select>
    </td>
   </tr>
   <tr>
    <td>Mobil Tel</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='15' size='15' name='mobil_tel'></td>
   </tr>
   <tr>
    <td>Adres</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='50' size='50' name='adres'></td>
   </tr>
   <tr>
    <td>Ilçe / Il</td>
    <td width='15' >:</td>
    <td><input type='text' value='' required='required' maxlength='40' size='40' name='ilce_il'></td>
   </tr>
   <tr>
    <td>Medeni Hali</td>
    <td width='15' >:</td>
    <td><input type='radio' name='medeni_hali' value='EVLI'> Evli
        <input type='radio' name='medeni_hali' value='BEKAR' checked> Bekar
    </td>
   </tr>
   <tr>
    <td>Askerlik Durumu</td>
    <td width='15' >:</td>
    <td>
     <input type='radio' name='askerlik_durumu' value='YAPTI'> Yaptı
     <input type='radio' name='askerlik_durumu' value='TECILLI'> Tecilli
	 <input type='radio' name='askerlik_durumu' value='MUAF' checked> Muaf
    </td>
   </tr>
   <tr>
    <td><input name='kaydet' type='submit' value='Kaydet'></td>
	<td width='15'></td>
	</form>
	<form name='ana_menu' action='sicil_islem_sec.php' method='post'>
	<td><input name='ana_menu' type='submit' value='Ana Menü'></td>
	</form>
   </tr>
   </table>
   <table align='center'>
  </body>
</html>
";
}
// KAYIT SILME IŞLEMLERI
if (isset($_POST['sil'])) {
  $k_sil=$_POST['k_sil'];
  echo"$k_sil";
  if ($k_sil=='EVET'){
   $tckno=0+$_POST['tckno']; 
   $sor=mysqli_query($conn,"DELETE FROM sicil_bilgileri WHERE tckno='$tckno'");
   header("refresh:1;url=sicil_islem_sec.php");
   die(' Kayıt Silindi...');}
  elseif ($k_sil=='HAYIR') {
  header("refresh:1;url=sicil_islem_sec.php");
  die(' Kayıta Bir İşlem Yapılmadı...');}
}
// KAYIT DÜZELTME IŞLEMLERI
if (isset($_POST['duzelt'])) {
  $tckno=0+$_POST['tckno'];
  $sor=mysqli_query($conn,"SELECT * FROM sicil_bilgileri WHERE tckno='$tckno'");
  while($liste=mysqli_fetch_array($sor)){
  $sicil_no=$liste['sicil_no'];
  $cinsiyet=$liste['cinsiyet'];
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
  }
echo"
<html>
 <head></head>
 <body>
  <form name='duzelt' action='kaydet_sicil_gir.php' method='post'>
   <table align='center' style='font-family:Tahoma;'>
   <tr>
    <td align='center'><img src='images/calisan.jpg' alt='Sicil Bilgileri' width='70' heihgt='70' /><td>
    <td colspan='2' bgcolor='yellow' style='border:1px solid black;'><h2 style='color:navy;' align='center'>Çalışan Sicil Bilgilerini Düzeltme</h2></td>
   </tr>
   <tr>
    <td>TC Kimlik No</td>
    <td width='15'>:</td>
    <td><input type='hidden' value='$tckno' maxlength='11' size='11' name='tckno' onKeyPress='return numbersonly(this, event)'>$tckno</td>
   </tr>
   <tr>
    <td>Kurum Sicil No</td>
    <td width='15' >:</td>
    <td><input type='text' value='$sicil_no' required='required' maxlength='5' size='5' name='sicil_no' onKeyPress='return numbersonly(this, event)'></td>
   </tr>
   <tr>
    <td>Adı</td>
    <td width='15' >:</td>
    <td><input type='text' value='$adi' required='required' maxlength='20' size='20' name='adi'></td>
   </tr>
   <tr>
    <td>Soyadı</td>
    <td width='15' >:</td>
    <td><input type='text' value='$soyadi' required='required' maxlength='20' size='20' name='soyadi'></td>
   </tr>
   <tr>
    <td>Cinsiyet</td>
    <td width='15' >:</td>
";
if ($cinsiyet=="KADIN") 

echo"	
    <td><input type='radio' name='cinsiyet' value='KADIN' checked> Kadın
        <input type='radio' name='cinsiyet' value='ERKEK'> Erkek
    </td> 
   </tr>
";
   
else if ($cinsiyet=="ERKEK") 

echo"	
    <td><input type='radio' name='cinsiyet' value='KADIN'> Kadın
        <input type='radio' name='cinsiyet' value='ERKEK' checked> Erkek
    </td> 
   </tr>
";   
   
echo"
   <tr>
    <td>Doğum Tarihi</td>
    <td width='20' >:</td>
    <td><input type='text' value='$d_tarihi' required='required' maxlength='20' size='20' name='d_tarihi'></td>
   </tr>
   <tr>
    <td>Doğum Yeri</td>
    <td width='15' >:</td>
    <td><input type='text' value='$d_yeri' required='required' maxlength='20' size='20' name='d_yeri'></td>
   </tr>
   <tr>
    <td>Mezuniyet</td>
    <td width='15' >:</td>
	<td><input type='text' value='$mezuniyet_durumu' required='required' maxlength='20' size='20' name='mezuniyet_durumu'></td>
   </tr>
   <tr>
    <td>Mobil Tel</td>
    <td width='15' >:</td>
    <td><input type='text' value='$mobil_tel' required='required' maxlength='15' size='15' name='mobil_tel'></td>
   </tr>
   <tr>
    <td>Adres</td>
    <td width='15' >:</td>
    <td><input type='text' value='$adres' required='required' maxlength='50' size='50' name='adres'></td>
   </tr>
   <tr>
    <td>Ilçe / Il</td>
    <td width='15' >:</td>
    <td><input type='text' value='$ilce_il' required='required' maxlength='40' size='40' name='ilce_il'></td>
   </tr>
   <tr>
    <td>Medeni Hali</td>
    <td width='15' >:</td>
";
   switch ($medeni_hali){
   case "EVLI": 
   echo"	
    <td><input type='radio' name='medeni_hali' value='EVLI' checked> Evli
        <input type='radio' name='medeni_hali' value='BEKAR' > Bekar
    </td>
   </tr>
   ";	 break;
   case "BEKAR": 
   echo"	
    <td><input type='radio' name='medeni_hali' value='EVLI' > Evli
        <input type='radio' name='medeni_hali' value='BEKAR' checked> Bekar
    </td>
   </tr>
   ";	 break;
 }


echo"	
   <tr>
    <td>Askerlik Durumu</td>
    <td width='15' >:</td>
";
switch ($askerlik_durumu){
   case "YAPTI": 
   echo"	
    <td><input type='radio' name='askerlik_durumu' value='YAPTI' checked> Yaptı
     <input type='radio' name='askerlik_durumu' value='TECILLI'> Tecilli
	 <input type='radio' name='askerlik_durumu' value='MUAF'> Muaf
    </td>
   </tr>
   ";	 break;
   case "TECILLI": 
   echo"	
    <td><input type='radio' name='askerlik_durumu' value='YAPTI' > Yaptı
     <input type='radio' name='askerlik_durumu' value='TECILLI' checked> Tecilli
	 <input type='radio' name='askerlik_durumu' value='MUAF'> Muaf
    </td>
   </tr>
   ";	 break;
   case "MUAF": 
   echo"	
    <td><input type='radio' name='askerlik_durumu' value='YAPTI' > Yaptı
     <input type='radio' name='askerlik_durumu' value='TECILLI' > Tecilli
	 <input type='radio' name='askerlik_durumu' value='MUAF'checked> Muaf
    </td>
   </tr>
   ";	 break;
   default:  echo"	
    <td><input type='text' name='askerlik_durumu' value='NULL'>
    </td>
   </tr>
   ";
 }
echo"
   <tr>
    <td><input name='duzelt' type='submit' value='Düzelt'></td>
	<td width='15'></td>
	<td><input name='sicil_islem' type='submit' value='Sicil İslemleri'></td>
   </tr>
   </table>
  </form>
 </body>
</html>
";
}
?>
