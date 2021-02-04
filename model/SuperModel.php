<?php

class SuperModel{
    
    //Survay Mangemnt
    //Dashboard Start 
      public static function get_dashboard_numbers() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetDashboaredNumbers();";
       
        $stm = $conn->query($query);
       
         $row =$stm->fetch(PDO::FETCH_ASSOC);
            return $row;
      
   }
    ////Dashboard End
    //Reports Start 
      public static function get_user_role_matrix() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetUserRoleMatrixReport();";
        $stm = $conn->query($query);
     
            return $stm;
      
   }
    //Reports End
    
    //Methods Section
    //creating of sys user
    public static function create_user($nrc,$passport,$username,$password,$first_name,$last_name,$other_name,$contact_no,$gender,$marital_status,$date_of_birth,$usertypeid,$updatedby,$district,$parmary_address,$secondary_address,$email_address) {
        //the below function creates a teacher in the database
        
        //print_r($Teacher);
        if ($usertypeid==1){
            $sequenceNo = SuperModel::get_sequence_id(1);
        }elseif($usertypeid==3)
            {
             $sequenceNo = SuperModel::get_sequence_id(3);
            }
        else{
            $sequenceNo = SuperModel::get_sequence_id(2);
        }
        
        
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO `usermaster` (`PublicID`, `NRC`, `Passport`, `UserName`, `Password`, `FirstName`, `LastName`, `OtherName`, `EmailAddress`, `ContactNo`, `GenderID`, `MaritalStatusID`, `DOB`, `UserTypeID`,`UpdatedBy`, `IsActive`) VALUES ('$sequenceNo', '$nrc','$passport','$username','$password','$first_name','$last_name','$other_name', '$email_address','$contact_no','$gender','$marital_status','$date_of_birth','$usertypeid','$updatedby', '1');";
           
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();

            
//                
////                //Insets data in address table                                                                                                  
            $query3 = "INSERT INTO `address` (`PrimaryAddress`, `SecondaryAddress`, `DistrictID`, `UserMaterID`) VALUES ('$parmary_address', '$secondary_address', '$district', '$sequenceNo');";
            $stm2 = $conn->prepare($query3);
            $stm2->execute();

            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           //echo $exc->getMessage();
            return FALSE;
        }
    }
    
     public static function add_saveyour_details($survay_id,$name,$email,$sequenceNo) {
       //this function is used to add ditils of a saveyour to the responsemaster survayresponsemaster
        try {
            
             
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user survayresponsemaster tabble
            $query1 = "INSERT INTO `survay_db`.`survayresponsemaster` (`SurvayResponseMasterID`,`SurvayMasterID`, `Name`, `EmailAddres`) VALUES (:sequenceNo,:survay_id, :name, :email);";
           
            $stm = $conn->prepare($query1);
            $stm->bindParam(':sequenceNo', $sequenceNo);
            $stm->bindParam(':survay_id', $survay_id);
            $stm->bindParam(':name', $name);
            $stm->bindParam(':email', $email);
            
            $stm->execute();

   
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
     public static function add_survey_response($suvey_id,$suveyour_id,$qestion,$response,$qestionno) {
       //this function is used to add ditils of a saveyour to the responsemaster survayresponsemaster
        try {
            
             
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user survayresponsemaster tabble
            $query1 = "INSERT INTO `survay_db`.`survayresponse` (`SurvayMasterID`, `SurvayResponseMasterID`, `Qestion`, `Response`,`QestionNo`) VALUES (:suvey_id, :suveyour_id, :qestion, :response,:qestionno);";
           
            $stm = $conn->prepare($query1);
            $stm->bindParam(':suvey_id', $suvey_id);
            $stm->bindParam(':suveyour_id', $suveyour_id);
            $stm->bindParam(':qestion', $qestion);
            $stm->bindParam(':response', $response);
            $stm->bindParam(':qestionno', $qestionno);
            
            $stm->execute();

   
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           echo $exc->getMessage();
            return FALSE;
        }
    }
    
      public static function update_qestion($question_id,$question_no,$question,$updatedby) {
     
      
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "UPDATE `survay_db`.`survaydeatils` SET `QestionNo`=:question_no, `Qestion`=:question, `UpdatedBy`=:updatedby WHERE  `SurvayDeatilsID`=:question_id;";
           
            $stm = $conn->prepare($query1);
            $stm->bindParam(':question_no', $question_no);
            $stm->bindParam(':question', $question);
            $stm->bindParam(':updatedby', $updatedby);
            $stm->bindParam(':question_id', $question_id);
            $stm->execute();
            
            
            
            $query2 = "UPDATE `survay_db`.`survayqestions` SET `QestionNo`=:question_no, `Qestion`=:question, `UpdatedBy`=:updatedby WHERE  `SurvayDeatilsID`=:question_id;";
           
            $stm2 = $conn->prepare($query2);
            $stm2->bindParam(':question_no', $question_no);
            $stm2->bindParam(':question', $question);
            $stm2->bindParam(':updatedby', $updatedby);
            $stm2->bindParam(':question_id', $question_id);
            $stm2->execute();
            
           
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
          echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
     public static function create_survaey($surveyname,$discription,$startdate,$enddate,$updatedby) {
        //the below function creates a teacher in the database
       
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();

           
            //Insets data into user master tabble
            $query1 = "INSERT INTO `survay_db`.`survaymaster` (`SurvayName`, `Discription`, `StartDate`, `EndDate`, `IsActive`, `UpdatedBy`) VALUES ('$surveyname', '$discription', '$startdate', '$enddate', '1', '$updatedby');";
           
            $stm = $conn->prepare($query1);
            
           
            $stm->execute();

  
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           echo $exc->getMessage();
            return FALSE;
        }
    }
    
    
    public static function add_survey_details($survey_masterid,$qestion,$qestion_options,$updatedby) {
        //the below function creates a teacher in the database
        
        
         $qestionNo = SuperModel::get_qestion_no($survey_masterid);
     
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
          
            $conn->beginTransaction();
          
            
        
        
        
           
            //Insets data into user master tabble
            $query = "INSERT INTO `survay_db`.`survaydeatils` (`SurvayMasterID`, `QestionNo`, `Qestion`, `AnswerOptions`, `UpdatedBy`) VALUES (:survey_masterid, :qestion_no, :qestion, :qestion_options, :updatedby);";
           
            
            $stm = $conn->prepare($query);
            
            $stm->bindParam(':survey_masterid', $survey_masterid);
            $stm->bindParam(':qestion_no', $qestionNo);
            $stm->bindParam(':qestion', $qestion);
            $stm->bindParam(':qestion_options', $qestion_options);
            $stm->bindParam(':updatedby', $updatedby);
            $stm->execute();
            
         

  
            
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
             
           echo $exc->getMessage();
            return FALSE;
        }
    }
       
    
    
    
    
    public static function delet_qestion($qestion_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL DeletSurveyDetailsByID($qestion_id);";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
   
   
   
   
   
   
   
   public static function get_survey_responses($savayour_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetSurveyResponseByRespondantID('$savayour_id');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
    public static function deactivate_survey($susrvey_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL DeactivateSurvey($susrvey_id);";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
    
   
     public static function get_survey_respondants_by_surveyID($survey_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetSurveyRespondantsBySurveyID('$survey_id');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
    
    public static function get_all_survays_by_date($start_date, $end_date) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllSuveysByDateReport('$start_date', '$end_date');";
        $stm = $conn->query($query);
      
            return $stm;
      
   }
    public static function get_all_added_survays() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllSuveys();";
        $stm = $conn->query($query);
     
            return $stm;
      
   }
   
   
   
   
   
    public static function get_all_other_added_survays_($survay_id) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetAllOtherSuveys($survay_id);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
      public static function get_empty_result() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetEmptyResult();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   public static function get_survey_id() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetRecentlyAddSurveyID();";
    
      
        $stm = $conn->query($query);
       
         $row =$stm->fetch(PDO::FETCH_ASSOC);
         
         return $row['SurveyID'];
      
   }
   
   public static function get_survey_by_id($SurvayMasterID) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetSuveyByID('$SurvayMasterID');";
    
      
        $stm = $conn->query($query);
       
        $row =$stm->fetch(PDO::FETCH_ASSOC);
         
         return $row;
      
   }
   
    public static function get_survey_qestions($SurveyMaterID) {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetSurvaeyQestions('$SurveyMaterID');";
        $stm = $conn->query($query);
    
         
            return $stm;
      
   }
   
    public static function get_user_types() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetUserTypes();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
   public static function get_qestion_no($SurveyMasterID) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetQestionNo($SurveyMasterID);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['QestionNo'];
      
    }
   
    
    public static function check_survey_valid_date($severmaster_id) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL CheckValidDateFroSurvey($severmaster_id);";
        $stm = $conn->query($query);
      
         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['iSValid'];
      
    }
    
    public static function get_sequence_id($sequence_number) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetSequence($sequence_number);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row['SequnceNumber'];
      
    }
    
    
     public static function get_current_survey_qestion_by_id($servey_detals_id) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetCurrentSurveyQestionByID($servey_detals_id );";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row;
      
    }
    
    public static function get_qestion_by_id($qestion_id) {
      
        $Connection = new Connection();
        $conn = $Connection->connect();

        
        
        $query = "CALL GetQestionByID($qestion_id);";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();

         $row = $stm->fetch(PDO::FETCH_ASSOC);
         
            return $row;
      
    }
    
    
    
     function get_districts_by_provinceid($provinceid) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetDistrictByProvinceId(:province);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':province' => $provinceid));

        if ($stm->rowCount() > 0) {

             //What the beow lines of code are doing is they are loading a districts and displying them in a dropdown using php

            echo "  <div class=''>  <div >    <select class='form-control' id='district_id' name='district_id' required='required' ><option value='' selected disabled=''>Select District</option>";
            while ( $row = $stm->fetch(PDO::FETCH_ASSOC)) {


                echo "<option value=" . $row['districtId'] . ">" . $row['name'] . "</option>";
                //echo "<option vlaue='21'>".$row['name']."</option>";name
            }

            echo"</select><br>";
        } else {

            echo "  <div > <select class='form-control' name='district_id' required='required'><option value=''  selected disabled='' >Select District</option> </select><br>  </div>";
        }
            
        
        
    }
    
    
    
    
     function get_question_by_survey_id($survey_id) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetQestionDetailsBySurveyID(:survey_id);";


     
        $stm = $conn->prepare($query);
        $stm->execute(array(':survey_id' => $survey_id));

        return $stm;
        
    }
    
    
    function get_added_questions_by_survey_id($survey_id) {
        //This function is used to load the districts whih a given province ID
         $Connection = new Connection();
        $conn = $Connection->connect();

        // this is the stored procidure from the datbaes that is loading the destrics after passing in an province ID 
        $query = "CALL GetSurveyQestionsByID (:survey_id);";
                        

     
        $stm = $conn->prepare($query);
        $stm->execute(array(':survey_id' => $survey_id));

        return $stm;
        
    }
    
    
    
    
      
     public static function add_email_data($EmailData) {
        //the below function creates a session in the databes for every log in 
        try {
            $Connection = new Connection();
            $conn = $Connection->connect();
            
            $conn->beginTransaction();
      
            $query = "INSERT INTO `emailservice` (`EmailSerial`, `EmailAddress`, `EmailSubject`, `SendData`, `Status`, `UpdatedBy`) VALUES (:EmailSerial, :EmailAddress, :EmailSubject, :SendData, :Status, :UpdatedBy);";
            $stm = $conn->prepare($query);
            $stm->execute(array(':EmailSerial'=>$EmailData->EmailSerial,':EmailAddress'=>$EmailData->EmailAddress, ':EmailSubject'=>$EmailData->EmailSubject, ':SendData'=>$EmailData->SendData,':Status'=>$EmailData->Status, ':UpdatedBy'=>$EmailData->UpdatedBy));

             
            $conn->commit();
            $conn = Null;
            return TRUE;
        } catch (Exception $exc) {
            $conn->rollBack();
            echo $exc->getMessage();
            return FALSE;
        }
    }
    //Survay Mangemnt End
    
    
    
   
           public static function get_provinces() {
       
        $Connection = new Connection();
        $conn = $Connection->connect();

        $query = "CALL GetProvinces();";
        $stm = $conn->query($query);
       // $stm->execute(array(':username' => $User->username));
         //$stm->execute();
         //print_r($stm);
       
         
            return $stm;
      
   }
   
   
           
    
     
    }
    
       
         
   