<?php
include('./includes/connect.php');
include('functions/function.php');
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>window.open('user_login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helmet Store</title>
        <!-- bootstrap CSS ko link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- font awesome ko link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css ko file ko link -->
        <link href='style.css' rel="stylesheet"></link>
        <style> 
        /* table vitra ko img ma style apply vako thiyena tei vayera internal styling gardiyem */
        .cartImg{
      width: 100%;
      height: 50px;
      object-fit: contain;
                } 
         .profileImage{
                    width: 70%;
                    margin:auto;
                    display:block;
                    
                      }
</style>
</head>
<body>
        <!-- navBar ko laagi -->
        <div class="container-fluid">
        <nav class='navbar navbar-expand-lg navbar-light bg-light p-auto'>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <img src='./images/pp.jpg' alt='' class='logo'></img>
      <div class='mx-auto'>
        <form class='d-flex' role='search' action='index.php?' method='get'>
          <input name='search_data' class='form-control me-2' style='width: 50vw' type='search' placeholder='Search for the helmets' aria-label='Search'>
          <button type='submit' name='search_data_product' class='btn btn-outline-dark' value='search'><i class='fas fa-search'></i></button> 
        </form>
      </div>
      <ul class='navbar-nav'>
        
                <?php 
                if(!isset($_SESSION['username'])){
                  echo"
                  <li class='nav-item'>
                  <a class='nav-link ml-0' href='#'>Welcome Guest</a>
                  </li>
                  <li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Sign in / Sign up
                  </a>
                  <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='user_login.php'>Sign in</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='user_registration.php'>Sign up</a></li>
          </ul>";
                }else{
                  echo"
                  <li class='nav-item'>
                  <a class='nav-link ml-0' href='profile.php'>Welcome ".$_SESSION['username']." </a>
                  </li><li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Sign out / Sign up
                  </a>
                  <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='signout.php'>Sign out</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='user_registration.php'>Sign up</a></li>
          </ul>";
                }
                ?>
          
        </li>
      </ul>
    </div>
  </nav>
<!-- yaha cart function lai call garem -->
<?php 
cart();
?>
        <!-- second child -->

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid p-0"> <!-- navbar le left to right ko area cover garos vanera padding 0 diyem   -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!-- mathi data-bs-target ma j value cha tei value id ma hunuparcha natra yesle function gardaina -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Helmets</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <?php
            getCategories();
            ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Brands
          </a>
          <ul class="dropdown-menu">
          <?php
          getBrands();
            ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <!-- yo function banayera tei page ma access garne arko bela garam -->
      <!-- <li class="nav-item">
          <a class="nav-link" name='cart_icon' href="index.php?cart_icon"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a> 
        </li> -->
        <li class="nav-item">
          <a class="nav-link" name='cart_icon' href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php cart_total(); ?></a>
        </li>
      </ul>
        
    </div>
  </div>
</nav>

        <!-- Third child-->

        <div class="bglight">
          <h3 class="text-center">Helmet Store</h3>
          <p class="text-center"> Helmet paune thau </p>
        </div>        

                <!-- aba yaha bata profile banaucham -->
                <div class="row">
                    <div class="col-md-2 p-0">
                        <ul class="navbar-nav bg-black text-white text-center" style="height:100vh">
                        <li class="nav-item">
                            <a class="nav-link text-light bg-secondary" href="#"><h4>Your Profile</h4></a>
                        </li>
                        <?php 
                         $name=$_SESSION['username'];
                         $image="select * from `users` where user_name='$name'";
                         $result_img=mysqli_query($con,$image);
                         $fetch_image=mysqli_fetch_array($result_img);
                         $user_image=$fetch_image['user_image'];
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php?pending_orders">My Pending Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php?orders">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php?edit_account">Edit My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php?delete_account">Delete My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signout.php">Sign Out</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                      <?php  
                      order_details();
                      if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                      } 
                      if(isset($_GET['orders'])){
                        include('orders.php');
                      }
                      if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                      }
                       ?>
                    </div>
                    <div class="col-md-2">
                        <?php 
                        $username=$_SESSION['username'];
                        $user_image="select * from `users` where user_name='$username'";
                        $result_image=mysqli_query($con,$user_image);
                        $fetch_image=mysqli_fetch_array($result_image);
                        $image=$fetch_image['user_image'];
                        echo "
                        <img src='users/user_images/$image' alt='' class='profileImage'>
                        <ul class='navbar-nav my-2'>    
                            <h4 class='text-center'>$username</h4>
                        </ul>";
                        
                        ?>
                    </div>
                </div>


        <!-- last child -->

        <footer class=" bg-gray p-3 text-center">
          <p>All rights reserved Designed by Kshitiz Rajan 2023</p>
</footer>
        <!-- bootstrap js ko link  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
</body>
</html>