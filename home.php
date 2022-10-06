<html>
    <head>
        <title>Home Page</title>
        <style>
        table, th, td {
        border: 1px solid black;
        }
        th, td {
        padding-top: 20px;
        padding-bottom: 5px;
        padding-left: 15px;
        padding-right: 5px;
        }
        </style>
    </head>
    <body>

        <?php
            session_start();
            echo $_SESSION['UserID'];

            $conn = new mysqli("localhost","root","","mytest");
            if($conn->connect_error)
            {
                echo"Error for connection.".$connect_error;
            }
            $t1=$_SESSION['UserID'];
            $t2=$_SESSION['Pass'];
            $sql2="select Name,Pass,Email_id,Number from Register where UserID='$t1' and Pass='$t2'";
            
            if($res = $conn->query($sql2))
            {
                if($res->num_rows>0)
                {
                    echo "<table>
                    <tr>
                        <td><h4>Name</h4></td>
                        <td><h4>Password</h4></td>
                        <td><h4>Email_id</h4></td>
                        <td><h4>Number</h4></td>
                    </tr>";
                    while($row=mysqli_fetch_array($res))
                    {
                        echo"<tr><td>".$row['Name']."</td><td>".$row['Pass']."</td><td>".$row['Email_id']."</td><td>".$row['Number']."</td></tr>";
                    }
                    echo "</table>";
                }
            }
            $conn->close();
        ?>
        <form name='f2' method='POST'>
            <table border='1'>
                <tr>
                    <td>
                        <input type="submit" name="update" value="Update/Delete">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['update']))
            {
                header("Location: http://localhost/Myproject/Myproject/update.php");
            }
        ?>

    </body>
