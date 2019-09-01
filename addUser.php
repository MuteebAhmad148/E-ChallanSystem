<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<?php
    error_reporting(E_ERROR | E_PARSE);
    if($_REQUEST["btn"])
                {
                    $value=1;
                    $uname=$_REQUEST['name'];
                    $pass="123";
                    $phone=$_REQUEST['pnum'];
                    session_start();
                    $email=$_SESSION['email'];
                    $st="User"; 
        
                    if($pass!="" and $uname!="" )
                    {
                        $value=2;   
                        error_reporting(E_ERROR | E_PARSE);
                        $host="localhost";
                        $username="root";
                        $password="";
                        $dbname="dbs";
                        $conn = mysqli_connect($host, $username, $password,$dbname);
                    
                        $query= "INSERT INTO `e_user` (`User_ID`, `User_Name`, `Password`, `Area_code`, `PhoneNumber`, `E_mail` , `Status`) 
                        VALUES (NULL, '$uname', '$pass', NULL, '$phone', '$email', '$st');" ;
                        $result=mysqli_query($conn,$query);
                        
                        $query= "SELECT User_ID FROM e_user WHERE E_mail= '$email' ;";
                        $result=mysqli_query($conn,$query);
                        $row=mysqli_fetch_assoc($result);
                        session_start();
                        $_SESSION['user_id']=$row['User_ID'];
                        
                        $to = $email;
                $subject = "E_Challan System";
                $amount=$_SESSION['amount'] ;
                $message = "
                  Hello ,".$uname .".This mail is to inform you that your account has been created on E_Challan System .Now can can view your challan history and vehicle information.Behalf of the Team Shield I welcome you on board. <br> <br><br><br>
                  <p style='color:red;'>Email : $email <br>
                                         Password: 123</p>
                                         <br>Regards: Team Shield
                  ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to,$subject,$message,$headers);
                        
                    }
                }

?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
           <a href="admin.php">Home</a>
            <a href="about.php">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>   <div id="leftdiv">
            <ul>
                <li >Wardon
                  <ul>
                      <a href="addWarden.php" ><li>Add Wardon</li></a>
                      <a href="removeWarden.php" > <li>Remove Wardon</li></a>
                      <a href="changeArea.php" > <li>Change Area</li></a>
                      <a href="listWardon.php" > <li>List Wardons</li></a>

                    </ul>
                </li>
                  
                <li >Vehicle
                <ul>
                    <a href="add.php" ><li>Add Vehicle</li></a>
                    <a href="removeVehicle.php" ><li>Remove Vehicle</li></a>
                    <a href="listVehicle.php" ><li>List All Vehicle</li></a>

                    </ul>
                </li>
                
                <li >User
                <ul>
                    <a href="removeUser.php" ><li>Remove User</li></a>
                    <a href="listUser.php" ><li>List all User</li></a>

                    </ul></li>
                <li >Area
                  <ul>
                       <a href="listArea.php" ><li>List all Areas</li></a>
                      <a href="addArea.php" ><li>Add New Area</li></a>

                    </ul></li>
                <li >Challan
                <ul>
                      <a href="listChallan.php" ><li>List all Challan</li></a>
                    <a href="changeChallanStatus.php" ><li>Change Status</li></a>

                    </ul>
                
                </li>
                 
            </ul>
        </div>
        <div id="centerdiv">
            <form method="POST"> 
                <h1>Add User</h1>
                <input id="button" type="text" placeholder="User Name" name="name" > <br>
                <input id="button" type="text" placeholder="Phone Number" name="pnum" > <br>
                <input id="button" type='submit' name="btn" value="Submit "><br>
            </form>
            
            <?php
                if($value==2)
                {
                    echo "<p style='color:red;'>Record Edited</p>";
                    header('Location:addVehicle.php');
                }
                else if($value==1)
                    echo "<p style='color:red;'>Invalid Input</p>";
           
            ?>
        </div>
         <div id="rightdiv">
            <img src="user.png">
                 <?php
                    session_start();
                    echo "<table>
                        <tr>
                            <td id='usertable'>"."User_ID : "."</td> 
                            <td id='usertable'>". $_SESSION['auser_id'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Name : "."</td> 
                            <td id='usertable'>". $_SESSION['user_name'] ."</td> 
                        </tr>
                        <br>
                        <tr>
                            <td id='usertable'>"."Email : "."</td> 
                            <td id='usertable'>". $_SESSION['aemail'] ."</td> 
                        </tr>
                    </table>";
                ?>
        </div>
    </body>
</html>