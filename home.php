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
          <a class="nav-link" href="home.php" style="color: #FCF4D9;">Home <span class="sr-only">(current)</span></a>
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
          <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true" style="color: #462066;">Logout</a>
        </li>
      </ul>

    </div>
  </nav>

  <div class="card-group">
    <div class="card">
      <img src="image/toffee_cake_01.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card">
      <img src="image/cake_001.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card">
      <img src="image/brownie_01.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
          This card has even longer content than the first to show that equal height action.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>

</div>

<?php }?>