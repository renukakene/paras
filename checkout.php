<?php

include('admin/connection.php');
include 'config.php';
include('header.php');

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];
   

   $select="SELECT * FROM 'product'  ";
   $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id='$user_id'");
   $price_total = 0;
  
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[]= $product_item['pname'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
         
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($con, "INSERT INTO `order`
   (user_id,name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price)
    VALUES('$user_id','$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');
      

   if($cart_query && $detail_query){
      
      echo "<script>
    alert('Order is placed');
    window.location.href='user_cat.php';
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
   <title>checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style1.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!--bootstrap-css Link-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<div class="container">
<div class="row justify-content-center">
   <div class="col-lg-12 text-center" style="padding:5px;"><h1>Checkout Now</h1></div>

   <div class="col-lg-8" style="padding:20px 30px;">
   <div class="card">
   <h4 class="text-center">complete your order</h4>
    <div class="border  rounded p4">
    <form action="" method="post">
     <div class="row justify-content-center">
      <div class="col-md-5">
         <span><h4>your name</h4></span>
         <input type="text" class="form-control" placeholder="enter your name" name="name" required>
      </div>
      <div class="col-md-5">
         <span><h4>your number</h4></span>
         <input type="text" class="form-control" placeholder="enter your number" name="number" required><br>
      </div>
     </div>
      <div class="row justify-content-center">
      <div class="col-md-5">
         <span><h4>your email</h4></span>
         <input type="email" class="form-control" placeholder="enter your email" name="email" required>
      </div>
      <div class="col-md-5">
         <span><h4>payment method</h4></span><br>
         <select name="method" >
            <option value="cash on delivery" selected>cash on devlivery</option>
            <option value="credit cart">Update in future</option>
         </select>
      </div>
     </div>
      <div class="row justify-content-center">
         <div class="col-md-5">
         <span><h4>address line 1</h4></span>
         <input type="text" class="form-control" placeholder="e.g. flat no." name="flat" required>
      </div>
      <div class="col-md-5">
         <span><h4>address line 2</h4></span>
         <input type="text" class="form-control"  placeholder="e.g. street name" name="street" required>
      </div></div>
      <div class="row justify-content-center">
         <div class="col-md-5">
         <span><h4>city</h4></span>
         <input type="text" class="form-control" placeholder="e.g. mumbai" name="city" required>
      </div>
      <div class="col-md-5">
         <span><h4>state</h4></span>
         <input type="text" class="form-control"  placeholder="e.g. maharashtra" name="state" required>
      </div></div>
      <div class="row justify-content-center">
         <div class="col-md-5">
         <span><h4>country</h4></span>
         <input type="text" class="form-control" placeholder="e.g. india" name="country" required>
      </div>
      <div class="col-md-5">
         <span><h4>pin code</h4></span>
         <input type="text" class="form-control" placeholder="e.g. 123456" name="pin_code" required>
      </div></div><br>
          
          <div class="d-grid gap-2 col-6 mx-auto">
          <input type="submit" value="Order Now" name="order_btn" class="btn">
          <a href="cart.php"  name="back" class="btn">Go To Cart</a>
          </div>
      </form><br>
    </div>
   </div>
  </div>
 <div class="col-lg-4" style="padding:20px;">
  <div class="row justify-content-center">
  <table class="table table-bordered" style="border:0.5px solid;">
    <thead class="text-center">
      <th>Product</th>
      <th>Product Name</th>
      <th>quantity</th>
    </thead>
    <tbody>
 <?php
      $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE  user_id='$user_id'");
      $total = 0;
      $grand_total = 0;
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
         $grand_total = $total += $total_price;
   ?>
    <tr class="text-center">
      <td><img src="uploaded_img/<?= $fetch_cart['image']; ?>" height="70" width="70"></td>
      <td ><?= $fetch_cart['pname']; ?></td>
      <td ><?= $fetch_cart['quantity']; ?></td>
    </tr>
   <?php
      }?>
      <tr class="text-center">
      <td colspan="3"> grand total : $<?= $grand_total; ?>/-</td>
    </tr>
   </tbody>
  
    <?php
   }else{
      echo "<div class='display-order'><span>your cart is empty!</span></div>";
   }
   ?>
  </table>
  </div>
 </div>
</div>
</section>
</div>
</div>
</div>

  
<!-- custom js file link  -->
<script src="js/script.js"></script>
<style>
   *{
    font-family: 'Rubik', sans-serif;
    text-decoration: none;
 }
a{
   text-decoration: none;  
}
    .card{
        border:1px solid;
    }

    .card .form-control{
      border:1px solid;
      padding: 0px 10px 10px 10px;
      margin-right:1px;
      margin-left:1px;
      font-size:large;
    }

    select{
      font-size:medium;
    }

    .btn{
      background-color:#81689D;
      color:#F2EFE5;
      font-size: large;
    }
</style>
</body>
</html>