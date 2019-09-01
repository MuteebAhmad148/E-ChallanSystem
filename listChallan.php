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
            $sql2 = mysqli_query($conn, "SELECT Distinct Type From vehicle"); 
    
            session_start();
            $id= $_SESSION['user_id'];

            if($_POST["btn"])
            {
                $area=$_POST['area'];
                $query="select *
                from challan ,e_user,area
                where challan.User_ID=e_user.User_ID and  e_user.Area_code=area.Area_code AND area.Area_Name='$area' ";
                $result=mysqli_query($conn,$query);
                
            }
            else if($_POST["btn2"])
            {
                $type=$_POST['type'];
                $query="select *
                from challan ,e_user,vehicle,area
                where challan.User_ID=e_user.User_ID and e_user.Area_code=area.Area_code AND challan.Vehicle_No=vehicle.Vehicle_No AND vehicle.type='$type' ";
                $result=mysqli_query($conn,$query);
                
            }
            else
            {
                $query="select *
                        from challan,e_user,area
                        where challan.User_ID=e_user.User_ID and area.Area_code=e_user.Area_code;";
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
            form input[type="text"]{
                text-decoration: none;
                  background-color: transparent;
                border: none;
                border-bottom: 2px solid black;
                padding: 0;
                margin-left: 04% ;
                margin-right: 7.65%;
                margin-bottom: 25px;
                font-family: sans-serif;
                font-size: 18px;
                width: 120px;
                height: 30px;
            }
            form input[type="text"]:hover{
                border: none;
                 border-bottom: 2px solid red;
               
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
        table
        {
            margin-top: 20%;
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
            <form id="formlist" method="post">
                
                <span> Area
                    <select name="area">
                        <?php

                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value='". $row['Area_Name'] ."'>" .$row['Area_Name'] ."</option>" ;
                        }
                        ?>
                    </select>
                <input id="formbutton" type="submit" name="btn" value="Filter Record">
                </span>
                
                <br>
                   
                <span> Vehicle Type
                    <select name="type">
                        <?php

                            while ($row2 = mysqli_fetch_array($sql2)){
                                echo "<option value='". $row2['Type'] ."'>" .$row2['Type'] ."</option>" ;
                        }
                        ?>
                    </select>
                    
                </span>
                <input id="formbutton" type="submit" name="btn2" value="Filter Record">
                
            </form>
            
                <?php
                echo "<table >
                            <tr>
                                <th>Challan ID          </th>
                                <th>Wardon Name         </th> 
                                <th>Area Violated         </th> 
                                <th>Amount               </th>
                                <th>Vehicle No               </th> 
                                 <th>Status              </th>
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    echo    "<tr>
                                <td>". $row['Challan_No'] ."</td>".
                                "<td>".$row['User_Name']. "</td>".
                                "<td>".$row['Area_Name']."</td>".
                                "<td>". $row['Amount'] ."</td>".
                                "<td>". $row['Vehicle_No'] ."</td>".
                                "<td>". $row['C_Status'] ."</td>
                            </tr>";
                }  
            
            echo "</table>";
	       
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