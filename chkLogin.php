<?php 
session_start();
        if(isset($_POST['txtUsername'])){
				//connection
                  include("local.php");
				//รับค่า user & password
                  $Username = $_POST['txtUsername'];
                  $Password = $_POST['txtPass'];
				//query 
                  $sql1="SELECT * FROM staff_tbl WHERE Staff_ID='".$Username."' AND Password='".$Password."' ";
                  $result1 = mysqli_query($conn,$sql1);

                  $sql2="SELECT * FROM rider_tbl WHERE Rider_id='".$Username."' AND Password='".$Password."' ";
                  $result2 = mysqli_query($conn,$sql2);
                  
                  if ($result2 != "") {
                    $_SESSION["Userlevel"] = "J";

                    if(mysqli_num_rows($result2)==1){

                        $row = mysqli_fetch_array($result2);
  
                        $_SESSION["Rider_id"] = $row["Rider_id"];
                        $_SESSION["User"] = $row["FirstName"]." ".$row["LastName"];
  
                        if($_SESSION["Userlevel"]=="J"){ //ถ้าเป็น rider ให้กระโดดไปหน้า rider.php
  
                          Header("Location: rider.php");
  
                        }
                    }else{
                      echo "<script>";
                          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                          echo "window.history.back()";
                      echo "</script>";
  
                    }
                  }
                  if ($result1 != "") {
                    $_SESSION["Userlevel"] = "S";

                    if(mysqli_num_rows($result1)==1){

                        $row = mysqli_fetch_array($result1);
  
                        $_SESSION["Staff_ID"] = $row["Staff_ID"];
                        $_SESSION["User"] = $row["FirstName"]." ".$row["LastName"];
  
                        if ($_SESSION["Userlevel"]=="S"){  
  
                            Header("Location: home.php");
  
                        }
  
                    }else{
                      echo "<script>";
                          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                          echo "Location: login.php";
                      echo "</script>";
  
                    }
                  }
        }else{

             Header("Location: login.php"); //user & password incorrect back to login again

        }
?>
