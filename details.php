<?php 
  include('./config/db_connect.php');

  // check get request "id" parameter
  if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // write query to fetch the pizza information
    $sql = "SELECT * FROM pizzas WHERE id = $id";
    
    // make query and get results
    $result = mysqli_query($conn, $sql);
  
    // pizza
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
  }


?>
<!DOCTYPE html>
<html lang="en">

<?php
    include 'templates/header.php';
  ?>

<header class="container mt-5">
  <?php if ($pizza): ?>
  <h1><?php echo htmlspecialchars($pizza['title']) ?></h1>
  <?php else: ?>
  <h1>Ops!! No pizza found!!</h1>
  <?php endif; ?>
</header>

<main class="container">
  <?php if ($pizza): ?>
  <p>Created by: <?php echo htmlspecialchars($pizza['email']) ?></p>
  <p>Created at: <?php echo date($pizza['created_at']) ?></p>
  <?php include('./template-parts/ingredients.php'); ?>
  <?php else: ?>
  <p>No problem! Create your own pizza down here...!</p>
  <a href="add.php" class="btn btn-primary">Create my own pizza</a>
  <?php endif; ?>
</main>

<?php
    include 'templates/footer.php';
  ?>

</html>