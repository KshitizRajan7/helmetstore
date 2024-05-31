<?php 
if(isset($_GET['delete_brand'])){
    $brand_id=$_GET['delete_brand'];
    $delete_query="delete from `brands` where brand_id=$brand_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
        echo "<script>alert('Brand deleted !!')</script>";
        echo "<script>window.open('index.php?brand','_self')</script>";
    }
}
?>