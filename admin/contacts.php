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
    ?>
    <div class="container" style="padding:75px 20px ;">
    <div class="row"> 
         <div class="col-lg-12">
            <h2 class="text-center" style="color:#600070">Contacts</h2>
          </div>
         </div>

      <!-- order section-->
   <section class="order">
        
        <table class="table table-bordered  ">

               <thead>
                <th>Contact Id</th>
                <th>Username</th>
                <th>Email ID</th>
                <th>Phone</th>
                <th>Message</th>
                
                
               </thead>

      <tbody>

          <?php 
   
                    $select_cart = mysqli_query($con, "SELECT * FROM `contact`");
    
                    if(mysqli_num_rows($select_cart) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
           ?>

               <tr>
               <td><?php echo $fetch_cart['id']; ?></td>
                <td><?php echo $fetch_cart['name']; ?></td>
                <td><?php echo $fetch_cart['email']; ?></td>
                  <td><?php echo $fetch_cart['phone']; ?></td>
                 <td><?php echo $fetch_cart['message']; ?></td>
                 
            <?php
     
             };
             };
            ?>
       </tbody>
   </section>

 </div>
     <style>
      

       .order table{
         padding:70px;
         border:1px solid;
         width:100%
         text-align: center;
         align-self:center;
         }


         .order table th{
          padding:0.5rem;
          font-size:1rem;
          color: #fff;
          text-align: center;
          background-color:#600070;
         }

       .order table td{
          
             font-size:0.7rem;
            color:var(--black);
            text-align: center;
             font-weight:600;
             padding-bottom: 10px;
             height:15px;
         }
         .btn{
          background-color:#da9eec;
          color: #600070;
          font-weight:600;
          font-size:large;
          border: 2px solid;
          border-color:#600070;
          width:100px;
          height:40px;
         }
      
     </style>
 </body>
</html>