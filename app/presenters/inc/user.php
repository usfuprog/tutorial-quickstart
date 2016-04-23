<?php

require_once 'conn.php';

class User {
    public $id, $login, $name, $surname, $isAdmin;
    
    private static function Select($login, $pass = null) {
        $conn = getConn();
        
        $q = 'Select id, name, surname, isAdmin From Users Where login=?';
        if (isset($pass)) {
            $q .= ' And password=md5(?)';
        }
        $stmt = $conn->prepare($q);
        if (isset($pass)) {
            $stmt->bind_param('ss', $login, $pass);
        }
        else {
            $stmt->bind_param('s', $login);
        }
        if ($stmt->execute() && ($res = $stmt->get_result()) && $row = $res->fetch_row()) {
            $user = new User();
            $user->id = $row[0];
            $user->name = $row[1];
            $user->surname = $row[2];
            $user->isAdmin = $row[3];
            $user->login = $login;
//            echo "..............." . $user->login;
            return $user;
        }
        return null;
    }

    public static function Login($login, $pass) {
        return User::Select($login, $pass);
    }
    
    public static function Load($login) {
        return User::Select($login);
    }
    
    public function Save() {
        return false;
    }
    
    public static function Add($params) {
        
    }

    public static function Set($params) {
        $user->name = $params['name'];
        $user->surname = $params['surname'];
        $user->isAdmin = false;
        //$user->login = $params['login'];
    }

    
    public function __toString()
    {
        return $this->name;
    }
}

function user_admin() {
    return (isset($_SESSION['user']) && $_SESSION['user']->isAdmin);
}