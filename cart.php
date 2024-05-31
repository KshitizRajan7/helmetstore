<?php
include('./includes/connect.php');
include('functions/function.php');
session_start();
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
        <link href='./style.css' rel="stylesheet"></link>
        <style> 
        /* table vitra ko img ma style apply vako thiyena tei vayera internal styling gardiyem */
        .cartImg{
      width: 100%;
      height: 50px;
      object-fit: contain;
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
                  <a class='nav-link ml-0' href='#'>Welcome ".$_SESSION['username']." </a>
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
      <li class="nav-item">
          <a class="nav-link" name='cart_icon' href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a> <!-- cart ko icon ma number lagauna ko laagi hami HTMl superscript ko use garem -->
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php echo"$total" ?></a>
        </li> -->
      </ul>
        
    </div>
  </div>
</nav>

        <!-- Third child-->

        <div class="bglight">
          <h3 class="text-center">Helmet Store</h3>
          <p class="text-center"> Helmet paune thau </p>
        </div>

        <!-- fourth child -->
        <!-- row column ko kura aauda jamma 12 ota samma hamle paucham -->
        <div class='row'>
          <div class="col-md-12">
            <!-- helmets lai card ma dekhauna lagem  -->
            <div class="row">
        <h1 class='text-center'> Table of the cart detail</h1> 
         <!-- function to remove checked items -->
        
        <form method='post' action=''>
        <?php 
                     global $con;
                     $ip = getIPAddress();
                     $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip'";
                     $result = mysqli_query($con, $cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count >0){
                      echo"<div class='container d-flex justify-content-end mt-3 mb-3'><input type='submit' class='btn btn-danger' name='remove_checked_cart' value='Remove Checked items'></input></div>
                      ";
            }
        ?>
        
            <table class='table  table-bordered mx-2'>
                <tbody>
                    <!-- aba yaha php lekhcham data retrieve garnako laagi -->
                    <?php 
                     global $con;
                     $ip = getIPAddress();
                     $total = 0;
                     $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip'";
                     $result = mysqli_query($con, $cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count >0){
                        echo"<thead class='text-center'>
                        <tr> 
                            <th>Mark</th>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Operations</th>
                        </tr>
                    </thead>";
                     while ($row = mysqli_fetch_array($result)){
                        $product_id = $row['product_id'];
                        $select_products_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
                        $result_product = mysqli_query($con, $select_products_query);
                    while($row_product = mysqli_fetch_array($result_product)){
                            $product_price = array($row_product['product_price']);
                            $price_table = $row_product['product_price'];
                            $product_title = $row_product['product_title'];
                            $product_image = $row_product['product_image1'];
                            $product_values = array_sum($product_price);
                            $total+= $product_values;
                    ?>
                <tr class='text-center'>
                    <td><input type='checkbox' name='removeitem[]' value='<?php echo$product_id ?>'></td>
                    <!-- hamile cart items fetch garda nai product id pani nikaleko thiyem tei checkbox ko value ma halem -->
                    <td><?php echo "$product_title" ?></td>
                    <td><img class='cartImg' alt='' src='./images/<?php echo "$product_image" ?>'></td>
                    <td><input type='text' name='qty' class='form-input width-50'></td>
                    <td><?php echo "$price_table" ?> /-</td>
                    <td>
                        <input type="submit" class='btn btn-primary' name='update_cart' value="Update"></input>
                        <!-- aba yaha update ko laagi php code lekhem -->
                    <?php 
                      GLOBAL $con;
                      $ip= getIPAddress(); //global variable hamle function haru ma matra use garem
                      if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_query="update `cart` set quantity=? where ip_address=?";
                        $statement = mysqli_prepare($con, $update_query);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($statement, "is", $quantities, $ip); //yo bind ma is vaneko integer ani string parameter lai bind gareko ho
    mysqli_stmt_execute($statement);
                      
    // Check for errors in executing the statement

    // Close the statement

      // mysqli_stmt_close($statement);
    if($quantities == null)
    {
      echo"<script>alert('quantity is null.')</script>";
      echo"<script>window.open('cart.php','_self')</script>";
    }else{
            $total = $quantities*$total;
    }
  }
?>
<input type="submit" class='btn btn-danger' name='remove_cart' value='Delete'></input>
                    </td>
                  </tr></tbody>
                   <?php }}}
                   else{
                    echo"<h1 class='text-center text-primary'>Cart is Empty.</h1>";
                   }
                   ?>
        </table>
        <?php 
                     global $con;
                     $ip = getIPAddress();
                     $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip'";
                     $result = mysqli_query($con, $cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count >0){
                      echo"
    <div class='text-center'>
            <h4>Sub total: $total /- </h4>
            <div class='d-flex justify-content-center'>
                <a href='index.php' class='btn btn-primary border-0 mx-2'>Continue Shopping</a>
                <a href='checkout.php' class='btn btn-success'>Check Out</a>
            </div>
            ";}else{
              echo"
              <div class='text-center'>
                      <div class='d-flex justify-content-center'>
                          <a href='index.php' class='btn btn-primary border-0 mx-2'>Continue Shopping</a>
                      ";
            }
        ?>
        </div>
    </form>

   <!-- form ko bahira hami function banaucham remove ko laagi -->
   <?php 
   function remove_cart_item(){
    global $con;
    $ip=getIPAddress();
    $del_cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip'";
    $del_result = mysqli_query($con, $del_cart_query);
    while ($row = mysqli_fetch_array($del_result)){ //yo while loop le each row of table lai iterate garcha ra tesbata product_id lai fetch garcha
      $product_id = $row['product_id'];}
    if(isset($_POST['remove_cart'])){
      if(!isset($_POST['removeitem'])){
      $single_delete_query="Delete from `cart`where product_id=$product_id";
      $run=mysqli_query($con,$single_delete_query);
        if($single_delete_query){
          echo"<script>window.open('cart.php','_self')</script>";
        }
      // }else{
      // // check gareko item array ma cha teslai access garna lai foreach loop laye
      // foreach($_POST['removeitem'] as $remove_id){
      //   echo $remove_id;
      //   $delete_query="Delete from `cart` where product_id=$remove_id";
      //   $run=mysqli_query($con,$delete_query);
      //   if($delete_query){
      //     echo"<script>window.open('cart.php','_self')</script>";
      //   }
      // }}}
      }}
   }
   echo $remove_item=remove_cart_item();

   function remove_checked_item(){
    global $con;
    if (isset($_POST['remove_checked_cart'])) {
      if (isset($_POST['removeitem'])) { // && is_array($_POST['removeitem'] yo check chai foreach loop le undefined ya non-array variable lai fetch garda error na aaos vanera halem , yaha chai hamle removeitem wala button set vako chaina ya tesma remove_id null cha vane chai alert dekhaune banauma yo use garem
          foreach ($_POST['removeitem'] as $remove_id) {
              $delete_query = "DELETE FROM `cart` WHERE product_id=$remove_id";
              $run = mysqli_query($con, $delete_query);
          }
          if ($run) {
              echo "<script>window.open('cart.php','_self')</script>";
          }
      } else {
          echo "<script>alert('No items selected to remove.')</script>";
      }
  }
}
   echo $remove_checked_item=remove_checked_item();
   ?>
 <!-- </div>  -->
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