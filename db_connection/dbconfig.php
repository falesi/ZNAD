<?php

class Connection{
    
    
  public function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "survay_db";

//Create connection
        
        try{
        $conn = new PDO(    'mysql:host='.$servername.';dbname='.$dbname.';charset=latin1',
                            ''.$username.'',
                            ''.$password.'',
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_PERSISTENT => false
                    )
                );
        

//        }
            return  $conn;
         } catch (PDOException $e) {
            print "Connection Error: ". "<br/>";
            $conn=Null;
            die();
}
  


         }   
  
}