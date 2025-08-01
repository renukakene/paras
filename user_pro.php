<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
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
   
<?php include('admin/connection.php');
         include('header.php');

         $user_id = $_SESSION['user_id'];
     
         if(!isset($user_id)){
            header('location:login.php');
         };
         
         if(isset($_GET['logout'])){
            unset($user_id);
            session_destroy();
            header('location:login.php');
         }

          function getIDActive($table,$id)
       {
            global $con;
            $query="SELECT * FROM $table WHERE id='$id'";
            return $query_run= mysqli_query($con,$query);

       }
          function getSlugActive($table,$slug)
       {
            global $con;
            $query="SELECT * FROM $table WHERE slug='$slug'";
            return $query_run= mysqli_query($con,$query);

       }
             $category_slug=$_GET['category'];
             $category_data=getSlugActive("category",$category_slug);
             $category=mysqli_fetch_array($category_data);
             $cid=$category['id'];

      if(isset($_POST['add_to_cart'])){
         
             $pname = $_POST['pname'];
             $price = $_POST['price'];
             $image = $_POST['image'];
             $quantity = 1;

         $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE pname = '$pname'and user_id='$user_id'");

      if(mysqli_num_rows($select_cart) > 0){
        echo "<script>
        alert('Product is already added');
        window.location.href='user_cat.php';
       </script>";
    }else{

        $insert_product = mysqli_query($con, "INSERT INTO `cart`(user_id,pname, price, image, quantity) VALUES
                      ('$user_id','$pname', '$price', '$image', '$quantity')");
         echo "<script>
         alert('Product is added');
         window.location.href='user_cat.php';
        </script>";
    }
  }
  
?>
<div class="conatiner mt-5 ">
 
   <h1 class=" heading text-center" style="padding-top:10px; color: "><?=$category['name']?></h1>
   <section class="category" style="padding: 20px 30px 20px 55px;">
    <div class="row ">
   
      <?php
      
      $select_product = mysqli_query($con, "SELECT * FROM `product`WHERE category='$cid'");
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
         <img src="uploaded_img/<?php echo $fetch_product['image'];?>" height="150"width="200"alt="">
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
    
      ?>

   
  </div>
 </section>
</div>
<?php include('footer.php');?>

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
  padding: 20px 30px 30px 30px;
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
</body>
</html>