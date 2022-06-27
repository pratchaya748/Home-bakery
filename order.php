<?php
include ("local.php");
$message = '';

if(isset($_POST["inputCSV"]))
{
 if($_FILES['csvF']['name'])
 {
  $filename = explode(".", $_FILES['csvF']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['csvF']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $OrderID = mysqli_real_escape_string($conn, $data[0]);
    $Cname = mysqli_real_escape_string($conn, $data[1]);  
    $tel = mysqli_real_escape_string($conn, $data[2]);
    $address = mysqli_real_escape_string($conn, $data[3]);
    $road = mysqli_real_escape_string($conn, $data[4]);
    $city = mysqli_real_escape_string($conn, $data[5]);
    $State = mysqli_real_escape_string($conn, $data[6]);
    $zip = mysqli_real_escape_string($conn, $data[7]);
    $pay = mysqli_real_escape_string($conn, $data[8]);

    $query1 = "INSERT INTO order_tbl (Order_ID,Payment_Status) VALUES ('$OrderID','$pay')";
    $query2 = "INSERT INTO customer_tbl (CustomerName,Tel,Address,Road,District,Sub_District,Zipcode) 
               VALUES ('$Cname','$tel','$address','$road','$city','$State','$zip')";
    mysqli_query($connect, $query1);
    mysqli_query($connect, $query2);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Product Updation Done</label>';
}

?>

<?php session_start();?>
<?php 

if (!$_SESSION["Staff_ID"]){  //check session

	  Header("Location: login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

}else{?>


<!DOCTYPE html>
<!--Code by Web Dev Trick ( https://webdevtrick.com )-->
<!--For More Source Code visit  https://webdevtrick.com -->
<html>

<head>
    <title>Home Bekery | Suan Dusit University</title>
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
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

    <div class="card bg-light text-white text-left p-3">
        <form action="order.php" method="POST" id="w">
            <div class="form-row">
                <div class="form-group">
                    <label for="OrderID" style="color: #462066;">Order ID</label>
                    <input type="text" class="form-control" id="OrderID" name="OrderID">
                </div>
                <div class="form-group col-md-5">
                    <label for="CustomerName" style="color: #462066;">ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control" id="CustomerName" name="CustomerName" >
                </div>
                <div class="form-group col-md-2">
                    <label for="tel" style="color: #462066;">หมายเลขโทรศัพท์</label>
                    <input type="tel" class="form-control" id="tel" name="tel" pattern="[0-9]{10}">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputRiderDate" style="color: #462066;">วันเวลาที่ส่งของ</label>
                    <input type="datetime-local" class="form-control" id="inputRiderDate">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress" style="color: #462066;">ที่อยู่</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 ซอย หมู่ที่" name="address" > 
            </div>
            <div class="form-group">
                <label for="road" style="color: #462066;">ถนน</label>
                <input type="text" class="form-control" id="road" placeholder="ถนน อาคาร/หมู่บ้าน/" name="road" >
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity" style="color: #462066;">แขวง</label>
                    <input type="text" class="form-control" id="city" placeholder="แขวง" name="city" >
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState" style="color: #462066;">เขต</label>
                    <select id="inputState" class="form-control" placeholder="เขต" name="State" >
                        <option selected value="">เลือกเขต</option>
                        <option value="เขตคลองเตย">เขตคลองเตย</option>
                        <option value="เขตคลองสาน">เขตคลองสาน</option>
                        <option value="เขตคลองสามวา">เขตคลองสามวา</option>
                        <option value="เขตคันนายาว">เขตคันนายาว</option>
                        <option value="เขตจตุจักร">เขตจตุจักร</option>
                        <option value="เขตจอมทอง">เขตจอมทอง</option>
                        <option value="เขตดอนเมือง">เขตดอนเมือง</option>
                        <option value="เขตดินแดง">เขตดินแดง</option>
                        <option value="เขตดุสิต">เขตดุสิต</option>
                        <option value="เขตตลิ่งชัน">เขตตลิ่งชัน</option>
                        <option value="เขตทวีวัฒนา">เขตทวีวัฒนา</option>
                        <option value="เขตทุ่งครุ">เขตทุ่งครุ</option>
                        <option value="เขตธนบุรี">เขตธนบุรี</option>
                        <option value="เขตบางเขน">เขตบางเขน</option>
                        <option value="เขตบางแค">เขตบางแค</option>
                        <option value="เขตบางกอกใหญ่">เขตบางกอกใหญ่</option>
                        <option value="เขตบางกอกน้อย">เขตบางกอกน้อย</option>
                        <option value="เขตบางกะปิ">เขตบางกะปิ</option>
                        <option value="เขตบางขุนเทียน">เขตบางขุนเทียน</option>
                        <option value="เขตบางคอแหลม">เขตบางคอแหลม</option>
                        <option value="เขตบางซื่อ">เขตบางซื่อ</option>
                        <option value="เขตบางนา">เขตบางนา</option>
                        <option value="เขตบางบอน">เขตบางบอน</option>
                        <option value="เขตบางพลัด">เขตบางพลัด</option>
                        <option value="เขตบางรัก">เขตบางรัก</option>
                        <option value="เขตบึงกุ่ม">เขตบึงกุ่ม</option>
                        <option value="เขตปทุมวัน">เขตปทุมวัน</option>
                        <option value="เขตประเวศ">เขตประเวศ</option>
                        <option value="เขตป้อมปราบศัตรูพ่าย">เขตป้อมปราบศัตรูพ่าย</option>
                        <option value="เขตพญาไท">เขตพญาไท</option>
                        <option value="เขตพระโขนง">เขตพระโขนง</option>
                        <option value="เขตพระนคร">เขตพระนคร</option>
                        <option value="เขตภาษีเจริญ">เขตภาษีเจริญ</option>
                        <option value="เขตมีนบุรี">เขตมีนบุรี</option>
                        <option value="เขตยานนาวา">เขตยานนาวา</option>
                        <option value="เขตราชเทวี">เขตราชเทวี</option>
                        <option value="เขตราษฎร์บูรณะ">เขตราษฎร์บูรณะ</option>
                        <option value="เขตลาดกระบัง">เขตลาดกระบัง</option>
                        <option value="เขตลาดพร้าว">เขตลาดพร้าว</option>
                        <option value="เขตวังทองหลาง">เขตวังทองหลาง</option>
                        <option value="เขตวัฒนา">เขตวัฒนา</option>
                        <option value="เขตสวนหลวง">เขตสวนหลวง</option>
                        <option value="เขตสะพานสูง">เขตสะพานสูง</option>
                        <option value="เขตสัมพันธวงศ์">เขตสัมพันธวงศ์</option>
                        <option value="เขตสาทร">เขตสาทร</option>
                        <option value="เขตสายไหม">เขตสายไหม</option>
                        <option value="เขตหนองแขม">เขตหนองแขม</option>
                        <option value="เขตหนองจอก">เขตหนองจอก</option>
                        <option value="เขตหลักสี่">เขตหลักสี่</option>
                        <option value="เขตห้วยขวาง">เขตห้วยขวาง</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip" style="color: #462066;">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="inputZip" name="zip" >
                </div>
            </div>
            
            <div class="custom-control custom-radio pt-2">
                <input type="radio" name="customRadio" class="custom-control-input" value="PM_001" id = "pay1">
                <label class="custom-control-label" for="pay1" 
                    style="color: #462066;">ชำระเงินเรียบร้อยแล้ว</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" name="customRadio" class="custom-control-input" value="PM_002" id = "pay2">
                <label class="custom-control-label" for="pay2" 
                    style="color: #462066;">ชำระเงินปลายทาง</label>
            </div>
            <button type="submit" class="btn btn-danger my-1" name="addOrder" id="add">เพิ่ม</button>
        </form>

        <form action="order.php" method="POST" enctype='multipart/form-data' id="c">
            <label class="col-form-label" style="color: #462066;">ไฟล์ CSV</label>
            <div class="form-group">
                <div class="input-group">
                    <input type="file" class="form-control" id="CSVfile" name="csvF">
                    <button class="btn btn-outline-danger" type="submit" id="inputCSV" name="inputCSV">Upload</button>
                </div>
            </div>
        </form>    
    </div>


</div>

<script src="js/jquery-3.5.1.js"></script>
<script>
    $(function() {
        $('form#w').submit(function(event) {
            event.preventDefault();
            var OrderID = $('input#OrderID').val();
            var Cname = $('input#CustomerName').val();
            var tel = $('input#tel').val();
            var address = $('input#inputAddress').val();
            var road = $('input#road').val();
            var city = $('input#city').val();
            var State = $("#inputState").val();
            var zip = $('input#inputZip').val();
            var pay = $("input[name ='customRadio']:checked").val();
            var inputRiderDate = $('#inputRiderDate').val();
            // alert(pay); 
            if (OrderID == "") {
                alert("โปรดใส่ OrderID");
            }
            else if (Cname == ""){
                alert("โปรดใส่ ชื่อ-สกุล");
            }
            else if (tel == ""){
                alert("โปรดใส่ หมายเลขโทรศัพท์");
            }
            else if (inputRiderDate == ""){
                alert("โปรดใส่วันที่และเวลา");
            }            
            else if (address == ""){
                alert("โปรดใส่ ที่อยู่");
            }
            else if (road == ""){
                alert("โปรดใส่ ถนน");
            }
            else if (city == ""){
                alert("โปรดใส่ แขวง");
            }
            else if (State == ""){
                alert("โปรดใส่ เขต");
            }
            else if (zip == ""){
                alert("โปรดใส่ รหัสไปรษณีย์");
            }
            else if (jQuery.type(pay) === "undefined" ){
                alert("โปรดใส่ สถานะการชำระเงิน");
            }
            else if ((pay || OrderID || tel || address || road || city || State || zip || inputRiderDate) != ""){
                $.ajax({
                    url: 'includeOrder.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        OrderID: OrderID,
                        CustomerName: Cname,
                        tel: tel,
                        address: address,
                        road: road,
                        city: city,
                        State: State,
                        zip: zip,
                        pay: pay,
                        inputRiderDate: inputRiderDate,
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
                        $("input[name ='customRadio']").prop('checked',false);
                    }
                });
            }
        });
        $('form#c').on("submit", function(e){  
                e.preventDefault();
                $.ajax({  
                     url:"csvoder.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data == 'Error1')  
                          {  
                            alert("ไฟล์ไม่ถูกต้อง");   
                          }  
                          else if(data == "Error2")  
                          {  
                            alert("โปรดเลือกไฟล์");  
                          }  
                          else  
                          {  
                            alert("บันทึกข้อมูลสำเร็จ");
                            $('#CSVfile').val('');
                          }  
                     }  
                })  
           });  
    });
    




</script>

<?php }?>