<?php include('../partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1> Add Food </h1>
        <br><br>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            
<tr>
                <td> Title : </td>
                <td>
                    <input type="text" name="title" placeholder="Food_name">
</td>
</tr>
<tr>
    <td> Description: </td>
    <td>
        <textarea name="description" cols="40" rows="5" placeholder="Description">
</textarea>
</td>
</tr>
<tr>
    <td> Price: </td>
    <td>
        <input type="number" name="price">
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
        <select name="category">

<?php
$sql= "SELECT * FROM category where active='Yes'";

$res=mysqli_query($conn,$sql);

$count=mysqli_num_rows($res);
if($count>0){
while($row=mysqli_fetch_assoc($res))
{
    $id=$row['id'];
    $title=$row['category_name'];
    ?>
    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
    
    <?php

}
}
else{
  ?>
  <option value="0">No category found</option>
  <?php
  

}
?>
  
        
</select>
</td>
</tr>
<tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>

<tr>
    <td colspan="2">
<input type="submit" name="submit" value="Add Food" class="btn-up">
</td>
</tr>
</table>
</form>
<?php 

if(isset($_POST['submit'])){
    
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    

    if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; 
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; 
                }
        
  if(isset($_FILES['image']['title'])){
$img_name=$_FILES['image']['title'];
if($img_name!=""){
    $ext=end(explode('.',$img_name));
    $img_name="Food_".rand(0000,9999).'.'.$ext;
    $source=$_FILES['image']['tmp_name'];
    $destination="../images/".$img_name;
    $upload=move_uploaded_file($source,$destination);
    if($upload==false){
        $_SESSION['upload']="<div class='error'>Failed to upload</div>";
        ob_start();
        header('location:addfood.php');
        ob_flush();
        die();
    }
}
  }   
  else{
      $img_name="";
  }          
  $sql2="INSERT INTO food SET

  Food_name='{$_POST['title']}',
  image='{$img_name}',
  description='{$_POST['description']}'
  price='{$_POST['price']}'
  category_id = $category,
  featured = '$featured',
  active = '$active'
  ";
  $res2=mysqli_query($conn,$sql2);
  
  
  if($res2==true){
     
      
          $_SESSION['add']="<div class='success'> Food added successfully</div>";
          ob_start();
          header('location:food.php');
          ob_flush();
      
  }
      else{
          $_SESSION['add']="<div class='error'> failed to add</div>";
          
          ob_start();
          header('location:addfood.php');
          ob_flush();
          die();
         
          
      }

}

?>

</div>
</div>

<?php include('../partials/footer.php'); ?>