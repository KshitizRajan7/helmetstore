<?php 
if(isset($_GET['delete_order'])){
$delete_id=$_GET['delete_order'];
$delete_query="delete from `orders` where order_id=$delete_id";
$run_query=mysqli_query($con,$delete_query);
if($run_query){
    echo "<script>alert('Order Deleted !! ')</script>";
    echo "<script>window.open('index.php?order','_self')</script>";
}
}
?>