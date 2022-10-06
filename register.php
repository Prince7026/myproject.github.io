
<html>
    <head>

        <title>Cubic Fashion</title>
        <link  rel="stylesheet" type="text/css" href="myproject.css">

        <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="margin-top: 50px; background-color: rgb(255, 255, 255);">

        <div class="container">

        
            <h2>Registration Form</h2>
            <div class="form-container">
                <form name="form1" id="register" method="POST">
                    
                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="text" placeholder="UserID" id="ID" name="UID" class="text-name">
                    </div>

                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="text" placeholder="Frist Name" id="fname" name="uname" class="name">
                    </div>

                    <div class="input-name">
                        <i class="fa fa-envelope email"></i>
                        <input type="email" placeholder="Email" class="text-name" name="email" id="email">
                    </div>

                    <div class="input-name">
                        <i class="fa fa-lock lock"></i>
                        <input type="password" placeholder="Password" id="pass" name="pass" class="text-name">
                    </div>

                    <div class="input-name">
                        <i class="fa fa-address-book-o lock"></i>
                        <input type="text" placeholder="Number" class="text-name" name="number" id="number">
                    </div>

                    <div class="input-name">
                        <input type="submit" value="Register" name="reg" class="button">
                    </div>

                </form> 
            </div>
        </div>
<?php

if(isset($_POST['reg']))
{
    $conn = new mysqli("localhost","root","","mytest");

    if($conn->connect_error)
    {
        echo"Error for connection.".$connect_error;
    }
    $t1=$_POST["UID"];
    $t2=$_POST["uname"];
    $t3=$_POST["email"];
    $t4=$_POST["pass"];
    $t5=$_POST["number"];
    $sql="insert into Register (UserID,Name,Email_id,Pass,Number) values('$t1','$t2','$t3','$t4',$t5)";

    if($conn->query($sql)===TRUE)
    {
        header("Location: http://localhost/Myproject/Myproject/login.php");
    }
    else
    {
        echo "Error".$conn->error;
    }
    $conn->close();

}
?>
</body>
</html>