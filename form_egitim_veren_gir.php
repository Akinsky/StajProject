<!-- Türkçe karakterler için ayar yapıldı //-->
<meta http-equiv='Content-Type' content='text/HTML; charset=utf-8' />

<html>
<head></head>
<body>
<form name='form1' action='kaydet_egitim_veren.php' method='post'>
<table align='center' style='font-family:Tahoma;'>
<tr>
<td align="center"><img src="images/egitici.jpg" alt="Egitici Bilgileri" width="60" heihgt="60" /><td>
<td colspan='3' bgcolor='yellow' style='border:1px solid black;'><h2 style='color:navy;' align='center'>Eğitici Bilgileri Girişi</h2></td>
</tr>
<tr>
<td>Eğitici Adı-Soyadı </td>
<td width='15' >:</td>
<td><input type='text' value='' required='required' maxlength='30' size='30' name='egitici_adi_soyadi'></td>
</tr>
<tr>
<td>Eğitici Ünvanı</td>
<td width='15' >:</td>
<td><input type='text' value='' required='required' maxlength='20' size='20' name='egitici_unvani'></td>
</tr>
<tr>
<td>Çalıştığı Firma</td>
<td width='15' >:</td>
<td><input type='text' value='' required='required' maxlength='30' size='30' name='egitici_firma'></td>
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
