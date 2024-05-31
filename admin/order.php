<div class="container p-5">
<h2 class="text-center">Orders</h2>
<table class='table table-bordered mt-5'>
    <thead>
        <tr>
            <th>S.N</th>
            <th>Order Id</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $order_query="select * from `orders`";
        $result=mysqli_query($con,$order_query);
        $number=0;
        while($row=mysqli_fetch_array($result)){
            $number++;
            $order_id=$row['order_id'];
            $amount=$row['amount'];
            $invoice_number=$row['invoice_number'];
            $total_products=$row['total_products'];
            $order_date=$row['order_date'];
            $order_status=$row['order_status'];
        echo "<tr class='text-center'>
            <td>$number</td>
            <td>$order_id</td>
            <td>$amount</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_order=$order_id'><i class='fa-solid fa-trash'><i/></td>
        </tr>";
        }
        ?>
    </tbody>
</table>
</div>