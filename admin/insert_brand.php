<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];
  $select_query="Select * from `brands` where brand_title='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo"<script> alert('This brand is already present in the database')</script>";
  }else{
    $insert_query="insert into `brands`(brand_title) values('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo"<script>alert('Brand Inserted')</script>";
    }else{
      echo "Error:".mysqli_error($con);
    }
  }
}
?>


<form action="" method="post" class="m-5 p-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-reciept"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Name of the brand" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="justify-content-center input-group w-10 mb-2">
  <input type="submit" class="bg-success border-0 rounded-4 p-2" name="insert_brand" value="Insert brand" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
</div>
</form>