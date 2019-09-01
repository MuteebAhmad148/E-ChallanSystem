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
                    $email=$_REQUEST['e-mail'];
                    
                    $host="localhost";
                    $username="root";
                    $password="";
                    $dbname="dbs";
                    $conn = mysqli_connect($host, $username, $password,$dbname);
                    $query="select User_ID from e_user where E_mail='$email'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    $uid=$row['User_ID'];
                    session_start();
                    $_SESSION['user_id']=$uid;
                    $_SESSION['email']=$email;
                    if($uid==NULL)
                    {
                        session_start();
                        $_SESSION['status']="NEW";
                        header('Location: addUser.php');
                    }
                    else
                    { 
                        session_start();
                        $_SESSION['status']="OLD";  
                        header('Location: addVehicle.php');                  
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
                <h1>Add Vehicle</h1>
                <input id="button" type="text" placeholder="E_Mail" name="e-mail"  > <br>
                <input id="button" type='submit' name="btn" value="Next"><br>

            </form>

            <?php
                if($value==2)
                    echo "<p style='color:red;'>Record Edited</p>";
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