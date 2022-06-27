
<?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 $query = "SELECT * FROM tbl_employee ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 $name = "hi                     9                                          ";
 $k =  str_replace(' ', '', $name);

 echo $k;
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Import CSV File Data into MySQL Database using PHP & Ajax</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
      <!-- <tr>
                <td style="color: #462066;  text-align: center;">Job_001</td>
                <td style="color: #462066; text-align: center;">1</td>
                <td style="color: #462066;  text-align: center;">Mark Mark</td>
                <td style="color: #00AAA0;  text-align: center;">Done</td>
                <td style="color: #00AAA0; text-align: center;">Rider_001</td>
                <td style="color: #462066;  text-align: center;">Admin001</td>
            </tr>
            <tr>
                <td style="color: #462066;  text-align: center;">Job_002</td>
                <td style="color: #462066;  text-align: center;">2</td>
                <td style="color: #462066; text-align: center;">Jacob Jame</td>
                <td style="color: #FF5EAA; text-align: center;">Waiting</td>
                <td style="color: #FF5EAA; text-align: center;"></td>
                <td style="color: #462066;  text-align: center;"></td>
            </tr>
            <tr>
                <td style="color: #462066;  text-align: center;">Job_003</td>
                <td style="color: #462066;  text-align: center;">3</td-->
                <td style="color: #462066;  text-align: center;">Jane Janny</td>
                <td style="color: #0099CC; text-align: center;">On process</td>
                <td style="color: #0099CC; text-align: center;">Rider_002</td>
                <td style="color: #462066;  text-align: center;">Admin001</td>
            </tr>
            <tr>
                <td style="color: #462066;  text-align: center;">Job_004</td>
                <td style="color: #462066;  text-align: center;">4</td>
                <td style="color: #462066;  text-align: center;">Jane Janny</td>
                <td style="color: #0099CC; text-align: center;">On process</td>
                <td style="color: #0099CC; text-align: center;">Rider_003</td>
                <td style="color: #462066;  text-align: center;">Admin002</td>
            </tr>
            <tr>
                <td style="color: #462066;  text-align: center;">Job_005</td>
                <td style="color: #462066;  text-align: center;">5</td>
                <td style="color: #462066; text-align: center;">Jacob Jame</td>
                <td style="color: #FF5EAA; text-align: center;">Waiting</td>
                <td style="color: #FF5EAA; text-align: center;"></td>
                <td style="color: #462066;  text-align: center;"></td>
            </tr> -->
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $('#upload_csv').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"export.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else  
                          {  
                               $('#employee_table').html(data);  
                          }  
                     }  
                })  
           });  
      });  
 </script>  