<?php
  include "conect.php";
  if(isset($_GET['bid']))
  {
    $idp = $_GET['bid'];
    $sql = "DELETE FROM bmidata WHERE bid = $idp";
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location: main.php');
  }