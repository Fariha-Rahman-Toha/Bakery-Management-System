// doesn't work

<?php
include('../sqlconfig/con-config.php');
if(isset($_GET['Category_ID']) AND isset($_GET['Image'])){
$id=$_GET['Category_ID'];
$img_name = $_GET['image'];
if($img_name!=""){
    $path="../images/".$img_name;
    $remove=unlink($path);
    if($remove==false){
        $_SESSION['remove']="<div class='error'>Failed to upload</div>";
        header('location:category.php');
        die(); 
    }
}
$sql="DELETE FROM Category Where Image=$img_name";
$res=mysqli_query($conn, $sql);
if($res==true){
    $_SESSION['success']="<div class='success'>Removed successfully</div>";
header('location:category.php');
}
else{
    $_SESSION['success']="<div class='error'>Failed to delete</div>";
header('location:category.php');
}
}
else{
    header('location:category.php');
}

?>