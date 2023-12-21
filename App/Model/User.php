<?php
include_once __DIR__ . '/../Connection/connect.php';
class User
{
    private $id;
    private $username;
    private $fullname;
    private $email;
    private $password;
    private $phone;
    private $rolename;

    public function getRoleName(){
       return $this->rolename;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getFullname()
    {
        return $this->fullname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function __construct($id, $username, $fullname, $email, $password, $phone,$rolename)
    {
        $this->id = $id;
        $this->username = $username;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->rolename = $rolename;
    }

    public static function creatUser($username, $fullname, $email, $password, $phone)
    {
        global $connect;
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(user_name , full_name , email , password , phone )
        values (:username , :fullname , :email , :password , :phone)";
        $statement = $connect->prepare($sql);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $hashpassword, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->execute();
        $userid = $connect->lastInsertId();
        $sql = "INSERT INTO user_role(user_id) value(:user_id)";
        $statement = $connect->prepare($sql);
        $statement->bindParam(':user_id', $userid, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function getByUsername($username = null)
    {
        global $connect;
        $sql = "SELECT users.*, role.name FROM users
        LEFT JOIN user_role ON users.id = user_role.user_id
        LEFT JOIN role ON user_role.role_id = role.id";
        if ($username !== null) {
            $sql .= " WHERE user_name = :username";
        }
        $statement = $connect->prepare($sql);
        if ($username !== null) {
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
        }
        if ($statement) {
            $statement->execute();
            $resultInstances = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($resultInstances) {
                $users = [];
                foreach ($resultInstances as $key => $result) {
                    $userInstance = new User($result['id'], $result['user_name'], $result['full_name'],
                        $result['email'], $result['password'], $result['phone'],$result['name']);
                    $users[] = $userInstance;
                }
                return $users;
            } else {
                return null;
            }
        } else {
            $errorInfo = $connect->errorInfo();
            echo "error: " . $errorInfo[2];
        }
    }
    
    public static function deleteUserAndRole($username)
    {
        global $connect;
        $sqlRole = "DELETE FROM user_role WHERE user_id = (SELECT id FROM users WHERE user_name = :username)";
        $statementRole =$connect->prepare($sqlRole);
        $statementRole->bindParam(':username',$username , PDO::PARAM_STR);
        $statementRole->execute();

        $sqlUser = "DELETE FROM users WHERE user_name = :username";
        $statementUser = $connect->prepare($sqlUser);
        $statementUser->bindParam(':username',$username,PDO::PARAM_STR);
        $statementUser->execute();
        
    }
    public static function updateUser($newUsername, $fullname, $email, $phone,$originalUsername)
    {
        global $connect;
    
        $sql = "UPDATE users SET user_name = :newUsername, full_name = :fullname, email = :email, phone = :phone WHERE user_name = :originalUsername";
    
        $statement = $connect->prepare($sql);
    

        $statement->bindParam(':newUsername', $newUsername, PDO::PARAM_STR);
        $statement->bindParam(':originalUsername', $originalUsername, PDO::PARAM_STR);
        $statement->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
    
        $statement->execute();
    }
    

}
$users = User::getByUsername();
