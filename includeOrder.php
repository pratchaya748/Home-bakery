<?php
include ("local.php");

    // order
    $OrderID = $_POST['OrderID'];
    $OrderID = str_replace(' ', '', $OrderID);
    $Cname = $_POST['CustomerName'];
    $Cname = str_replace(' ', '', $Cname);
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $road = $_POST['road'];
    $city = $_POST['city'];
    $State = $_POST['State'];
    $zip = $_POST['zip'];
    $pay = $_POST['pay'];
    $inputRiderDate = $_POST['inputRiderDate'];

    $name = mysqli_query($conn,"SELECT * FROM customer_tbl WHERE CustomerName = '$Cname'");
    $check_name = mysqli_fetch_assoc($name);

        if (empty($OrderID)) { 
            echo '<script> alert("โปรดใส่ OrderID")</script>'; 
        }
        else if (empty($Cname)) { 
            echo '<script> alert("โปรดใส่ ชื่อ-สกุล")</script>'; 
        }
        else if (empty($tel)) { 
            echo '<script> alert("โปรดใส่ หมายเลขโทรศัพท์")</script>'; 
        }
        else if (empty($address)) { 
            echo '<script> alert("โปรดใส่ ที่อยู่")</script>';  
        }
        else if (empty($road)) { 
            echo '<script> alert("โปรดใส่ ถนน")</script>'; 
        }
        else if (empty($city)) { 
            echo '<script> alert("โปรดใส่ แขวง")</script>'; 
        }
        else if (empty($State)) { 
            echo '<script> alert("โปรดใส่ เขต")</script>';  
        }
        else if (empty($zip)) { 
            echo '<script> alert("โปรดใส่ รหัสไปรษณีย์")</script>';  
        }
        else if (empty($pay)) { 
            echo '<script> alert("โปรดใส่ สถานะชำระเงิน")</script>';  
        }
        else if (empty($inputRiderDate)) { 
            echo '<script> alert("โปรดใส่วันที่และเวลา")</script>'; 
        }
        else if (!empty($OrderID) or !empty($Cname) or !empty($tel) or  !empty($address) or !empty($road) or 
                !empty($city) or !empty($State) or !empty($zip) or !empty($pay) or !empty($inputRiderDate) ) {

                    // check name
                    $name = mysqli_query($conn,"SELECT * FROM customer_tbl WHERE CustomerName = '$Cname'");
                    $check_name = mysqli_fetch_assoc($name);

                    if ($check_name['CustomerName'] === $Cname) {
                        // ค้นหา Customer_ID 
                        $search_id = mysqli_query($conn,"SELECT Customer_ID FROM customer_tbl WHERE CustomerName = '$Cname'");
                        $queryid = mysqli_fetch_assoc($search_id);
                        $queryid = $queryid['Customer_ID'];

                        // insert order
                        $same_cus = "INSERT INTO order_tbl (Order_ID,Customer_ID,Payment_ID,Date,Delistat_ID) 
                                    VALUES ('$OrderID','$queryid','$pay','$inputRiderDate','DS_000')";
                        $query_O = mysqli_query($conn,$same_cus);

                        // search order_id
                        $order = mysqli_query($conn,"SELECT * FROM job_tbl WHERE Order_ID = '$OrderID'");
                        $check_orderID = mysqli_fetch_assoc($order);

                        if ($check_orderID['Order_ID'] != $OrderID) {
                            // insert jobs
                            $job = "INSERT INTO job_tbl (Order_ID,Jobstat_ID)
                            VALUES ('$OrderID','JS_002')";
                            $query_job = mysqli_query($conn,$job);  
                        }

                        $data = "คุณ ".$Cname." มีข้อมูลอยู่แล้ว";
                        echo json_encode($data);
                    }
                    else if ($check_name['CustomerName'] != $Cname){
                        //  insert customer
                        $query2 = "INSERT INTO customer_tbl (CustomerName,Tel,Address,Road,District,Sub_District,Zipcode) 
                            VALUES ('$Cname','$tel','$address','$road','$city','$State','$zip')";
                        $query_run2 = mysqli_query($conn,$query2);

                        // ค้นหา Customer_ID 
                        $search_id = mysqli_query($conn,"SELECT Customer_ID FROM customer_tbl WHERE CustomerName = '$Cname'");
                        $queryid = mysqli_fetch_assoc($search_id);
                        $queryid = $queryid['Customer_ID'];

                        // insert order
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
                        
                        $data = "บันทึกข้อมูลสำเร็จ";
                        echo json_encode($data);
                    }
            
            
        }

?>