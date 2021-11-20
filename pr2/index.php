<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Sets current number to gues if it is not set.
if (!isset($_SESSION["ANSWER"])) {
  $currentRandomSeed = rand(0, 10);
  $_SESSION["ANSWER"] = $currentRandomSeed * 2;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form task</title>
</head>

<body>
  <!-- This page contains second task with form and math formula. -->
  <img src="./img/task.jpg" width="500px" alt="" />

  <?php if (isset($_POST["user_gues"])) : ?>

    <?php
    if ($_POST["user_gues"] == $_SESSION["ANSWER"]) {
      echo "<p>You got it correct!</p>";
    } else {
      echo "<p>It's wrong try again</p>";
    }
    ?>
    <button onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>'">Назад</button>
  <?php else : ?>

    <p>Текущая формула: x = 2n. Где n - случайное число от 0 до 10, x - число которое нужно отгадать. </p>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
      <input type="number" name="user_gues" placeholder="Введите x" />
      <button type="submit">Попробовать</button>
    </form>

  <?php endif; ?>

</body>

</html>