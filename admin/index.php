<?php
include('../includes/connect.php'); 
include('../functions/function.php');
session_start();
if(!isset($_SESSION['admin_name'])){
  echo "<script>window.open('admin_login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css ko link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- font awesome ko link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!-- css ko file ko link -->
            <link href='../style.css' rel="stylesheet"></link>
          <style>
            .product_image{
              width:100px;
              object-fit:contain;
            }
          </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
            <!-- bootstrap ko code use garera child class haru banaucham navBar item ko laagi -->
            <!-- demo  -->
            <nav class="navbar navbar-expand-lg navbar-light bg-success p-auto">
               <!-- mobile view ko laagi toggle button ko code  -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <img src="../images/pp.jpg" alt="" class="logo"></img>
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome <?php echo $_SESSION['admin_name']?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='index.php?admin_profile' name='admin_profile'>My account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="admin_signout.php">Sign out</a></li>
          </ul>
        </li>
      </ul>
</nav>
    <!-- second child -->
      <div class='bglight'>
        <H2 class="text-center">Admin Dashboard</H2>
        <p class="text-center">Here you can perform the CRUD operations for the products (helmets) and users/staffs as well.</p>
      </div>  
        <!-- yaha chai 2 ta column ma chutyaune ho -->
      <div class="row m-auto">
        <div class="col-md-2 bg-dark rounded-start-5 min-vh-100 pt-5"> 
          <ul class="navbar-nav p-5">
          <li class="navbar-nav bg-gray">
                <a href="index.php?product" class="nav-link text-light"><h5>Products</h5></a>
            </li><li class="navbar-nav bg-gray">
              <!-- tala index.php?insert_category ma ? pachi ko insert_category get variable ho jasma hami insert_category.php file include garcham tei page ma load garna ko laagi -->
                <a href="index.php?category" class="nav-link text-light"><h5>Categories</h5></a>
            </li><li class="navbar-nav bg-gray">
                <a href="index.php?brand" class="nav-link text-light"><h5>Brands</h5></a>
            </li><li class="navbar-nav bg-gray">
                <a href="index.php?order" class="nav-link text-light"><h5>Orders</h5></a>
            </li><li class="navbar-nav bg-gray">
                <a href="index.php?user" class="nav-link text-light"><h5>Users</h5></a>
            </li><li class="navbar-nav bg-gray">
                <a href="index.php?payment" class="nav-link text-light"><h5>Payments</h5></a>
            </li> 
        </ul>
        </div>
        <div class="col-md-10 bg-dark text-light rounded-end-5">

          
          <!-- category ko link ma click garda tei page ma load huna ko laagi hamle tyo php file lai get variable ( insert_category) banayera tesma include garnu parne huncha -->
          <?php 
          if (isset($_GET['category'])) {
              include('category.php');
          } elseif (isset($_GET['product'])) {
              include('product.php');
          } elseif (isset($_GET['brand'])) {
              include('brand.php');
          } elseif (isset($_GET['order'])) {
              include('order.php');
          } elseif (isset($_GET['payment'])) {
              include('payment.php');
          } elseif (isset($_GET['user'])) {
              include('user.php');
          } elseif (isset($_GET['edit_product'])) {
              include('edit_product.php');
          } elseif (isset($_GET['delete_product'])) {
              include('delete_product.php');
          } elseif (isset($_GET['edit_category'])) {
              include('edit_category.php');
          } elseif (isset($_GET['delete_category'])) {
              include('delete_category.php');
          } elseif (isset($_GET['edit_brand'])) {
              include('edit_brand.php');
          } elseif (isset($_GET['delete_brand'])) {
              include('delete_brand.php');
          } elseif (isset($_GET['delete_order'])) {
              include('delete_order.php');
          } elseif (isset($_GET['delete_payment'])) {
              include('delete_payment.php');
          } elseif (isset($_GET['insert_user'])) {
              include('insert_user.php');
          } elseif (isset($_GET['delete_user'])) {
              include('delete_user.php');
          } elseif (isset($_GET['admin_profile'])) {
              include('admin_profile.php');
          } elseif (isset($_GET['insert_category'])) {
              include('insert_category.php');
          } elseif (isset($_GET['insert_product'])) {
              include('insert_product.php');
          } elseif (isset($_GET['insert_brand'])) {
              include('insert_brand.php');
          } elseif (isset($_GET['add_user'])) {
              include('add_user.php');
          } elseif (isset($_GET['edit_admin'])) {
              include('edit_admin.php');
          } elseif (isset($_GET['delete_admin'])) {
              include('delete_admin.php');
          } else {
              // Code to execute when none of the specified GET variables are set
              echo "
              <div class='container-fluid mt-5 h-50 d-flex align-items-center justify-content-center'>
          <h1 class=''>Welcome back ".$_SESSION['admin_name']." !! </h1>
          </div>";
          }
          ?>
          <!-- data haru post garna ko laagi php code lekhem -->
          
 </div>

 <div class="bg-gray p-3 text-center">
          <p>All rights reserved Designed by Kshitiz Rajan 2023</p>
        </div>

    <!-- bootstrap js ko link --><!-- Include jQuery and Popper.js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>




</body>
</html>