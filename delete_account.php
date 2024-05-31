<?php
$username_session=$_SESSION['username']; //login vayeko username ya store vayo
if(isset($_POST['delete'])){
    $delete_query="delete from `users` where user_name='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo"<script>alert('Account deleted successfully')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
}

if(isset($_POST['no_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";
    }

?>

<h3 class="text-center text-danger">Delete Account</h3>    
<form action="" method='post' class='text-center mt-5'>
    <div class="form-outline">
        <input type="submit" class='btn btn-danger border-0 w-50 m-auto my-3' name='delete' value='Delete account.'>
    </div>
    <div class="form-outline">
        <input type="submit" class='btn btn-secondary border-0 w-50 m-auto' name='no_delete' value='Do not delete account.'>
    </div>
</form>
