<?php


class User {
  private $name;
  private $email;

  public function __construct($_name, $_email) {
    $this->name = $_name;
    $this->email = $_email;
  }

  public function login() {
    echo 'the user logged in';
  }

  public function getName() {
    return $this->name;
  }

  public function setName($_name) {
    if (isset($_name) && is_string($_name) && strlen($_name) > 1) {
      $this->name = $_name;
    } else {
      error_log('Name is not valid');
    }
  }

  public function getEmail() {
    return $this->email;
  }
}

$userOne = new User('zooe', 'x@x.com');

$userOne->login();
$userOne->setName(2);
echo '\n' . $userOne->getName() . '(' . $userOne->getEmail() . ') logged in.';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP</title>
</head>

<body>

</body>

</html>