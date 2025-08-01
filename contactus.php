<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="costyle.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <?php include('header.php');?>
     <?php
         include('admin/connection.php');
         if(isset($_POST['send'])){
         
           $name=$_POST['name'];
           $email=$_POST['email'];
           $phone=$_POST['phone'];
           $message=$_POST['message'];
         
           $conquery="INSERT into contact(name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
         
           $conquery_run=mysqli_query($con,$conquery);
         
           if($conquery_run){
         
              echo"<script>
                 alert('message sent ');
                 window.location.href='contactus.php';
                </script>";
           }else
           {
             echo"<script>
             alert('message not sent');
             window.location.href='contactus.php';
            </script>";
         
           }
         }
         
         
    ?>
    <div class="container">

      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text" style="font-size:large;">
            Shop No.11,Gundecha Chambers,
            9, Nagindas Master Road,
            Fort Mumbai - 400 001
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
             
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p style="font-size:medium;">graphicpoint78@gmail.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p style="font-size:medium;">123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
         

          <form action="contactus.php" method="POST">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
               <label for="" style="font-size:large;">Username</label>
              <input type="text" name="name" class="input" />
              
              
            </div>
            <div class="input-container">
             <label for="" style="font-size:large;">Email</label>
              <input type="email" name="email" class="input" />
              
          
            </div>
            <div class="input-container">
            <label for="" style="font-size:large;">Phone</label>
              <input type="text" name="phone" class="input" />
              
             
            </div>
            <div class="input-container textarea">
            <label for="" style="font-size:large;">Message</label>
              <textarea name="message" class="input"></textarea>
              
             
            </div>
            <input type="submit" value="send" name="send" class="btn" />
          </form>
        </div>
      </div>
    </div>
    <?php include('footer.php');?>
    <script src="app.js"></script>
  </body>
</html>