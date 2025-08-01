<?php

include '../config.php';

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login.php');
}
?>



<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Admin</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
      <?php
          $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
          if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
          }
          if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
          }else{
            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
          }
         ?>
         <h5>
            <?php echo $fetch['name']; ?>
         </h5>
      </div>

        <!--<img src="../uploaded_img/admin.png" alt="">
        <span class="admin_name">Admin</span>-->
      </div>
    </nav>
