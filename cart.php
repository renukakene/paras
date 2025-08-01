<?php
include('admin/connection.php');
include 'config.php';

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

if(isset($_POST['update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style1.css">
    
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!--bootstrap-css Link-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    
    
</head>
<body>

<?php include('header.php');?>

<div class="container" >

<section class="shopping-cart">

   <h1 class="heading text-center">shopping cart</h1>

   <table class="table table-bordered ">

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id='$user_id'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['pname']; ?></td>
            <td>Rs<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" class="btn" name="update_btn" style="background-color:#E19898;">
               </form>   
            </td>
            <td>Rs<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')"
             class="btn" style=" background-color:#BF3131; color:white;"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="user_cat.php" class="btn" style="margin-top: 0; background-color:#81689D">
            continue shopping</a></td>
            <td colspan="3" >Grand total</td>
            <td>Rs<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" 
            class="btn" style=" background-color:#BF3131; color:white;"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>
   <div class="d-grid col-6 mx-auto">
      <a href="checkout.php" class="btn">proceed to checkout</a></div>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="script.js"></script>
<style>

html{
    text-decoration: none;
    scroll-behavior: smooth;
    scroll-padding-top: 8rem;
 }
*{
    font-family: 'Rubik', sans-serif;
    text-decoration: none;
 }
a{
   text-decoration: none;  
}
.heading{
   color:#B637FB;
}
    .shopping-cart table{
   text-align: center;
   width: 1100px;
   border: 1px solid;

}

.shopping-cart table thead th{
   
   font-size: 2rem;
   background-color:#512B81;
   color:white;

  
}

.shopping-cart table tr td{
   border-bottom: var(--border);
   background-color:#FFFF;
   font-size: 2rem;
   
}

@media screen {
   
padding:1 px;
}

.shopping-cart .table-bottom td{
font-size:2rem;
}

.btn{
   text-align: center;
   justify-content: center;
   margin-top: 1rem;
   color:white;
   background-color: #5D3587;
   font-size:2rem;
}

</style>
</body>
</html>