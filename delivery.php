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
    <!-- JavaScript Bundle with Popper -->
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


    <div class="row">
        <div class="col-sm-6">
            <div class="map-responsive">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.0346336066286!2d100.5103669!3d13.776784999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2995e8c9b7747%3A0xf48d475ad8e65457!2z4Liq4Lin4LiZ4LiU4Li44Liq4Li04LiV4LmC4Liu4Lih4LmA4Lia4LmA4LiB4Lit4Lij4Li14LmI!5e0!3m2!1sth!2sth!4v1607250059652!5m2!1sth!2sth"
                    width="550" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
        <div class="col-sm-6">
            <form action="delivery.php" method="POST" id="s">
                <div class="form-group row">
                    <div class="form-group">
                        <label for="inputRiderName" style="color: #462066;">ประเภทที่ต้องการค้นหา</label>
                        <select class="form-select" for="inputRiderName" id="select">
                            <option value=""></option>
                            <option value="RiderID">RiderID</option>
                            <option value="RiderName">RiderName</option>
                            <option value="CustomID">CustomID</option>
                            <option value="CustomName">CustomName</option>
                            <option value="Order_ID">Order ID</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label  style="color: #462066;">ช่องการค้นหา</label>
                        <input type="text" class="form-control" id="search" />
                    <button type="submit" class="btn btn-danger my-2 btn-block">เลือก</button>
                </div>
            </form>
                <!-- <div class="progress">
                    <div class="progress-bar bg-Primary" style="background-color: #2537F4; width:30%" >
                        Confirmed
                    </div>
                    <div class="progress-bar bg-warning" style="width:30%">
                        Picked up
                    </div>
                    <div class="progress-bar bg-info" style="width:35%">
                        On the way
                    </div>
                    <div class="progress-bar bg-success" style="width:35%">
                        Done
                    </div>
                </div> -->
                <div class="pt-2">
                    <table class="table table-striped table-hover">
                        <tbody id="b">
                        </tbody>
                    </table>
                </div>
            
        </div>
    </div>
</div>


<script src="js/jquery-3.5.1.js"></script>
<script>
    $(function() {
        $('form#s').submit(function(event) {
            event.preventDefault();
            var search = $('#search').val();
            var select = $('#select').val();

            if (select == "") {
                alert("โปรดเลือกประเภทการค้นหา");
            }
            else if (search == ""){
                alert("โปรดใส่ข้อความค้นหา");
            }
            else if ((select || search) != ""){
                $.ajax({
                    url: 'searchD.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        search: search,
                        select: select,
                    },
                    success :function(data){
                        // alert(select);alert(search);
                        if (data.length != 0) {
                            // alert(data);
                            var trstring = "";

                            $.each(data, function(key, value) {
                                if (value.Status == "Done") {
                                    trstring += `
                                        <tr class="bg-success text-light">
                                            <td class="text-center">${value.Rider_id}</td>
                                            <td class="text-center">${value.Status}</td>
                                        </tr>`;
                                        $("table tbody#b").html(trstring);
                                }   
                                else if(value.Status == "Confirmed"){
                                    trstring += `
                                        <tr class="text-light" style="background-color: #2537F4;">
                                            <td class="text-center">${value.Rider_id}</td>
                                            <td class="text-center">${value.Status}</td>
                                        </tr>`;
                                        $("table tbody#b").html(trstring);
                                }  
                                else if(value.Status == "On the way"){
                                    trstring += `
                                        <tr class="bg-info text-light">
                                            <td class="text-center">${value.Rider_id}</td>
                                            <td class="text-center">${value.Status}</td>
                                        </tr>`;
                                        $("table tbody#b").html(trstring);
                                }    
                                else if(value.Status == "Picked up"){
                                    trstring += `
                                        <tr class="bg-warning text-light">
                                            <td class="text-center">${value.Rider_id}</td>
                                            <td class="text-center">${value.Status}</td>
                                        </tr>`;
                                        $("table tbody#b").html(trstring);
                                }                      
                            });
                        }
                        else if(data.length == 0){
                            alert("ไม่พบข้อมูลที่ค้นหา");
                        }
                        $('#search').val('');
                        // $('#select').val('');
                    }
                });
                
            }
        });
        
    });
    




</script>

<?php }?>