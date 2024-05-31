<?php 
if(isset($_GET['delete_user'])){
    $user_id=$_GET['delete_user'];
    $delete_query="delete from `users` where user_id=$user_id";
    $run_query=mysqli_query($con,$delete_query);
    if($run_query){
    echo "<script>alert('User Deleted !! ')</script>";
    echo "<script>window.open('index.php?user','_self')</script>";
    }
}
?>