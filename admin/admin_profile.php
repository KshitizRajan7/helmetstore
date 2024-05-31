<style>
    .profileImage{
                    width: 250px;
                    height: 250px;
                    overflow:hidden;
                    margin:auto;
                    display:block;
                    object-fit: cover;
                    border-radius:50%;
                    
                      }
</style>
<div class="container-fluid">
<div class="bglight">
          <h3 class="text-center mt-5">Admin Profile</h3>
          <!-- <p class="text-center"> Helmet paune thau </p> -->
               
         <?php 
                        //  $name=$_SESSION['admin_name'];
                        //  $image="select * from `admin` where admin_name='$name'";
                        //  $result_img=mysqli_query($con,$image);
                        //  $fetch_image=mysqli_fetch_array($result_img);
                        //  $admin_image=$fetch_image['admin_image'];
        ?>
        <?php 
                        $adminname=$_SESSION['admin_name'];
                        $user_image="select * from `admin` where admin_name='$adminname'";
                        $result_image=mysqli_query($con,$user_image);
                        $fetch_image=mysqli_fetch_array($result_image);
                        $image=$fetch_image['admin_image'];
                        echo "
                        <img src='admin_images/$image' alt='' class='profileImage mt-5'>
                        <ul class='navbar-nav my-2'>    
                            <h4 class='text-center'>$adminname</h4>
                        </ul>";
                        
                        ?>
                        <div class='text-center mt-3'>
                            <a class="btn btn-info" href="index.php?edit_admin">Edit My Account</a>
                            <a class="btn btn-danger" href="index.php?delete_admin">Delete My Account</a>
                    </div>
                    </div>
                </div>

                </div>