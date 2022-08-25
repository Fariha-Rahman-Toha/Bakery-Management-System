<?php include('../partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
       <h1>Order</h1>
       <br>
        
       <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="table-full">
                    <tr>
                        <th>Customer_ID</th>
                        <th>Payment_ID</th>
                        <th>Total</th>                        
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        
                    </tr>

                    <?php 
                        
                        $sql = "SELECT * FROM Customer c INNER JOIN Bill b ON c.Customer_ID=b.Customer_ID "; // DIsplay the Latest Order at First
                        
                        $res = mysqli_query($conn, $sql);
                        
                        $count = mysqli_num_rows($res);

                        

                        if($count>0)
                        {
                            
                            while($row=mysqli_fetch_assoc($res))
                            {
                                
                                $id = $row['Customer_ID'];
                                $payment_id = $row['Payment_ID'];                                
                                $total = $row['Amount'];                               
                                $customer_name = $row['Customer_name'];
                                $customer_contact = $row['Contact'];
                                $customer_email = $row['Email'];
                                $customer_address = $row['Address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $id; ?>. </td>
                                        <td><?php echo $payment_id; ?></td>
                                        <td><?php echo $total; ?></td>
                                        

                                        
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            
                            echo "<tr><td colspan='8' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
<?php include('../partials/footer.php'); ?>