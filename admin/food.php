<?php include('../partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
       <h1>Food</h1>
       <br>
       <a href="addfood.php"class="btn-primary"> Add Food </a>
        <br>
       <?php
       if(isset($_SESSION['add'])){
           echo $_SESSION['add'];
           unset ($_SESSION['add']);
       }
       ?>
        <table class="table-full">
            <tr>
               <th> Food Id </th>
               <th> Title </th>
               <th> Price </th>
               <th> Description </th>
               <th> Image </th>
               <th> Featured </th>
               <th> Active </th>
            </tr>

<?php
//Create sql query to get all food
$sql="SELECT * FROM food";
//execute query
$res=mysqli_query($conn,$sql);
//count rows
$count=mysqli_num_rows($res);
//if count>0 then we have food in db
if($count>0){
while($row=mysqli_fetch_assoc($res))
{
    //get value from columns
    $id=$row['Food_ID'];
    $title=$row['food_name'];
    $price=$row['Price'];
    $description=$row['Description'];
    $img_name=$row['image'];
    $featured=$row['featured'];
    $active=$row['active'];
    ?>
     <tr>
            <td><?php echo $id; ?></td>
               <td> <?php echo $title; ?> </td>
               <td> <?php echo $price; ?></td>
               <td> <?php echo $description; ?> </td>
               <td><?php 
    if($img_name!=""){
        ?>
            <img src="../images/food/<?php echo $img_name; ?>" width="150px">
        <?php
    }
    else{
        echo "NULL";
    }
    ?></td>
               <td> <?php echo $featured; ?> </td>
               <td> <?php echo $active; ?> </td>
            </tr>
            <?php

}
}
else{
echo "<tr><td colspan='7' class='error'> Food not added yet</td></tr>";
}

?>

           
           
        </table>
</div>
</div>
<?php include('../partials/footer.php'); ?>