<?php
ini_set('display_errors', 0); error_reporting(-1); //debug
require_once('config.php');


$data = [[[]]];

for ($i = 1; $i < 8; $i++){
    $sql = "SELECT e.first_name as firstname, e.last_name as lastname, name as recognition, count(*) as count from badges as b LEFT JOIN record as r ON (r.badge_id = b.badge_id) RIGHT JOIN employees as e USING (emp_id) WHERE b.badge_id = '$i' GROUP BY b.badge_id, e.emp_id ORDER BY count DESC LIMIT 3";


    $result = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($result)) {

        $recognition = $row['recognition'];

    	$data[$recognition]['firstname'][] = $row['firstname'];
    	$data[$recognition]['lastname'][] = $row['lastname'];
    	$data[$recognition]['count'][] = $row['count'];

    }

}


$highscore = "SELECT e.first_name as firstname, e.last_name as lastname, count(*) as count from badges as b LEFT JOIN record as r ON (r.badge_id = b.badge_id) RIGHT JOIN employees as e USING (emp_id) WHERE r.emp_id = e.emp_id GROUP BY r.emp_id ORDER BY count DESC LIMIT 3";

$result = mysqli_query($db, $highscore);

while($row = mysqli_fetch_assoc($result)) {

        $data['highscore']['firstname'][] = $row['firstname'];
        $data['highscore']['lastname'][] = $row['lastname'];
        $data['highscore']['count'][] = $row['count'];

    }

return $data;


?>