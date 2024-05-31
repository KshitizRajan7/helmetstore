<?php
include('../includes/connect.php'); 
          if(isset($_POST['insert_prod'])){
            $product_title=$_POST['product_title'];
            $product_description=$_POST['product_description'];
            $product_keyword=$_POST['product_keyword'];
            $product_category=$_POST['product_category'];
            $product_brand=$_POST['product_brand'];
            $product_price=$_POST['product_price'];
            $product_status= 'true';

            //image ko access ko laagi diferent attributes haru huncha jastai (temperory name, size, name ) dherai huncha tara hamile access garnalai important attribute haru matra lincham (temperory name, name)
            
            //yo name chai user le upload garna laako image ko name j cha tei ho jun chai identify garna sajilo huncha .

            $product_image1=$_FILES['product_image1']['name'];
            $product_image2=$_FILES['product_image2']['name'];

            //image ko temperory name access garem , yo temporary name chai php le suruma server ko temporary directory ma process garnu vanda aagadi store garna banako huncha
            $temp_image1=$_FILES['product_image1']['tmp_name'];
            $temp_image2=$_FILES['product_image2']['tmp_name'];

            // kun nai form khali vayeko condition check garna ko laagi
            if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price=='' ) /*or $product_image1=='' or $product_image2=='')*/{
              echo "<script>alert('Please fill all the fields.')</script>";
              // exit();
            }else{
              //images haru lai fill vayepachi kunai folder ma store garnu parcha
              // tesko laagi move_uploaded_file function use garcham jasle 2 ta parameter lincha(&temp_image,"destination")
              move_uploaded_file($temp_image1,"../images/$product_image1");
              move_uploaded_file($temp_image2,"../images/$product_image2");

              //sabai data database ma pathauna aba SQL query lekhem
              $insert_product="insert into `products`(product_title,product_description,product_keyword,category_id,brand_id,product_price,product_image1,product_image2,date,status) values ('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_price','$product_image1','$product_image2',NOW(),'$product_status')";
              $result_query=mysqli_query($con,$insert_product);
              if($result_query){
                echo"<script>alert('Product stored successfully.')</script>";                
              }
            }
          }
        
?>
<div class="container bg-dark rounded-5">
    <h1 class="text-center text-light p-5">Insert Product</h1>
  <form action="" method="post" enctype="multipart/form-data" class="m-auto w-50">
<div class="form-outline mb-4 text-light ">
  <!-- yaha product ko title ko laagi form banayem -->
  <label for='product_title' class="form-label">Product title </label>
  <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Enter product title" autocomplete="off" required="required">

<!-- description ko laagi -->
<label for='product_description' class="form-label">Product description </label>
  <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Enter product description" autocomplete="off" required="required">

<!-- product ko key word ko laagi -->
<label for='product_keyword' class="form-label">Product keyword </label>
  <input type="text" class="form-control" name="product_keyword" id="" placeholder="Enter product keyword" autocomplete="off" required="required">

<!-- aba category ko data database baata dropdown menu use garera halem kinaki hamilai product ko brand ra catefory anusaar rakhnu parcha -->
<label for='product_category' class="form-label">Category </label>
  <select class="form-select" name="product_category" id="">
    <option value="">Select Category</option>
    <?php
            $select_query="select * from `categories`";
            $result_query=mysqli_query($con,$select_query);
            while($row_data=mysqli_fetch_assoc($result_query)){
              $category_title=$row_data['cat_title'];
              $category_id=$row_data['cat_id'];
              echo "<option value='$category_id'>$category_title</option>";
            }
    ?>
 </select> 

<label for='product_brand' class="form-label">Brand </label>
  <select class="form-select" name="product_brand" id="">
  <option value="">Select Brand</option>
  <?php
            $select_query="select * from `brands`";
            $result_query=mysqli_query($con,$select_query);
            while($row_data=mysqli_fetch_assoc($result_query)){
              $brand_title=$row_data['brand_title'];
              $brand_id=$row_data['brand_id'];
              echo "<option value='$brand_id'>$brand_title</option>";
            }
            ?>
</select> 

<!-- ABA IMAGES KO LAAGI -->
<label for='product_image1' class="form-label">Product image 1 </label>
  <input type="file" class="form-control" name="product_image1" required="required"/>

  <!-- ABA IMAGES KO LAAGI -->
<label for='product_image2' class="form-label">Product image 2 </label>
  <input type="file" class="form-control" name="product_image2" required="required">

  <!-- product ko price ko laagi -->
<label for='product_price' class="form-label">Product price </label>
  <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter product price" autocomplete="off" required="required">

<div class="input-group  p-3 justify-content-center">
  <input type="submit" class="rounded-3 p-3" name="insert_prod" value="Insert products"  class="bg-info">
          </div>
</form>


          </div>
