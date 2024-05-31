<?php 
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $select_product="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$select_product);
    $row=mysqli_fetch_array($result);
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_keyword=$row['product_keyword'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_price=$row['product_price'];

    //aba category name ra brand lai id bata access garem ani tei anusar ko data form ma halem 
    $select_category =" select * from `categories` where cat_id=$category_id";
    
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['cat_title'];

    $select_brand =" select * from `brands` where brand_id=$brand_id";
    echo $brand_id;
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    }
?>
<div class="container mt-5"></div>
    <h3 class='text-center'>Edit Product</h3>
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_title" class='form-label'>Product Title</label>
            <input type="text" id='product_title' name='product_title' class='form-control' required='required' value='<?php echo $product_title ?>'>
        </div>    
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_description" class='form-label'>Product Description</label>
            <input type="text" id='product_description' name='product_description' class='form-control' required='required' value='<?php echo $product_description ?>'>
        </div>    
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_keyword" class='form-label'>Product Keyword</label>
            <input type="text" id='product_keyword' name='product_keyword' class='form-control' required='required' value='<?php echo $product_keyword ?>'>
        </div>    
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_category" class='form-label'>Product Category</label>
            <select  name='product_category' class='form-select' >
                <option value='<?php echo $category_title ?>'><?php echo $category_title ?></option>
                <!-- mathi chai j product ko category ho tei dekhaem. aba aru category options jun sanga change garna milcha teslai php code lekhera tala options display garem  -->
                <?php 
                  $select_opt_category =" select * from `categories`";
                  $result_opt_category=mysqli_query($con,$select_opt_category);
                  while($row_category=mysqli_fetch_assoc($result_opt_category)){
                    $category_title=$row_category['cat_title'];
                    $category_id=$row_category['cat_id'];
                    echo"
                        <option value='$category_id'>$category_title</option>
                        ";
                    }
                ?>
            </select>
        </div>    
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_brand" class='form-label'>Product Brand</label>
            <select  name='product_brand' class='form-select' >
                <option value='<?php echo $brand_title ?>'><?php echo $brand_title ?></option>
                <!-- aba brand ko list -->
                <?php 
                $select_opt_brand =" select * from `brands`";
                $result_opt_brand=mysqli_query($con,$select_opt_brand);
                while($row_brand=mysqli_fetch_assoc($result_opt_brand)){
                  $brand_title=$row_brand['brand_title'];
                  $brand_id=$row_brand['brand_id'];
                  echo"
                      <option value='$brand_id'>$brand_title</option>
                      ";
                  }
              ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image1" class='form-label'>Product Image1</label>
            <div class="d-flex">
            <input type="file" id='product_image1' name='product_image1' class='form-control w-90 m-auto' required='required'>
            <img src="helmet_images/<?php echo $product_image1?>" alt="" class='product_image'>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image2" class='form-label'>Product Image2</label>
            <div class="d-flex">
            <input type="file" id='product_image2' name='product_image2' class='form-control w-90 m-auto' required='required' value='<?php echo $product_image2 ?>'>
            <img src="helmet_images/<?php echo $product_image2 ?>" alt="" class='product_image'>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_price" class='form-label'>Product Price</label>
            <input type="text" id='product_price' name='product_price' class='form-control' required='required' value='<?php echo $product_price ?>'>
        </div> 
        <div class="text-center">
            <input type="submit" name='edit_product' value='Update product' class='btn btn-info px-3 mb-3'>
        </div> 
    </form>
                </div>

                <!-- aba update button click garda ko event define garem -->
                <?php 
                if(isset($_POST['edit_product'])){
                    // update garnu vanda aagadi form ma kun data post vako cha tyo fetch garem paila
                    $new_product_title=$_POST['product_title'];
                    $new_product_description=$_POST['product_description'];
                    $new_product_keyword=$_POST['product_keyword'];
                    $new_product_category=$_POST['product_category'];
                    $new_product_brand=$_POST['product_brand'];
                    $new_product_price=$_POST['product_price'];
                    
                    $new_product_image1=$_FILES['product_image1']['name'];
                    $new_product_image2=$_FILES['product_image2']['name'];

                    $new_tmp_product_image1=$_FILES['product_image1']['tmp_name'];
                    $new_tmp_product_image2=$_FILES['product_image2']['tmp_name'];

                    move_uploaded_file($new_tmp_product_image1,"../images/$new_product_image1");
                    move_uploaded_file($new_tmp_product_image2,"../images/$new_product_image2");

                    $update_product="update `products` set product_title = '$new_product_title',
                        product_description = '$new_product_description',
                        product_keyword = '$new_product_keyword',
                        category_id = '$new_product_category',
                        brand_id = '$new_product_brand',
                        product_image1='$new_product_image1',
                        product_image2='$new_product_image2',
                        product_price = '$new_product_price',
                        date = Now()
                        WHERE product_id=$edit_id";

                        $result_update=mysqli_query($con,$update_product);
                        if($result_update){
                            echo "<script>alert('Updated !!')</script>";
                            echo "<script>window.open('index.php?product','_self')</script>";
                        }
                         
                }
                ?>
