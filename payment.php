<?php 
include('includes/connect.php');
include('functions/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
     <!-- bootstrap CSS ko link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- font awesome ko link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body{
                /* overflow: hidden; */
            }
            img{
                width:50%;
                margin:auto;
                display:block;
            }

        </style>
</head>
<body>
    <!-- user ko login ya id anusar payment hunuparcha tei vayera tesko lagi php code lekhem -->
    <?php
    $ip=getIPAddress();
    $user="select * from `users` where user_ip='$ip'";
    $result_user=mysqli_query($con,$user);
    // user id database bata fetch garnu parcha tesko laagi mysqli_fetch_array() ya mysqli_fetch_assoc() use garepani huncha use garem
    $run_query=mysqli_fetch_array($result_user);
    $user_id=$run_query['user_id'];
    ?>
    <!-- container le full nalikana certain width lincha -->
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row align-items-center mt-5">
            <div class="col-md-6">
            <a href="https://www.esewa.com" target="_blank"><img src="images/pp.jpg" alt=""></a>
            <!-- target blank garda new tab ma link khulcha -->
            </div>
            <div class="col-md-6">
            <a href="order_pending.php?user_id=<?php echo $user_id?>"><h2 class='text-center'>Pay offline</h2></a>
            <!-- target blank garda new tab ma link khulcha -->
            </div>

        </div>
    </div> 
</body>
</html>