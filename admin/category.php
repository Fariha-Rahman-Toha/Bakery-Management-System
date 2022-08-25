<?php include('../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
       <h1>Category</h1>
       <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['success']))
        {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
        ?>
        <br><br>
       <a href="addcategory.php"class="btn-primary" name="Add Category"> Add Category </a>
        
        <table class="table-full">
            <tr>
                <th><h4>Category ID</h4></th>
                <th><h4>Title</h4></th>
                <th><h4>Image</h4></th>
                <th><h4>Featured</h4></th>
                <th><h4>Active</h4></th>
                <th><h4>Action</h4></th>
            </tr>

<?php
$sql="SELECT * FROM category";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count>0)
{
while($row=mysqli_fetch_assoc($res))
{
    $id=$row['Category_ID'];
    $title=$row['category_name'];
    $img_name=$row['Image'];
    $featured=$row['Featured'];
    $active=$row['Active'];
    ?> 
    <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php 
    if($img_name!=""){
        ?>
            <img src="../images/<?php echo $img_name; ?>" width="150px">
        <?php
    }
    else{
        echo "NULL";
    }
    ?></td>
    <td><?php echo $featured; ?></td>
    <td><?php echo $active; ?></td>
   
    <td>
        <a href="del-cat.php?id=<?php echo $id; ?> &img_name=<?php echo $img_name; ?>" class="btn-del">Delete</a>
    </td>
</tr>


    <?php

}
}
else{
   ?>

   <tr>
<td>
    <div class="error">No category added </div>
</td>
</tr>

   <?php 
}
?>

           
               
        </table>
</div>
</div>
<?php include('../partials/footer.php'); ?>