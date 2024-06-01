<?php
$hostname='localhost';
$username='root';
$password = '';
$database = 'ccs06';
$con = mysqli_connect($hostname,$username,$password,$database);

$population = mysqli_query($con,"SELECT * FROM resident_information");
$popcount= mysqli_num_rows($population);

$voters = mysqli_query($con,"SELECT * FROM resident_information WHERE voteRegister = 'Voter'");
$votecount= mysqli_num_rows($voters);

$transaction = mysqli_query($con,"SELECT * FROM transaction");
$transcount= mysqli_num_rows($transaction);

$gender = mysqli_query($con, "SELECT * FROM resident_information WHERE gender = 'Male'");
$malecount = mysqli_num_rows($gender);

$gender = mysqli_query($con, "SELECT * FROM resident_information WHERE gender = 'Female'");
$femalecount = mysqli_num_rows($gender);
if(isset($_POST['submit']))
{
    $firstName=$_POST['firstName'];
    $middleName = $_POST ['middleName'];
    $lastName = $_POST ['lastName'];
    $gender =$_POST['gender'];
    $civilStatus = $_POST['civilStatus'];
    $birthday = $_POST['date'];
    $contactNumber = $_POST['contactNumber'];
    $precinct = $_POST['precinct'];
    $address = $_POST['address'];
    $voteRegister = $_POST['voteRegister'];
    $sql = "INSERT INTO resident_information (firstName, middleName, lastName, gender, civilStatus, birthday, contactNumber, precinct, address,voteRegister)
    VALUES ('$firstName', '$middleName', '$lastName', '$gender', '$civilStatus', '$birthday', '$contactNumber', '$precinct', '$address','$voteRegister')";

    mysqli_query($con, $sql);
}

?>