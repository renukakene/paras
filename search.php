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

if(isset($_POST['add_to_cart'])){
         
   $pname = $_POST['pname'];
   $price = $_POST['price'];
   $image = $_POST['image'];
   $quantity = 1;

$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE pname = '$pname'and user_id='$user_id'");

if(mysqli_num_rows($select_cart) > 0){
echo "<script>
alert('Product is already added');
window.location.href='search.php';
</script>";
}else{

$insert_product = mysqli_query($conn, "INSERT INTO `cart`(user_id,pname, price, image, quantity) VALUES
            ('$user_id','$pname', '$price', '$image', '$quantity')");
echo "<script>
alert('Product is  added');
window.location.href='search.php';
</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style1.css">
   <!-- custom css file link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   


</head>
<body>
   
<!-- header section starts  -->
<!-- header start -->
<section class="header">
<a href="home.php" class="logo">Paras stationary.</a>

<nav class="navbar">
<a href="home.php">Home</a>
<a href="about.php">About Us</a>
<a href="user_cat.php">Shop</a>
<a href="contactus.php">Contact Us</a>
<a href="order.php">Orders</a>

</nav>

       <div class="icons">
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <p class="name">Paras Stationary</p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
         <p class="account"><a href="login.php">login</a> or <a href="register.php">register</a></p>
      </div>

</section>
<!-- header end -->
<!-- header section ends -->

<!-- search form section starts  -->

<section class="search-form">
   <form method="post" action="">
      <input type="text" name="search_box" placeholder="search here..." class="box">
      <button type="submit" name="search_btn" class="fas fa-search"></button>
   </form>
</section>

<!-- search form section ends -->


<div class="conatiner mt-5 ">
 
  
   <section class="category" style="padding: 20px 30px 50px 100px;">
    <div class="row ">
   
      <?php
      if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
         $search_box = $_POST['search_box'];
      $select_product = mysqli_query($conn, "SELECT * FROM `product` WHERE pname='$search_box' or bname='$search_box'");
      if(mysqli_num_rows( $select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc( $select_product)){
      ?>
      
      <div class="col-lg-3 col-sm-3 col-md-4 mb-4">
      <div class="card">
      <form action="" method="POST">
      <div class="logo-cart">
      <i class='bx bx-shopping-bag'></i></div>
        <div class="images">
         <div class="row justify-content-center">
         <img src="uploaded_img/<?php echo $fetch_product['image'];?>" height="100"width="200"alt="">
         </div>
          
        </div>
          <div class="details">
            <h5 ><?php echo $fetch_product['pname']; ?>
            (<?php echo $fetch_product['bname']; ?>)
               </h5>  
               <div class="des"> <h6><?php echo $fetch_product['description']; ?></h6></div>
              
           </div>
           

             <h5><?php echo $fetch_product['price']; ?>/-</h5>
           
            
             
            <input type="hidden" name="pname" value="<?php echo $fetch_product['pname']; ?>">
            <input type="hidden" name="price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
             
               <div class="  mx-auto">
                <input  type="submit" class="btn " value="Add to cart" name="add_to_cart">
               </div>
                
              </form> 
         </div>
         
       </div>
   

      <?php
         };
      };
   };
      ?>

   
  </div>
 </section>
</div>
<style>
   .heading{
   color:#600070;
}
a{
   text-decoration: none;  
}
.card{
 
   position:relative;
   max-height:340px;
  max-width: 280px;
  border:2px solid;
  border-radius: 25px;
  border-color:#da9eec;
  padding: 20px 50px 30px 30px;
  background: #fff;
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2);
  z-index: 3;
  overflow: hidden;
  overflow: hidden;
  transition: all 0.3s ease-out;
 }
 .card:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 0 24px 36px rgba(0,0,0,0.11),
    0 24px 46px var(--box-shadow-color);
}
  .card .logo-cart i{
  font-size: 20px;
  color: #707070;
  cursor: pointer;
  transition: color 0.3s ease;
}
 .card .images img{
   position:relative;
  height: 120px;
  width: 120px;
 
 }
  .card .details{
    align-items: center;
  justify-content: space-between;
  }
 .card .details h5{
  font-size: 20px;
  font-weight: 600;
  color: #161616;
 }

 .card .des h6{
  font-size: 12px;
  font-weight: 400;
  color: #333;
  text-align: justify;
  color:#c54cf1;
 }
 .card .stars{
  align-items: center;
  justify-content: space-between;
 }
 .card .stars i{
  color:#e6c121;
 }

 .btn{
   background-color:#600070;
   border-radius: 25PX;
    height:40px;
   width:220px;
   color: #fff;
   font-weight: 500;
   font-size:large;
   border:2px solid;
   border-color:#da9eec;
   
 }

 .btn:hover {
    background-color:#fff;
    color: #600070;

  }

</style>
<!-- footer start -->



<script src="js/script.js"></script>


</body>
</html>
