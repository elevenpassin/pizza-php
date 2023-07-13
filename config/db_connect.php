<?php

$conn = mysqli_connect('localhost:3306', 'root', '', 'pizza_shop');

if (!$conn) {
  echo 'Connection error' . mysqli_connect_error();
}

?>