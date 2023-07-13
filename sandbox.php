<?php
  if (isset($_POST['name'])) {
    setcookie('gender', $_POST['gender'], time() + 86400);

    session_start();
    
    $_SESSION['name'] = $_POST['name'];
    
    header('Location: index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
        placeholder="Enter your name">
    </div>
    <div class="mb-3">
      <select name="gender">
        <option value="male">male</option>
        <option value="female">female</option>
      </select>
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
  </form>

</body>

</html>