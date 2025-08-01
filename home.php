<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
$count_query=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id' ");
if(mysqli_num_rows($count_query) > 0){
  
$count = mysqli_num_rows($count_query);
}
else{
  $count=0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style1.css">

</head>

<body>

   <!-- header start -->
   <section class="header">
      <a href="home.php" class="logo">paras stationary.</a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About Us</a>
         <a href="user_cat.php">Shop</a>
         <a href="contactus.php">Contact Us</a>
         <a href="order.php">Orders</a>
      </nav>

      <div class="icons">
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"><?php echo $count ?></i></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
          $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
          if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
          }
          if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
          }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
          }
         ?>
         <h1>
            <?php echo $fetch['name']; ?>
         </h1>

         <a href="profile.php" class="btn">profile</a>
         <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>

         <p class="account">new <a href="login.php">login</a> or <a href="register.php">register</a></p>
      </div>
   </section>
   <!-- header end -->

   <!-- home top start -->
   <section class="hero"> 

      <div class="swiper hero-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images/home1.png" alt="">
               </div>
               <div class="content">
                  <h3>Welcome to Paras Stationary</h3>
                  <span>buy office, school and computer stationary</span><br>
                  <a href="about.php" class="btn">Explore more</a>
               </div>
            </div>
            <div class="swiper-slide slide">
               <div class="content">
                  <h3>Want to Buy Stationary? <br></h3>
                  <span>Come and visit us also buy what you want</span><br>
                  <a href="shop.php" class="btn">buy now</a>
               </div>
               <div class="image">
                  <img src="images\img6.avif" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images\img5.avif" alt="">
               </div>
               <div class="content">
                  <span>order online</span>
                  <h3>explore world of our stationary</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div>
            </div>

         </div>

         <div class="swiper-pagination"></div>
      </div>
   </section>


   <!-- home top end -->

   <section class="services">

      <h1 class="heading-title">Our Services</h1>
      <div class="box-container">

         <div class="box">
            <img src="images/ser4.jpg" alt="">
            <h3>Govt. General Suppliers & Contractors</h3>
         </div>

         <div class="box">
            <img src="images/ser1.jpg" alt="">
            <h3>Office & Computer Stationary</h3>
         </div>

         <div class="box">
            <img src="images/ser2.jpg" alt="">
            <h3>School Stationary </h3>
         </div>

         <div class="box">
            <img src="images/ser7.jpg" alt="">
            <h3>Toner & Ink Cartidges</h3>
         </div>

         <div class="box">
            <img src="images/ser10.jpg" alt="">
            <h3>All Types Of Printing Jobs</h3>
         </div>
      </div>
   </section>

   <!-- home about start -->

   <section class="home-about">
      <div class="image">
         <img src="images/shop1.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Paras Stationery and Xerox Is located at 62, Nagindas Master Road, , Near Gundecha Chambers, Fort,
            Mumbai - 400023 is India's reputed company. our vision and focus to provide customized solutions with
            quality
            and cost effective product range. A strong customer focus approach and constant quest for top class quality
            and
            services have enabled us to attain and sustain leadership position.
         </p>
         <a href="about.php" class="btn">know more</a>
      </div>
   </section>

   <!-- home about end -->

   <!-- home product start -->
   <section class="home-product">

      <h1 class="heading-title">New Products</h1>

      <div class="box-container">

         <div class="box">
            <div class="image">
               <img src="images/pr5.jpg" alt="">
            </div>
            <div class="content">
               <h3>calculator</h3>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/pr2.jpg" alt="">
            </div>
            <div class="content">
               <h3>Stapler</h3>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/pr4.jpg" alt="">
            </div>
            <div class="content">
               <h3>notebook</h3>
            </div>
         </div>


      </div>

      
   </section>
   <!-- home product end -->


   <!-- offer  start -->
   <section class="home-offer">
      <div class="content">
         <h3>upto 10% off</h3>
         <p>get 10% off on your first order.</p>
         <a href="user_cat.php" class="btn">shop now</a>
      </div>
   </section>

   <!-- offer end -->


   <!-- footer start -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>Quick links</h3>
            <a href="about.php"><i class="fas fa-angle-right"></i>About Us</a>
            <a href="user_cat.php"><i class="fas fa-angle-right"></i>Shop</a>
            <a href="contactus.php"><i class="fas fa-angle-right"></i>Contact Us</a>
            <a href="review.php"><i class="fas fa-angle-right"></i>Review</a>
            <a href="faq.php"><i class="fas fa-angle-right"></i>FAQ</a>
         </div>

         <div class="box">
            <h3>extra info</h3>
            <a href="#"><i class="fas fa-location-dot"></i>Shop No.11, Gundecha Chambers,9, Nagindas Master Road, Fort,
               Mumbai - 400 001.</a>
            <a href="#"><i class="fas fa-envelope"></i>pstationers@yahoo.in</a>
            <a href="#"><i class="fas fa-envelope"></i>graphicpoint78@gmail.com</a>
            <a href="#"><i class="fas fa-clock"></i>09.00am to 10.00pm</a>
         </div>

         <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i>+022-66336845</a>
            <a href="#"><i class="fas fa-phone"></i>+022-66558115</a>
            <a href="#"><i class="fas fa-mobile"></i>9820391419</a>
            <a href="#"><i class="fas fa-mobile"></i>9819057985</a>
            <a href="#"><i class="fa fa-whatsapp"></i>8928999395</a>
         </div>

      </div>
      <div class="credit">All Rights Are Reserved By <span>Paras Stationary.</span></div>
   </section>

   <!--footer end -->

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script src="js/script.js"></script>

   <script>

      var swiper = new Swiper(".hero-slider", {
         loop: true,
         grabCursor: true,
         effect: "flip",
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });

   </script>



</body>

</html>