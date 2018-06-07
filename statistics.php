<?php
ini_set('display_errors', 0); error_reporting(-1); //debug
session_start();
require_once('config.php');

$id = $_SESSION['id1'];



$data = [[[]]];

$sql = "SELECT name as recognition, count(*) as count from badges LEFT JOIN record as r USING (badge_id) LEFT JOIN employees as e USING (emp_id) WHERE emp_id = '$id' GROUP BY badge_id";

$result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)) {

        $recognition = $row['recognition'];
        $data[$recognition]['count'][] = $row['count'];

    }

$sql = "SELECT count(*) as count from badges as b LEFT JOIN record as r ON (r.badge_id = b.badge_id) RIGHT JOIN employees as e USING (emp_id) WHERE emp_id = '$id' GROUP BY r.emp_id ";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$data['all']['count'][] = $row['count'];


$sql = "SELECT emp_id, count(*) as count from badges as b LEFT JOIN record as r ON (r.badge_id = b.badge_id) RIGHT JOIN employees as e USING (emp_id) WHERE r.emp_id = e.emp_id GROUP BY r.emp_id ORDER BY count DESC";

$result = mysqli_query($db, $sql);

    $line = 1;

    while($row = mysqli_fetch_assoc($result)) {

        if($row['emp_id'] == $id){
                
            $data['all']['rank'][] = $line;
        
        }

        $line++;

    }



for($i = 1; $i < 8; $i++){


    $sql = "SELECT emp_id, CONCAT(e.first_name, ' ', e.last_name) as user, name as recognition, count(*) as count from badges as b LEFT JOIN record as r ON (r.badge_id = b.badge_id) RIGHT JOIN employees as e USING (emp_id) WHERE b.badge_id = '$i' GROUP BY b.badge_id, e.emp_id ORDER BY count DESC";

    $result = mysqli_query($db, $sql);

    $line = 1;

        while($row = mysqli_fetch_assoc($result)) {

            $recognition = $row['recognition'];

            if($row['emp_id'] == $id){
                $data[$recognition]['rank'][] = $line;
            }

            $line++;

        }

}


return $data;

//var_dump($data);


?>