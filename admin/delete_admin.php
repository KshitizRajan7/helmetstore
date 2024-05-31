<?php
$adminname_session=$_SESSION['admin_name']; //login vayeko username ya store vayo
if(isset($_POST['delete'])){
    $delete_query="delete from `admin` where admin_name='$adminname_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo"<script>alert('Account deleted successfully')</script>";
        echo"<script>window.open('index.php?admin_login','_self')</script>";
    }
}

if(isset($_POST['no_delete'])){
        echo"<script>window.open('index.php?admin_profile','_self')</script>";
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
