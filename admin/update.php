<?php include('connection.php');?>
<?php include('header.php');?>
<?php
if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_description = $_POST['update_p_description'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = '../uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($con, "UPDATE `category` SET name = '$update_p_name', description= '$update_p_description', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      echo"<script>
      alert('category updated');
      window.location.href='add_category.php';
     </script>";
   }else{
      $message[] = 'product could not be updated';
      header('location:update.php');
   }

}

?>
<section class="edit-form-container" style="padding: 100px;">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($con, "SELECT * FROM `category` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>
<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card-header">
           <h1 class="text-primary text-center"> Update Category </h1>
    </div>
<div class="card-body">
   <form action="" method="post" enctype="multipart/form-data">
      <img src="../uploaded_img/<?php echo $fetch_edit['image']; ?>" height="100" alt=""><br>
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>"><br>
      <label class="form-label text-secondary">Name:</label>
      <input type="text" class="form-control" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>"><br>
      <label class="form-label text-secondary">Description:</label>
      <input type="text"  class="form-control" required name="update_p_description" value="<?php echo $fetch_edit['description']; ?>"><br>
      <label class="form-label text-secondary">Image:</label>
      <input type="file" class="form-control" required name="update_p_image" accept="image/png, image/jpg, image/jpeg"><br>
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class=" btn option-btn"><br>
   </form>
     </div>
   </div>
</div>
    
   <?php
            };
         };
        
      };
   ?>

</section>
<style>
    
     .card-header{
        border:2px solid;
     }
     .card-body{
        border:2px solid;
     }
    .form-control{
      border:1px solid;
      padding: 8px 10px;
      
    }
    .btn{
     background-color: blueviolet;
     box-sizing: border-box;   
     border:1px solid; 
      color:white;
    }

    .option-btn{
        background-color: blueviolet;
     box-sizing: border-box;   
     border:1px solid; 
      color:white;  
    }
</style>