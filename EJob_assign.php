<?php
session_start();
include ("local.php");

// jop_assign
$Job = $_POST['Job'];
$Rider = $_POST['Rider'];
$Staff = $_SESSION["Staff_ID"];

if (empty($Job)) { 
    echo '<script> alert("โปรดเลือก JobID")</script>'; 
}
else if (empty($Rider)) { 
    echo '<script> alert("โปรดเลือก RiderName")</script>'; 
}
elseif (!empty($Job) or !empty($Rider)) {
    $query1 = "UPDATE job_tbl SET 
                Rider_ID = '$Rider',
                Staff_ID ='$Staff',
                Jobstat_ID = 'JS_000'
                WHERE Job_ID = '$Job'
                ";
    $query2 = "UPDATE rider_tbl SET 
                Riderstat_ID = 'RS_002',
                Jobstat_ID ='JS_000'
                WHERE Rider_ID = '$Rider'
                ";
    $query_run1 = mysqli_query($conn,$query1);
    $query_run2 = mysqli_query($conn,$query2);
    $data = "บันทึกข้อมูลสำเร็จ";
    echo json_encode($data);
}

?>