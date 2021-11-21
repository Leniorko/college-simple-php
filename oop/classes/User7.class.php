<?php

class User7
{
  public $name;
  public $login;
  public $password;

  public function __construct($name, $login, $password)
  {
    $this->name = $name;
    $this->login = $login;
    $this->password = password_hash($password, PASSWORD_BCRYPT);
  }

  public function showInfo()
  {
    echo "<p>" . "Имя: " . $this->name . "</p>";
    echo "<p>" . "Логин: " . $this->login . "</p>";
    echo "<p>" . "Пароль: " . $this->password . "</p>";
  }
}
