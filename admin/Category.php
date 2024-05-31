<div class="container p-5">
<h2 class="text-center">Categories</h2>
<div class="mt-5" >
    <a href="index.php?insert_category" class="btn btn-success">Insert Category</a>

    <table class='table table-bordered mt-3'>
        <thead>
            <tr>
                <th>S.N</th>
                <th>Category ID</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $category_query="select * from `categories`";
            $result=mysqli_query($con,$category_query);
            $number=0;
            while($row=mysqli_fetch_array($result)){
                $number++;
                $category_id=$row['cat_id'];
                $category_title=$row['cat_title'];
                echo"
                <tr class='text-center'>
                <td>$number</td>
                <td>$category_id</td>
                <td>$category_title</td>
                <td><a href='index.php?edit_category=$category_id' class=''><i class='fa-solid fa-pen-to-square'></i></td>
                <td><a href='index.php?delete_category=$category_id' name=delete_product class=''><i class='fa-solid fa-trash'></i></td>
                </tr>";

            }
            ?>
        </tbody>
    </table>
</div>
</div>