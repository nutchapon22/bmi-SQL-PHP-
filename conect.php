<?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'bmi';
  $connect = mysqli_connect($servername,$username,$password,$dbname) or die ("ไม่สามารถเชื่อต่อฐานข้อมูลได้ค่ะ");
  mysqli_set_charset($connect,"utf8");
  if (!$connect)
  {
    die ("ไม่สามารถเชื่อมต่อฐานข้อมูลได้ค่ะ".mysqli_connect_error());
  }
  else
  {

  }
?>