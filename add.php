<?php

  include('./config/db_connect.php');

  $title = $email = $ingredients = '';
  $errors = array('email' => '', 'title' => '', 'ingredients' => '');

  if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
      $errors['email'] = 'Email is required';
    } else {
      $email = $_POST['email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is not valid';
      }
    }

    if (empty($_POST['title'])) {
      $errors['title'] = 'Pizza is required';
    } else {
      $title = $_POST['title'];

      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Pizza must be letters and spaces only';
      }
    }

    if (empty($_POST['ingredients'])) {
      $errors['ingredients'] = 'Ingredients are required';
    } else {
      $ingredients = $_POST['ingredients'];
      
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors['ingredients'] = 'Ingredients must be a comma separated list of words';
      }
    }

    if (!array_filter($errors)) {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

      // create sql query to save data
      $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

      // save to db and check
      if (mysqli_query($conn, $sql)) {
        // Success
        header('Location: index.php');
      } else {
        // errors
        echo 'query error' . mysqli_error($conn);
      }
      
    }
  }

?>


<!DOCTYPE html>
<html lang="en">

<?php
    include 'templates/header.php';
  ?>

<header class="container mt-5">
  <h1>Add pizza</h1>
</header>

<main class="container">

  <form method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control <?php if ($errors['email']) echo 'is-invalid'; ?>" name="email" id="email"
        aria-describedby="emailHelp" value="<?php if (isset($email)) echo htmlspecialchars($email); ?>">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      <?php if ($errors['email']) { ?>
      <div class="invalid-feedback">
        <?php echo $errors['email']; ?>
      </div>
      <?php } ?>
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Pizza Title</label>
      <input type="text" class="form-control <?php if ($errors['title']) echo 'is-invalid'; ?>" name="title" id="title"
        aria-describedby="pizzaHelp" value="<?php if (isset($title)) echo htmlspecialchars($title); ?>">
      <div id="pizzaHelp" class="form-text">Enter your pizza title here.</div>
      <?php if ($errors['title']) { ?>
      <div class="invalid-feedback">
        <?php echo $errors['title']; ?>
      </div>
      <?php } ?>
    </div>
    <div class="mb-3">
      <label for="ingredients" class="form-label">Pizza Ingredients</label>
      <textarea class="form-control <?php if ($errors['ingredients']) echo 'is-invalid'; ?>" id="ingredients"
        name="ingredients" aria-describedby="ingredientsHelp"
        rows="3"><?php if (isset($ingredients)) echo htmlspecialchars($ingredients); ?></textarea>
      <div id="ingredientsHelp" class="form-text">Enter your Pizza Ingredients here.</div>
      <?php if ($errors['ingredients']) { ?>
      <div class="invalid-feedback">
        <?php echo $errors['ingredients']; ?>
      </div>
      <?php } ?>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
  </form>

</main>

<?php
    include 'templates/footer.php';
  ?>

</html>