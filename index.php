<!DOCTYPE html>
<html>
<head>
    <title>Гостьова книга</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Реєстрація</h1>
<div>
    <form method="POST">
        <div style="color: red;">
            <?php 
            $errors = array();
            if($errors) foreach ($errors as $error) :?>
            	<?php if(empty($errors))
{
    $stmt = $dbConn->prepare('INSERT INTO users(`username`, `email`, `password`, `first_name`, `last_name`) VALUES(:username, :email, :password, :first_name, :last_name)');
    $stmt->execute(array('username' => $_POST['user_name'], 'email' => $_POST['email'], 'password' => sha1($_POST['password'].SALT), 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name']));
    //header("location: /login.php");
}?>
                <p><?php echo $error;?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <label>Логін:</label>
            <div>
                <input type="text" name="user_name" id="username" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"/>
                <span id="username_error" style="color: red;"></span>
            </div>
        </div>
        <div>
            <label>Електронна пошта:</label>
            <div>
                <input type="email" name="email" id="email" required="" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : '');?>"/>
                <span id="email_error" style="color: red;"></span>
            </div>
        </div>
        <div>
            <label>Ім'я:</label>
            <div>
                <input type="text" name="first_name" required="" value="<?php echo (!empty($_POST['first_name']) ? $_POST['first_name'] : '');?>"/>
            </div>
        </div>
        <div>
            <label>Прізвище:</label>
            <div>
                <input type="text" name="last_name" required="" value="<?php echo (!empty($_POST['last_name']) ? $_POST['last_name'] : '');?>"/>
            </div>
        </div>
        <div>
            <label>Пароль:</label>
            <div>
                <input type="password" name="password" required="" value=""/>
            </div>
        </div>
        <div>
            <label>Підтвердіть пароль:</label>
            <div>
                <input type="password" name="confirm_password" required="" value=""/>
            </div>
        </div>
        <div>
            <br/>
            <input type="submit" name="submit" id="submit" required="" value="Зареєструватися">
        </div>      
    </form>

</div>
<a href="config.php">Config</a>
<a href="login.php">Login</a>
<a href="login.php">register</a>
<a href="index.php">Index</a>
</body>
</html>
<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');
require_once("config.php");
if (!empty($_SESSION['user_id']))
{
    header("location: /index.php");
}
?>
