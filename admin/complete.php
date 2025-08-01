<?php include('header.php');?>
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
    <div class="container" style="padding:100px;">
    <div class="row "> 
         <div class="col-lg-12">
            <h2 class="text-center" style="color:#600070"> Completed Orders</h2>
         </div>
         </div>
    
      <!-- order section-->
   <section class="order">
      <div class="row">
      <div class="col-lg-12" style="padding:30px;">
      <table class="table table-bordered  ">

<thead>
 <th>Order Id</th>
 <th>Email ID</th>
 <th>Total price</th>
 <th>Total Products</th>
 <th>Date</th>
 <th>Status</th>

</thead>

<tbody>

<?php 

     $select_cart = mysqli_query($con, "SELECT * FROM `order`");

     if(mysqli_num_rows($select_cart) > 0){
     while($fetch_cart = mysqli_fetch_assoc($select_cart)){
     if($fetch_cart['status']=='completed'){
?>

<tr>
<td><?php echo $fetch_cart['id']; ?></td>
 <td><?php echo $fetch_cart['email']; ?></td>
 <td><?php echo $fetch_cart['total_price']; ?>/-</td>
   <td><?php echo $fetch_cart['total_products']; ?></td>
  <td><?php echo $fetch_cart['status_date']; ?></td>
  <td><?php echo $fetch_cart['status']; ?></td>
   
 <tr>
<?php

};
};
};
?>
</tbody>
      </div>
      </div>
            
          
        
   </section>

 </div>
     <style>
      

       .order table{
        padding: 1rem;
         border:1px solid;
         width:50%
         text-align: center;
         align-self:center;
         }


         .order table th{
          
          font-size:1rem;
          color: #fff;
          text-align: center;
          background-color:#600070;
         }

       .order table td{
          
             font-size:1rem;
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
          width:300px;
         }
      
     </style>
 </body>
</html>