<?php 
include('includes/connect.php');
include('functions/function.php');
//aba user id anusar ko value haru linako laagi paila get method ma j cha tei user_id bata kaam garem
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    echo $user_id;
}

//getting total items and total price of all items
$ip=getIPAddress();
$total_price=0; // suruma total price 0 rakhem aba yo 0 ma items anusar ko price add hudai jancha
$cart_query_price="select * from `cart` where ip_address='$ip'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand(); //mt_rand function le random number generate garcha
$status='pending';
$count_products=mysqli_num_rows($result_cart_price); //yesle total number of product lai count garcha
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="select * from `products` where product_id='$product_id'";
    $run_price=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}

// aba hami quantity lai 0 cha vane 1 ra user le input gareko anusar update garcham
$get_cart="select * from `cart`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1; 
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
//aba user ko orders ma hami value haru insert garcham
$insert_orders="insert into `orders` (user_id,amount,invoice_number,total_products,order_date,order_status) values ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Orders submitted.')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//aba pending ma vayeko orders haru lai database ko orders_pending table ma rakhcham ani tyo pending items lai cart bata delete garchams 
$insert_pending_orders="insert into `orders_pending` (user_id,invoice_number,product_id,quantity,order_status) values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result=mysqli_query($con,$insert_pending_orders);

//aba items haru order ra pending order ma gaisakyo aba cart bata delete garcham
$empty_cart="delete from `cart` where ip_address='$ip'"; //user ko ip anusar ko cart delete garem
$result_delete_cart=mysqli_query($con,$empty_cart);
?>