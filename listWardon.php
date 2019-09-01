<html>
    <?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
    <?php
            error_reporting(E_ERROR | E_PARSE);
            $host="localhost";
            $username="root";
            $password="";
            $dbname="dbs";
            $conn = mysqli_connect($host, $username, $password,$dbname);
            $sql = mysqli_query($conn, "SELECT Area_Name From area"); 
            session_start();
            $id= $_SESSION['user_id'];
            if($_POST["btn"])
            {
                $area=$_POST['area'];
                $query="select User_ID,User_Name,Area_Name ,PhoneNumber
                        from e_user,area 
                        where e_user.Area_code=area.Area_code and Area_Name='$area'";
                $result=mysqli_query($conn,$query);
            }
            else
            {
                $query="select User_ID,User_Name,Area_Name ,PhoneNumber
                        from e_user,area 
                        where e_user.Area_code=area.Area_code";
                $result=mysqli_query($conn,$query);
                
            }
            $count=mysqli_num_rows($result);
    ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        
            select {
    font-size: 19px;
    margin-top: 30px;
    margin-left: 30px;
    margin-right: 60px;
    width: 15%;
    height: 136%;
}
        select option{
            font-family:sans-serif;
        }
        span{
            font-family: sans-serif;
            font-size: 20px;
            margin-left: 5px;
        }
        #formlist{
            position: relative;
            border: none;
            top:0;
            left: 40px;
            width: 100%;
            height: 20px;
        }
        #formbutton{
            
            width:20%;
            padding: 0;
            margin: 0;
            border: none;
        }
        a{
            margin-top: 30px;
        }
    </style>
</head>
    <body>
          <div id="menu">
            <img src="logo.PNG" >
        <nav>
            <a href="admin.php">Home</a>
            <a>About</a>
            <a>Profile</a>
            <a href="login.php">Log Out</a>
        </nav>
        </div><div id="leftdiv">
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
            <form id="formlist" method="post">
                <span> Area
                    <select name="area">
                        <?php

                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='". $row['Area_Name'] ."'>" .$row['Area_Name'] ."</option>" ;
                        }
                        ?>
                    </select>
                </span>
                <input id="formbutton" type="submit" name="btn" value="Filter Record">
            </form>
                <?php
                echo "<table >
                            <tr>
                                <th>Wardon_ID          </th>
                                <th>Wardon Name         </th> 
                                <th>Area               </th>
                                <th>Phone Number                </th> 
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    echo    "<tr>
                                <td>". $row['User_ID'] ."</td>".
                                "<td>".$row['User_Name']. "</td>".
                                "<td>". $row['Area_Name'] ."</td>".
                                "<td>".$row['PhoneNumber']. "</td>
                            </tr>";
                }  
            
            echo "</table>";
	       
            ?>
           
        </div>
        <div id="rightdiv">
        </div>
    </body>
</html>