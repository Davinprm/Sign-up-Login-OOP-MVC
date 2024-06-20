<?php
class User
{
    private $db;

    public function __construct()
    {
        // instantiate d database class n save it to db prop
        $this->db = new Database();
    }

    // find user by email or username
    public function findUser($email, $username) 
    {
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password, userid) VALUES (:name, :email, :password, :uid)');

        // bind val
        $this->db->bind(':name', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':uid', $data['userid']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}