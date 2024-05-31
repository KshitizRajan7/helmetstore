<?php 
include('../includes/connect.php');
include('../functions/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap CSS ko link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- font awesome ko link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid w-50 m-auto">
    <h3 class='text-center'>Admin Registration</h1>
    <form action="" method='post' enctype='multipart/form-data'>
                    <div class="form-outline mb-2">
                        <label for="adminName" class='form-label'>Admin name</label>
                        <input type="text" id=adminName name='adminName' class="form-control" placeholder="Enter your name." autocomplete="off" required='required'/> 
                        <!-- autocomplete ma off garda suggestions haru aaudaina -->
                        </div>
                        <div class="form-outline mb-2">
                        <label for="admin_email" class='form-label'>Email</label>
                        <input type="email" id=admin_email name='adminEmail' class="form-control" placeholder="Enter your Email." autocomplete="off" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="admin_image" class='form-label'>Admin Image</label>
                        <input type="file" id=admin_image name='adminImage' class="form-control" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="admin_password" class='form-label'>Password</label>
                        <input type="password" id=admin_password name='adminPassword' class="form-control" placeholder="Enter your Password." autocomplete="off" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="confirm_admin_password" class='form-label'>Confirm Password</label>
                        <input type="text" id='confirm_admin_password' name='confirmAdminPassword' class="form-control" placeholder="Enter your Confirm Password." autocomplete="off" required='required'/> 
</div>
<div class="text-center mt-4 pt-w">
 <input type="submit" value="Sign up" class="btn btn-success py-2 px-3 border-0" name='adminRegister'>
 <p class="small fw-bold mt-2 pt-1 mb-0goo">Already have an account? <a href="admin_login.php">Login</a></p>
 </div>
                </form>
    </div>

    <?php 
if(isset($_POST['adminRegister'])){
    $admin_name=$_POST['adminName'];
    $admin_email=$_POST['adminEmail'];
    $admin_password=$_POST['adminPassword'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT); //yo pani php kai inbuilt function ho 
    //hash vaneko one way matra huncha, jastai hamle hash vaisakeko password lai login garna use garda tyo password le arkai hash generate gardincha ani login hudaina
    $confirm_admin_password=$_POST['confirmAdminPassword'];
    // $admin_address=$_POST['adminAddress'];
    // $admin_contact=$_POST['adminContact']; 
    $admin_image=$_FILES['adminImage']['name']; 
    $admin_image_tmp=$_FILES['adminImage']['tmp_name']; // file upload hunuaagadi server ma jancha jaha temperory directory bancha ani security reasons(infected files), ek vanda badi file upload huncha ki vandai,ani validation ,checking haru file upload garne ki discard garne jasto kura haru garna lai tmp_name use garincha
    // $admin_ip=getIPAddress();

//aba hami username duplicate nahos ani password ra confirm password match hos vanera query haru use garcham

$select_query="select * from `admin` where admin_name='$admin_name' or admin_email='$admin_email'";
$run_query=mysqli_query($con,$select_query);
//aba check garna lai data lai rows ma fetch gardai check garcham
$rows=mysqli_num_rows($run_query);
if($rows>0){
    echo"<script>alert('This name or email are already present in the database.')</script>";
}elseif($user_password!=$confirm_user_password){
    echo"<script>alert('Password did not match.')</script>";
}else{
 // aba query haru lekhcham yo data database ma insert garna lai
 move_uploaded_file($admin_image_tmp,"admin_images/$admin_image");// aba temperory directory bata euta destination ma upload garna ko laagi hami move_uploaded_file vanne inbuilt function use garcham jasle temp_name ra destination lai use garcha paraneter ma
 $insert_query="insert into `admin` (admin_name,admin_email,admin_password,admin_image) values('$admin_name','$admin_email','$hash_password','$admin_image')";
 $result=mysqli_query($con,$insert_query);
 if($result){
    echo "<script>alert('Your data is registered.')</script>";
    echo"<script>window.open('admin_login.php','_self')</script>";
}
}
}
?>
</body>
</html>