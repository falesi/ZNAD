<script src="../../js/Jnotify/jquery-1.12.4.min.js" type="text/javascript"></script>
<link href="../../js/Jnotify/jnoty.min.css" rel="stylesheet" type="text/css"/>
<script src="../../js/Jnotify/jnoty.min.js" type="text/javascript"></script>
<?php

     require_once '../super/SessionStart.php';
     
   
     
    require_once '../../db_connection/dbconfig.php';

   
     require_once '../../model/SuperModel.php';
     
  
    require_once '../../entities/EmailService.php';
   
 
 
 if (isset ($_POST['btn_add_survaymangment']))
 {
       
     $username = trim(filter_input(INPUT_POST, 'username', FILTER_DEFAULT));
      $password = trim(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
      $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT));
      $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT));
      $other_name = trim(filter_input(INPUT_POST, 'other_name', FILTER_DEFAULT));
      $nrc = trim(filter_input(INPUT_POST, 'nrc', FILTER_DEFAULT));
      $passport = trim(filter_input(INPUT_POST, 'passport', FILTER_DEFAULT));
       $contact_no = trim(filter_input(INPUT_POST, 'contact_no', FILTER_DEFAULT));
      $date_of_birth = trim(filter_input(INPUT_POST, 'dob', FILTER_DEFAULT));
      $marital_status_id = trim(filter_input(INPUT_POST, 'marital_status_id', FILTER_DEFAULT));
      $gender_id = trim(filter_input(INPUT_POST, 'gender_id', FILTER_DEFAULT));
      $email_address = trim(filter_input(INPUT_POST, 'email_address', FILTER_DEFAULT));
      
       $position_id = trim(filter_input(INPUT_POST, 'position_id', FILTER_DEFAULT));
   
       
       
      
      $district_id = trim(filter_input(INPUT_POST, 'district_id', FILTER_DEFAULT));
      $zip_code = trim(filter_input(INPUT_POST, 'zip_code', FILTER_DEFAULT));
      $primary_address = trim(filter_input(INPUT_POST, 'parmary_address', FILTER_DEFAULT));
      $secondary_address = trim(filter_input(INPUT_POST, 'secondary_address', FILTER_DEFAULT));
      $updatedby  = $_SESSION['sms_username'];
      
      
    
      
         
      
       $hassed_passsword =  password_hash($password, PASSWORD_DEFAULT);
    
    
    if (!isset($secondary_address) || $secondary_address == Null || $secondary_address == "" ){
        
        $secondary_address = 'NULL';
    }
    
    
   if (!isset($nrc) || $nrc == Null || $nrc == "" ){
        
        $nrc = 'NULL';
    }
    
    
     if (!isset($passport) || $passport == Null || $passport == "" ){
        
        $passport = 'NULL';
    }
    
    
    
     if (!isset($other_name) || $other_name == Null || $other_name == "" ){
        
        $other_name = 'NULL';
    }
    
    if (!isset($email_address) || $email_address == Null || $email_address == "" ){
        
        $email_address = 'NULL';
    }
  
   // print_r($nrc.' '.$passport.' '.$username.', '.$hassed_passsword.', '.$first_name.' , '.$last_name.', '.$other_name.', '.$contact_no.', '.$gender_id.', '.$marital_status_id.', '.$date_of_birth.', '.$position_id.', '.$updatedby.', '.$district_id.', '.$primary_address.', '.$secondary_address.', '.$email_address);
      if(SuperModel::create_user($nrc,$passport,$username,$hassed_passsword,$first_name,$last_name,$other_name,$contact_no,$gender_id,$marital_status_id,$date_of_birth,$position_id,$updatedby,$district_id,$primary_address,$secondary_address,$email_address))
              {
           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/survay/view/admin/addadmin.php')},
            });   
            }); 
            </script>"; 
               
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('User Not Successfully Added change username and contact no then try again', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/survay/view/admin/addadmin.php')},
            });   
            }); 
            </script>"; 
              }
 }
 
 else if (isset ($_POST['btn_add_survey']))
 {
      $surveyname = trim(filter_input(INPUT_POST, 'surveyname', FILTER_DEFAULT));
      $startdate = trim(filter_input(INPUT_POST, 'startdate', FILTER_DEFAULT));
      $enddate = trim(filter_input(INPUT_POST, 'enddate', FILTER_DEFAULT));
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      
     $updatedby  = $_SESSION['sms_username'];
      
   // print_r($nrc.' '.$passport.' '.$username.', '.$hassed_passsword.', '.$first_name.' , '.$last_name.', '.$other_name.', '.$contact_no.', '.$gender_id.', '.$marital_status_id.', '.$date_of_birth.', '.$position_id.', '.$updatedby.', '.$district_id.', '.$primary_address.', '.$secondary_address.', '.$email_address);
      if(SuperModel::create_survaey($surveyname,$discription,$startdate,$enddate,$updatedby))
              {
           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Survey Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/survay/view/admin/ViewSurvey.php')},
            });   
            }); 
            </script>"; 
               
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Error Occured while adding survey please try again later', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/survay/view/admin/ViewSurvey.php')},
            });   
            }); 
            </script>"; 
              }
 }
 else if (isset ($_POST['btn_add_survey_d']))
 {
$surveyname = trim(filter_input(INPUT_POST, 'surveyname', FILTER_DEFAULT));
      $startdate = trim(filter_input(INPUT_POST, 'startdate', FILTER_DEFAULT));
      $enddate = trim(filter_input(INPUT_POST, 'enddate', FILTER_DEFAULT));
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      
     $updatedby  = $_SESSION['sms_username'];
      
   // print_r($nrc.' '.$passport.' '.$username.', '.$hassed_passsword.', '.$first_name.' , '.$last_name.', '.$other_name.', '.$contact_no.', '.$gender_id.', '.$marital_status_id.', '.$date_of_birth.', '.$position_id.', '.$updatedby.', '.$district_id.', '.$primary_address.', '.$secondary_address.', '.$email_address);
      if(SuperModel::create_survaey($surveyname,$discription,$startdate,$enddate,$updatedby))
              {
          
        $survey_id =  SuperModel:: get_survey_id();
          
           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Survey Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/survay/view/admin/QestionReporsitory.php?name=$surveyname&surveyid=$survey_id')},
            });   
            }); 
            </script>"; 
            
           
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Error Occured while adding survey please try again later', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/survay/view/admin/AddSurveyDynamically.php')},
            });   
            }); 
            </script>"; 
              }
 }
 
 else if (isset ($_POST['btn_add_qestion']))
 {
      $survey_id = trim(filter_input(INPUT_POST, 'survey_id', FILTER_DEFAULT));
      $startdate = trim(filter_input(INPUT_POST, 'startdate', FILTER_DEFAULT));
      $enddate = trim(filter_input(INPUT_POST, 'enddate', FILTER_DEFAULT));
      $discription = trim(filter_input(INPUT_POST, 'discription', FILTER_DEFAULT));
      
     $updatedby  = $_SESSION['sms_username'];
      
   // print_r($nrc.' '.$passport.' '.$username.', '.$hassed_passsword.', '.$first_name.' , '.$last_name.', '.$other_name.', '.$contact_no.', '.$gender_id.', '.$marital_status_id.', '.$date_of_birth.', '.$position_id.', '.$updatedby.', '.$district_id.', '.$primary_address.', '.$secondary_address.', '.$email_address);
      if(SuperModel::create_survaey($surveyname,$discription,$startdate,$enddate,$updatedby))
              {
          
        $survey_id =  SuperModel:: get_survey_id();
          
           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Survey Sccessfully Added :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/survay/view/admin/QestionReporsitory.php?name=$surveyname&surveyid=$survey_id')},
            });   
            }); 
            </script>"; 
            
           
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Error Occured while adding survey please try again later', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/survay/view/admin/AddSurveyDynamically.php')},
            });   
            }); 
            </script>"; 
              }
 }
 else if (isset ($_GET['btn_deactivate_survey']))
 {
      $deactivate_survay_id = trim(filter_input(INPUT_GET, 'deactivate_survay_id', FILTER_DEFAULT));
     
      
     
      
 
     if(SuperModel::deactivate_survey($deactivate_survay_id))
              {
          
        
          
           echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Survey Sccessfully Deactivated :)', {
            sticky: false,
            header: 'Notification',
            theme: 'jnoty-success',
            close: function() {window.location.replace('/survay/view/admin/ViewSurvey.php')},
            });   
            }); 
            </script>"; 
            
           
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Error Occured while deactivating survey please try again later', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/survay/view/admin/ViewSurvey.php')},
            });   
            }); 
            </script>"; 
              }
 }
 else if (isset ($_POST['btn_suvayer_data']))
 {
     
     
     $survay_id = trim(filter_input(INPUT_POST, 'survey_id', FILTER_DEFAULT));
      $name = trim(filter_input(INPUT_POST, 'name', FILTER_DEFAULT));
     $email = trim(filter_input(INPUT_POST, 'user_email', FILTER_DEFAULT));
          
     if (!isset($email) || $email == Null || $email == "" ){
        
        $email = 'NULL';
    }
     $sequenceNo = SuperModel::get_sequence_id(5);
      
 
     if(SuperModel::add_saveyour_details($survay_id,$name,$email,$sequenceNo))
              {
          
        
        header("Location: /survay/suvayfeedback/Survey.php?id=$survay_id&suvaypurid=$sequenceNo");
            
           
       
          }else
              {
              echo "<script>               
            $(document).ready(
             
            function(){
                
               $.jnoty('Error while submiting data please try again later', {
            sticky: false,
            header: 'Erro',
            theme: 'jnoty-danger',
            close: function() {window.location.replace('/survay/suvayfeedback/SaveyourData.php?id='.$survay_id)},
            });   
            }); 
            </script>"; 
              }
 }
 
 
  else if (isset ($_POST['Test']))
 {
   echo'test';
 }
 
 