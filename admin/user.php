<div class="container p-5">
<h2 class="text-center">Users</h2>
<div class="mt-5" >
    <a href="index.php?insert_user" class="btn btn-success">Add Users</a>
    <div class="container mt-3">
        <table class='table bordered mt-5'>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $select_user="select * from `users`";
                $result=mysqli_query($con,$select_user);
                $number=0;
                while($row=mysqli_fetch_array($result)){
                    $number++;
                    $user_id=$row['user_id'];
                    $user_name=$row['user_name'];
                    $user_email=$row['user_email'];
                    $user_image=$row['user_image'];
                    $user_address=$row['user_address'];
                    $user_mobile=$row['user_mobile'];
                    echo "
                    <tr class='text-center'>
                    <td>$number</td>
                    <td>$user_id</td>
                    <td>$user_name</td>
                    <td>$user_email</td>
                    <td><img src='users/user_images/$user_image' alt='$user_name'/></td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='index.php?delete_user=$user_id'><i class='fa-solid fa-trash'></id></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>