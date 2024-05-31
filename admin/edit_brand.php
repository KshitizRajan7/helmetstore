<?php 
if(isset($_GET['edit_brand'])){
    $edit_id=$_GET['edit_brand'];
    $select_brand="select * from `brands` where brand_id=$edit_id";
    $result=mysqli_query($con,$select_brand);
    $row=mysqli_fetch_array($result);
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
}
?>
<div class="container mt-5">
    <h3 class='text-center'>Edit Brand</h3>
    <form action="" method='post'>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="brand_title" class='form-label'>Brand Title</label>
            <input type="text" class='form-control' name='brand_title' id='brand_title' required='required' value='<?php echo $brand_title?>'>
        </div>
        <div class="form-outline w-50 m-auto mb-3 text-center">
            <input type="submit" class='btn btn-info' name='update_brand' value='Update Brand'>
        </div>
    </form>
</div>

<?php 
if(isset($_POST['update_brand'])){
    $new_brand_title=$_POST['brand_title'];
    $update_query="update `brands` set brand_title='$new_brand_title' where brand_id=$edit_id";
    $run_query=mysqli_query($con,$update_query);
    if($run_query){
        echo "<script>alert('Brand Updated !!')</script>";
        echo "<script>window.open('index.php?brand','_self')</script>";
    }
} 
?>