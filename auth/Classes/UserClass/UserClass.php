<?php


namespace Classes\UserClass;


class UserClass
{
    public function __construct($login)
    {
        $this->login = $login;
    }
    public function __toString()
    {
        return $this->login;
        // TODO: Implement __toString() method.
    }
}