<?php
// NOTE: Changes current url if there is any get params beside number
if (!empty($_GET) && !isset($_GET["number"])) {
  $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  $toGo = "http://" . $_SERVER["HTTP_HOST"] . $path;
  header("Location: $toGo");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Пифагор и умножение</title>
</head>

<style>
  .multiplications {
    display: flex;
    flex-wrap: wrap;
    gap: 32px;
  }

  .mult-table {
    border: 1px black solid;
    padding: 6px;
  }
</style>

<body>
  <!-- This page contains pr1 with Pifagor and Multiplication tables -->

  <img src="./img/task.jpg" width="500px" alt="" />

  <table>
    <?php
    for ($y = 1; $y < 10; $y++) {
      echo "<tr>";
      for ($x = 1; $x < 10; $x++) {
        $currentNum = $x * $y;
        if ($x > $y) {
          echo "<td style='background-color: red'>$currentNum</td>";
        } else if ($x < $y) {
          echo "<td style='background-color: green'>$currentNum</td>";
        } else {
          echo "<td style='background-color: wheat'>$currentNum</td>";
        }
      }
      echo "</tr>";
    }
    ?>
  </table>

  <div class="multiplications">
    <?php
    if (!isset($_GET["number"]) && empty($_GET)) {
      for ($y = 2; $y <= 10; $y++) {
        echo "<div class='mult-table'>";
        for ($x = 1; $x < 10; $x++) {
          $value = $x * $y;
          echo "<p><a href='.?number=$y'>$y</a> * $x = $value</p>";
        }
        echo "</div>";
      }
    } else {
      echo "<div class='mult-table'>";
      $choosedNumber = $_GET['number'];
      for ($x = 1; $x < 10; $x++) {
        $value = $x * $choosedNumber;
        echo "<p><a href='.?number=$choosedNumber'>$choosedNumber</a> * $x = $value</p>";
      }
      echo "</div>";

      echo "<a href='.'>Вывести всё</a>";
    }
    ?>
  </div>

</body>

</html>