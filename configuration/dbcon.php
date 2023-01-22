<?php 

$db = mysqli_connect('localhost','root','','pj_sibudi');
//baseIp lokal menggunakan ip yang di dapat (dapat dilihat di cmd dgn perintah ipconfig) atau 
//menggunakan http://localhost/sibudi/
//jika public atau dihosting, maka masukan nama dns ny, contoh  : http://sibudi.com/
$baseIp = "http://192.168.43.139/";

$baseUrl = $baseIp."sibudi/"; 
$urlScan = $baseUrl."dashboard/scan";
