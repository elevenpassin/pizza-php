<?php

$conn = mysqli_connect('localhost:3306', 'dev', 'Passw0rd!@#', 'pizza_shop');

if (!$conn) {
  echo 'Connection error' . mysqli_connect_error();
}

?>