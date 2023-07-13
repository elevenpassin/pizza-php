<?php


// method 1

// $quotes = readfile('example.txt');

// echo $quotes;

// method 2

// $file = 'example.txt';

// if (file_exists($file)) {
//   $content = readfile($file);
//   echo $content . '<br />';


//   copy($file, 'example2.txt');

//   echo realpath($file) . '<br />';
//   echo filesize($file) . '<br />';
//   rename($file, 'example23.txt');
// } else {
//   echo 'File does not exist';
// }

// mkdir('files');

// $file = 'example.txt';
// $handle = fopen($file, 'r');

// echo fread($handle, filesize($file));
// echo fread($handle, 114);
// echo fgets($handle);

// echo fgetc($handle);
// echo fgetc($handle);
// echo fgetc($handle);

// $file = 'example.txt';
// $handle = fopen($file, 'a+');

// fwrite($handle, '\n hi');
// echo fread($handle, filesize($file));
// fclose($handle);

// unlink($file);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Files</title>
</head>

<body>

</body>

</html>