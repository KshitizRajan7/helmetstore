<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- paila table vanda aagadi php code lekhera dynamic data haru fetch garem -->
    <!-- suru ma user id fetch garem -->
    <?php 
    $username = $_SESSION['username'];
    $get_user="select * from `users` where user_name='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch= mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id']; //yaha bata user_id database bata fetch garem
    ?>
    <h3 class="text-success text-center">Orders</h3>
    <table class='table table-bordered mt-5'>
        <thead>
        <tr>
        <th>S.N</th>
        <th>Amount</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
</tr>
</thead>
<tbody>
    <!-- aba yaha dynamic data haru lai echo garem   jun chai user_id ko anusar orders table ma cha-->
    <?php 
    $get_order_details="select * from `orders` where user_id=$user_id";
    $result_orders=mysqli_query($con,$get_order_details);
    $number=1;
    while($row_orders=mysqli_fetch_assoc($result_orders)){
        $order_id=$row_orders['order_id'];
        $amount=$row_orders['amount'];
        $total_products=$row_orders['total_products'];
        $invoice_number=$row_orders['invoice_number'];
        $order_date=$row_orders['order_date'];
        $order_status=$row_orders['order_status'];
        if($order_status=='pending'){
            $order_status='Incomplete';
        }else{
            $order_status='Complete';
        }
        echo"
        <tr>
        <td>$number</td>
        <td>$amount</td>
        <td>$total_products</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td>";
        ?>
        <?php 
        if($order_status=='Complete'){
            echo"
        <td><p class='text-success text-center'>Paid</p></td>";
        }else{
            echo"<td><a href='confirm_payment.php?order_id=$order_id' class='btn btn-success text-light'>Confirm</a></td>
        </tr>";
        }

        $number++;
    }
    ?>
</tbody>
    </table>
</body>
</html>