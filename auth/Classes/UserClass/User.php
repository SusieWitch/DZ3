<?php

namespace Classes\UserClass;


class User
{
    public $firstname;
    public $lastname;
    public $login;
    public $password;
    public $role;
    public $user;

 /*   */

    public function displayUser()
        {
            $user = $_SESSION['fullname'];
            echo "<br>Пользователь:" . $_SESSION['login'];
            echo "<br>Имя:" . $_SESSION['fullname']['firstname'];
            echo "<br>Фамилия:" . $_SESSION['fullname']['lastname'];
            echo "<br>Роль:" . $_SESSION['fullname']['role'];
            return $user;
        }

    public function displayUsersList()
        {
            $fn = (glob('../files/*.txt'));
            foreach ($fn as $filename) {
                $json = file_get_contents($filename);
                $person = json_decode($json, true);
                echo $person['login']."<br>";
            };
        }
}