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

  
<!-- header start -->
<section class="header" style="max-height:100px; text-decoration:none;">
    <a href="home.php" class="logo">Paras stationary</a>

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
        <a href="home.php?logout=<?php echo $user_id; ?>" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>

        <p class="account">new <a href="login.php">login</a> or <a href="register.php">register</a></p>
    </div>
</section>
<!-- header end -->
  