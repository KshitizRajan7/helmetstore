<?php 
include('../includes/connect.php'); // database sanga connect garauna lai include garnu parcha
// aba click event lai justify garcham , yedi click vayo vane yo action perform garne vanera, tesko laagi name ma j cha tei lekhnu parne huncha ['#name']
if(isset($_POST['insert_cat'])){
  // aba text area ma vako data lai access garna ko lagi category_title vanera variable banaucham ani tesko laagi ni name ma j cha tei halera access garcham $_POST['#name']
  $category_title=$_POST['cat_title'];
  // data duplication ya same categories repeatedly enter nahos vanera sabai data select gari compare garera entry rokem
  $select_query="Select * from `categories` where cat_title='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  //aba kati ota sanga match vayo tesko number nikalem 
  $number=mysqli_num_rows($result_select);
  //aba 1 matra aaune bitikai rokdine
  if($number>0){
    echo"<script>alert('This Category is already present in the database')</script>";
  }else{
  //aba insert_query vanera variable banayera tesma SQL Query lekhera database ma data insert garcham
  $insert_query="insert into `categories` (cat_title) values ('$category_title')"; 
  // aba result variable ma query execution garcham, $con ko lagi hamle connect.php include gareko cham
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo"<script> alert ('Category inserted')</script>";
  }else{
    echo "Error:".mysqli_error($con);
  }
}}
?>
<form action="" method="post" class="m-5 p-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-reciept"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Name of the category" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="justify-content-center input-group w-10 mb-2">
  <input type="submit" class="bg-success text-white border-0 rounded-4 p-2 my-2" name="insert_cat" value="Insert category" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
</div>
</form>