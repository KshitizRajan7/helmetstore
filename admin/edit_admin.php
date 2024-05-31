<?php 
if(isset($_GET['edit_admin'])){
    $admin_session_name=$_SESSION['admin_name'];
    $select_query="select * from `admin` where admin_name = '$admin_session_name'";
    $result=mysqli_query($con,$select_query);
    $row_fetch_admin=mysqli_fetch_assoc($result);
    $admin_id=$row_fetch_admin['admin_id'];
    $admin_name=$row_fetch_admin['admin_name'];
    $admin_email=$row_fetch_admin['admin_email'];
    $admin_image=$row_fetch_admin['admin_image'];

    //aba post gareko data lai database ma update garayem
    if(isset($_POST['admin_update'])){
        $update_id=$admin_id;
        $update_adminname=$_POST['admin_name'];
        $update_email=$_POST['admin_email'];
        $update_image=$_FILES['admin_image']['name'];
        $update_image_tmp=$_FILES['admin_image']['tmp_name'];
        move_uploaded_file($update_image_tmp,"admin_images/$update_image");
        
        $update_query="update `admin` set admin_name='$update_adminname',admin_email='$update_email', admin_image='$update_image' where admin_id=$update_id";
        $result_update_query = mysqli_query($con,$update_query);
        if($result_update_query){
            echo "<script>alert('updated successfully')</script>";
            echo "<script>window.open('admin_signout.php','_self')</script>";
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
                <input type='text' class='form-control w-50 m-auto' placeholder='Enter name' value=<?php echo $admin_name?> name='admin_name'>
            </div>
            <div class="form-outline mb-4">
                <input type='text' class='form-control w-50 m-auto' placeholder='Enter email' value=<?php echo $admin_email?> name='admin_email'>
            </div>
            <div class="form-outline mb-4 d-flex w-50 m-auto">
                <input type='file' class='form-control m-auto' name='admin_image'>
                <img src="admin_images/<?php echo $admin_image ?>" alt="" class='edit_image'>
            </div>
            <input type="submit" value='Update' class='btn border-0 btn-success text-light' name='admin_update'>
        </form>
</body>
</html>