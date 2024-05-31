<?php 
include('includes/connect.php');
session_start();
//aba yo order id anusar ko information jastai invoice number, amount haru dekhauna lai code lekhem
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_order_data="select * from `orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_order_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount=$row_fetch['amount'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if ($result){
        echo"<h3 class='text-center text-success'> Payment done!</h3>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
    //aba paid vaisakeko lai pending/incomplete ma haina paid/complete status ma update garem
    $update_query = "update `orders` set order_status='complete' where order_id=$order_id";
    $result_update=mysqli_query($con,$update_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
     <!-- bootstrap CSS ko link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- font awesome ko link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css ko file ko link -->
        <link href='./style.css' rel="stylesheet"></link>
</head>
<body>
    <div class="container my-5">
    <h1 class='text-center'>Confrim Payment </h1>
        <form action="" method='post'>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="">Invoice Number:</label>
                <input type="text" class='form-control w-50 m-auto' name='invoice_number' value='<?php echo $invoice_number?>'>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Amount:</label>
                <input type="text" class='form-control w-50 m-auto' name='amount' value='<?php echo $amount?>'>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mode"  class='form-select w-50 m-auto' >
                    <option>Select Payment Mode</option>
                    <option>Connect IPS</option>
                    <option>Paypal</option>
                    <option>Esewa</option> 
                    <option>Khalti</option> 
                    <option>Cash on delivery</option> 
                    <option>Pay Offline</option> 

               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class='btn btn-success border-0' value='Confirm' name='confirm_payment'>
            </div>
        </form>
    </div>
</body>
</html>