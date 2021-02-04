<?php

/**
 * Description of User
 *
 * @author HP
 */
class User {
    public $username ;
    public $password;
   
    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    
}
