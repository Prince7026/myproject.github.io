<html>
<head>
<title>Update/Delete Page</title>
</head>
<body>

    <?php
        session_start();
        echo "Welcome ".$_SESSION['UserID'];

        $conn = new mysqli("localhost","root","","mytest");

        if($conn->connect_error)
        {
            echo"Error for connection.".$connect_error;
        }
        $l1=$_SESSION['UserID'];
        $l2=$_SESSION['Pass'];
        $sql2="select UserID,Name,Pass,Email_id,Number from Register where UserID='$l1' and Pass='$l2'";
            
        if($res = $conn->query($sql2))
        {
            if($res->num_rows>0)
            {
              while($row=mysqli_fetch_array($res))
              {
                $s5=$row['UserID'];
                $s1=$row['Name'];
                $s2=$row['Pass'];
                $s3=$row['Email_id'];
                $s4=$row['Number'];
                
              }
            }
        }
        $conn->close();
        ?>

        <form name='f1' id='register' method='POST'>
            <table>
                <tr>
                    <td>
                      UserID:
                    </td>
                    <td>
                        <input type="text" id="Userid" maxlength="30" name="uid" value="<?php echo $s5;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                      Name:
                    </td>
                    <td>
                        <input type="text" id="name" maxlength="30" name="uname" value="<?php echo $s1;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                      Password:
                    </td>
                    <td>
                        <input type="text" id="pass" maxlength="8" name="pas" value="<?php echo $s2;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                      Email_id:
                    </td>
                    <td>
                        <input type="text" id="emailid" maxlength="30" name="email" value="<?php echo $s3;?>">
                    </td>
                </tr>
                <tr>
                    <td>
                      Number:
                    </td>
                    <td>
                        <input type="text" id="phno" name="number" maxlength="10" value="<?php echo $s4;?>">
                    </td>
                </tr>
                <tr>
                  <td>
                    <input type="submit" value="Update" name="update" class="button">
                  </td>
                  <td>
                    <input type="submit" value="Delete" name="delete" class="button">
                  </td>
                </tr>
            </table>
        </form>
        
        <?php
        $conn = new mysqli("localhost","root","","mytest");

        if($conn->connect_error)
        {
            echo"Error for connection.".$connect_error;
        }
        
        if(isset($_POST['update']))
        {
          $t1=$_POST["uid"];
          $t2=$_POST["uname"];
          $t3=$_POST["email"];
          $t4=$_POST["pas"];
          $t5=$_POST["number"];
          $sql3="update register set UserID='$t1',Name='$t2',Email_id='$t3',Pass='$t4',Number=$t5";

          if($conn->query($sql3)===TRUE)
          {
            echo "Records Update successfully";
          }
          else
          {
              echo "Error".$conn->error;
          }
        }
        
        if(isset($_POST['delete']))
        {
          $l3=$_POST['uid'];
          $sql4="delete from register where UserID='$l3'";
          if($conn->query($sql4)===TRUE)
          {
              echo "Records deleted successfully";
          }
          else
          {
              echo "Error".$conn->error;
          }
        }

        $conn->close();
    ?>
</boad>
<html>
