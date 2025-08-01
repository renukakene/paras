<?php include("header.php"); ?>

<div class="container" >
 <div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card">
    <div class="card-header">
           <h2 class="text-center" style="color:#600070;"> Add Category </h2>
    </div>
    <div class="card-body">
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <label class="form-label text-secondary">Name:</label>
        <input type="text" class="form-control" name="name"><br>
        <label class="form-label text-secondary">Slug:</label>
        <input type="text" class="form-control" name="slug"><br>
        <label class="form-label">Description:</label>
        <input type="text" class="form-control" name="description"><br>
        <label class="form-label">Image:</label>
        <input type="file" class="form-control" name="image"><br>
        <input class="btn" type="submit" name="add_cat" value="Submit">
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>
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
          background-color:#da9eec;
          color: #600070;
          font-weight:600;
          font-size:large;
          border: 2px solid;
          border-color:#600070;
          width:90px;
         }

  </style>
<?php include('footer.php'); ?>