<?php include('../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Add Food</h1>
        <br><br>

<?php
 if(isset($_SESSION['add']))
 {
     echo $_SESSION['add'];
     unset($_SESSION['add']);
 }
if(isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>

        <form action="" method="POST" enctype="multipart/form-data">
<table class="tbl-30">
<tr>
            <td> ID: </td>
            <td>
                <input type="number" name="id" placeholder="Food ID">
</td>
</tr>
    <tr>
        <td> Title: </td>
        <td>
            <input type="text" name="name" placeholder="Title">
</td>
</tr>

<tr>
    <td> Description: </td>
    <td>
        <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
</td>
</tr>
<tr>
    <td> Price: </td>
    <td>
        <input type="number" name="price" placeholder="Price">
</td>
</tr>

<tr>
    <td> Select Image: </td>
    <td> 
        <input type="file" name="image">
</td>
</tr>
<tr>
    <td> Category: </td>
    <td>
        <select name="Category">
<?php
$sql="SELECT * from Category WHERE Active='Yes'";
//execute query
$res=mysqli_query($conn,$sql);
//count rows
$count=mysqli_num_rows($res);
//if count>0 then we have categories
if($count>0)
{
while($row=mysqli_fetch_assoc($res)){
    $id=$row['Category_ID'];
    $title=$row['category_name'];
    ?>
    <option value="<?php echo $id ?>"><?php echo $title ?></option>
    <?php

}
}
else{
 ?>
 <option value="0">No categories found</option>
 <?php   
}
?>

</select>
</td>
</tr>
<tr>
    <td> Featured: </td>
    <td>
        <input type="radio" name="featured" value="Yes"> Yes
        <input type="radio" name="featured" value="No">No
</td>
</tr>
<tr>
    <td> Active: </td>
    <td>
        <input type="radio" name="active" value="Yes"> Yes
        <input type="radio" name="active" value="No">No
</td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add food" class="btn-up">
    </td>
</tr>
</table>

    </form>

<?php
if(isset($_POST['submit'])){
    //import from form
    $id=$_POST['id'];
    $title=$_POST['food_name'];
    $description=$_POST['Description'];
    $price=$_POST['Price'];
    $category=$_POST['Category'];
    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];
    }
    else{
        $featured="No";//default
    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }
    else{
        $active="No";// default
    }


    // upload img
    //check whether the button is clicked or not
    if(isset($_FILES['image']['name']))
    {
$img_name=$_FILES['image']['name'];
//selected or not
if($img_name!="")
{
    //rename 
    $ext= end(explode('.',$img_name));
    $img_name="bake_".rand(0000,9999).".".$ext;

    $src= $_FILES['image']['tmp_name'];
    $destin="../images/food/".$img_name;

    $upload=move_uploaded_file($src,$destin);
    // uploaded or not
    if($upload==false)
    {
        $_SESSION['upload']="<div class='error'> Failed to upload </div>";
        header('location:addfood.php');
        die();
    }
}
    }
    else{
        $img_name=""; //default
    }
    //insert into db
    $sql2="INSERT INTO food SET Food_ID='{$_POST['id']}',
    Description='{$_POST['description']}',
    Price='{$_POST['price']}',
    food_name='{$_POST['name']}',
     image='{$img_name}', 
     category_ID=$category, 
     featured='$featured',
      active='$active'
      ";
    $res2=mysqli_query($conn,$sql2);
    if($res2==true){
        //data inserted
        $_SESSION['add']="<div class='success'>Food added successfully</div>";
        header('location:food.php');
    }
    else{
        //failed to insert
        $_SESSION['add']="<div class='error'>Failed to add Food/div>";
        header('location:addfood.php');
    }
    //redirect

}
?>

</div>
</div>


<?php include('../partials/footer.php'); ?>