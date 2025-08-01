<?php
   include 'config.php';
   session_start();
   $user_id = $_SESSION['user_id'];

   $message = '';
   
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

   if(isset($_POST['submit'])){
       if(isset($_SESSION['user_id'])){
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $description = $_POST['description'];
      $description = filter_var($description, FILTER_SANITIZE_STRING);
      $rating = $_POST['rating'];
      $rating = filter_var($rating, FILTER_SANITIZE_STRING);
   
      $insert = mysqli_query($conn, "INSERT INTO reviews(email, rating, description) VALUES('$email', '$rating', '$description')") or die('query failed');
      
      if($insert){
         $message = 'Review submitted successfully!';
      } else {
         $message = 'Error: '.mysqli_error($conn);
      }
   } else {
      $message = 'Please log in to submit a review.';
   }

   
   }
   ?>
   
   
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Review</title>
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
            <a href="contact.php">Contact Us</a>
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
             $select = mysqli_query($conn, "SELECT * FROM user_form WHERE id = '$user_id'") or die('query failed');
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
   
   <!-- add review section starts  -->
   
   <section class="account-form">
   <form action="" method="post">
      <h3>Post Your Review</h3>
      <p class="placeholder">User Email<span>*</span></p>
      <input type="text" name="email" required placeholder="Enter email" class="box" style="text-transform:lowercase;">
      <p class="placeholder">Review Description<span>*</span></p>
      <textarea name="description" class="box" placeholder="Enter review"  cols="100" rows="10"></textarea>
      <p class="placeholder">Review Rating <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <center><input type="submit" value="Submit Review" name="submit" class="btn"></center>
   </form>
</section>
     
   <!-- add review section ends -->
   
   <!-- reviews section starts  -->
   
   <section class="reviews-container">
   <div class="heading"><h1>User's Reviews</h1></div>
   <div class="box-container">
      <?php
      $select_reviews = mysqli_query($conn, "SELECT * FROM reviews") or die('query failed');
      while($review = mysqli_fetch_assoc($select_reviews)){
         $email = $review['email'];
         $select_user = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email'") or die('query failed');
         $user = mysqli_fetch_assoc($select_user);
      ?>
      <div class="box">
         <div class="user">
            <?php
            if($user['image'] == ''){
               echo '<img src="images/default-avatar.png">';
            }else{
               echo '<img src="uploaded_img/'.$user['image'].'">';
            }
            ?>
            <h1>
               <?php echo $user['name']; ?>
            </h1>
         </div>
         <div class="ratings">
            <span><?php echo $review['date']; ?></span>
            <p style="background:var(--main-color);"><i class="fas fa-star"></i> <span><?= $review['rating']; ?></span></p>
            <p class="description"><span></span><?= $review['description']; ?></span></p>
         </div>
      </div>
      <?php } ?>
   </div>
</section>
   
   <!-- reviews section ends -->
   
         <!-- footer start -->
      <section class="footer">
   
   <div class="box-container">
   
      <div class="box">
         <h3>Quick links</h3>
         <a href="about.php"><i class="fas fa-angle-right"></i>About Us</a>
         <a href="shop.php"><i class="fas fa-angle-right"></i>Shop</a>
         <a href="contact.php"><i class="fas fa-angle-right"></i>Contact Us</a>
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
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   
   <style>
   
</style>
   
   </body>
   </html>