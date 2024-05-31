<?php

//database sanga ko connection ko laagi
 $con=mysqli_connect('localhost','root','','HelmetStore'); // hami le connect.php lai direct call nagereko kaaran chai jaba checkout.php ma function.php include vayo teti bela connect.php ko path function.php ma jada arkai vetiyo jasle garda aru thau ko laagi path sahi thiyo tara checkout.php ko laagi tyo path sahi thiyena
if(!$con){
    die(mysqli_error($con));
}

//products haru randomly aaune function

function getProducts(){
    //yaha connection ko laagi global variable banayera connection garnu parne huncha kina ki yo seperate file ma cha
    global $con;

    //aba brand ra category anusar ko product dekhauna ko laagi condition check garem 

    if(!isset($_GET['category'])){ // yo [] vtira ko category ra brand url ma j cha tei spelling lekhem
        if (!isset($_GET['brand'])){
          if(!isset($_GET['search_data_product'])){
          if(!isset($_GET['product'])){
            if(!isset($_GET['cart_icon'])){
              if(!isset($_GET['update_cart'])){
    $select_query="Select * from `products` order by rand() limit 0,10"; //harek page refresh ma randomly product aaos vanera order by rand() ani limited product display garauna limit 0,10 garem jasle 10 ota product matra dekhacha
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "
        <div class='col-md-3 mb-2'>
          <div class='card' >
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price : Rs $product_price /-</p>
<a href='index.php?cart=$product_id' class='btn btn-primary'>Add to cart</a>
<a class='btn btn-secondary' href='index.php?product=$product_id' name='product_detail'>View Detail</a>
</div>
</div>
</div>";
    }}
  }
  }
  }
}
}
}


//brands ra categories ko drop downlist ma dynamically display garaune php code
//categories ko laagi 
function getCategories(){
    global $con;
$select_categories="select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);
while($row_data=mysqli_fetch_assoc($result_categories)){
  $category_title=$row_data['cat_title'];
  $category_id=$row_data['cat_id'];
  echo "<li><a class='dropdown-item' href='index.php?category=$category_id'>$category_title</a></li>";

}
  } 

//brand ko laagi 
function getBrands(){
    global $con;
    $select_brands="select * from `brands`";
            $result_brands=mysqli_query($con,$select_brands);
            while($row_data=mysqli_fetch_assoc($result_brands)){
              $brand_title=$row_data['brand_title'];
              //id vaneko hami brand anusar ko product aaos vanera index.php?brandid=$brand_id vanera use garne cham
              $brand_id=$row_data['brand_id'];
              echo "<li><a class='dropdown-item' href='index.php?brand=$brand_id'>$brand_title</a></li>";

            }
}

// aba category ra brand select gareko anusar product dekhayem
function getrequiredcategory(){
    //yaha connection ko laagi global variable banayera connection garnu parne huncha
    global $con;
    if(isset($_GET['category'])){ // yo [] vtira ko category ra brand url ma j cha tei spelling lekhem
    $category_id=$_GET['category'];
    $select_query="Select * from `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
      // aba data exist garcha ki gardaina vanera mathi ko execution anusar hami number of rows count garcham, yedi number 0 vayo vane hami no stock available output dimcham
    $num_of_rows=mysqli_num_rows($result_query); // mysqli_num_rows le rows count garcha 
    if($num_of_rows == 0){
      echo" <h1 class='text-center text-dark mt-5'> No stock available of this category</h1>";
    }


    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "
        <div class='col-md-3 mb-2'>
          <div class='card' >
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price : Rs $product_price /-</p>
<a href='index.php?cart=$product_id' class='btn btn-primary'>Add to cart</a>
<a class='btn btn-secondary' href='index.php?product=$product_id' name='product_detail'>View Detail</a>

</div>
</div>
</div>";
    }
  }
  }

  function getrequiredbrand(){
    //yaha connection ko laagi global variable banayera connection garnu parne huncha
    global $con;
    if(isset($_GET['brand'])){ // yo [] vtira ko category ra brand url ma j cha tei spelling lekhem
    $brand_id=$_GET['brand'];
    $select_query="Select * from `products` where brand_id=$brand_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "
        <div class='col-md-3 mb-2'>
          <div class='card' >
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price : Rs $product_price /-</p>
<a href='#' class='btn btn-primary'>Add to cart</a>
<a class='btn btn-secondary' href='index.php?product=$product_id' name='product_detail'>View Detail</a>

</div>
</div>
</div>";
    }
  }
  }

//aba search ko laagi function banayem 

function search_product(){

global $con;
    if(isset($_GET['search_data_product'])){
    $search_data=$_GET['search_data'];
    $search_query= "select * from `products` where product_keyword like '%$search_data%'"; //like '%%' yo percentage ko bich ma vayeko word jun postion ma vayeni select huncha
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query); // mysqli_num_rows le rows count garcha 
    if($num_of_rows == 0){
      echo" <h1 class='text-center text-dark mt-5'> No stock available of this keyword.</h1>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "
        <div class='col-md-3 mb-2'>
          <div class='card' >
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price : Rs $product_price /-</p>
<a href='index.php?cart=$product_id' class='btn btn-primary'>Add to cart</a>
<a class='btn btn-secondary' href='index.php?product=$product_id' name='product_detail'>View Detail</a>
</div>
</div>
</div>";
    }
  }
}

//product_details ko laagi function banayem 

function product_detail(){
  //yaha connection ko laagi global variable banayera connection garnu parne huncha
  global $con;

  //aba brand ra category anusar ko product dekhauna ko laagi condition check garem 
  if(isset($_GET['product'])){ {
//     // yo [] vtira ko category ra brand url ma j cha tei spelling lekhem{
  $product_id=$_GET['product'];
  $select_query="Select * from `products` where product_id=$product_id"; //harek page refresh ma randomly product aaos vanera order by rand() ani limited product display garauna limit 0,10 garem jasle 10 ota product matra dekhacha
  $result_query=mysqli_query($con,$select_query);
  while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "
      <div class='col-md-3 mb-2'>
        <div class='card' >
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price : Rs $product_price /-</p>
<a href='index.php?cart=$product_id' class='btn btn-primary'>Add to cart</a>
<a href='index.php' class='btn btn-secondary name='home'>home</a>
</div>
</div>
</div>
<div class='col-md-8'>
<div class='row'>
<div class='col-md-12'>
<h4 class='text-center text-info'>Related Product</h4>
</div>
<div class='col-md-6 mt-5'>
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
</div>
<div class='col-md-6 mt-5'>
<img src='./admin/Helmet_images/$product_image1' class='card-img-top' alt='$product_title'>
</div>
<p class='mt-5'>Here are some of the photos from different angles</p>
</div>
</div>"
;
  }}
}
  }

//aba different user anusar ko multiple orders haru cart ma halincha tesko lagi hami user ko ip address use garcham ra tesko laagi get ip address with php lai interent bata khojera copy garera paste garem

  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

//aba cart ko laagi function banaucham user ko Ip address use garera

function cart(){
  if(isset($_GET['cart'])){
    global $con; 
    $ip= getIPAddress(); //yaha ::1 vanera value aaunecha
    $product_id=$_GET['cart']; //yaha get variable ma j value aako thiyo product ko tehi value aaune cha
    $select_query="select * from `cart` where ip_address='$ip' and product_id=$product_id"; //yesle ip address anusar ko product lai select garnecha(yaha user anusar ko product select huncha)
    $result=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result);
    if($num_of_rows > 0 ){
      echo"<script> alert('This is already present inside the cart')</script>";
      echo"<script> window.open('index.php','_self')</script>"; // yo alert ma aako message lai ok garepachi naya tab ma open nahuna ko lagi _self use gariyo tei tab ma refresh huna lai
    }else{
      $insert_query="insert into `cart` (product_id,ip_address,quantity) values ($product_id,'$ip',0)";
      $result=mysqli_query($con,$insert_query);
      echo"<script> alert('Added to cart')</script>";
      echo"<script> window.open('index.php','_self')</script>";
    }
  }
}

//aba cart ko icon ma dynamic data load hos vanera function lekhem 

function cart_item(){
  if(isset($_GET['cart'])){
    global $con; 
    $ip= getIPAddress(); //yaha ::1 vanera value aaunecha
    $select_query="select * from `cart` where ip_address='$ip'"; //yaha ip address matra check huncha particular user le select gareko items ko laagi 
    $result=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result); //yaha number of items count huncha
    }else{
      //hami if ma j cha else ma ni tei copy garcham kina ki page jata redirect vayepani cart ko icon ma data dynamic nai hunuparcha
      global $con; 
    $ip= getIPAddress(); //yaha ::1 vanera value aaunecha
    $select_query="select * from `cart` where ip_address='$ip'"; //yaha ip address matra check huncha particular user le select gareko items ko laagi 
    $result=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result);
    }
    echo"$num_of_rows";
  }

//aba cart ko dynamic price dekhauna lai code lekhem array and arraysum use gardai
function cart_total(){
  global $con; //harek new function ma yesari chhuttai global connection variable banaunuparcha
  $ip = getIPAddress();
  $total = 0; // yaha initializr garnu parcha loop vanda aagadi;
  $cart_query="select * from `cart` where ip_address='$ip'";
  $result=mysqli_query($con,$cart_query);
  while ($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id']; //aba user1 le access gareko harek products haru access huncha
    $select_products_query="select * from `products` where product_id='$product_id'";
    $result_query=mysqli_query($con,$select_products_query);

    //fetching product price until the product is added to the cart
    while($row_product_price = mysqli_fetch_array($result_query)){ // yo while loop le harek choti add vako product lai fetch garcha
      $product_price=array($row_product_price['product_price']); //yaha product id anusar ko price aaucha array ma [10,1000,764165,21,324] yesari
      $product_values=array_sum($product_price); //yaha arrya vitra ko numbers haru ko sum huncha
      $total+=$product_values; // yaha harek total ma aako naya price add huncha
    }
  }
  echo" Rs $total /-";
 }

 //aba cart icon ma thichda cart ko information aaunu paryo body ma 


// function cart_detail(){
//   if(isset($_GET['cart_icon'])){
//     global $con;
//     $ip = getIPAddress();
//     $total = 0;
//     $cart_query = "SELECT * FROM `cart` WHERE ip_address='$ip'";
//     $result = mysqli_query($con, $cart_query);

//     echo "<div class='row'>
//         <h1 class='text-center'> Table of the cart detail</h1>
//         <form method='post' action='index.php?cart_icon'>
//             <table class='table  table-bordered mx-2'>
//                 <thead class='text-center'>
//                     <tr> 
//                         <th>Product Title</th>
//                         <th>Product Image</th>
//                         <th>Quantity</th>
//                         <th>Total Price</th>
//                         <th>Remove</th>
//                         <th>Operations</th>
//                     </tr>
//                 </thead>
//                 <tbody>";

//     while ($row = mysqli_fetch_array($result)){
//         $product_id = $row['product_id'];
//         $select_products_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
//         $result_query = mysqli_query($con, $select_products_query);

//         while($row_product = mysqli_fetch_array($result_query)){
//             $product_price = array($row_product['product_price']);
//             $price_table = $row_product['product_price'];
//             $product_title = $row_product['product_title'];
//             $product_image = $row_product['product_image1'];
//             $product_values = array_sum($product_price);
//             $total += $product_values;

//             echo "<tr class='text-center'>
//                     <td>$product_title</td>
//                     <td><img class='cartImg' alt='' src='./images/$product_image'></td>
//                     <td><input type='text' name='qty[$product_id]' class='form-input width-50'></td>
//                     <td>Rs $price_table /-</td>
//                     <td><input type='checkbox' name='remove'></td>
//                     <td>
//                         <button class='btn btn-primary' name='update_cart'>Update</button>
//                         <button class='btn btn-danger' name='remove_cart'>Remove</button>
//                     </td>
//                   </tr>";
//         }
//     }

//     echo "</tbody>
//         </table>
//         <div class='text-center'>
//             <h4>Sub total: Rs $total /-</h4>
//             <div class='d-flex justify-content-center'>
//                 <a href='index.php' class='btn btn-primary border-0 mx-2'>Continue Shopping</a>
//                 <button type='submit' class='btn btn-success' name='checkout'>Check out</button>
//             </div>
//         </div>
//     </form>
//     </div>";
//   }
// }

// function update_cart(){
//   $ip= getIPAddress();
// if(isset($_POST['update_cart'])){
//   $quantities=$_POST['qty'];
//   // echo"$quantities";
//   $update_cart="update `cart` set quantity=$quantities where ip=$ip";
//   $result_products=mysqli_query($con,$update_cart);
//   $total_price=$total_price*$quantites;
// }
// }

//aba order ko details haru user ko dashboard ma aaos vanera function lekhem

 function order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="select * from `users` where user_name='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
    if(!isset($_GET['orders'])){
    if(!isset($_GET['delete_account'])){
     $get_orders="select * from `orders` where user_id=$user_id and order_status='pending'";
     $result_orders_query=mysqli_query($con,$get_orders);
     $row_count=mysqli_num_rows($result_orders_query);
     if($row_count>0){
      echo "<h3 class='text-center my-5 text-info'> You have $row_count pending orders.</h3>
            <p class='text-center'><a href='profile.php?orders'>Order Details</a></p>";
     }else{
      echo "<h3 class='text-center my-5 text-info'> You have 0 pending orders.</h3>
            <p class='text-center'><a href='index.php'>Explore Products</a></p>";
     }
    }
  }
}
    }
  }
?>

