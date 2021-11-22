<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Labs</title>
</head>

<body>
  <ul>
    <?php
    // This is index file that generates menu for every project.
    $dirs = array_diff(scandir("."), [".", "index.php"]);
    foreach ($dirs as $dir) {
      echo "<li><a href='./$dir'>$dir</a></li>";
    }
    ?>
  </ul>
</body>

</html>