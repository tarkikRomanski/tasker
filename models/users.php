<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'model.php';
class User extends Model
{
    private $domen = 'localhost';
    private function isUser($nickname) {
        try {
            $query = "SELECT * FROM users WHERE nickname='$nickname'";
            $r = $this->pdo->query($query);
            $i = 0;
            $resRow = false;
            while ($row = $r->fetch())
            {
                $resRow[$i] = $row;
                $i++;
            }

            return $resRow;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function newUser($name, $nickname, $password) {
        if(!$this->isUser($nickname)){
            $query = 'INSERT INTO users (`nickname`, `name`, `password`) VALUES (?, ?, ?)';
            $result = $this->pdo->prepare($query);
            $result->execute([$nickname, $name, md5($password)]);
            return 9;
        } else {
            return 0;
        }
    }

    public function signInUser($nickname, $password) {
        $user = $this->isUser($nickname);
        if($user !== false){
            if($user[0]['password'] == md5($password)){
                $user_data = serialize($user[0]);
                setcookie('user', $user_data, time()+122400, '/', $this->domen);
                return 9;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }

    public function logOut(){
        setcookie('user', '', time()-3600, '/', $this->domen);
    }
}