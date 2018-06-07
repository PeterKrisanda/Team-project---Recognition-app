<?php
ini_set('display_errors', 1); error_reporting(-1); //debug
session_start();

$id1 = $_SESSION['id1'];
$id2 = $_SESSION['id2'];

	if (isset($_POST['id'])) {

    	recognize($id1, $id2, $_POST['id']);

   }else{
   	echo "bullshitman";
   }

function recognize($id1, $id2, $badgeid){

	if ($id1 == $id2){
		echo "Error: IDs must be different!";
		exit();
	}

	require 'config.php';

	//Check if both users exists in database
	$user1 = "SELECT 1 FROM employees WHERE emp_id = '$id1'";
	$user2 = "SELECT 1 FROM employees WHERE emp_id = '$id2'";

	$result1 = mysqli_query($db, $user1);
	$result2 = mysqli_query($db, $user2);

	$num_rows = mysqli_num_rows($result1) + mysqli_num_rows($result2);

	mysqli_free_result($result1);
	mysqli_free_result($result2);

	if ( $num_rows != 2 ){
		echo "Error: One or both users do not exist";
		exit();
	}


	$sql = "SELECT recognition_count FROM employees WHERE emp_id = '$id1'";

	$result = mysqli_query($db, $sql);

	$row = mysqli_fetch_assoc($result);


	$recognition_count = $row['recognition_count'];
	if ($recognition_count > 0){

		$sql = "INSERT INTO record (emp_id, recognition_from, badge_id, date) VALUES ('$id2', '$id1', '$badgeid', now())";

		$result = mysqli_query($db, $sql);
		
		if ($result){
			$sql = "UPDATE employees SET recognition_count = recognition_count - 1 WHERE emp_id = '$id1'";
			mysqli_query($db, $sql);
			echo "Success!";
		}

		else{
			echo "Error: DB query failed!";
		}


	}

	else{
		echo "You already voted 3x this month!";
	}


}

?>