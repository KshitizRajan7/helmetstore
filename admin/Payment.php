<div class="container p-5">
<h2 class="text-center">Payments</h2>
<table class='table table-bordered mt-5'>
    <thead>
        <tr>
            <th>S.N</th>
            <th>Payment Id</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $select_payment="select * from `payments`";
        $result=mysqli_query($con,$select_payment);
        $number=0;
        while($row=mysqli_fetch_array($result)){
            $number++;
            $payment_id=$row['payment_id'];
            $invoice_number=$row['invoice_number'];
            $amount=$row['amount'];
            $payment_mode=$row['payment_mode'];
            $order_date=$row['date'];
            echo "
            <tr class='text-center'>
            <td>$number</td>
            <td>$payment_id</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$order_date</td>
            <td><a href='index.php?delete_payment=$payment_id'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            ";
        }
        ?>
    </tbody>
</table>
</div>