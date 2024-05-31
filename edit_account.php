<?php 
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `users` where user_name = '$user_session_name'";
    $result=mysqli_query($con,$select_query);
    $row_fetch_user=mysqli_fetch_assoc($result);
    $user_id=$row_fetch_user['user_id'];
    $user_username=$row_fetch_user['user_name'];
    $user_email=$row_fetch_user['user_email'];
    $user_image=$row_fetch_user['user_image'];
    $user_address=$row_fetch_user['user_address'];
    $user_mobile=$row_fetch_user['user_mobile'];

    //aba post gareko data lai database ma update garayem
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $update_username=$_POST['user_username'];
        $update_email=$_POST['user_email'];
        $update_image=$_FILES['user_image']['name'];
        $update_image_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($update_image_tmp,"users/user_images/$update_image");
        $update_address=$_POST['user_address'];
        $update_mobile=$_POST['user_mobile'];
        
        $update_query="update `users` set user_name='$update_username',user_email='$update_email', user_image='$update_image', user_address='$update_address', user_mobile='$update_mobile' where user_id=$update_id";
        $result_update_query = mysqli_query($con,$update_query);
        if($result_update_query){
            echo "<script>alert('updated successfully')</script>";
            echo "<script>window.open('signout.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<style>
    .edit_image{
        width:100px;
        height:100px;
        object-fit:contain;
    }
</style>
<body>
        <h3 class='text-center mb-3'>Edit Account</h3>
        <form action='' method='post' enctype='multipart/form-data' class='text-center'>
            <div class="form-outline mb-4">
                <input type='text' class='form-control w-50 m-auto' placeholder='Enter name' value=<?php echo $user_username?> name='user_username'>
            </div>
            <div class="form-outline mb-4">
                <input type='text' class='form-control w-50 m-auto' placeholder='Enter email' value=<?php echo $user_email?> name='user_email'>
            </div>
            <div class="form-outline mb-4 d-flex w-50 m-auto">
                <input type='file' class='form-control m-auto' name='user_image'>
                <img src="users/user_images/<?php echo $user_image ?>" alt="" class='edit_image'>
            </div>
            <div class="form-outline mb-4">
                <input type='text' class='form-control w-50 m-auto' placeholder='Enter address' value=<?php echo $user_address ?> name='user_address'>
            </div>
            <div class="form-outline mb-4">
                <input type='text' class='form-control w-50 m-auto' placeholder='Enter mobile number' value=<?php echo $user_mobile?> name='user_mobile'>
            </div>

            <input type="submit" value='update' class='btn border-0 bg-success text-light' name='user_update'>
        </form>
</body>
</html>