<html>
    <head>
    <title> Bay King Bakery </title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php include('../partials/menu.php'); ?>

    <!-- main content-->
    <div class="main-content">
        <div class="wrapper">
        <h1>dashboard </h1>
        <br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>
        <div class="col-4">
            <?php
            $sql="SELECT * FROM Category";
            $res=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($res);

            ?>
            <h1><?php echo $count; ?></h1>
            <br>
            Categories
</div>
<div class="col-4">
<?php
            $sql2="SELECT * FROM Food";
            $res2=mysqli_query($conn, $sql2);
            $count2=mysqli_num_rows($res2);

            ?>
            <h1><?php echo $count2; ?></h1>
            <br>
            Treats
</div>
<div class="col-4">
<?php
            $sql3="SELECT * FROM Customer";
            $res3=mysqli_query($conn, $sql);
            $count3=mysqli_num_rows($res3);

            ?>
            <h1><?php echo $count3; ?></h1>
            <br>
            Orders
</div><div class="col-4">
<?php
            $sql4="SELECT SUM(Amount) as total FROM bill";
            $res4=mysqli_query($conn, $sql4);
            $rows=mysqli_fetch_assoc($res4);
            $total=$rows['total'];

            ?>
            <h1> ৳ <?php echo $total; ?></h1>
            <br>
            Revenue
</div>
<div class="clearfix"></div>
</div>
</div>
    <!-- main content ends-->

    <!-- footer-->
    <div class="footer">
        <div class="wrapper">
        <p class="text-center"> 2021 All rights reserved, Bay King Bakery, Developed by- <a href="a">Catbus Passengers </a></p>
</div>
</div>
    <!-- footer ends-->
</body>
</html>