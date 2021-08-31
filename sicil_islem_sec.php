<!-- Türkçe karakterler için ayar yapıldı -->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />

<?php
// SİCİL İŞLEMLERİ SEÇİM EKRANI
include("conn.php");
echo"
 <html>
  <head></head>
   <body>
    <form name='form1' action='form_sicil_gir.php' method='post'>
    <table align='center' style='font-family:Tahoma;'>
     <tr>
      <td align='center' ><img src='images/islem_sec.jpg' alt='Sicil Islemleri' width='60' heihgt='60' /><td>
      <td colspan='2' bgcolor='yellow' style='border:1px solid black;' ><h2 style='color:navy;' align='center'>Sicil Bilgileri İşlemleri</h2></td>
     </tr>
     <tr>
      <td>TC Kimlik No</td>
      <td width='15'>:</td>
      <td>
";
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
	 </table>
	 <table align='center'>
     <tr>
      <td><input name='yeni' type='submit' value='Yeni Kayıt'></td>
      <td><input name='duzelt' type='submit' value='Duzelt'></td>
	  <td><input name='ana_menu' type='submit' value='Ana Menu'></td>
     </tr>
     <tr style='outline: thin solid'>
	  <td colspan='2' bgcolor='red' align='center' ><select name='k_sil'>
           <option value='HAYIR'> HAYIR </option>
           <option value='EVET'> EVET  </option>		  
		  </select>
      </td>
	  <td><input name='sil' type='submit' value='Kayıt Sil'></td>
	 </tr> 
	 </table>
    </form>
";
?>
