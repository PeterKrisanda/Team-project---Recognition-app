<?php
session_start();
include('session.php');
include('../config.php');

$sql = "SELECT CONCAT(e.first_name, ' ', e.last_name) as user, name as recognition, count(*) as count from badges as b LEFT JOIN record as r ON (r.badge_id = b.badge_id) RIGHT JOIN employees as e USING (emp_id) WHERE r.emp_id = e.emp_id GROUP BY b.badge_id, e.emp_id ORDER BY emp_id";

$result = mysqli_query($db,$sql);

$num_fields = mysql_num_fields($result);
$headers = array();

for ($i = 0; $i < $num_fields; $i++) {
    $headers[] = mysql_field_name($result , $i);
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}



?>

