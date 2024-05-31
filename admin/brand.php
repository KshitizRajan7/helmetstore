
<div class="container p-5">
<h2 class="text-center mt-1">Brands</h2>
<div class="mt-5" >
    <a href="index.php?insert_brand" class="btn btn-success">Insert Brand</a>
    
    <table class='table table-bordered mt-3'>
        <thead>
            <tr>
                <th>S.N</th>
                <th>Brand Id</th>
                <th>Brand Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php   
            $brand_query="select * from `brands`";
            $result=mysqli_query($con,$brand_query);
            $number=0;
            while($row=mysqli_fetch_array($result)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $number++;
                echo"
                <tr class='text-center'>
                <td>$number</td>
                <td>$brand_id</td>
                <td>$brand_title</td>
                <td><a href='index.php?edit_brand=$brand_id'><i class='fa-solid fa-pen-to-square'></i></td>
                <td><a href='index.php?delete_brand=$brand_id'><i class='fa-solid fa-trash'></i></td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    
</div>
</div>