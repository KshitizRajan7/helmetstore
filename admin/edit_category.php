<?php 
if(isset($_GET['edit_category'])){
    $edit_id=$_GET['edit_category'];
    $select_category="select * from `categories` where cat_id=$edit_id";
    $result=mysqli_query($con,$select_category);
    $row=mysqli_fetch_array($result);
    $category_id=$row['cat_id'];
    $category_title=$row['cat_title'];
}
?>
<div class="container mt-5">
    <h3 class="text-center">Edit Category</h3>
    <form action="" method='post'>
        <div class='form-outline w-50 m-auto mb-3'>
            <label for="category_title" class='form-label'>Category Title</label>
            <input type="text" class='form-control' name='category_title' required='required' id='category_title' value='<?php echo $category_title ?>'>
        </div>
        <div class='form-outline w-50 m-auto mb-3 text-center'>
             <input type="submit" class='btn btn-info' name='update_category' value='Update Category'>
        </div> 
    </form>
</div>

<?php 
    if(isset($_POST['update_category'])){
        $new_category_title=$_POST['category_title'];
        $update_category="update `categories` set cat_title='$new_category_title' where cat_id=$edit_id";
        $update_result=mysqli_query($con,$update_category);
        if($update_category){
            echo "<script>alert('Category Updated !! ')</script>";
            echo "<script>window.open('index.php?category','_self')</script>";
        }
    }
    ?>