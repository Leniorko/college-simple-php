<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// If login already in $_COOKIE will return that person from them. Else creates new one.
if (isset($_POST["login"])) {

  if (isset($_COOKIE[$_POST["login"]])) {
    $_SESSION["user"] = $_POST['login'];
  } else {
    $user = [
      'fullname' => $_POST["fullname"],
      'age' => $_POST["age"],
      'login' => $_POST["login"],
      'password' => password_hash($_POST["password"], PASSWORD_BCRYPT),
      'total_visits' => 0,
    ];

    $packed_user = base64_encode(serialize($user));
    setcookie($_POST["login"], $packed_user);
    echo $user["login"];
    $_SESSION["user"] = $user["login"];
  }


  header('Location: ' . $_SERVER["PHP_SELF"]);
  die();
}

if (isset($_GET['logout'])) {
  session_destroy();
  header('Location: ' . $_SERVER["PHP_SELF"]);
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Логин и выход</title>
</head>

<body>
  <!-- This page contains register with using cookie -->
  <img src="./img/task.jpg" width="500px" alt="" />
</body>

<?php if (isset($_SESSION['user']) && isset($_COOKIE[$_SESSION['user']])) : ?>
  <?php
  $loggedUser = unserialize(base64_decode($_COOKIE[$_SESSION['user']]));
  $loggedUser['total_visits'] += 1;

  $packed_user = base64_encode(serialize($loggedUser));
  setcookie($loggedUser["login"], $packed_user);

  echo "<p>Username: " . $loggedUser['fullname'] . "</p>";
  echo "<p>Login: " . $loggedUser['login'] . "</p>";
  echo "<p>Age: " . $loggedUser['age'] . "</p>";
  echo "<p>Total visits: " . $loggedUser['total_visits'] . "</p>";
  ?>

  <a href="?logout">Выйти</a>
<?php else : ?>

  <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" required style="display: flex; flex-direction: column; max-width: 300px; gap: 6px">
    <input type="text" name="fullname" id="fullname" placeholder="ФИО" required>
    <input type="number" name="age" id="age" placeholder="Возраст" required>
    <input type="text" name="login" id="login" placeholder="Логин" required>
    <input type="password" name="password" id="password" placeholder="Пароль" required>
    <button type="submit">Регистрация</button>
  </form>

<?php endif; ?>


</html>