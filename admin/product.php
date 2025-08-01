<?php include('header.php');?>
<?php include('connection.php');?>
<?php
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($con, "DELETE FROM `product` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:product.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

?>
<section class="display-product-table" style="padding:100px;">

   <table class="table table-bordered table-striped">

      <thead>
         <th>Product id</th>
         <th>Product  image</th>
         <th>Product name</th>
         <th>Brand name</th>
         <th> Product Quantity</th>
         <th>Product price</th>
         <th>Delete product</th>
         <th>Update Product</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($con, "SELECT * FROM `product`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="../uploaded_img/<?php echo $row['image']; ?>" height="50" alt=""></td>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['bname']; ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td>
            <?php echo $row['price']; ?></td>
            <td>
            <a href="../admin/product.php?delete=<?php echo $row['id']; ?>" class=" btn" 
             onclick="return confirm('are your sure you want to delete this?');"> delete </a></td>
             <td>
               <a href="../admin/change.php?edit=<?php echo $row['id']; ?>" class="btn"> update </a>
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
   width: 50%%;
   text-align: center;
}

.display-product-table table thead th{
   
   padding:0.5rem;
   font-size: 1rem;
   background-color:#600070;
   color:white;
}

.display-product-table table td{
   padding:0.5rem;
   font-size:1rem;
   color:var(--black);
}

.display-product-table table td:first-child{
    font-size:1rem;
   padding:0;
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
   padding:1.5rem;
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