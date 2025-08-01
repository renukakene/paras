<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Paras stationary website</title>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--bootstrap-css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <?php
   include('connection.php');
   include '../config.php';
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

if(isset($_POST['update_payment'])){

    $id = $_POST['id'];
    $status = $_POST['status'];
    $date=$_POST['date'];
    $update_status = $con->prepare("UPDATE `order` SET  status = ? , status_date= ? WHERE id = ?");
    $update_status->execute([$status,$date, $id]);
    echo"<script>
    alert('order status updated ');
    window.location.href='orders.php';
   </script>";
 
 }
  ?>
   
      
<div class='container'>
   <div class='message'>
       <div class="row">
         <div class="col-lg-12">
         <h3 class="text-center">Customer Details</h3></div>
         </div>
       </div>
       <div class="row justify-content-center">
       <div class="col-lg-6 ">
       <div class='order-detail'>
       <div class="card">
         
         <?php if(isset($_GET['view'])){ 
           $id=$_GET['view'];
           $order_query = mysqli_query($con, "SELECT * FROM `order` WHERE  id='$id' ");
              if(mysqli_num_rows($order_query) > 0){
                while($fetch_product = mysqli_fetch_assoc( $order_query)){
            ?>
           
           <div class='customer-details ' >
            <h2 class="text-center">Your Details</h2>
            
               <p> <b> Your Name  :</b> <?php echo $fetch_product['name']; ?></P>
               <p><b> Your Number  :</b><?php echo $fetch_product['number']; ?></p>
               <p><b>Your Email    :</b> <?php echo $fetch_product['email']; ?></p>
               <p><b>Your Address   :</b><?php echo $fetch_product['flat']; ?>,
                                       <?php echo $fetch_product['street']; ?>,
                                       <?php echo $fetch_product['city']; ?>,
                                       <?php echo $fetch_product['state']; ?>,
                                       <?php echo $fetch_product['country']; ?>
                 </p>
               <p><b>PIN Code :</b> <?php echo $fetch_product['pin_code']; ?></p>
               <p><b>Total products :</b> <?php echo $fetch_product['total_products']; ?></p>
               <p><b>Your Payment Mode :</b><?php echo $fetch_product['method']; ?></p>
               <p><b> Order status : </b><span style="color:
                 <?php
                   if($fetch_product['status'] == 'pending')
                    { echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_product['status']; ?></span> </p>
                <form action="" method="POST">
                  <input type="hidden" name="id" value="<?php echo $id?>">
                   <select name="status" class="drop-down">
                    <option value="" selected disabled><?= $fetch_product['status']; ?></option>
                     <option value="pending">Pending</option>
                     <option value="shipped">Shipped</option>
                     <option value="completed">Completed</option>
                   </select><br><br>
                   <p><b>Select a date:</b><input type="date" name="date" class="date">
                <div class="msg text-center">
            
            </div>
           <div class="flex-btn">
           <center> <input type="submit" value="update" class="btn" name="update_payment">
           <a href="orders.php" class="btn">Back</a>
          </center>
            
         </div>
      </form>
   <?php
      }
     }
    }      
    ?>   
  </div>
            
        </div>
        
         </div>
        </div>
      </div>
    </div>
    

   <style>
    .message{
      padding:30px;
    }

      .message h3{
        color:#834f97;
        background:#fff;
        height:10px;
      }
     
    .order-details{
      padding: 10px 30px 30px 30px;
    }
   
    .card{
      padding:10px;
      border:5px solid;
      height: 580px;
      border-radius: 25px;
      border-color:#834f97;
      box-shadow: 0 20px 20px rgba(0, 0, 0, 0.5);
    }

    .customer-details h2{
      font-weight:400;;
      font-weight:700;
    }
    
     .msg p{
      font-weight:600;
      color:#834f97;
      font-size:large;
      
     }

     .btn{
   text-align: center;
   color:white;
   font-size:large;
   background-color: #5D3587;
   font-weight:600;
   }
    .btn :hover{
      color:white;
    }
    
   </style>
  </body>
</html>