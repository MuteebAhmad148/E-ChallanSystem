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
    if($_POST["btn"])
    {
        $key=$_POST['searchKeyword'];
            $query="select *
                    from e_user
                    where status='User' and User_Name like'$key%'";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
       }
       else
       {
           $query="select *
                    from e_user
                    where status='User'";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
       }
    ?>
<head>
     <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      form input[type="text"] {
                border: 2px solid!important;   
                border-bottom: 2px solid black!important;
                padding: 6px!important;
                margin-left: -37%!important;
                margin-bottom: 25px!important;
                font-family: sans-serif!important;
                font-size: 15px!important;
            }
            form input[type="submit"] {
                margin-left: 40px!important;
                background-color: black!important;
                width: 101px!important;
                font-size: 15px!important;   
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
            <form id="formForButton" method="post" >
                <input type="text" placeholder="User Name" name="searchKeyword"/>
                <input type="submit"  value="Search" name="btn">
            </form>
                <?php
                echo "<table >
                            <tr>
                                <th>User_ID          </th>
                                <th>User Name         </th> 
                                <th>Email               </th>
                                <th>Phone Number                </th> 
                            </tr>";
                while($row = mysqli_fetch_assoc($result)) 
                {     
                    echo    "<tr>
                                <td>". $row['User_ID'] ."</td>".
                                "<td>".$row['User_Name']. "</td>".
                                "<td>". $row['E_mail'] ."</td>".
                                "<td>".$row['PhoneNumber']. "</td>
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