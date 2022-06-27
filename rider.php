<?php session_start();?>
<?php 

if (!$_SESSION["Rider_id"]){

	  Header("Location: login.php");

}else{?>
<?php 
    include ("local.php");
    $Rider_id = $_SESSION["Rider_id"];
    $sql = mysqli_query($conn,
    "SELECT job_tbl.Order_ID,customer_tbl.CustomerName,customer_tbl.Tel,customer_tbl.Address,
            customer_tbl.Road,customer_tbl.District,customer_tbl.Sub_District,customer_tbl.Zipcode,
            order_tbl.Date,order_tbl.Order_ID,payment_tbl.Status
     FROM customer_tbl,job_tbl,order_tbl,payment_tbl,delistat_tbl,rider_tbl,jobstat_tbl
     WHERE job_tbl.Order_ID = order_tbl.Order_ID AND 
            order_tbl.Customer_ID = customer_tbl.Customer_ID AND
            order_tbl.Payment_ID = payment_tbl.Payment_ID AND
            job_tbl.Rider_ID = '$Rider_id' AND order_tbl.Delistat_ID NOT LIKE 'DS_003'");
    $ridef_f = mysqli_fetch_assoc($sql);

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
        <form action="" method="POST" id="j">
            <div class="form-row">
                <div class="form-group">
                    <label for="OrderID" style="color: #462066;">Order ID</label>
                    <input type="text" class="form-control" id="OrderID" name="OrderID" value = "<?php echo $ridef_f['Order_ID'];  ?>" disabled>
                </div>
                <div class="form-group col-md-5">
                    <label for="CustomerName" style="color: #462066;">ชื่อ - นามสกุล ลูกค้า</label>
                    <input type="text" class="form-control" id="CustomerName" name="CustomerName" value = "<?php echo $ridef_f['CustomerName'];  ?>" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label for="tel" style="color: #462066;">หมายเลขโทรศัพท์</label>
                    <input type="text" class="form-control" id="tel" name="tel" disabled value = "<?php echo $ridef_f['Tel'];  ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRiderDate" style="color: #462066;">วันเวลาสั่งของ</label>
                    <input type="text" class="form-control" id="inputRiderDate" disabled value = "<?php echo $ridef_f['Date'];  ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress" style="color: #462066;">ที่อยู่ ลูกค้า</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 ซอย หมู่ที่" name="address" disabled value = "<?php echo $ridef_f['Address'];  ?>"> 
            </div>
            <div class="form-group">
                <label for="road" style="color: #462066;">ถนน</label>
                <input type="text" class="form-control" id="road" placeholder="ถนน อาคาร/หมู่บ้าน/" name="road" disabled value = "<?php echo $ridef_f['Road'];  ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity" style="color: #462066;">แขวง</label>
                    <input type="text" class="form-control" id="city" placeholder="แขวง" name="city" disabled value = "<?php echo $ridef_f['District'];  ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState" style="color: #462066;">เขต</label>
                    <input type="text" class="form-control" id="inputState" name="inputState"disabled value = "<?php echo $ridef_f['Sub_District'];  ?>">
                    
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip" style="color: #462066;">รหัสไปรษณีย์ ลูกค้า</label>
                    <input type="text" class="form-control" id="inputZip" name="zip"disabled value = "<?php echo $ridef_f['Zipcode'];  ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="pay" style="color: #462066;">การชำระเงินของลูกค้า</label>
                    <input type="text" class="form-control" id="pay" name="pay" disabled value = "<?php echo $ridef_f['Status'];  ?>">
                </div>
            </div>
            
            <button type="button" class="btn btn-danger my-1" name="receive" id="receive">ตกลง</button>
            <button type="submit" class="btn btn-danger my-1" name="refuse" id="refuse">ปฎิเสธ</button>
        </form>   
    </div>


</div>

<script src="js/jquery-3.5.1.js"></script>
<script>
    $(function() {

        $('#receive').click(function(){
            var OrderID = $('input#OrderID').val();
            var OrderID = $('input#OrderID').val();
            var Cname = $('input#CustomerName').val();
            var tel = $('input#tel').val();
            var address = $('input#inputAddress').val();
            var road = $('input#road').val();
            var city = $('input#city').val();
            var State = $("#inputState").val();
            var zip = $('input#inputZip').val();
            var inputRiderDate = $('#inputRiderDate').val();
            var pay = $('input#pay');
            if ((pay && OrderID && tel && address && road && city && State && zip && inputRiderDate) != ""){
                alert("คุณรับงานแล้ว");
                window.location = "UpdateDeli.php";
            }
            else if((pay && OrderID && tel && address && road && city && State && zip && inputRiderDate) == ""){
                alert("ยังไม่มีการจ่ายงาน");
            }
            
        });


        $('form#j').submit(function(event) {
            event.preventDefault();
            var Rider_id = '<?php echo($Rider_id);?>';
            var OrderID = $('input#OrderID').val();
            var OrderID = $('input#OrderID').val();
            var Cname = $('input#CustomerName').val();
            var tel = $('input#tel').val();
            var address = $('input#inputAddress').val();
            var road = $('input#road').val();
            var city = $('input#city').val();
            var State = $("#inputState").val();
            var zip = $('input#inputZip').val();
            var inputRiderDate = $('#inputRiderDate').val();
            var pay = $('input#pay');

            if ((pay && OrderID && tel && address && road && city && State && zip && inputRiderDate) != ""){
                var conf = confirm("ต้องการปฎิเสธงานใช่หรือไม่");
                if (conf == true) {
                    $.ajax({
                        url: 'riderUpdate.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            Rider_id: Rider_id
                        },
                        success :function(data){
                            alert(data);
                            $('input#OrderID').val('');
                            $('input#CustomerName').val('');
                            $('input#tel').val('');
                            $('input#inputAddress').val('');
                            $('input#road').val('');
                            $('input#city').val('');
                            $("#inputState").val('');
                            $('input#inputZip').val('');
                            $('input#inputRiderDate').val('');
                            $('input#pay').val('');
                        }
                    });
                }
                
            }
            else if((pay && OrderID && tel && address && road && city && State && zip && inputRiderDate) == ""){
                alert("ยังไม่มีการจ่ายงาน");
            }
    
        });
    });
    




</script>



<?php }?>