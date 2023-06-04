<?php
session_start();
class UserController extends Database
{

    public function insert(User $user)
    {
        $data = $this->getData($user);

        $sql = "INSERT INTO user(name,username,password,roles) VALUES(?,?,SHA2(?,256),?)";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bind_param('ssss', $data["name"],  $data["username"],  $data["password"],  $data["roles"]);
        return $stmt->execute();
    }

    public function activeUser($id)
    {
        if (self::isSuperAdmin()) {
            $sql = " UPDATE user SET enabled=true WHERE user_id=?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
        return false;
    }

    public  function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username=? AND password=SHA2(?,256) and enabled=true LIMIT 1";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        if (!empty($row)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] =  $row['user'];
            $_SESSION['roles'] =  $row['roles'];
        }
    }

    private function getData(User $user)
    {
        return [
            "name" => $user->getName(),
            "username" => $user->getUsername(),
            "password" => $user->getPassword(),
            "roles" => $user->getRoles()
        ];
    }

    public  function getUnenabledUsers()
    {
        if (self::isAdmin()) {
            $sql = "SELECT * FROM user WHERE enabled=false";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }



    public static function isConnected(): bool
    {
        return !empty($_SESSION["user_id"]);
    }

    public static function isAdmin(): bool
    {
        /**
         * (str_contains($_SESSION["roles"],"ADMIN")) : PHP 8
         */
        return strpos($_SESSION["roles"], "ADMIN") !== false;
    }

    public static function isSuperAdmin(): bool
    {
        /**
         * (str_contains($_SESSION["roles"],"ADMIN")) : PHP 8
         */
        return strpos($_SESSION["roles"], "SUPERADMIN") !== false;
    }

    public static function getCurrentUserId()
    {
        return $_SESSION["user_id"];
    }
}
