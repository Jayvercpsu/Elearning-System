<?php
$con = mysqli_connect("localhost", "root", "", "LBE_HSS");
if (mysqli_connect_errno()) {
  echo "Connection Fail" . mysqli_connect_error();
}
