<html>
<?php
    session_start();
        if($_SESSION['STATUS']!="Online")
            header('Location: login.php'); 
    ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
</head><style>
    h1{
        font-size: 30px;
        font-family: sans-serif;
        text-align: center;
        
    }
    #centerdiv{
        width: 75%;
    }
   
            body
            {
                background-image: url(wp1919679.jpg); height: 100%;
                background-position: center;
                background-size: cover;
            }</style>
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
            <?php
                error_reporting(E_ERROR | E_PARSE);
                $name=$_POST['usrname'];
                $code=$_POST['passwd'];  
                $host="localhost";
                $username="root";
                $password="";
                $dbname="dbs";
                $conn = mysqli_connect($host, $username, $password,$dbname);
                session_start();
                $id= $_SESSION['uid'];
                $vid= $_SESSION['vid'];
            
                $query="select * from e_user where User_ID=$id";               
            
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                echo "<table >
                <h1>
                    User Profile
                </h1>
                            <tr>
                                <th> User_ID </th>
                                <th> User Name </th>
                                <th> Password </th> 
                                <th> PhoneNumber </th>
                                <th> E-Mail </th>
                                <th> Status </th>  
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    //var_dump($row);
                    echo    "<tr>
                                <td>". $row['User_ID'] ."</td>".
                                "<td>".$row['User_Name']. "</td>".
                                "<td>". $row['Password'] ."</td>".
                                "<td>".$row['PhoneNumber']. "</td>".
                                "<td>".$row['E_mail']. "</td>".
                                "<td>".$row['Status']. "</td>
                            </tr>";
                }  
            echo "</table>";
            
            echo"<br><br><br>";
            $query="select * from vehicle where Vehicle_No='$vid';";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
            echo "<table >
                <h1>
                    Vehicle Info
                </h1>
                        <tr>
                            <th> Vehicle_No </th>
                            <th> User_ID </th>
                            <th> Model </th> 
                            <th> Type </th> 
                        </tr>";
            while($row = mysqli_fetch_assoc($result)) 
            {     
                
                echo    "<tr>                                
                            <td>". $row['Vehicle_No'] ."</td>".
                            "<td>".$row['User_ID']. "</td>".
                            "<td>". $row['Model'] ."</td>".
                            "<td>".$row['Type']. "</td>
                        </tr>";
            }  
            
            echo "</table>";
	       
            ?>
            <br><br>
            
            
        </div>
    </body>
</html>