<?php

include '../config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login.php');
}
?>



<div class="sidebar">
    <div class="logo-details">
    <i class='bx bxs-store'></i>
      <span class="logo_name">Paras</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="category.php" >
            <i class='bx bx-box' ></i>
            <span class="links_name">All categories</span>
          </a>
        </li>
        <li>
          <a href="add_category.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Add category</span>
          </a>
        </li>
        <li>
          <a href="product.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">All products</span>
          </a>
        </li>
        <li>
          <a href="add_product.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Add products</span>
          </a>
        </li>
        <li>
          <a href="orders.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">New orders</span>
          </a>
        </li>
        <li>
          <a href="shipped.php">
           <i class='bx bx-book'></i>
            <span class="links_name">Shipped orders</span>
          </a>
        </li>
        <li>
          <a href="complete.php">
           <i class='bx bxs-book-alt'></i>
            <span class="links_name">Completed orders</span>
          </a>
        </li>
        <li>
          <a href="daywise.php">
           <i class='bx bx-calendar'></i>
            <span class="links_name">Daywise orders</span>
          </a>
        </li>
        <li>
        <a href="contacts.php">
          <i class='bx bx-message-detail'></i>
            <span class="links_name">Contacts</span>
          </a>
        </li>
       
        <li class="log_out">
        <a href="category.php?logout=<?php echo $user_id; ?>" class="delete-btn">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
 