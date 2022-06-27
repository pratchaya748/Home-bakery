<?php 
include ('local.php');
$Rider_id = $_POST['Rider_id'];

$sql = "UPDATE rider_tbl SET 
        Riderstat_ID ='RS_001',
        Jobstat_ID = NULL
        WHERE Rider_id = '$Rider_id'
        ";

$sql2 = "UPDATE job_tbl SET 
        Jobstat_ID ='JS_002',
        Rider_ID = NULL,
        Staff_ID = NULL
        WHERE Rider_id = '$Rider_id'
        ";
$query_run = mysqli_query($conn,$sql);
$query_run2 = mysqli_query($conn,$sql2);
$data = "ปฎิเสธงานแล้ว";
echo json_encode($data);

?>