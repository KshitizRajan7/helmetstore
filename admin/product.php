<div class="container p-5">
<h2 class="text-center">Products</h2>
<div class="mt-5">
<a href="index.php?insert_product" class="btn btn-success">Insert Product</a>
</div>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>S.N </th>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary'>
            <?php 
            $product_query="select * from `products`";
            $result=mysqli_query($con,$product_query);
            $number=0;
            while($row=mysqli_fetch_array($result)){
                $number++;
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
                $product_status=$row['status'];
                $product_image1=$row['product_image1'];
                ?>

                <?php
                echo"
                <tr class='text-center'>
                <td>$number</td>
                <td>$product_id</td>
                <td>$product_title</td>
                <td><img src='./helmet_images/$product_image1' class='product_image'/></td>
                <td>$product_price</td>";
                ?>
                <?php
                $get_count="select * from `orders_pending` where product_id=$product_id";
                $result_count=mysqli_query($con,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo"<td>$rows_count</td>";
                ?>
                <?php
                echo "<td>$product_status</td>"
                ?>
                <?php
                echo"
                <td><a href='index.php?edit_product=$product_id' class=''><i class='fa-solid fa-pen-to-square'></i></td>
                <td><a href='index.php?delete_product=$product_id' name=delete_product class=''><i class='fa-solid fa-trash'></i></td>
                </tr>
                ";
            }
            ?>
    </tbody>

</table>
</div>