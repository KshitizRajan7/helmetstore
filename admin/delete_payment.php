<?php 
if(isset($_GET['delete_payment']))
$delete_id=$_GET['delete_payment'];
$delete_query="delete from `payments` where payment_id=$delete_id";
$run_query=mysqli_query($con,$delete_query);
if($run_query){
    echo "<script>alert('Payment Deleted!!')</script>";
    echo "<script>window.open('index.php?payment','_self')</script>";
}
?>