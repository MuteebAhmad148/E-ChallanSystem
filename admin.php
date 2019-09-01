
<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<?php 
    error_reporting(E_ERROR | E_PARSE); 
    if($_GET["addV"]) 
        header('Location: add.php'); 
    else if($_GET["addW"]) 
        header('Location: addWarden.php'); 
    else if($_GET["rmV"]) 
        header('Location: removeVehicle.php'); 
    else if($_GET["rmU"]) 
        header('Location: removeUser.php'); 
    else if($_GET["listV"]) 
        header('Location: listV.php'); 
    else if($_GET["listU"]) 
        header('Location: listU.php'); 
    else if($_GET["listW"]) 
        header('Location: listWardon.php'); 
    else if($_GET["changeU"]) 
        header('Location: ChangeUdetails.php'); 
    else if($_GET["challan"]) 
        header('Location: challanDisplay.php'); 
    else if($_GET["logout"]) 
    { 
        session_destroy(); 
        header('Location: login.php'); 
    } 
?>
 

<html>
    
    <head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        ul{
                list-style-type: none;
            }
            ul li{
                margin-left: 0;
                padding-left: 5px;
                background: transparent;
                margin-bottom: 4px;
                width: 90%;
                font-family: sans-serif;
                font-size: 20px;
                border: 2px solid black;
            }
            ul li ul {
                display: none;
            }
            ul li:hover ul{
                display: block;
            }
            ul li ul li{
                border: none;
                list-style-type: square;
            }
            a{
                color: black;
                text-decoration: none;
            }
            a:hover{
                color: red;
            }
        
        </style>
    </head>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="admin.php">Home</a>
            <a href="about.php">About</a>
            <a href="profile.php">Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div>
        <div id="leftdiv">
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
             <img src="logo.png">
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