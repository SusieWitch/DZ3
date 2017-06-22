<?php
require_once 'common.php';

$user = new \Classes\UserClass\User();
$users = new \Classes\UserClass\User();
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1><?php echo $_SESSION['login']?></h1>
<p>Зарегестрированные:</p>
<?php
$users->displayUsersList();
?>
<hr>
<a href="list.php">Вывести список пользователей</a>
<form method="GET" action="infa.php">
    <label for="if">Просмотр информации о позльзователе</label>
    <input type="text" name="infa" id="if">
    <button type="submit">Смотреть</button>
</form><hr>
<?php $user->displayUser();?>
<hr>
<p>echo $объектКлассаПользователя:</p><?php
$objuser = new \Classes\UserClass\UserClass($_SESSION['login']);
echo $objuser; ?>
<hr>
<p>Добавить пользователя:</p>
<form method="GET" action="handlerfile.php">
    <label for="ln">Фамилия:</label>
    <input type="text" name="lastname" id="ln"><br>

    <label for="fn">Имя:</label>
    <input type="text" name="firstname" id="fn"><br>

    <label for="lg">Логин:</label>
    <input type="text" name="login" id="lg"><br>

    <label for="pw">Пароль:</label>
    <input type="password" name="password" id="pw"><br>

    <label for="rl">Права:</label>
    <input type="radio" name="role" value="guest" id="rl" checked> Гость<br>
    <input type="radio" name="role" value="admin" id="rl"> Администратор<br>
    <button type="submit">Добавить</button>
</form>

<a href="destroy-session.php">Выйти</a>

</body>
</html>
