
<?php
//veritabanına bağlanma

$host='localhost';
$db='isg';
$user='root';//$user='bim';
$pass='';//$pass='Bim11qaz';
$conn=mysqli_connect($host,$user,$pass) or die('Mysql Baglanamadi');
mysqli_select_db($conn,$db) or die('Veritabanina Baglanilamadi');
?>