<?php
session_start();
include('connection.php');
if(isset($_POST['add_cat'])){

  $name=$_POST['name'];
  $description=$_POST['description'];
  $slug=$_POST['slug'];
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = '../uploaded_img/'.$image;

  $catquery="INSERT into category(name,slug,description,image) VALUES ('$name','$slug','$description','$image')";

  $catquery_run=mysqli_query($con,$catquery);

  if($catquery_run){

     move_uploaded_file($image_tmp_name, $image_folder);
     echo"<script>
        alert('category added ');
        window.location.href='index.php';
       </script>";
  }else
  {
    echo"<script>
    alert('item not added');
    window.location.href='index.php';
   </script>";

  }
}


if(isset($_POST['add_pro'])){

  $pname=$_POST['pname'];
  $bname=$_POST['bname'];
  $category=$_POST['category'];
  $description=$_POST['description'];
  $quantity=$_POST['qty'];
  $price=$_POST['price'];
  $image = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = '../uploaded_img/'.$image;

  $catquery="INSERT into product (pname,bname,category,description,quantity,price,image)
   VALUES ('$pname','$bname','$category','$description','$price','$quantity','$image')";

  $catquery_run=mysqli_query($con,$catquery);

  if($catquery_run){

     move_uploaded_file($image_tmp_name, $image_folder);
     echo"<script>
        alert('Product added ');
        window.location.href='index.php';
       </script>";
  }else
  {
    echo"<script>
    alert('item not added');
    window.location.href='index.php';
   </script>";

  }
}


