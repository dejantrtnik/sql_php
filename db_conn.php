<?php
$conn = mysqli_connect('DB_CONN', 'USER', 'PASS', 'DB');
mysqli_set_charset($conn,"utf8");
if (!$conn)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
    echo "Connection ok";
  }
?>
