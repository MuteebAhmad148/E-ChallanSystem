<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            form p{
                padding-left: 70px;
            }    
        </style>   
        <?php
            $username="root";
            $password="";
            $dbname="dbs";
            $host="localhost";
            $conn = mysqli_connect($host, $username, $password,$dbname);
            $sql = mysqli_query($conn, "SELECT Area_Name From area");
        error_reporting(E_ERROR | E_PARSE);
        if($_REQUEST["btn"])
        {
            $value=2;
            $email=$_POST['email'];
            $area=$_REQUEST['area'];
            $host="localhost";
            $username="root";
            $password="";
            $dbname="dbs";
            $conn = mysqli_connect($host, $username, $password,$dbname);

            $query="select `Area_code` from area where `Area_Name`='$area'";
            $result=mysqli_query($conn,$query);
            $row=mysqli_fetch_assoc($result);
            $areaID=$row['Area_code'];
            
            $query="update e_user set Area_code=$areaID where E_mail='$email';";
            $result=mysqli_query($conn,$query);            
        
        }
        else
            $value=1;
        ?>
    </head>   
    <style>
        select{
            margin-bottom: 90px;
            margin-top: 10px;
            font-size: 15px;
            font-family:sans-serif;
            margin-left: 81px;
            margin-right: 60px;
            width: 58%;
            height: 6%;
            border: 2px solid black;
        }
        
       
    </style>
    <body>
        <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="admin.php">Home</a>
            <a>About</a>
            <a>Profile</a>
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
                    <form   method="post">
                        <h1>Change Area</h1>
                        <input type="text" name="email" placeholder="Warden E-Mail" required>
                        <br>                  
                        <select name="area">
                            <?php
                                while ($row = mysqli_fetch_array($sql)){
                                    echo "<option value='". $row['Area_Name'] ."'>" .$row['Area_Name'] ."</option>" ;
                                }
                            ?>
                        </select> 
                        <input type="submit" name="btn" value="Search"><br><br>
                        <?php
                            if($value==2)
                            {
                                echo "<p >Area Edited</p>";
                            }

                        ?>
                    </form>
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