<?php
ini_set('display_errors', 1); error_reporting(-1); //debug
session_start();
require_once('config.php');



//$inputJSON = file_get_contents('php://input');
$inputJSON = file_get_contents('http://localhost:8080/tp/fakedata.php');
$input = json_decode($inputJSON,true);

//hodnotiaci
$id1 = $input['id1'];
$firstname1 = $input['firstname1'];
$lastname1 = $input['lastname1'];
//hodnoteny
$id2 = $input['id2'];
$firstname2 = $input['firstname2'];
$lastname2 = $input['lastname2'];


$_SESSION['id1'] = $id1;
$_SESSION['id2'] = $id2;



if (isset($id1, $id2, $firstname1, $firstname2, $lastname1, $lastname2)){

	$_SESSION['firstname1'] = $firstname1;
	$_SESSION['lastname1'] = $lastname1;

	$_SESSION['firstname2'] = $firstname2;
	$_SESSION['lastname2'] = $lastname2;


    $sql = "INSERT INTO employees (emp_id, first_name, last_name) VALUES ('$id1', '$firstname1', '$lastname1')";

	mysqli_query($db, $sql);

	$sql = "INSERT INTO employees (emp_id, first_name, last_name) VALUES ('$id2', '$firstname2', '$lastname2')";

	mysqli_query($db, $sql);


	header("Location: index.php");

}

else{
	echo 'Unsupported input format! (Parameters are empty or missing)';
}

?>