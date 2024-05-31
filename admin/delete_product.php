<?php 
if(isset($_GET['delete_product'])){
    $product_id=$_GET['delete_product'];
    $delete_query="delete from `products` where product_id=$product_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
    echo "<script>alert('Deleted !! ')</script>";
    echo "<script>window.open('index.php?product','_self')</script>";
    }
}
?>