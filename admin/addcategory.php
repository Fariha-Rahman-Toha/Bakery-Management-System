<?php include('../partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1> Add Category</h1>
        <br><br>

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
        ?>
        <br><br>
<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td> Title: </td>
            <td>
                <input type="text" name="name" placeholder="Category title">
</td>
<tr>
<tr>
            <td> ID: </td>
            <td>
                <input type="number" name="id" placeholder="Category ID">
</td>
<tr>
    <td>Select image:</td>
    <td>
        <input type="file" name="image">
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
        <input type="radio" name="active" value="No"> No
</td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn-up">
</td>
</tr>

</td>
</tr>
</table>

</form>

<?php
if(isset($_POST['submit'])){
    //echo "Clicked";
    $title=$_POST['name'];
    $id=$_POST['id'];

    if(isset($_POST['featured'])){
$featured=$_POST['featured'];
    }
    else{
$featured="No";
    }
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }
    else{
        $active="No";
    }

    if(isset($_FILES['image']['name'])){
$img_name=$_FILES['image']['name'];

$ext=end(explode('.',$img_name));
$img_name= "Category_".rand(000,999).'.'.$ext;
$source_path=$_FILES['image']['tmp_name'];

$des_path="../images/".$img_name;
$upload= move_uploaded_file($source_path, $des_path);

if($upload==false)
{
    $_SESSION['upload']="<div class='error'>Failed to upload</div>";
   ob_start();
    header('location:addcategory.php');
ob_flush();
die();
}
    }
    else{
        $img_name= "";
    }

    $sql="Insert into category SET Category_ID='{$_POST['id']}',category_name='{$_POST['name']}',image='{$img_name}', featured='$featured', active='$active'";
    
    $res=mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['add']="<div class='success'> Category added successfully</div>";
        ob_start();
        header('location:category.php');
        ob_flush();
    }
    else{
        $_SESSION['add']="<div class='error'> failed to add</div>";
        ob_start();
        header('location:addcategory.php');
        ob_flush();

    }

}
?>

</div>
</div>
<?php include('../partials/footer.php'); ?>