<?php include('../sqlconfig/con-config.php');?>
<?php
if(isset($_GET['Category_ID']))
{
    $id= $_GET['Category_ID'];
    $sql= "SELECT category_name FROM Category WHERE Category_ID=$id";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $title= $row['category_name'];
}
else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bay King Bakery</title>
    <link rel="stylesheet" href="frontstyle.css">
</head>
<body>
    <!-- navbar -->
    <!-- navbar ends-->
    <section class="navbar bg">
        <div class="container">

<div class="logo">
<a href="a"><img src="../images/Bayking.png" alt="logo" class="img-responsive logo-resize"></a>
</div>
<div class="menu text-right text-size">
<ul>
    <li>
        <a href="../front/index.php">Home</a>
    </li>
    <li>
        <a href="../front/about.php">About</a>
    </li>
    <li>
        <a href="../front/front-food.php">Foods</a>
    </li>
    <li>
        <a href="a">Contact us</a>
    </li>
</ul>
</div>
<div class="clearfix"></div>
</div>
</section>

<section class="food-search search text center c-bg">
<div class="container">
    <h2 class="text-center"> Treats on <a href="a"><?php echo $title; ?></a></h2>

</div>
</section>


<section class="food-menu">
<div class="container">
<h1 class="text-center">Food Menu</h1>


<?php
$sql= " SELECT * from food where category_ID= $id";
$res=mysqli_query($conn, $sql);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_assoc($res)){
    $title=$row['food_name'];
    $price=$row['Price'];
    $description=$row['Description'];
    $img_name=$row['image'];
    ?>
   
<div class="food-menu-box">
<div class="food-img">
<img src="../images/food/<?php echo $img_name; ?>" alt="<?php echo $title; ?> " class="img-responsive img_curve foodimg-resize">
</div>
<div class="food-desc food-descc">
    <h4><?php echo $title; ?> </h4>
    <p class="price"> <?php echo $price; ?> </p>
    <p>
    <?php echo $description; ?> 
</p>
<br>
<a href="../front/order.php" class="btn-prim">Order Now</a>
</div>
</div>
    <?php
    }
}
else{
        echo "<div class='error'>Food not Added </div>";
}
?>

<div class="clearfix"></div>
</div>
</section>

<section class="footer bg">
<div class="container text-center">
<p> All rights reserved. Designed by <a href="../front/catbus-passengers.php"> Catbus passengers</a></p>
</div>
</section>

</body>
</html>