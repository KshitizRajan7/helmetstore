<?php 
if((isset($_GET['delete_category']))){
    $category_id=$_GET['delete_category'];
    $delete_query="delete from `categories` where cat_id=$category_id";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Category Deleted !!')</script>";
        echo "<script>window.open('index.php?category','_self')</script>";
        }
}
?>