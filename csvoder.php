<?php
require ("local.php");

$name = mysqli_query($conn,"SELECT * FROM customer_tbl WHERE CustomerName = '$Cname'");
$check_name = mysqli_fetch_assoc($name);

if(!empty($_FILES["csvF"]["name"])){  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["csvF"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["csvF"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           fgetcsv($file_data_2); 
           while($row = fgetcsv($file_data)) {   
                $OrderID = mysqli_real_escape_string($conn, $row[0]);
                $OrderID = str_replace(' ', '', $OrderID);
                $inputRiderDate = mysqli_real_escape_string($conn, $row[1]); 
                $pay  = mysqli_real_escape_string($conn, $row[2]); 
                $Cname  = mysqli_real_escape_string($conn, $row[3]);
                $Cname = str_replace(' ', '', $Cname);  
                $tel = mysqli_real_escape_string($conn, $row[4]);  
                $address = mysqli_real_escape_string($conn, $row[5]); 
                $road =  mysqli_real_escape_string($conn, $row[6]); 
                $city = mysqli_real_escape_string($conn, $row[7]);  
                $State = mysqli_real_escape_string($conn, $row[8]); 
                $zip = mysqli_real_escape_string($conn, $row[9]); 

                // check name
               $name = mysqli_query($conn,"SELECT * FROM customer_tbl WHERE CustomerName = '$Cname'");
               $check_name = mysqli_fetch_assoc($name);
               if ($check_name['CustomerName'] === $Cname) {

                   $search_id = mysqli_query($conn,"SELECT Customer_ID FROM customer_tbl WHERE CustomerName = '$Cname'");
                   $queryid = mysqli_fetch_assoc($search_id);
                   $queryid = $queryid['Customer_ID'];
                   $same_cus = "INSERT INTO order_tbl (Order_ID,Customer_ID,Payment_ID,Date,Delistat_ID) 
                               VALUES ('$OrderID','$queryid','$pay','$inputRiderDate','DS_000')";
                   $query_O = mysqli_query($conn,$same_cus);

                   // search order_id
                   $order = mysqli_query($conn,"SELECT * FROM job_tbl WHERE Order_ID = '$OrderID'");
                   $check_orderID = mysqli_fetch_assoc($order);

                   if ($check_orderID['Order_ID'] != $OrderID) {
                       // inseert jobs
                       $job = "INSERT INTO job_tbl (Order_ID,Jobstat_ID)
                       VALUES ('$OrderID','JS_002')";
                       $query_job = mysqli_query($conn,$job);  
                   }
                   
                   echo "บันทึกข้อมูลสำเร็จ";
               }
               else if ($check_name['CustomerName'] != $Cname){
                    $query2 = "INSERT INTO customer_tbl (CustomerName,Tel,Address,Road,District,Sub_District,Zipcode) 
                        VALUES ('$Cname','$tel','$address','$road','$city','$State','$zip')";
                    $query_run2 = mysqli_query($conn,$query2);

                    $search_id = mysqli_query($conn,"SELECT Customer_ID FROM customer_tbl WHERE CustomerName = '$Cname'");
                    $queryid = mysqli_fetch_assoc($search_id);
                    $queryid = $queryid['Customer_ID'];
                    $query1 = "INSERT INTO order_tbl (Order_ID,Customer_ID,Payment_ID,Date,Delistat_ID) 
                                VALUES ('$OrderID','$queryid','$pay','$inputRiderDate','DS_000')";
                    $query_run1 = mysqli_query($conn,$query1);

                   // search order_id
                   $order = mysqli_query($conn,"SELECT * FROM job_tbl WHERE Order_ID = '$OrderID'");
                   $check_orderID = mysqli_fetch_assoc($order);

                   if ($check_orderID['Order_ID'] != $OrderID) {
                       // inseert jobs
                       $job = "INSERT INTO job_tbl (Order_ID,Jobstat_ID)
                       VALUES ('$OrderID','JS_002')";
                       $query_job = mysqli_query($conn,$job);  
                   }

                    echo "บันทึกข้อมูลสำเร็จ";
                }
               else {
                    $data = "ผิดพลาด";
                    echo json_encode($data);
               }
           }

      }  
      else  
      {  
          echo 'Error1';  
      }  
 }  
 else  
 {  
     echo "Error2";  
 }  




?>