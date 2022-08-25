<?php include('../partials/menu.php'); ?>
    <!-- menu end-->

    <!-- main content-->
    <div class="main-content">
        <div class="wrapper">
            
        <h1>Admin </h1>
        <br>
        
        <table class="table-full">
            <tr>
                <th><h4>ID</h4></th>
                <th><h4>User Name</h4></th>
                <th><h4>Full Name</h4></th>
                <th><h4>Action</h4></th>
            </tr>
            <?php
            $sql="SELECT * FROM admin";
            $ins=mysqli_query($conn,$sql);
            $sn=1;
            if($ins==TRUE)
            {
                $count=mysqli_num_rows($ins);
                if($count>0){
                    while($rows=mysqli_fetch_assoc($ins)){
                        $username=$rows['username'];
                        $fullname=$rows['fullname'];
                        ?>
                        
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $fullname; ?></td>
                <td>
                    Taking order, Updating menu, Maintaining scheduled deliveries.
                </td>
            </tr>
             
                        <?php
                    }   
                             }
            }
            else{

            }
            ?>
          
                
        </table>



</div>
</div>
    <!-- main content ends-->

 
<?php include('../partials/footer.php'); ?>