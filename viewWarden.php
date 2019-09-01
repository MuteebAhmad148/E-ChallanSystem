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
                        session_start();
                        $areaid=$_SESSION['areaid'];
                        $query= "select * from area where Area_code='$areaid'" ;
                        $arearesult=mysqli_query($conn,$query);

    
    
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
                $areaid= $_SESSION['areaid'];
        
            
                $query="select * from e_user where User_ID=$id";               
            
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                echo "<table >
                <h1> Wardon Profile</h1>
                            <tr>
                                <th> Warden_ID </th>
                                <th> Warden Name </th>
                                <th> Password </th> 
                                <th> Area Code </th>
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
                                "<td>".$row['Area_code']. "</td>".
                                "<td>".$row['PhoneNumber']. "</td>".
                                "<td>".$row['E_mail']. "</td>".
                                "<td>".$row['Status']. "</td>
                            </tr>";
                }  
            echo "</table>";
            
            echo"<br><br><br>";
            $query="select * from area where Area_code='$areaid';";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
            echo "<table >
            <h1> Area</h1>
                        <tr>
                            <th> Area_code </th>
                            <th> Area_Name </th>
                            <th> District </th> 
                            <th> City </th> 
                        </tr>";
            while($row = mysqli_fetch_assoc($arearesult)) 
            {     
                
                echo    "<tr>                                
                            <td>". $row['Area_code'] ."</td>".
                            "<td>".$row['Area_Name']. "</td>".
                            "<td>". $row['District'] ."</td>".
                            "<td>".$row['City']. "</td>
                        </tr>";
            }  
            
            echo "</table>";
	       
            ?>
            <br><br>
            <div id="div2">
                <a href="addVehicle.php" > Go back</a></div>
            
            
        </div>
    </body>
</html>