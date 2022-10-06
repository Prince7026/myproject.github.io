
<html>
    <head>

        <title>Cubic Fashion</title>
        <link  rel="stylesheet" type="text/css" href="myproject.css">

        <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="margin-top: 50px; background-color: rgb(255, 255, 255);">

        <div class="container">

        
            <h2>Login</h2>
            <div class="form-container">
                <form name="login" id="login" method="POST">
                    
                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="text" placeholder="UserID" id="ID" name="UID" class="text-name">
                    </div>

                    <div class="input-name">
                        <i class="fa fa-lock lock"></i>
                        <input type="password" placeholder="Password" id="pass" name="pass" class="text-name">
                    </div>

                    <div class="input-name">
                        <input type="submit" value="Login" name="login" class="button">
                    </div>

                </form> 
            </div>
        </div>
<?php

if(isset($_POST['login']))
{
    $conn = new mysqli("localhost","root","","mytest");

    if($conn->connect_error)
    {
        echo"Error for connection.".$connect_error;
    }
    $t1=$_POST["UID"];
    $t2=$_POST["pass"];
    $sql="SELECT UserID,Pass FROM Register WHERE UserID='$t1' and Pass='$t2'";
    
    
    
        $res = $conn->query($sql);
        if($res->num_rows>0)
        {
            session_start();
            $_SESSION['UserID']=$t1;
            $_SESSION['Pass']=$t2;
            header("Location: http://localhost/Myproject/Myproject/home.php");
        }
        else
        {
            echo "Not registered data";
        }
    $conn->close();
}
?>
</body>
</html>