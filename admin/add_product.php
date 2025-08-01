<?php include("header.php"); ?>
<?php include("connection.php");?>
  <?php function getALL($table){
    global $con;
    $query="SELECT * FROM $table";
    return $query_run= mysqli_query($con,$query);
  }
  ?>
<div class="container" style="padding: 90px;" >
 <div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
    <div class="card-header">
           <h2 class="text-center" style="color: #600070;"> Add Product </h2>
    </div>
  
    <div class="card-body">
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
              <label class="form-label text-secondary"> Product Name:</label>
            <input type="text" class="form-control" name="pname">
          </div>
          <div class="col-md-6">
             <label class="form-label text-secondary"> Brand Name:</label>
             <input type="text" class="form-control" name="bname"><br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
           Select Category:
        <select name="category" class="form-select" aria-label="Default select example" style="padding:10px;">
       
            <?php 
              $category=getALL("category");

              if(mysqli_num_rows($category)>0){
               
                foreach($category as $item){
                    ?>
                    <option value="<?=$item['id'] ?>"><?=$item['name'] ?></option>
                    <?php
                  }
              }
              else{
                 echo"no category" ;
              }
              
            ?>
          </select><br>
        </div>
        <div class="col-md-6">
        <label class="form-label">Description:</label>
        <input type="text" class="form-control" name="description"><br>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Quantity:</label>
             <input type="number" class="form-control" name="qty"><br></div>
          <div class="col-md-6">
            <label class="form-label">Price:</label>
            <input type="number" class="form-control" name="price"><br>
          </div>
        </div>
        
       
        <label class="form-label">Image:</label>
        <input type="file" class="form-control" name="image"><br>
        <input class="btn" type="submit" name="add_pro" value="Submit">
      </form>
    </div>
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
