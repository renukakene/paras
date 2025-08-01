<?php include('header.php');?>
<?php include('connection.php');?>
<?php
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `category` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:category.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

?>

<section class="display-product-table" style="padding:100px;">

   <table class="table table-bordered table-striped"style="padding:100px;">

      <thead>
         <th>category id</th>
         <th>category  image</th>
         <th>category name</th>
         <th>Delete category</th>
         <th>Update category</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($con, "SELECT * FROM `category`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="../uploaded_img/<?php echo $row['image']; ?>" height="60" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>
            <a href="../admin/category.php?delete=<?php echo $row['id']; ?>" class=" btn" 
             onclick="return confirm('are your sure you want to delete this?');"> delete </a></td>
             <td>
               <a href="../admin/update.php?edit=<?php echo $row['id']; ?>" class="btn"> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>


</section>


<style>
    .display-product-table table{
   border:1px solid;
   width: 100%;
   text-align: center;
   align-self:center;
}

.display-product-table table thead th{
   
   padding:0.5rem;
   font-size: 1rem;
   background-color:#600070;
   color:white;
}

.display-product-table table td{
   padding:0.5rem;
   font-weight:600;
   font-size:1rem;
   color:var(--black);
}

.display-product-table table td:first-child{
    font-size:1rem;
   padding:0.5rem;
}


.display-product-table table tr:nth-child(even){
   background-color: var(--bg-color);
}

.display-product-table .empty{
   margin-bottom: 1rem;
   text-align: center;
   background-color: var(--bg-color);
   color:var(--black);
   font-size: 1rem;
   padding:;
}
.btn{
          background-color:#da9eec;
          color: #600070;
          font-weight:600;
          font-size:large;
          border: 2px solid;
          border-color:#600070;
          width:90px;
          height:40px;
         }

</style>