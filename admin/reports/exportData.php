<?php
include_once 'connectMySql.php';

require_once('initialize.php');
require_once('classes/DBConnection.php');
require_once('classes/SystemSettings.php');

$query = "SELECT * FROM schedule_list";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $delimiter = ",";
    $filename = "schedule-reports" . date('Y-m-d') . ".csv";

    $f = fopen('php://output', 'w'); 

    $fields = array('title', 'category_id', 'names', 'emails', 'schedule_from');
    fputcsv($f, $fields, $delimiter);

    while ($row = $result->fetch_assoc()) {
        $lineData = array($row['title'], $row['category_id'], $row['names'], $row['emails'], $row['schedule_from']);
        fputcsv($f, $lineData, $delimiter);
    }

    fseek($f, 0);

    // Set appropriate headers for file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    fpassthru($f);
} 

exit;
?>
