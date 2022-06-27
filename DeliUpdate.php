<?php 
include ('local.php');
$Rider_id = $_POST['Rider_id'];
$Status = $_POST['Status'];
$Order_ID = $_POST['Order_ID'];

if ($Status == "Confirmed") {
    $sql = "UPDATE rider_tbl SET 
        Jobstat_ID = 'JS_003'
        WHERE Rider_id = '$Rider_id'
        ";

    $sql2 = "UPDATE job_tbl SET 
            Jobstat_ID = 'JS_003'
            WHERE Rider_id = '$Rider_id'
            ";
    $sql3 = "UPDATE order_tbl SET 
            Delistat_ID = 'DS_001'
            WHERE Order_ID = '$Order_ID'
            ";
    $query_run = mysqli_query($conn,$sql);
    $query_run2 = mysqli_query($conn,$sql2);
    $query_run3 = mysqli_query($conn,$sql3);

    $data = "บันทึกข้อมูลสำเร็จ";
    echo json_encode($data);
}
else if ($Status == "Picked up") {
    $sql = "UPDATE rider_tbl SET 
        Jobstat_ID = 'JS_003'
        WHERE Rider_id = '$Rider_id'
        ";

    $sql2 = "UPDATE job_tbl SET 
            Jobstat_ID = 'JS_003'
            WHERE Rider_id = '$Rider_id'
            ";
    $sql3 = "UPDATE order_tbl SET 
            Delistat_ID = 'DS_002'
            WHERE Order_ID = '$Order_ID'
            ";
    $query_run = mysqli_query($conn,$sql);
    $query_run2 = mysqli_query($conn,$sql2);
    $query_run3 = mysqli_query($conn,$sql3);

    $data = "บันทึกข้อมูลสำเร็จ";
    echo json_encode($data);
}
else if ($Status == "On the way") {
    $sql = "UPDATE rider_tbl SET 
        Jobstat_ID = NULL,
        Riderstat_ID = 'RS_001'
        WHERE Rider_id = '$Rider_id'
        ";

    $sql2 = "UPDATE job_tbl SET 
            Jobstat_ID = 'JS_001'
            WHERE Rider_id = '$Rider_id'
            ";
    $sql3 = "UPDATE order_tbl SET 
            Delistat_ID = 'DS_003'
            WHERE Order_ID = '$Order_ID'
            ";
    $query_run = mysqli_query($conn,$sql);
    $query_run2 = mysqli_query($conn,$sql2);
    $query_run3 = mysqli_query($conn,$sql3);

    $data = "ทำงานเสร็จสิ้น";
    echo json_encode($data);
}

?>