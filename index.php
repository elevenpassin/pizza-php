<?php 
  include('./config/db_connect.php');
  // write query for all pizzas
  $sql = 'SELECT * FROM pizzas ORDER BY created_at';
  // make query and get results
  $result = mysqli_query($conn, $sql);

  // pizzas
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_free_result($result);
  mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

  <?php
    include 'templates/header.php';
  ?>

  <header class="container mt-5">
    <h1>All our pizzas</h1>
  </header>

  <main class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php foreach($pizzas as $pizza): ?>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($pizza['title']); ?></h5>
              <p>Created by: <?php echo htmlspecialchars($pizza['email']) ?></p>
              <h6>Ingredients</h6>
              <ol class="card-text">
                <?php foreach(explode(',', $pizza['ingredients']) as $ingredient): ?>
                  <li><?php echo htmlspecialchars($ingredient); ?></li>
                <?php endforeach; ?>
              </ol>
              <a href="#" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>  
      <?php endforeach; ?>
    </div>
  </main>

  <?php
    include 'templates/footer.php';
  ?>

</html>