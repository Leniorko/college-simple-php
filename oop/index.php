<!-- https://disk.yandex.ru/d/neR3wVk7idor6w

Упражнение 1: Создание класса
Создайте класс User
• В классе создайте свойства name, login и password
• В классе создайте и опишите метод showInfo(), который выводит информацию о пользователе в произвольной форме
• Создайте три объекта, экземпляра класса User:
$user1, $user2 и $user3
• Задайте произвольные значения свойств name, login и password для каждого из объектов
• Вызовите метод showInfo() для каждого объекта -->

<?php

class User1
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

$user1 = new User1("Иван", "Leniorko", "1234");
$user2 = new User1("Диана", "diana_krasavitsa2016", "asdasdads");
$user3 = new User1("Дмитрий", "XxDimaDestroyerxX", "oahgpsidf");

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

?>



<!-- Упражнение 2: Создание конструктора

• В классе User создайте и опишите конструктор, который принимает в качестве аргументов имя, логини пароль пользователя
• Конструктор должен инициализировать свойства name, login и password
• Измените код, который инициализирует объекты, передавая нужные параметры в конструктор
• Удалите те строки кода, в которых задаются значения свойств объектов

• Упражнение 2: Создание деструктора
В классе User создайте и опишите деструктор
• Деструктор должен выводить строку Пользователь [логин_пользователя] удален
• Подставьте вместо подстроки [логин_пользователя]значение свойства login -->

<?php

class User2
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

	public function __destruct()
	{
		echo "<p>" . "Пользователь " . $this->login . " удалён" . "</p>";
	}

	public function showInfo()
	{
		echo "<p>" . "Имя: " . $this->name . "</p>";
		echo "<p>" . "Логин: " . $this->login . "</p>";
		echo "<p>" . "Пароль: " . $this->password . "</p>";
	}
}

$user2_1 = new User2("Иван", "Leniorko", "1234");
unset($user2_1);
$user2_2 = new User2("Диана", "diana_krasavitsa2016", "asdasdads");
unset($user2_2);
$user2_3 = new User2("Дмитрий", "XxDimaDestroyerxX", "oahgpsidf");
unset($user2_3);
?>


<!-- 
Упражнение 3: Расширение класса Юзер
- создать класс SuperUser расширяющий класс User
- добавить свойства: fio, age, email, sex
- произвести проверку на пол
- произвести проверку на возраст (с входным параметром возраста) -->

<?php

class User3
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

	public function __destruct()
	{
		echo "<p>" . "Пользователь " . $this->login . " удалён" . "</p>";
	}

	public function showInfo()
	{
		echo "<p>" . "Имя: " . $this->name  . "</p>";
		echo "<p>" . "Логин: " . $this->login  . "</p>";
		echo "<p>" . "Пароль: " . $this->password  . "</p>";
	}
}

class SuperUser extends User3
{
	public $fio;
	public $age;
	public $email;
	public $sex;

	public function __construct($name, $login, $password, $fio, $age, $email, $sex)
	{
		parent::__construct($name, $login, $password);
		$this->$fio = $fio;
		$this->$age = $age;
		$this->$email = $email;
		$this->$sex = $sex;
	}

	public function checkGender($sex)
	{
		if ($this->sex === $sex) {
			return true;
		}
		return false;
	}


	public function checkAge($age)
	{
		if ($this->age === $age) {
			return true;
		}
		return false;
	}
}

// $user3_1 = new User3("Иван", "Leniorko", "1234");
// $user3_2 = new User3("Диана", "diana_krasavitsa2016", "asdasdads");
// $user3_3 = new User3("Дмитрий", "XxDimaDestroyerxX", "oahgpsidf");
?>


<!-- Упражнение 4: Создание исключений
создать два пользовательских класса расширяющие стандртный базовый класс Exception -> E1, E2

сформировать цепочку из 4 функций f_main -> f1 -> f2 -> f3
в функции f_main сформировать переменную х = 0...20

передать переменную по цепочке функций
в функции f1 произвести проверку х = 0 вызвав исключение Е1
в функции f2 произвести проверку х < 5 вызвав исключение Е2 в функции f3 произвести проверку х> 15 вызвав стандартное исключение Е

	прием исключений произвести за пределами функции f_main

	в случае успешного выполнения цепочки функций -> вывести х -->

<?php

class E1 extends Exception
{
	public $message;

	public function __construct($message)
	{
		$this->message = $message;
		parent::__construct();
	}

	public function __toString()
	{
		return "Ошибка E1: "  . $this->message;
	}
}

class E2 extends Exception
{
	public $message;

	public function __construct($message)
	{
		$this->message = $message;
		parent::__construct();
	}

	public function __toString()
	{
		return "Ошибка E2: "  . $this->message;
	}
}

f_main(10);

function f_main($x)
{
	f1($x);
}

function f1($x)
{
	if ($x === 0) {
		throw new E1("Ошибка в функции f1");
	}
	f2($x);
}

function f2($x)
{
	if ($x < 5) {
		throw new E2("Ошибка в функции f2");
	}
	f3($x);
}

function f3($x)
{
	if ($x > 15) {
		throw new Exception("Error at third function");
	}

	echo "<p>" . "Число прошло все стадии" . "</p>";
}

?>


<!-- Упражнение 5:
	- Создать абстрактный класс UserMain
	- c абстракными свойствами login, password
	- c абстрактным методом showInfo()

	Реализовать класс User на основе абстрактного класса UserMain и SuperUser на основе User -->

<?php

abstract class UserMain
{
	public $login;
	public $password;

	public function __construct($login, $password)
	{
		$this->login = $login;
		$this->password = $password;
	}

	abstract public function showInfo();
}

class User5 extends UserMain
{
	public function showInfo()
	{
		echo "<p>" . "Логин: " . $this->login  . "</p>";
		echo "<p>" . "Пароль: " . $this->password  . "</p>";
	}
}

class SuperUser5 extends User5
{

	public function showInfo()
	{
		echo "<p>" . "ЭТО СУПЕР ПОЛЬЗОВАТЕЛЬ " . "</p>";
		echo "<p>" . "Логин: " . $this->login  . "</p>";
		echo "<p>" . "Пароль: " . $this->password  . "</p>";
	}
}

$user5 = new User5("general user", "password");
$user5->showInfo();

$superuser5 = new SuperUser5("super user", "password");
$superuser5->showInfo();

?>


<!-- Упражнение 6:
	- Посчитать количество созданных экземпляров класса User
	- Посчитать количество созданных экземпляров класса SuperUser
	- Пользователи считаются отдельно для каждого класса

	Создание статических свойств классов
	• Конструктор SuperUser должен вызывать конструктор User, передавая в него необходимые параметры для инициализации свойств User
	• Создайте в классах User и SuperUser статические свойства для подсчета количества созданных объектов
	• Присвойте этим свойствам начальное значение 0
	• В конструкторах классов инкрементируйте значения данных свойств
	• В нижней части кода, после создания экземпляров классов, выведите в браузер количество тех и других объектов примерно так:
	Всего обычных пользователей: [количество_экземпляров_класса_User]
	Всего супер-пользователей: [количество_экземпляров_класса_SuperUser] -->

<?php

class User6
{
	public static $totalUsers = 0;
	public $login;
	public $password;

	public function __construct($login, $password)
	{
		$this->login = $login;
		$this->password = $password;
		self::$totalUsers += 1;
	}

	protected function __construct2($login, $password)
	{
		$this->login = $login;
		$this->password = $password;
	}
}

class SuperUser6 extends User6
{
	public static $totalUsers = 0;

	public function __construct($login, $password)
	{
		parent::__construct2($login, $password);
		self::$totalUsers += 1;
	}
}

$newUser6_1 = new User6("login", "password");
$newUser6_2 = new User6("login", "password");
$newUser6_3 = new User6("login", "password");
$newUser6_4 = new User6("login", "password");
$newUser6_5 = new User6("login", "password");

$newSuperUser6_1 = new SuperUser6("login", "password");
$newSuperUser6_2 = new SuperUser6("login", "password");
$newSuperUser6_3 = new SuperUser6("login", "password");

echo "<p>" . "Всего обычных пользователей: " . User6::$totalUsers . "</p>";
echo "<p>" . "Всего Супер пользователей пользователей: " . SuperUser6::$totalUsers . "</p>";

?>



<!-- Упражнение 7: Создание классов в отдельных файлах

	- Реализовать (перенести) классы User и SuperUser в отдельных файлах xxxClassxxx.class.php (шаблон имени файла);
	- Создать файл с функцией spl_autoload_register(), которая производит автозагрузку нужного класса при создании его экземпляра;
	- Подключить файл с функцией spl_autoload_register() к основному скрипту. -->
<?php

require_once("./autoloader.php");


$user7 = new User7("lol", "kek", "cheburek");
$SuperUser7 = new SuperUser7("Ya admin", "tocho", "net");
$user7->showInfo();
$SuperUser7->showInfo();

?>


<!-- Упражнение 8: Работа с модификаторами доступа

	В классе User и SuperUser создать свойства с модификаторами доступа: public, private, protected.

	Создать методы get и set для private и protected свойств класса -->

<?php

class User8
{
	public $name;
	public $login;
	protected $password;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		if ($name === "password") {
			$this->$name = password_hash($value, PASSWORD_BCRYPT);
			return;
		}
		$this->$name = $value;
	}

	public function __construct($name, $login, $password)
	{
		$this->name = $name;
		$this->login = $login;
		$this->password = password_hash($password, PASSWORD_BCRYPT);
	}

	public function showInfo()
	{
		echo "<p>" . "Имя: " . $this->name  . "</p>";
		echo "<p>" . "Логин: " . $this->login  . "</p>";
		echo "<p>" . "Пароль: " . $this->password  . "</p>";
	}
}

class SuperUser8 extends User8
{
	public $fio;
	public $age;
	private $email;
	public $sex;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public function __construct($name, $login, $password, $fio, $age, $email, $sex)
	{
		parent::__construct($name, $login, $password);
		$this->$fio = $fio;
		$this->$age = $age;
		$this->email = $email;
		$this->$sex = $sex;
	}
}

$user8 = new User8("Ivan", "Leniorko", "Secret");
echo "<p>" . "Поле password protected но вот оно: " . $user8->password . "</p>";
$user8->password = "New Password";
echo "<p>" . "Поле password protected но вот оно после изменения: " . $user8->password . "</p>";

$superUser8 = new SuperUser8("Ivan", "Leniorko", "IDK", "Егоров Иван Дмитриевич", 19, "www.Len244@gmail.com", "male");
echo "<p>" . "Поле email private но вот оно: " . $superUser8->email . "</p>";
$superUser8->email = "new.email@test.com";
echo "<p>" . "Поле email private но вот оно после изменения: " . $superUser8->email . "</p>";


?>