<?php
	 session_start();
	define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "gbook");
define("CHARSET", "utf8");
define("SALT", "PoLiTeHSILA");

$dsn = "mysql:host=" . HOST . "; dbname=" . DBNAME . ";charset=" . CHARSET;
try
{
    $dbConn = new PDO($dsn, USER, PASSWORD);
}
catch(PDOException $e)
{
    die('Підключення не вдалося: ' . $e->getMessage());
}
require_once("config.php");
if (!empty($_SESSION['user_id']))
{
    header("location: /index.php");
}
$errors = [];

if (!empty($_POST)) {

	if (empty($_POST['user_name']))
    {
        $errors[] = 'Введіть логін';
    }

    if (empty($_POST['email']))
    {
        $errors[] = 'Введіть email';
    }

    if (empty($_POST['first_name']))
    {
        $errors[] = "Введіть ім'я";
    }

    if (empty($_POST['last_name']))
    {
        $errors[] = 'Введіть прізвище';
    }

	if(empty($_POST['password']))
	{
	    $errors[] = 'Введіть пароль';
	}

	if(empty($_POST['confirm_password']))
	{
	    $errors[] = 'Підтвердіть пароль';
	}

	if(strlen($_POST['user_name']) > 100)
	{
	    $errors[] = 'Логін перевищує допустимий розмір. Макс розмір 100 символів';
	}

	if(strlen($_POST['first_name']) > 80)
	{
	    $errors[] = 'Імя перевищує допустимий розмір. Макс розмір 100 символів';
	}

	if(strlen($_POST['last_name']) > 150)
	{
	    $errors[] = 'Прізвище перевищує допустимий розмір. Макс розмір 150 символів';
	}

	if(strlen($_POST['password']) < 6)
	{
	    $errors[] = 'Пароль повинен містити не менше 6 символів';
	}

	if($_POST['password'] !== $_POST['confirm_password'])
	{
	    $errors[] = 'Паролі не зпівпадають';
	}
}

?>