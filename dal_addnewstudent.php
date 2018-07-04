<?php
include_once 'database.php';
include_once 'studentmaster.php';

$database = new Database();
$db = $database->getConnection();
$student = new Student($db);
$msg="";
 
    try{
    	if (empty($_POST["param_fname"])) {
            $msg = " Firstname is required ";
        }
        else
        {
             $student->firstname=$_POST["param_fname"];    
        }
    	if (empty($_POST["param_mname"])) {
            $msg.= "<br> Middlename is required ";
        }
        else
        {
             $student->middlename=$_POST["param_mname"];
        }

    	if (empty($_POST["param_lname"])) {
            $msg.= "<br> Lastname is required ";
        }
        else
        {
             $student->lastname=$_POST["param_lname"];
        }

        if (empty($_POST["param_nameoncerti"])) {
            $msg.= "<br> Certificate Name is required ";
        }
        else
        {
             $student->nameoncertificate=$_POST["param_nameoncerti"];
        }
        $student->gender=$_POST["param_gender"];

        if (empty($_POST["param_dob"])) {
            $msg.= "<br> Birthdate is required ";
        }
        else
        {
             $student->dob=$_POST["param_dob"];
        }

        if (empty($_POST["param_address"])) {
            $msg.= "<br> Address is required ";
        }
        else
        {
             $student->address=$_POST["param_address"];
        }

        $student->specialchild=$_POST["param_specialchild"];
        $student->certificatesubmitted=$_POST["param_certificatesubmitted"];
        $student->religion=$_POST["param_religion"];
        if (empty($_POST["param_caste"])) {
            $msg.= "<br> Caste is required ";
        }
        else
        {
             $student->caste=$_POST["param_caste"];
        }
		 
        if (empty($_POST["param_subcaste"])) {
            $msg.= "<br> Subcaste is required ";
        }
        else
        {
             $student->subcaste=$_POST["param_subcaste"];
        }

        $student->category=$_POST["param_category"];

        if (empty($_POST["param_fathername"])) {
            $msg.= "<br> Fathername is required ";
        }
        else
        {
             $student->fathername=$_POST["param_fathername"];
        }


        if (empty($_POST["param_mothername"])) {
            $msg.= "<br> Mothername is required ";
        }
        else
        {
             $student->mothername=$_POST["param_mothername"];
        }


        if (empty($_POST["param_mobileno"])) {
            $msg.= "<br> Mobilenumber is required ";
        }
        else
        {
             $student->mobilenumber=$_POST["param_mobileno"];
        }


        if (empty($_POST["param_alternateno"])) {
            $msg.= "<br> Alternate phonenumber is required ";
        }
        else
        {
             $student->alternateno=$_POST["param_alternateno"];
        }   	

        if (empty($_POST["param_studentadhaar"])) {
            $msg.= "<br> Student Adhaar number is required ";
        }
        else
        {
             $student->studentadhaar=$_POST["param_studentadhaar"];
        }

        if (empty($_POST["param_fatheradhaar"])) {
            $msg.= "<br> Father Adhaar number is required ";
        }
        else
        {
             $student->fatheradhaar=$_POST["param_fatheradhaar"];
        }

        if (empty($_POST["param_motheradhaar"])) {
            $msg.= "<br> Mother Adhaar number is required ";
        }
        else
        {
             $student->motheradhaar=$_POST["param_motheradhaar"];
        }       

         if (empty($_POST["param_ration"])) {
            $msg.= "<br> Ration card number is required ";
        }
        else
        {
             $student->rationcardno=$_POST["param_ration"];
        }

         if (empty($_POST["param_email"])) {
            $msg.= "<br> Emailid is required ";
        }
        else
        {
             $student->emailid=$_POST["param_email"];
        }   

        $student->fromanotherschool=$_POST["param_fromanotherschool"];
         if (empty($_POST["param_schoolname"])) {
            $msg.= "<br> School Name is required ";
        }
        else
        {
             $student->schoolname=$_POST["param_schoolname"];
        }      

         if (empty($_POST["param_schooladdress"])) {
            $msg.= "<br> School Address is required ";
        }
        else
        {
             $student->schooladdress=$_POST["param_schooladdress"];
        }

        if (empty($_POST["param_yearofpassing"])) {
            $msg.= "<br> Year of passing is required ";
        }
        else
        {
             $student->yearofpassing=$_POST["param_yearofpassing"];
        }

        if (empty($_POST["param_incomecertificate_no"])) {
            $msg.= "<br> Income Certificate number is required ";
        }
        else
        {
             $student->incomecertificateno=$_POST["param_incomecertificate_no"];
        }

        if (empty($_POST["param_castecertificate_no"])) {
            $msg.= "<br> Caste Certificate number is required ";
        }
        else
        {
             $student->castecertificateno=$_POST["param_castecertificate_no"];
        }
       
    	if(empty($msg))
        {


        if($student->create()){
            $msg=$student->student_usn;

           
             }
    // if unable to create , tell the user
    else{
         $msg= "Unable";
        }
         echo ($msg);
    }
    else
    {
    	 echo json_encode($msg);
    }
    }
    catch(Exception $ex)
    {
        $msg=$ex.errorMessage();
    }
    finally{
        //echo $msg;
    }
 
?>
