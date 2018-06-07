<?php
ini_set('display_errors', 0); error_reporting(-1); //debug

$id = $_SESSION['id2'];

$sql = "SELECT date, b.name, badge_id, r.emp_id, recognition_from, CONCAT(first_name,' ',last_name) as recogfrom FROM record as r LEFT JOIN badges as b USING (badge_id) LEFT JOIN employees ON recognition_from=employees.emp_id WHERE r.emp_id = '$id' ORDER BY date DESC LIMIT 5";

$result = mysqli_query($db, $sql);


$data = [[]];

while($row = mysqli_fetch_assoc($result)) {

	$data['date'][] = $row['date'];
	$data['badge'][] = $row['name'];
	$data['id'][] = $row['badge_id'];
    $data['name'][] = $row['recogfrom'];

 
}


foreach ($data['date'] as $key => $value){

	$time = strtotime($data['date'][$key]);
	$data['date'][$key] = humanTiming($time). ' ago';
}


/*
echo $data['date'][1];
echo $data['badge'][1];
var_dump($data);
*/


return $data;

unset($data);

function humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}






?>