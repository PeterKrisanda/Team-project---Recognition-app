<?php
ini_set('display_errors', 1); error_reporting(-1); //debug
require_once('config.php');

$id = $_GET['id'];

$sql = "SELECT name as recognition, count(*) as count from badges LEFT JOIN record as r USING (badge_id) LEFT JOIN employees as e USING (emp_id) WHERE emp_id = '$id' GROUP BY badge_id";

$result = mysqli_query($db, $sql);

$rows = array();


 while($r = mysqli_fetch_assoc($result)) {
	$rows[] = array($r['recognition'], $r['count']);
 }



 print json_encode($rows);

unset($rows);
?>