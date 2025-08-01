<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:home.php');
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
    <title>About us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>
    <!-- header start -->
    <section class="header">
        <a href="home.php" class="logo">paras stationary</a>

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

    <div class="About" style="height:650px;">
        <div class="Details">
            <h1>
                ABOUT US
            </h1>
            <p style="font-size:20px">
                We are here to Provide Services which Focus on Customer Centricity Rather Than Profit Making Motive in
                Such
                Competitive Market We Are Working In Mumbai City We are Dealing in Printer Offset Screen Stationery
                General.
                If You Will Join us Then You Will Get Transparency Customer Satisfaction with Right Guidance of Our
                Services
                Along with the Trust Seal of Paras Stationery and Xerox You will Recommend us two References on the base
                of Your
                Services with our best Quality Customer Support.
            <div class="icons">
                <i style="font-size:24px" class="fa">&#xf230;</i>
                <i style="font-size:24px" class="fa">&#xf0d5;</i>
                <i style="font-size:24px" class="fa">&#xf0e1;</i>
            </div>

            </p>
        </div>
        <div class="image" style="width:750px; height:600px;" >
            <img src="images\ser2.jpg" style="width:650px; height:500px;">
        </div>
    </div>

<!--team section starts-->

<section class="steps">

<h1 class="heading-title">MEET OUR TEAM</h1>

<div class="box-container">


    <div class="box">
        <img src="images\harshu.png" alt="">
        <h1>Web Developer</h1><br>
        <h2>Ms. Harshita N. Padwal</h2>
        <p>Backend Developer</p>
    </div>

    <div class="box">
        <img src="images\renuka.png" alt="">
        <h1>Web Developer</h1><br>
        <h2>Ms. Renuka K. Kene</h2>
        <p>Backend Developer</p>
    </div>

    <div class="box">
        <img src="images\mehal.png" alt="">
        <h1>Web Developer</h1><br>
        <h2>Ms. Mehal A. Naxine</h2>
        <p>Frontend Developer</p>
    </div>

    <div class="box">
        <img src="images\sonam.png" alt="">
        <h1>Web Developer</h1><br>
        <h2>Ms. Sonam R. Jaiswar</h2>
        <p>Frontend Developer</p>
    </div>

</div>

</section>

<!--team section ends-->

    <section class="about">

        <div class="content" style="width:1 1 40rem;">

            <h3>Why us</h3>
            <p>We are reputed service provider for Stationery Shops, Design & Graphics Services, Stationary Design in
                Mumbai.
                We are a proprietorship company and is known to be a leadng service provider of Stationery Shops, Design
                &
                Graphics Services, Stationary Design and its related services. With many years of experience in
                providing
                Stationery Shops, Design & Graphics Services, Stationary Design services, we have been continually
                improving our
                services to serve our clients better with timely deliveries, round the clock helpline and seamsless
                customer
                service.
            </p>
        </div>
        <div class="image">
            <img src="images/shop2.jpg" alt="" style="width:1 1 40rem;">
        </div>
        </div>
    </section>



    <!-- reviews section starts  -->
    <section class="reviews">

    <h1 class="heading-title">Our Testimonials</h1>

        <div class="swiper reviews-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <img src="images\mehal.png" alt="">
                    <p> All the products are just as shown in the pictures. Love it!
                        wonderful shopping experience.I Love Paras Stationary!
                    </p>
                    
                    <h3>- Mehal Naxine</h3>
                </div>
                <div class="swiper-slide slide">
                    <img src="images\harshu.png" alt="">
                    <p>Dive world of creativity and organization with Paras Enterprises! I can attest to the curated excellence of their stationery collection.</p>
                   
                    <h3>- Harshita Padwal</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images\renuka.png" alt="">
                    <p> From stylish pens to chic organizers, every purchase is an investment in quality and
                                functionality. Highly recommend!</p>
                    
                    <h3>- Renuka Kene</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/sonam.png" alt="">
                    <p> Love the variety of products they have. Also received my order before the approximated
                                date with delivery update on my phone.</p>
                    
                    
                    <h3>- Sonam Jaiswar</h3>
                </div>

                <div class="swiper-slide slide">
                    <img src="images/default-avatar.png" alt="">
                    <p>I Love Paras Stationary. Buy your fav pen, book, stapler now!</p>
                    
                    <h3>- Gayatri</h3>
                </div>
            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>
<!-- reviews section ends -->
                       
    <!-- footer start -->     
    <?php include('footer.php');?>
    <script src="app.js"></script>
    <!--footer end -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>


</body>

</html>