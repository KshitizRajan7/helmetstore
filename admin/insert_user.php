<?php 
if(isset($_POST['userRegister'])){
    $user_username=$_POST['userUsername'];
    $user_email=$_POST['userEmail'];
    $user_password=$_POST['userPassword'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT); //yo pani php kai inbuilt function ho 
    //hash vaneko one way matra huncha, jastai hamle hash vaisakeko password lai login garna use garda tyo password le arkai hash generate gardincha ani login hudaina
    $confirm_user_password=$_POST['confirmUserPassword'];
    $user_address=$_POST['userAddress'];
    $user_contact=$_POST['userContact']; 
    $user_image=$_FILES['userImage']['name']; 
    $user_image_tmp=$_FILES['userImage']['tmp_name']; // file upload hunuaagadi server ma jancha jaha temperory directory bancha ani security reasons(infected files), ek vanda badi file upload huncha ki vandai,ani validation ,checking haru file upload garne ki discard garne jasto kura haru garna lai tmp_name use garincha
    $user_ip=getIPAddress();

//aba hami username duplicate nahos ani password ra confirm password match hos vanera query haru use garcham

$select_query="select * from `users` where user_name='$user_username' or user_email='$user_email'";
$run_query=mysqli_query($con,$select_query);
//aba check garna lai data lai rows ma fetch gardai check garcham
$rows=mysqli_num_rows($run_query);
if($rows>0){
    echo"<script>alert('This name or email are already present in the database.')</script>";
}elseif($user_password!=$confirm_user_password){
    echo"<script>alert('Password did not match.')</script>";
}else{
 // aba query haru lekhcham yo data database ma insert garna lai
 move_uploaded_file($user_image_tmp,"users/user_images/$user_image");// aba temperory directory bata euta destination ma upload garna ko laagi hami move_uploaded_file vanne inbuilt function use garcham jasle temp_name ra destination lai use garcha paraneter ma
 $insert_query="insert into `users` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
 $result=mysqli_query($con,$insert_query);
 if($result){
    echo "<script>alert('Your user is added.')</script>";
    echo "<script>window.open('index.php?user','_self')</script>";
}
}
}
?>

<div class="container-fluid my-2"> 
        <!-- container fluid le 100% width lincha -->
        <h2 class='text-center'> New User Registration</h2>
        <div class="row justify-content-center">
            <!-- hamle row class use garem kinaki hamlai grid system use garnu cha jasma horzontally rows haru ma columns haru ma data haru proper spacing ma bascha -->
            <div class="col-lg-12 col-xl-6"> 
                <!-- yaha vako data large screen ma full width lincha ani extra large screen ma half width lincha -->
                <form action="" method='post' enctype='multipart/form-data'>
                    <div class="form-outline mb-2">
                        <label for="user_username" class='form-label'>Username</label>
                        <input type="text" id=user_username name='userUsername' class="form-control" placeholder="Enter your username." autocomplete="off" required='required'/> 
                        <!-- autocomplete ma off garda suggestions haru aaudaina -->
                        </div>
                        <div class="form-outline mb-2">
                        <label for="user_email" class='form-label'>Email</label>
                        <input type="email" id=user_email name='userEmail' class="form-control" placeholder="Enter your Email." autocomplete="off" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="user_image" class='form-label'>User Image</label>
                        <input type="file" id=user_image name='userImage' class="form-control" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="user_password" class='form-label'>Password</label>
                        <input type="password" id=user_password name='userPassword' class="form-control" placeholder="Enter your Password." autocomplete="off" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="confirm_user_password" class='form-label'>Confirm Password</label>
                        <input type="text" id='confirm_user_password' name='confirmUserPassword' class="form-control" placeholder="Enter your Confirm Password." autocomplete="off" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="user_address" class='form-label'>User Address</label>
                        <input type="text" id='user_address' name='userAddress' class="form-control" placeholder="Enter your Address." autocomplete="off" required='required'/> 
</div>
<div class="form-outline mb-2">
                        <label for="user_contact" class='form-label'>User Contact</label>
                        <input type="text" id='user_contact' name='userContact' class="form-control" placeholder="Enter your Contact number." autocomplete="off" required='required'/> 
</div>
<div class="text-center mt-4 pt-w">
 <input type="submit" value="Add User" class="btn btn-success py-2 px-3 border-0" name='userRegister'>
 </div>
                </form>
            </div>
        </div>
    </div>