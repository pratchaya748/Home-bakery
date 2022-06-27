<?php session_start();?>
<?php 

if (!$_SESSION["Rider_id"]){

	  Header("Location: login.php");

}else{?>
<?php 
    include ("local.php");
    $Rider_id = $_SESSION["Rider_id"];
    $sql = mysqli_query($conn,
    "SELECT job_tbl.Order_ID,delistat_tbl.Status,order_tbl.Order_ID
     FROM customer_tbl,job_tbl,order_tbl,payment_tbl,delistat_tbl,rider_tbl,jobstat_tbl
     WHERE job_tbl.Order_ID = order_tbl.Order_ID AND
            job_tbl.Rider_ID = rider_tbl.Rider_ID AND
            rider_tbl.Jobstat_ID = jobstat_tbl.Jobstat_ID AND
            order_tbl.Delistat_ID = delistat_tbl.Delistat_ID AND
            order_tbl.Customer_ID = customer_tbl.Customer_ID AND
            order_tbl.Payment_ID = payment_tbl.Payment_ID AND
            job_tbl.Rider_ID = '$Rider_id' AND order_tbl.Delistat_ID NOT LIKE 'DS_003'");
    $ridef_f = mysqli_fetch_assoc($sql);
    $Status = $ridef_f['Status']; 
    $Order_ID = $ridef_f['Order_ID']; 

?>


<!DOCTYPE html>
<!--Code by Web Dev Trick ( https://webdevtrick.com )-->
<!--For More Source Code visit  https://webdevtrick.com -->
<html>

<head>
    <title>job requirement</title>
    <meta charset="UTF-8">
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
                    <a class="nav-link" href="rider.php" style="color: #FCF4D9;">Job Requirement<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UpdateDeli.php" tabindex="-1" aria-disabled="true"
                        style="color: #FCF4D9;">Delivery State</a>
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

    <div class="card bg-light text-white text-left p-3">
        <form action="" method="POST" id="D">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="ta" style="color: #462066;">สถานะการส่ง</label>
                    <div class="pt-2" id="ta">
                    <table class="table table-striped table-hover">
                        <tbody id="b">
                        </tbody>
                    </table>
                </div>
                </div>
            </div>    
            <!-- <button type="button" class="btn btn-danger my-1" name="receive" id="receive">ตกลง</button>
            <button type="submit" class="btn btn-danger my-1" name="refuse" id="refuse">ปฎิเสธ</button> -->
        </form>   
    </div>


</div>

<script src="js/jquery-3.5.1.js"></script>
<script>
    $(function() {
        var Status = '<?php echo($Status);?>';
        // alert('dfsdf');
        // alert(Status);
        all_users();
            function all_users(){
                var trstring = "";
                if (Status == "Confirmed") {
                    trstring += `
                        <tr class="text-light>
                            <td class="text-center text-light ">Picked up</td>
                            <td class="text-center text-light bg-primary">Confirmed</td>
                            <td class="text-center text-light ">Picked up</td>
                            <td class="text-center text-light">On the way</td>
                        </tr>
                        <tr class="text-light>
                            <td class="text-center bg-primary "></td>
                            <td class="text-center bg-primary " ><button type="submit" class="btn btn-danger my-1" name="updateD" id="updateD">เสร็จสิ้น</button></td>
                            <td class="text-center  "></td>
                            <td class="text-center"></td>
                        </tr>
                        `;
                    $('table tbody').html(trstring);
                }
                else if (Status == "Picked up") {
                    trstring += `
                        <tr class="text-light>
                            <td class="text-center text-light bg-warning">Picked up</td>
                            <td class="text-center text-light bg-warning">Confirmed</td>
                            <td class="text-center text-light bg-warning">Picked up</td>
                            <td class="text-center text-light">On the way</td>
                        </tr>
                        <tr class="text-light>
                            <td class="text-center bg-warning "></td>
                            <td class="text-center bg-warning "></td>
                            <td class="text-center bg-warning " ><button type="submit" class="btn btn-danger my-1" name="updateD" id="updateD">เสร็จสิ้น</button></td>
                            <td class="text-center"></td>
                        </tr>
                        `;
                    $('table tbody').html(trstring);
                }
                else if (Status == "On the way") {
                    trstring += `
                        <tr class="text-light>
                            <td class="text-center text-light">Picked up</td>
                            <td class="text-center text-light bg-info">Confirmed</td>
                            <td class="text-center text-light bg-info">Picked up</td>
                            <td class="text-center text-light bg-info">On the way</td>
                        </tr>
                        <tr class="text-light>
                            <td class="text-center bg-info "></td>
                            <td class="text-center bg-info "></td>
                            <td class="text-center bg-info"></td>
                            <td class="text-center bg-info " ><button type="submit" class="btn btn-danger my-1" name="updateD" id="updateD">เสร็จสิ้น</button></td>
                        </tr>
                        `;
                    $('table tbody').html(trstring);
                }
                else if (Status == "Done") {
                    trstring += `
                        <tr class="text-light>
                            <td class="text-center text-light">Picked up</td>
                            <td class="text-center text-light bg-success">Confirmed</td>
                            <td class="text-center text-light bg-success">Picked up</td>
                            <td class="text-center text-light bg-success">On the way</td>
                            <td class="text-center text-light bg-success">Done</td>
                        </tr>
                        <tr class="text-light>
                            <td class="text-center bg-success "></td>
                            <td class="text-center bg-success "></td>
                            <td class="text-center bg-success"></td>
                            <td class="text-center bg-success"></td>
                            <td class="text-center bg-success " ><button type="submit" class="btn btn-danger my-1" name="updateD" id="updateD">เสร็จสิ้น</button></td>
                        </tr>
                        `;
                    $('table tbody').html(trstring);
                }

            }


        $('form#D').submit(function(event) {
            // event.preventDefault();
            var Rider_id = '<?php echo($Rider_id);?>';
            var Order_ID = '<?php echo($Order_ID);?>';
            // var updateD = $('input#updateD').val();
            
            if (Status != ""){
                var conf = confirm("ยืนยันใช่หรือไม่");
                if (conf == true) {
                    $.ajax({
                        url: 'DeliUpdate.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            Rider_id: Rider_id,
                            Status: Status,
                            Order_ID: Order_ID,
                        },
                        success :function(data){
                            alert(data);
                        }
                    });
                }
                
            }
    
        });
    });
    




</script>



<?php }?>