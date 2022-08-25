<?php include('../sqlconfig/con-config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bay King Bakery- Order Form</title>
    <link rel="stylesheet" href="frontstyle.css">
</head>
<body>

<section class="food-search">
    <div class="container">
            
         <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
        <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">ID</div>
                    <input type="number" name="id" placeholder="10xx" class="input-responsive" required>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn-primary">
                </fieldset>

            </form>

            <?php
if(isset($_POST['Submit']))
{
    $id=$_POST['id'];
    $Cus_name=$_POST['name'];
    $email=$_POST['email'];
    $addr=$_POST['address'];
    $cont=$_POST['contact'];
    $pay_id=$_POST['payment_id'];
    $amount=$_POST['amount'];

}
$sql2 = "INSERT INTO Customer SET 
                        Customer_ID = '$id',
                        Customer_name = '$cus_name',
                        Contact = '$cont',
                        Email = '$email',
                        Address = '$addr'
                    ";
$sql3 ="INSERT INTO Bill SET
                        Customer_ID='$id',
                        Payment_ID='$pay_id',
                        Amount='$amount'";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);
                    $res3=mysqli_query($conn, $sql3);

                    //Check whether query executed successfully or not
                    if($res2==true && $res3==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:index.php');
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:order.php');
                    }

                
            
            ?>

        </div>
    </section>
    </body>
</html>
    
