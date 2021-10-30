<?php

  // connect database mysql
  $connect = mysqli_connect("localhost", "root", "", "dvd_rent");

  if(mysqli_connect_errno()){
    echo "Failed to Connect to MySQL :" . mysqli_connect_error();
  }
?>