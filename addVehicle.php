
<?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?><html>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    if($_REQUEST["btn"])
                {
                    $value=1;
                    session_start();
                    $uid=$_SESSION['user_id'];
                    $st=$_SESSION['status'];
        
                    $veh=$_REQUEST['veh'];
                    $mo=$_REQUEST['mod'];
                    $typ=$_REQUEST['type']; 
                    $status="active";
        
                    $host="localhost";
                    $username="root";
                    $password="";
                    $dbname="dbs";
                    $conn = mysqli_connect($host, $username, $password,$dbname);
        
                    //user is new user
                    if($st=="NEW")
                    {                        
                        $query= "INSERT INTO `license` (`License_No`, `User_ID`, `License_Status`, `Type`, `Issue_Date`,`Due_Date`) 
                        VALUES (NULL, '$uid', '$status', '$typ', sysdate(),  adddate(sysdate(),interval 1500 day));" ;
                        $result=mysqli_query($conn,$query);  
                    
                    }//existing user
                    else if($st=="OLD")
                    {
                        $query= "SELECT `Type` FROM `license` where `User_ID`='$uid' and `Type`='$typ';" ;
                        $result=mysqli_query($conn,$query); 
                        $row=mysqli_fetch_assoc($result);
                        $typ2=row['Type'];
                        var_dump($query);
                        var_dump($row);
                        //new license
                        if($row==NULL)
                        {
                            $query= "INSERT INTO `license` (`License_No`, `User_ID`, `License_Status`, `Type`, `Issue_Date`,`Due_Date`) 
                            VALUES (NULL, '$uid', '$status', '$typ', NULL,NULL);" ;
                            $result=mysqli_query($conn,$query);                         
                        }                        
                    }
        
        
                    if($veh!="" and $mo!="" and $typ!="")
                    {
                        $value=2;
                        error_reporting(E_ERROR | E_PARSE);
                        $query= "INSERT INTO `vehicle` (`Vehicle_No`, `User_ID`, `Model`, `Type`) 
                        VALUES ('$veh', '$uid', '$mo', '$typ');" ;
                        $result=mysqli_query($conn,$query); 
                    }
                    session_start();
                    $_SESSION['uid']=$uid;
                    $_SESSION['vid']=$veh;
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
                    <input id="button" type="text" placeholder="Vehicle No" name="veh"  > <br>
                    <input id="button" type="text" placeholder="Model" name="mod" > <br>
                    <input id="button" type="text" placeholder="Type" name="type" > <br>
                    <input id="button" type='submit' name="btn" value="Submit "><br>
            </form>
            
            <?php
                if($value==2)
                {
                    echo "<p style='color:red;'>Record Edited</p>";//go to a page which shows all vehicle records showing vehicle is added
                   header('Location:viewVehicle.php');
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