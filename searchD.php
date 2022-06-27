<?php
require ('local.php');
// รับค่าจาก jQuery
$search = $_POST['search'];
$search = str_replace(' ','',$search);
$select = $_POST['select'];

if ($select == "RiderID") {
    $sql = "SELECT rider_tbl.Rider_id , delistat_tbl.Status
               FROM rider_tbl , job_tbl , order_tbl , delistat_tbl
               WHERE  rider_tbl.Rider_id = job_tbl.Rider_id AND 
               job_tbl.Order_ID = order_tbl.Order_ID AND 
               order_tbl.Delistat_ID =	delistat_tbl.Delistat_ID AND
               rider_tbl.Rider_id = '$search'";
}
else if ($select == "RiderName"){
    $sql = "SELECT rider_tbl.Rider_id , delistat_tbl.Status
    FROM rider_tbl , job_tbl , order_tbl , delistat_tbl
    WHERE  rider_tbl.Rider_id = job_tbl.Rider_id AND 
    job_tbl.Order_ID = order_tbl.Order_ID AND 
    order_tbl.Delistat_ID =	delistat_tbl.Delistat_ID AND
    rider_tbl.FirstName = '$search'";
}
else if ($select == "CustomID"){
    $sql = "SELECT rider_tbl.Rider_id , delistat_tbl.Status
               FROM customer_tbl , order_tbl , delistat_tbl , job_tbl , rider_tbl 
               WHERE    customer_tbl.Customer_ID = order_tbl.Customer_ID AND 
                        order_tbl.Delistat_ID = delistat_tbl.Delistat_ID AND
                        order_tbl.Order_ID =  job_tbl.Order_ID AND 
                        job_tbl.Rider_id = rider_tbl.Rider_id AND
                        customer_tbl.Customer_ID = '$search'";
}
else if ($select == "CustomName"){
    $sql = "SELECT rider_tbl.Rider_id , delistat_tbl.Status
               FROM customer_tbl , order_tbl , delistat_tbl , job_tbl , rider_tbl 
               WHERE    customer_tbl.Customer_ID = order_tbl.Customer_ID AND 
                        order_tbl.Delistat_ID = delistat_tbl.Delistat_ID AND
                        order_tbl.Order_ID =  job_tbl.Order_ID AND 
                        job_tbl.Rider_id = rider_tbl.Rider_id AND
                        customer_tbl.CustomerName = '$search'";
}
else if ($select == "Order_ID"){
    $sql = "SELECT rider_tbl.Rider_id , delistat_tbl.Status
               FROM customer_tbl , order_tbl , delistat_tbl , job_tbl , rider_tbl 
               WHERE    customer_tbl.Customer_ID = order_tbl.Customer_ID AND 
                        order_tbl.Delistat_ID = delistat_tbl.Delistat_ID AND
                        order_tbl.Order_ID =  job_tbl.Order_ID AND 
                        job_tbl.Rider_id = rider_tbl.Rider_id AND
                        order_tbl.Order_ID = '$search'";
}

$result = mysqli_query($conn,$sql);

$data = array();
while ($row = mysqli_fetch_object($result))
{
    $data[] = $row;
}
echo json_encode($data);
?>