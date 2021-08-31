<!-- Türkçe karakterler için ayar yapıldı -->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />

<?php
include("conn.php");

// EĞİTİM TAKİP KARTI LİSTELEMEN ÖNCE PERSONEL SEÇİMİ İŞLEMLERİ
echo"
 <html>
  <head></head>
   <body>
    <form name='form1' action='takip_karti.php' method='post'>
    <table align='center' style='font-family:Tahoma;'>
     <tr>
      <td align='center' ><img src='images/egitim.jpg' alt='Egitim Bilgileri' width='60' heihgt='60' /><td>
      <td colspan='2' bgcolor='yellow' style='border:1px solid black;' ><h2 style='color:navy;' align='center'>ETK için Personel Seçimi</h2></td>
     </tr>
     <tr>
      <td>TC Kimlik No</td>
      <td width='15'>:</td>
      <td>
";
// EĞİTİM KARTI İÇİN sicil_bilgileri TABLOSUNDAN PERSONEL SEÇME İŞLEMLERİ
$sor=mysqli_query($conn,'SELECT * FROM sicil_bilgileri ORDER BY adi, soyadi');
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
      <td><input name='kart' type='submit' value='Gör / Yazdır'></td>
      <td width='15'></td>
      <td><input name='ana_menu' type='submit' value='Ana Menü'></td>
     </tr>
     </table>
    </form>
";
?>
