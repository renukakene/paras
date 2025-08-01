<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Paras stationary website</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style1.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--bootstrap-css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
    <?php
      include('header.php');

     include('admin/connection.php');
   
     $user_id = $_SESSION['user_id'];
     
     if(!isset($user_id)){
        header('location:login.php');
     };
     
     if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login.php');
     }
       ?>
        
     
   
    <div class="container">
    <div class="row"> 
         <div class="col-lg-12">
            <h1 class="text-center">My Orders</h1>
          </div>
         </div>

      <!-- order section-->
   <section class="order">
        
        <table class="table table-bordered  ">

               <thead>
                <th>Order Id</th>
                <th>Email ID</th>
                <th>Total price</th>
                <th>Total Products</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
               </thead>

      <tbody>

          <?php 
   
                    $select_cart = mysqli_query($con, "SELECT * FROM `order` WHERE user_id='$user_id'");
    
                    if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
           ?>

                <tr>
                 <td><?php echo $fetch_cart['id']; ?></td>
                 <td><?php echo $fetch_cart['email']; ?></td>
                  <td><?php echo $fetch_cart['total_price']; ?>/-</td>
                  <td><?php echo $fetch_cart['total_products']; ?></td>
                  <td><?php echo $fetch_cart['date']; ?></td>
                  <td><?php echo $fetch_cart['status']; ?></td>
                   <td> 
                   <a href="details.php?view=<?php echo $fetch_cart['id']; ?>" class="btn" name="view">View
                  </a></td>
                </tr>
            <?php
     
             };
             };
            ?>
       </tbody>
   </section>

 </div>
     <style>
       h1{
         padding:20px;
       }

       section{
        padding:10px 10px 10px 10px ;         
       }

       .order table{
      
         border:1px solid;
         width:100%
         text-align: center;
         align-self:center;
         }


         .order table th{
          padding:10px 10px 10px 10px;
          font-size:2rem;
          color: #fff;
          text-align: center;
          background-color:#600070;
         }

       .order table td{
          padding:10px 10px 10px 10px ;
             font-size:2rem;
            color:var(--black);
            text-align: center;
             font-weight:600;
         }
         .btn{
          background-color:#da9eec;
          color: #600070;
          font-weight:600;
          font-size:large;
          border: 2px solid;
          border-color:#600070;
          width:100px;
         }
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
     </style>
 </body>
</html>