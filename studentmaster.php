<?php

class Student{
	//database connection and table name

private $conn;
private $table_name="student_master";

//object properties
public $student_usn;
public $class_no;
public $division;
public $firstname;
public $middlename;
public $lastname;
public $nameoncertificate;
public $gender;
public $dob;
public $address;
public $specialchild;
public $certificatesubmitted;
public $religion;
public $caste;
public $subcaste;
public $category;
public $fathername;
public $mothername;
public $mobileno;
public $alternateno;
public $studentadhaar;
public $fatheradhaar;
public $motheradhaar;
public $rationcard;
public $emailid;
public $fromanotherschool;
public $schoolname;
public $schooladdress;
public $yearofpassing;
public $incomecertificateno;
public $castecertificateno;
public $photo;

public function __construct($db){
	$this->conn=$db;
}

//create user
function create(){
	//write query

	try{
	$this->autogen();
	$query="INSERT INTO ".$this->table_name. "(student_usn,firstname,middlename,lastname,name_on_certificate,gender,birthdate,address,specialchild,certificatesubmitted,religion,caste,subcaste,categorycode,fathername,mothername,mobilenumber,alternate_number,student_adhaarno,father_adhaarno,mother_adhaarno,rationcardno,emailid,from_another_school,school_name,school_address,year_of_passing,incomecertificate_no,castecertificate_no) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->student_usn);
	$stmt->bindParam(2,$this->firstname);
	$stmt->bindParam(3,$this->middlename);
	$stmt->bindParam(4,$this->lastname);
	$stmt->bindParam(5,$this->nameoncertificate);
	$stmt->bindParam(6,$this->gender);
	$stmt->bindParam(7,$this->dob);
	$stmt->bindParam(8,$this->address);
	$stmt->bindParam(9,$this->specialchild);
	$stmt->bindParam(10,$this->yearofpassing);
	$stmt->bindParam(11,$this->religion);
	$stmt->bindParam(12,$this->caste);
	$stmt->bindParam(13,$this->subcaste);
	$stmt->bindParam(14,$this->category);
	$stmt->bindParam(15,$this->fathername);
	$stmt->bindParam(16,$this->mothername);
	$stmt->bindParam(17,$this->mobilenumber);
	$stmt->bindParam(18,$this->alternateno);
	$stmt->bindParam(19,$this->studentadhaar);
	$stmt->bindParam(20,$this->fatheradhaar);
	$stmt->bindParam(21,$this->motheradhaar);
	$stmt->bindParam(22,$this->rationcardno);
	$stmt->bindParam(23,$this->emailid);
	$stmt->bindParam(24,$this->fromanotherschool);
	$stmt->bindParam(25,$this->schoolname);
	$stmt->bindParam(26,$this->schooladdress);
	$stmt->bindParam(27,$this->yearofpassing);
	$stmt->bindParam(28,$this->incomecertificateno);
	$stmt->bindParam(29,$this->castecertificateno);
	//$stmt->bindParam(30,$this->photo);
	
 	if($stmt->execute()){
		return true;
	}
	else{
		return false;
	}
}
catch(Exception $ex){
	return $ex.errorMessage();
}
}

//autogeneration
function autogen(){
	$query="select count(student_usn) as c, max(student_usn) as m from ".$this->table_name;
	$stmt=$this->conn->prepare($query);
	$stmt->execute();

	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$this->countrows=$row['c'];
	if($this->countrows==0)
		$this->student_usn=1;
	else{
		$this->student_usn=$row['m'];
		$this->student_usn++;
	}
}

//select all data
function readAll(){
	$query="SELECT student_usn,firstname,middlename,lastname,gender,birthdate,address,specialchild,certificatesubmitted,religion,caste,subcaste,categorycode,fathername,mothername,mobilenumber,alternate_number,student_adhaarno,father_adhaarno,mother_adhaarno,rationcardno,emailid,incomecertificate_no,castecertificate_no FROM ". $this->table_name;
	
	$stmt=$this->conn->query($query);
	$output=array();
	$output=$stmt->fetchall(PDO::FETCH_ASSOC);
	return $output;
}

//update photo
function updatePhoto(){
	try{
	$query="update ". $this->table_name." set photo=? where student_usn=?";
	$stmt=$this->conn->prepare($query);

	//bind values
	$stmt->bindParam(1,$this->photo);
	$stmt->bindParam(2,$this->student_usn);
	
 	if($stmt->execute()){
		return true;
	}
	else{
		return false;
	}	
}
catch(Exception $ex){
	return $ex.errorMessage();
}

}

}
?>