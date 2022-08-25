<?php include('../sqlconfig/con-config.php'); ?>

<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" href="admin.css">
</head>
 <body class="l-body">
        
        <div class="login" class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                
                ?>
            <br><br>
           
            <form action="" method="POST" class="text-center">

            
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
         

            
            <p class="text-center">Created By - <a href="">Catbus Passengers</a></p>
        </div>

    </body>
</html>

<?php 

    
    if(isset($_POST['submit']))
    {
        
        $username = $_POST['username'];
        $password =$_POST ['password'];

    
        $sql = "SELECT * FROM LOGIN WHERE username='$username' AND password='$password'";

         
         $res = mysqli_query($conn, $sql);

        
        $count = mysqli_num_rows($res);

        if($count==1)
        {
           
               $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username;
           
           ob_start();
            header('location:index.php');
            ob_flush();
        }
        else
        {
            
           
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
           
            ob_start();
            header('location:login.php');
            ob_flush();
    exit;
           

            
        }

        
    }

    ?>
