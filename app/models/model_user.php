<?php

interface IUser
{
    public function getAllUSers();
    public function getUserByEmail(string $email);
}
 
class Model_User extends Model implements IUser
{
    private $userList = [];
 
    public function __construct(array $userList) {
        foreach($userList as $user) {
            $this->userList[] = $user;
        }
    } 

    public static function Load(array $userList ) 
    {
        return new Model_User($userList);
    }

    public function getAllUSers() {
        return $this->userList;
    }

    public function getUserByEmail($email)
    {
        $key = array_search($email, array_column($this->userList, "email"));
        if (is_numeric($key)) {
          return $this->userList[$key];
        } 
        return false;
    }

}