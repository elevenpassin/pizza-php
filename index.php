<?php

$products = [
  ['name' => 'shiny star', 'price' => 20],
  ['name' => 'green shell', 'price' => 10],
  ['name' => 'red shell', 'price' => 15]
];

?>

<!DOCTYPE html>
<html lang="en">

  <?php
    include 'templates/header.php';
  ?>

  <h2>Our products</h2>

  <table style="border: 1px solid black;">
    <thead>
      <tr>
        <td>Product Name</td>
        <td>Price</td>
      </tr>
    </thead>
    <tbody>
      <?php 

      foreach ($products as $product) {
        echo '<tr><td>' . $product['name'] . '</td><td>' . $product['price'] . '</td></tr>';
      }

      ?>
    </tbody>
  </table>

  <?php
    include 'templates/footer.php';
  ?>

</html>