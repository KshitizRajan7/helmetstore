<?php 
include('../includes/connect.php');
include('../functions/function.php');
@session_start(); //@ le yedi yo page matra kholeko cha vane session start garcha , checkout ma include vako cha vane session start hudaina
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
        <!-- bootstrap CSS ko link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- font awesome ko link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body{
                overflow: hidden;
            }
        </style>
</head>
<body>
    <div class="container-fluid my-2"> 
        <!-- container fluid le 100% width lincha -->
        <h2 class='text-center'>Admin Sign In</h2>
        <div class="row justify-content-center">
            <!-- hamle row class use garem kinaki hamlai grid system use garnu cha jasma horzontally rows haru ma columns haru ma data haru proper spacing ma bascha -->
            <div class="col-lg-12 col-xl-6"> 
                <!-- yaha vako data large screen ma full width lincha ani extra large screen ma half width lincha -->
                <form action="" method='post' enctype='multipart/form-data'> 
                    <!-- action khaali vayeko kaaran chai hami php code yahi lekhne wala chham -->
                    <div class="form-outline mb-2">
                        <label for="adminName" class='form-label'>Admin name</label>
                        <input type="text" id=adminName name='adminName' class="form-control" placeholder="Enter your name." autocomplete="off" required='required'/> 
                        <!-- autocomplete ma off garda suggestions haru aaudaina -->
                        </div>
                       
            <div class="form-outline mb-2">
                        <label for="admin_password" class='form-label'>Password</label>
                        <input type="password" id=admin_password name='adminPassword' class="form-control" placeholder="Enter your Password." autocomplete="off" required='required'/> 
            </div>
            <div class="text-center mt-4 pt-w">
                        <input type="submit" value="Sign in" class="btn btn-success py-2 px-3 border-0" name='adminSignin'>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="admin_registration.php">Register</a></p>
            </div>
                </form>
                <?php 
                if(isset($_POST['adminSignin'])){
                    $admin_name=$_POST['adminName'];
                    $admin_password=$_POST['adminPassword'];
                    $select_query="select * from `admin` where admin_name='$admin_name'";
                    $result=mysqli_query($con,$select_query);
                    $rows=mysqli_num_rows($result);
                    $row_data=mysqli_fetch_assoc($result);//mysqli_fetch_assoc() use garera hamle database ko data lai fetch garna sakcham  

                    // aba yaha cart item cha ki chaina vanera hercham tesko laagi user ko ip address chaincha
                    // $ip=getIPAddress();
                    // $select_cart="select * from `cart` where ip_address='$ip'";
                    // $select_result=mysqli_query($con,$select_cart);
                    // $row_cart=mysqli_num_rows($select_result);
                    if($rows>0){ //yedi user cha vane
                        // yaha aba password verify garcham
                        // aba variable ko value lai database ko value sanga match garera verify garem
                            $_SESSION['admin_name']=$admin_name; //user login vako bela ya bata hamle username session ma pass garem yo vaneko login vaye pachi hunuparcha
                        if(password_verify($admin_password,$row_data['admin_password'])){
                            if($rows==1 and $row_cart==0){ //yedi user cha tara ip address anusar cart ma item chaina vane yesto garne 
                                $_SESSION['admin_name']=$admin_name; 
                                echo"<script>alert('Sign in successfully.')</script>";
                                echo"<script>window.open('index.php','_self')</script>";
                            }else{ //yedi user cha ani cart ma pani item cha vane
                                $_SESSION['admin_name']=$admin_name;
                                echo"<script>alert('Sign in successfully.')</script>";
                                echo"<script>window.open('index.php','_self')</script>";
                            }
                        }else{
                            echo"<script>alert('Password did not match.')</script>";
                        }
                    }else{
                        echo"<script>alert('Invalid Credentials.')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>