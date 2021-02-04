<?php

/**
 * Description of Login
 *
 * @author hp
 */
class Login {

    function authenticate_user($User) {
        //this functiion is used to authenticate the user by usinng only the user name and reterning details of the user
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetUserByUsername(:username)";
        $stm = $conn->prepare($query);
        
        
        $stm->execute(array(':username' => $User->username));
        
        if ($stm->rowCount() > 0) {

            //not the below code retuns an assaciative arrey with all the users infomation 
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    function verify_password($user_data, $entered_password) {

        //$hashedPassword = password_hash($entered_password, PASSWORD_DEFAULT);
        //This function is used to verify if the entered password is the same as the one in the databes 
        //so as to authenticate the user
        $hushed_password = $user_data['Password'];
        $verifid_password = password_verify($entered_password, $hushed_password);


        return $verifid_password;
    }

    

   

    public static function redirect_user($User) {
        //This function is used to redirect useres based on their user type
        $user_type_id = $User['UserTypeID'];
        

        if ($user_type_id == 1) {
            Login::set_sessions($User['UserName'], $User['PublicID'],$User['Name'],$User['ContactNo']);
            header('location:/survay/view/admin/');
            
            
        }else if ($user_type_id == 2) {
            Login::set_sessions($User['UserName'], $User['PublicID'],$User['Name'],$User['ContactNo']);
            header('location:/survay/view/reviwere/');
            
            
        }else {
             header('location:/survay/');
            //redirect to login page pnotify
        }
       
    }

    public static function set_sessions($username, $public_id,$user_names,$contact_no) {
        // This functionis used to set the username and public id session 
        // so as to use it the the system 
        $_SESSION['sms_username'] = $username;
        $_SESSION['sms_public_id'] = $public_id;
        $_SESSION['sms_names'] = $user_names;
       
        $_SESSION['sms_contact_no'] = $contact_no;
        
    }

    
    
   

}
