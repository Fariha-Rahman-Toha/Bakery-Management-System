<?php include('../sqlconfig/con-config.php');?>
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
<section class="food-search search cat-slider text center">
<div class="container">
    <form action="">
        <input type="search" name="search" placeholder="Search for treats">
        <input type="submit" name="submit" value="Search" class="btn btn-prim">
</form>

</div>
</section>
<section class="category cat-bg">
 <a href="a">  
<div class="container">
<h2 class="text-center">Category</h2>
<?php
$sql= " SELECT * from Category where Active= 'Yes' and Featured= 'Yes'";
$res=mysqli_query($conn, $sql);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_assoc($res)){
        $id=$row['Category_ID'];
    $title=$row['category_name'];
    $img_name=$row['Image'];
    ?>
    <a href="a">
<div class="box float-container">
        <img src="../images/<?php echo $img_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img_curve img-resize">
        <h3 class="float-text text-color text-center"><?php echo $title; ?></h3>
</div>
</a>
    <?php

}
}
else{
        echo "<div class='error'>Category not Added </div>";
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
