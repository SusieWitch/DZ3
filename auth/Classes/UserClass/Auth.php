<?php


namespace Classes\UserClass;


class Auth
{
    public function Auth(){
        $usersarray = array (
            'ivanova' => array (
                'lastname'  => 'ivanova',
                'firstname' => 'anna',
                'login'     => 'ivanova',
                'password'  => 'anna',
                'role'      => 'admin'
            ),
            'petrova' => array (
                'lastname'  => 'petrova',
                'firstname' => 'inna',
                'login'     => 'petrova',
                'password'  => 'inna',
                'role'      => 'guest'
            ),
            'sidorova' => array (
                'lastname'  => 'sidorova',
                'firstname' => 'nina',
                'login'     => 'sidorova',
                'password'  => 'nina',
                'role'      => 'admin'
            )

        );
        $loginkey = $_GET['login'];
        $filename = "../files/".$_GET['login'].".txt";
        $json = file_get_contents($filename);
        $person = json_decode($json, true);

        if (array_key_exists($loginkey, $usersarray)){
            if (($usersarray[$loginkey]['login'] == $_GET['login']) && ($_GET['password'] == $usersarray[$loginkey]['password']) && ($usersarray[$loginkey]['role'] == 'admin')) {
                $_SESSION['login'] = $loginkey;
                $person2 = array("lastname"=>$_GET['lastname'],"firstname"=>$_GET['firstname'],"login"=>$_GET['login'],"password"=>$_GET['password'],"role"=>"admin");
                $_SESSION['fullname'] = $person2;
                header('Location: persons.php');
            }
            elseif (($usersarray[$loginkey]['login'] == $_GET['login']) && ($_GET['password'] == $usersarray[$loginkey]['password']) && ($usersarray[$loginkey]['role'] == 'guest')) {
                $_SESSION['login'] = $loginkey;
                $person3 = array("lastname" => $_GET['lastname'], "firstname" => $_GET['firstname'], "login" => $_GET['login'], "password" => $_GET['password'],"role"=>"guest");
                $_SESSION['fullname'] = $person3;
                header('Location: person.php');
            }
            else {
                header('Location: error.php');
            }
        }
        elseif(file_exists($filename)){
                if (($person['login'] == $_GET['login']) && ($_GET['password'] == $person['password']) && ($person['role'] == 'admin')) {
                    $_SESSION['login'] = $_GET['login'];
                    $person2 = array("lastname"=>$_GET['lastname'],"firstname"=>$_GET['firstname'],"login"=>$_GET['login'],"password"=>$_GET['password'],"role"=>"admin");
                    $_SESSION['fullname'] = $person2;
                    header('Location: persons.php');
                }
                elseif (($person['login'] == $_GET['login']) && ($_GET['password'] == $person['password']) && ($person['role'] == 'guest')) {
                    $_SESSION['login'] = $_GET['login'];
                    $person3 = array("lastname" => $_GET['lastname'], "firstname" => $_GET['firstname'], "login" => $_GET['login'], "password" => $_GET['password'],"role"=>"guest");
                    $_SESSION['fullname'] = $person3;
                    header('Location: person.php');
                }
                else {
                    header('Location: error.php');
                }}
        else {
            header('Location: error.php');
        }
    }
}