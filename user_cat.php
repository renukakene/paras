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
   <?php include('admin/connection.php');?>
   <?php include('header.php');?>

<div class="conatiner " style="padding: 20px 20px 20px 20px;">
 
   <h1 class=" heading text-center">Latest Categories</h1>
   <section class="category" style="padding: 50px;">
    <div class="row">
   
      <?php
      
      $select_category = mysqli_query($con, "SELECT * FROM `category`");
      if(mysqli_num_rows($select_category) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_category)){
      ?>

      <div class=" col-lg-3 col-sm-3 col-md-4 mb-4">
       <div class="card">
            
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>"alt="">
            <a href="user_pro.php?category=<?php echo $fetch_product['slug']; ?>">
            <div class=" mx-auto">
            <input type="submit" class="btn" value="<?php echo $fetch_product['name']; ?>"></a>
            </div>

            
           
            
   
         </div>
         
      </div>
        

      <?php
         };
      };
      ?>

   
  </div>
 </section>
</div>
<?php include('footer.php'); ?>


<style>
   :root{
    --main-color:#8e44ad;
    --white:#fff;
    --black:#222;
    --light-black:#777;
    --light-white:#fff9;
    --dark-bg:rgba(0,0,0,.7);
    --border:.1rem solid var(--black);
    --light-bg:#eee;
    --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    --text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);
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

.card{
   position:relative;
   max-height:440px;
  max-width: 270px;
  border:2px solid;
  border-radius: 25px;
  border-color:#da9eec;
  padding: 20px 30px 30px 30px;
  background: #fff;
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2);
  z-index: 3;
  overflow: hidden;
  display: flex;
  overflow: hidden;
  transition: all 0.3s ease-out;
 }
 .card:hover {
  transform: translateY(-5px) scale(1.005) translateZ(0);
  box-shadow: 0 24px 36px rgba(0,0,0,0.11),
    0 24px 46px var(--box-shadow-color);
}
 
   .btn{
   background-color:#600070;
   border-radius:20px;
   font-weight:500px;
   width:130px;
   color: #fff;
   font-weight: 500;
   justify-self:center;
   border:2px solid;
   border-color:#da9eec;
   font-size:1.5rem;
   
 }
 
  .card img{
   position:relative;
  height: 120px;
  width: 120px;
  align-self:center;
  }

  .btn:hover {
    background-color:#fff;
    color: #600070;

  }

  
   </style>
</body>
</html>