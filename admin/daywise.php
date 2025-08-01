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
  <!-- form for selecting daywise orders-->
  <div class="container" style="padding:100px;">

    <div class="row "> 
      <div class="col-lg-12">
        <div class="card">
        <form action="" method="post">
          <div class="row">
       
              <div class="col-sm-4">
                Select a date <input type="date" name="date" class="date">
              </div>
              <div class="col-sm-4">
                 Select status :
                <select name="status" class="drop-down">
                   <option value="pending">pending</option>
                   <option value="shipped">shipped</option>
                   <option value="completed">completed</option>
                </select>
              </div>
              <div class="col-sm-4">
                <input type="submit" class="btn btn-primary" value="Check" name="check">
              </div>
           </div>
          </form>

        </div>

      <section class="order" style="padding:20px;">
        
        <table class="table table-bordered" >

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
                if(isset($_POST['check'])){
                   $date=$_POST['date'];
                   $status=$_POST['status'];
      
                   $find=mysqli_query($con,"SELECT * FROM `order` WHERE status_date='$date' AND status='$status'");
                   if(mysqli_num_rows($find)>0){
                      while($fetch_orders=mysqli_fetch_assoc($find)){
              ?>
                  <tr>
                      <td><?php echo $fetch_orders['id']; ?></td>
                      <td><?php echo $fetch_orders['email']; ?></td>
                      <td><?php echo $fetch_orders['total_price']; ?>/-</td>
                      <td><?php echo $fetch_orders['total_products']; ?></td>
                      <td><?php echo $fetch_orders['date']; ?></td>
                      <td><?php echo $fetch_orders['status']; ?></td>
                      <td> 
                       <a href="details.php?view=<?php echo $fetch_orders['id']; ?>" class="btn" name="view">View
                      </a></td>
                  <tr>
                    
              <?php
              };
             };
            };
         ?>
        </tbody>
      </table>
      </section>
    </div>
   </div>
  </div>

  <style>

.order table{
        
        border:1px solid;
        width:100%
        text-align: center;
        align-self:center;
        }


        .order table th{
         padding:10px 10px 10px 10px;
         font-size:1rem;
         color: #fff;
         text-align: center;
         background-color:#600070;
        }

      .order table td{
         padding:10px 10px 10px 10px ;
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
         width:100px;
        }
  </style>
</body>
</html>