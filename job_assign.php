<?php session_start();?>
<?php 
include ('local.php');
if (!$_SESSION["Staff_ID"]){  //check session

	  Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>

<!DOCTYPE html>
<!--Code by Web Dev Trick ( https://webdevtrick.com )-->
<!--For More Source Code visit  https://webdevtrick.com -->
<html>

<head>
    <title>Home Bekery | Suan Dusit University</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light my-3" style="background-color: #FF7A5A;">
        <!--a class="navbar-brand" href="#">Navbar</a-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- แก้ตรง data-bs-toggle กับ data-bs-target -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent" );>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php" style="color: #FCF4D9;">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order.php" style="color: #FCF4D9;">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="job_assign.php" style="color: #FCF4D9;">Job Assign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delivery.php" style="color: #FCF4D9;">Delivery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="คู่มือการใช้งานการใช้งานเว็บไซต์ Home Bakery.pdf" style="color: #FCF4D9;">Manual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true"
                        style="color: #462066;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <table class="table table-sm" id="Tdata">
        <thead>
            <tr class="bg-light">
                <th scope="col" style="color: #462066; text-align: center;">Job ID</th>
                <th scope="col" style="color: #462066;  text-align: center;">Order_ID</th>
                <th scope="col" style="color: #462066;  text-align: center;">ชื่อ - นามสกุล</th>
                <th scope="col" style="color: #462066;  text-align: center;">สถานะ</th>
                <th scope="col" style="color: #462066;  text-align: center;">ผู้ส่ง</th>
                <th scope="col" style="color: #462066;  text-align: center;">ผู้มอบหมายงาน</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="container">Assign 
        <form action="job_assign.php" method="POST">
            <select class="custom-select" id="Job">
                <option selected value="">Select Job ID</option>
                <?php 
                    $sqlJ = "SELECT Job_ID FROM job_tbl WHERE Jobstat_ID = 'JS_002'";
                    $resultJ = mysqli_query($conn,$sqlJ);
                    while ($row1 = mysqli_fetch_array($resultJ)){
                        echo '<option value = "' . $row1['Job_ID'] . '">' . $row1['Job_ID'] . '</option>';
                    }
                ?>
            </select>

            <div class="pt-2" >
                <select class="custom-select" id="Rider">
                    <option selected value="">Select Rider</option>
                    <?php 
                    $sqlR = "SELECT Rider_id,FirstName,LastName 
                    FROM rider_tbl
                    WHERE Riderstat_ID = 'RS_001'";
                    $resultR = mysqli_query($conn,$sqlR);
                    while ($row2 = mysqli_fetch_array($resultR)){
                        echo '<option value = "' . $row2['Rider_id'] .'">' . $row2['FirstName'] ." ". $row2['LastName'].'</option>';
                    }
                ?>
                </select>
            </div>

            <button type="submit" class="btn btn-danger my-1">ยืนยัน</button>
        </form>
    </div>
</div>


<script src="js/jquery-3.5.1.js"></script>
<script src="DataTables/media/js/jquery.js"></script>
<script src="DataTables/media/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="DataTables/media/css/jquery.dataTables.min.css">

<script>
    $(function() {
        // datatable
        $('#Tdata').DataTable({
            "pageLength": 5,
            "info":     false,
            "processing": true,
            "serverSide": true,
            "ajax": "jobTable.php",
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
            ],
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
            ]
            
        });

        // send data to edit
        $('form').submit(function(event) {
            // event.preventDefault();
            var Job = $('#Job').val();
            var Rider = $('#Rider').val();
            if (Job == "") {
                alert("โปรดเลือก JobID");
            }
            else if (Rider == ""){
                alert("โปรดเลือก Rider");
            }
            else if ((Job || Rider) != ""){
                $.ajax({
                    url: 'EJob_assign.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        Job: Job,
                        Rider: Rider,
                    },
                    success :function(data){
                        alert(data);
                        $('#Tdata').DataTable().draw();
                        $('#Job').val('');
                        $('#Rider').val('');
                    }
                });
                
            }
        });
        
    });
    




</script>
<?php }?>